<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Contract;
use App\Models\ContractType;
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
        return response()->view('ecommerce.contract.my-contracts', [
            'contracts' => $contracts,
            'contract_no' => $contract_no,
            'client_no' => $client_no,
            'admin_price' => $admin_price,
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
        return response()->view('ecommerce.contract.assign-contract', [
            'clients' => $clients,
            'contract_types' => $contract_types,
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
        ]);
        //
        if (!$validator->fails()) {
            $contractType = ContractType::select(['type'])->where('id', $request->get('contract_type_id'))->first();

            $contract = new Contract();
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
            $isCreated = $contract->save();

            return response()->json([
                'message' => $isCreated ? 'Contracted Successfully' : 'Faild to save contract',
            ], $isCreated ? Response::HTTP_CREATED : Response::HTTP_BAD_REQUEST);
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
        //
        if ($contract->delete()) {
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
