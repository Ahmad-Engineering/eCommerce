<?php

namespace App\Http\Controllers;

use App\Models\AdminActivity;
use App\Models\Branch;
use App\Models\Client;
use App\Models\Contract;
use App\Models\ContractType;
use App\Models\Store;
use Dotenv\Validator;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ContractController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $contracts = Contract::with('client')
            ->where('admin_id', auth('admin')->user()->id)
            ->get();

        // Gathering Information For Admin Statistices
        $contract_no = Contract::where([
            ['admin_id', auth('admin')->user()->id],
            ['status', 1],
        ])->count();
        $client_no = Client::whereHas('admins', function ($query) {
            $query->where([
                ['admin_id', auth('admin')->user()->id],
            ]);
        })
            ->where('status', 1)
            ->count();
        $admin_price = Contract::where([
            ['admin_id', auth('admin')->user()->id],
            ['status', 1],
        ])->sum('price');
        $branch_no = Branch::where([
            ['admin_id', auth('admin')->user()->id],
        ])->count();
        return response()->view('ecommerce.contract.my-contracts', [
            'contracts' => $contracts,
            'contract_no' => $contract_no,
            'client_no' => $client_no,
            'admin_price' => $admin_price,
            'branch_no' => $branch_no,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $clients = Client::select(['id', 'name'])
            ->whereHas('admins', function ($query) {
                $query->where('admin_id', auth('admin')->user()->id);
            })
            ->get();
        $contract_types = ContractType::select(['id', 'type'])
            ->where('admin_id', auth('admin')->user()->id)
            ->get();
        $stores = Store::where('admin_id', auth('admin')->user()->id)->get();
        return response()->view('ecommerce.contract.assign-contract', [
            'clients' => $clients,
            'contract_types' => $contract_types,
            'stores' => $stores,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator($request->all(), [
            'title' => 'required|string|min:3|max:50',
            'price' => 'required|numeric|min:10',
            'status' => 'required|string|in:active,blocked',
            'from_date' => 'required|string',
            'to_date' => 'required|string',
            'client_id' => 'required|integer|exists:clients,id',
            'contract_type_id' => 'required|integer|exists:contract_types,id',
            'store' => 'required|integer|exists:stores,id',
            'peice_no' => 'required|integer|min:0',
        ]);
        //
        if (!$validator->fails()) {

            $store = Store::where([
                ['admin_id', auth('admin')->user()->id],
                ['id', $request->get('store')]
            ])->first();

            if ($store->amount < $request->get('peice_no'))
                return response()->json([
                    'message' => 'Not enogh goods in your ' . $store->name . ' store.',
                ], Response::HTTP_BAD_REQUEST);

            if (!is_null($store) && $store->amount >= $request->get('peice_no')) {
                $contractType = ContractType::select(['type'])->where('id', $request->get('contract_type_id'))->first();

                $contract = new Contract();
                $contract->title = $request->get('title');
                $contract->status = $request->get('status') == 'active' ? '1' : '0';
                $contract->from_date = $request->get('from_date');
                $contract->to_date = $request->get('to_date');
                $contract->client_id = $request->get('client_id');
                $contract->admin_id = auth('admin')->user()->id;
                $contract->price = $request->get('price') - $request->get('tax_no');
                $contract->price_after_offer = ($request->get('price') - ($request->get('price') / 100) * $store->offer);
                $contract->tax_no = $request->get('price') / 200;
                $contract->peice_no = $request->get('peice_no');
                $contract->contract_type_id = $request->get('contract_type_id');
                $contract->store_id = $store->id;
                $contract->type = $contractType->type;
                $isCreated = $contract->save();

                $adminActivity = new AdminActivity();
                $adminActivity->activity = 'You\'re made new contract: ' . $contract->title . '.';
                $adminActivity->admin_id = auth('admin')->user()->id;
                $adminActivity->save();

                $store->amount = $store->amount - $request->get('peice_no');

                return response()->json([
                    'message' => $isCreated ? 'Contracted Successfully' : 'Faild to save contract',
                ], $isCreated ? Response::HTTP_CREATED : Response::HTTP_BAD_REQUEST);
            } else {
                return redirect()->route('contract.create');
            }
        } else {
            return response()->json([
                'message' => $validator->getMessageBag()->first()
            ], Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contract  $contract
     * @return \Illuminate\Http\Response
     */
    public function show(Contract $contract)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contract  $contract
     * @return \Illuminate\Http\Response
     */
    public function edit(Contract $contract)
    {
        $exists = Contract::where([
            ['id', $contract->id],
            ['admin_id', auth('admin')->user()->id],
        ])->exists();

        if (!$exists)
            return redirect()->route('contract.index');
        //
        $clients = Client::select(['id', 'name'])
            ->whereHas('admins', function ($query) {
                $query->where('admin_id', auth('admin')->user()->id);
            })
            ->get();
        $contract_types = ContractType::select(['id', 'type'])
            ->where('admin_id', auth('admin')->user()->id)
            ->get();
        return response()->view('ecommerce.contract.edit-assigned-contract', [
            'contract' => $contract,
            'clients' => $clients,
            'contract_types' => $contract_types,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Contract  $contract
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contract $contract)
    {
        $exists = Contract::where([
            ['id', $contract->id],
            ['admin_id', auth('admin')->user()->id],
        ])->exists();
        if (!$exists)
            return redirect()->route('contract.index');

        $validator = Validator($request->all(), [
            'title' => 'required|string|min:3|max:50',
            'price' => 'required|numeric|min:10',
            'status' => 'required|string|in:active,blocked',
            'from_date' => 'required|string',
            'to_date' => 'required|string',
            'client_id' => 'required|integer|exists:clients,id',
            'contract_type_id' => 'required|integer|exists:contract_types,id',
        ]);
        //
        if (!$validator->fails()) {
            $contractType = ContractType::select(['type'])->where('id', $request->get('contract_type_id'))->first();

            $contract->title = $request->get('title');
            $contract->status = $request->get('status') == 'active' ? '1' : '0';
            $contract->from_date = $request->get('from_date');
            $contract->to_date = $request->get('to_date');
            $contract->client_id = $request->get('client_id');
            $contract->admin_id = auth('admin')->user()->id;
            $contract->price = $request->get('price');
            $contract->tax_no = $request->get('price') / 200;
            $contract->contract_type_id = $request->get('contract_type_id');
            $contract->type = $contractType->type;
            $isUpdated = $contract->save();

            $adminActivity = new AdminActivity();
            $adminActivity->activity = 'You\'re updated ' . $contract->title . ' contract.';
            $adminActivity->admin_id = auth('admin')->user()->id;
            $adminActivity->save();

            return response()->json([
                'message' => $isUpdated ? 'Contract updated successfully' : 'Faild to update contract',
            ], $isUpdated ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST);
        } else {
            return response()->json([
                'message' => $validator->getMessageBag()->first()
            ], Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contract  $contract
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contract $contract)
    {
        $exists = Contract::where([
            ['id', $contract->id],
            ['admin_id', auth('admin')->user()->id],
        ])->exists();
        if (!$exists)
            return redirect()->route('contract.index');
        //
        if ($contract->delete()) {
            $adminActivity = new AdminActivity();
            $adminActivity->activity = 'You\'re deleted ' . $contract->title . ' contract.';
            $adminActivity->admin_id = auth('admin')->user()->id;
            $adminActivity->save();
            return response()->json([
                'icon' => 'success',
                'title' => 'Deleted',
                'text' => 'Contract deleted successfully',
            ], Response::HTTP_OK);
        } else {
            return response()->json([
                'icon' => 'error',
                'title' => 'Faild',
                'text' => 'Faild to delete contract',
            ], Response::HTTP_BAD_REQUEST);
        }
    }
}
