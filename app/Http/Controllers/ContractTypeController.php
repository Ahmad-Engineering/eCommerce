<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\ContractType;
use Dotenv\Validator;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ContractTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $contractTypes = ContractType::where('admin_id', auth('admin')->user()->id)->get();
        return response()->view('ecommerce.contract.index', [
            'contractTypes' => $contractTypes
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
        return response()->view('ecommerce.contract.add-type-contract');
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
            'type' => 'required|string|min:3|max:30',
            'status' => 'required|string|in:active,pending'
        ]);
        //
        if (!$validator->fails()) {
            $contractType = new ContractType();
            $contractType->type = $request->get('type');
            $contractType->status = $request->get('status') == 'active' ? '1' : '0';
            $contractType->admin_id = auth('admin')->user()->id;
            $isCreated = $contractType->save();

            return response()->json([
                'message' => $isCreated ? 'Contract type added successfully' : 'Faild to add contract type',
            ], $isCreated ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST);
        }else {
            return response()->json([
                'message' => $validator->getMessageBag()->first()
            ], Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ContractType  $contractType
     * @return \Illuminate\Http\Response
     */
    public function show(ContractType $contractType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ContractType  $contractType
     * @return \Illuminate\Http\Response
     */
    public function edit(ContractType $contractType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ContractType  $contractType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ContractType $contractType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ContractType  $contractType
     * @return \Illuminate\Http\Response
     */
    public function destroy(ContractType $contractType)
    {
        //
    }
}
