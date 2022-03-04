<?php

namespace App\Http\Controllers;

use App\Models\PaymentMethod;
use Dotenv\Validator;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PaymentMethodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $paymentMethods = PaymentMethod::where('admin_id', auth('admin')->user()->id)->get();
        return response()->view('ecommerce.payment method.index', [
            'paymentMethods' => $paymentMethods,
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
        return response()->view('ecommerce.payment method.add-payment-method');
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
            'name' => 'required|string|min:3|max:20',
        ]);
        //
        if (!$validator->fails()) {
            $paymentMethod = new PaymentMethod();
            $paymentMethod->name = $request->get('name');
            $paymentMethod->admin_id = auth('admin')->user()->id;
            $isCreated = $paymentMethod->save();

            return response()->json([
                'message' => $isCreated ? 'Payment method add successfully' : 'Faild to add payment method',
            ], $isCreated ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST);
        }else {
            return response()->json([
                'message' => $validator->getMessageBag()->first(),
            ], Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PaymentMethod  $paymentMethod
     * @return \Illuminate\Http\Response
     */
    public function show(PaymentMethod $paymentMethod)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PaymentMethod  $paymentMethod
     * @return \Illuminate\Http\Response
     */
    public function edit(PaymentMethod $paymentMethod)
    {
        //
        return response()->view('ecommerce.payment method.edit-payment-method', [
            'paymentMethod' => $paymentMethod,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PaymentMethod  $paymentMethod
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PaymentMethod $paymentMethod)
    {
        $validator = Validator($request->all(), [
            'name' => 'required|string|min:3|max:20',
            'status' => 'required|string|in:active,blocked'
        ]);
        //
        if (!$validator->fails()) {
            // $paymentMethod = $request->get('name')
            $paymentMethod->name = $request->get('name');
            $paymentMethod->status = $request->get('status') == 'active' ? '1' : '0';
            $isUpdated = $paymentMethod->save();

            return response()->json([
                'message' => $isUpdated ? 'Payment updated successfully' : 'Faild to update payment',
            ], $isUpdated ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST);
        }else {
            return response()->json([
                'message' => $validator->getMessageBag()->first(),
            ], Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PaymentMethod  $paymentMethod
     * @return \Illuminate\Http\Response
     */
    public function destroy(PaymentMethod $paymentMethod)
    {
        //
        if ($paymentMethod->delete()) {
            return response()->json([
                'icon' => 'success',
                'title' => 'Deleted',
                'text' => 'Payment method deleted successfully',
            ], Response::HTTP_OK);
        }else {
            return response()->json([
                'icon' => 'error',
                'title' => 'Faild',
                'text' => 'Faild to delete payment method',
            ], Response::HTTP_BAD_REQUEST);
        }
    }
}
