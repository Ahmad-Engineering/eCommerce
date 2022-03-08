<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Contract;
use App\Models\Store;
use Dotenv\Validator;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $branches = Branch::where([
            ['admin_id', auth('admin')->user()->id],
            ['position', 'admin']
        ])->get();
        //
        return response()->view('ecommerce.branch.index', [
            'branches' => $branches,
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
        return response()->view('ecommerce.branch.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validoter = Validator($request->all(), [
            'branch_name' => 'required|string|min:3|max:45',
            'branch_address' => 'required|string|min:3|max:100',
            'contract_no' => 'required|integer|min:1',
            'branch_type' => 'required|string|min:3|max:45',
        ]);
        //

        $contract = Contract::where([
            ['admin_id', auth('admin')->user()->id],
            ['id', $request->get('contract_no')],
        ])->first();

        // There is no contract
        if (is_null($contract))
            return response()->json([
                'message' => 'Unauthrized access',
            ], Response::HTTP_BAD_REQUEST);

        // There is no enoght goods
        $store = Store::where([
            ['admin_id', auth('admin')->user()->id],
            ['id', $contract->store_id],
        ])->first();

        if (is_null($store)){
            return response()->json([
                'message' => 'Unauthrized access',
            ], Response::HTTP_BAD_REQUEST);
        }else if ($store->amount < $contract->peice_no) {
            return response()->json([
                'message' => 'Not enogh goods in the ' . $store->name . ' store',
            ]. Response::HTTP_BAD_REQUEST);
        }else {
            $store->update([
                'amount' => $store->amount - $contract->peice_no,
            ]);
        }



        if (!$validoter->fails()) {
            $branch = new Branch();
            $branch->name = $request->get('branch_name');
            $branch->address = $request->get('branch_address');
            $branch->goods_amount = $contract->peice_no;
            $branch->type = $request->get('branch_type');

            if (auth('admin')->check()) {
                $branch->position = 'admin';
                $branch->admin_id = auth('admin')->user()->id;
            }else if (auth('client')->check()) {
                $branch->position = 'client';
                $branch->client_id = auth('client')->user()->id;
            }

            $isCreated = $branch->save();

            return response()->json([
                'message' => $isCreated ? 'Branch created successfully' : 'Faild to create branch',
            ], $isCreated ? Response::HTTP_CREATED : Response::HTTP_BAD_REQUEST);

        }else {
            return response()->json([
                'message' => $validoter->getMessageBag()->first(),
            ], Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function show(Branch $branch)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function edit(Branch $branch)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Branch $branch)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function destroy(Branch $branch)
    {
        //
    }
}
