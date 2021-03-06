<?php

namespace App\Http\Controllers;

use App\Models\AdminActivity;
use App\Models\Product;
use App\Models\Store;
use Dotenv\Validator;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $stores = Store::where('admin_id', auth('admin')->user()->id)->get();
        return response()->view('ecommerce.store.index', [
            'stores' => $stores,
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
        return response()->view('ecommerce.store.create');
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
            'store_name' => 'required|string|min:3|max:50',
            'goods_amount' => 'required|integer|min:0',
            'piece_price' => 'required|numeric|min:0',
            'special_offer' => 'required|numeric|min:0',
        ]);
        //
        if (!$validator->fails()) {
            $store = new Store();
            $store->name = $request->get('store_name');
            $store->amount = $request->get('goods_amount');
            $store->price = $request->get('piece_price');
            $store->offer = $request->get('special_offer');
            $store->price_after_offer = ($request->get('piece_price') - ($request->get('piece_price') / 100) * $request->get('special_offer'));
            $store->admin_id = auth('admin')->user()->id;
            $isCreated = $store->save();

            $adminActivity = new AdminActivity();
            $adminActivity->activity = 'You\'re added new store: ' . $store->name . '.';
            $adminActivity->admin_id = auth('admin')->user()->id;
            $adminActivity->save();

            return response()->json([
                'message' => $isCreated ? 'Store created successfully' : 'Faild to create new store',
            ], $isCreated ? Response::HTTP_CREATED : Response::HTTP_BAD_REQUEST);
        } else {
            return response()->json([
                'message' => $validator->getMessageBag()->first(),
            ], Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function show(Store $store)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function edit(Store $store)
    {
        $exists = Store::where([
            ['id', $store->id],
            ['admin_id', auth('admin')->user()->id],
        ])->exists();
        if (!$exists)
            return redirect()->route('store.index');
        //
        if ($store->admin_id != auth('admin')->user()->id) {
            return redirect()->route('store.index');
        }
        return response()->view('ecommerce.store.edit', [
            'store' => $store,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Store $store)
    {
        $exists = Store::where([
            ['id', $store->id],
            ['admin_id', auth('admin')->user()->id],
        ])->exists();
        if (!$exists)
            return redirect()->route('store.index');

        $validator = Validator($request->all(), [
            'store_name' => 'required|string|min:3|max:50',
            'goods_amount' => 'required|integer|min:0',
            'piece_price' => 'required|numeric|min:0',
            'special_offer' => 'required|numeric|min:0',
        ]);
        //
        if (!$validator->fails()) {
            $store->name = $request->get('store_name');
            $store->amount = $request->get('goods_amount');
            $store->price = $request->get('piece_price');
            $store->offer = $request->get('special_offer');
            $store->price_after_offer = ($request->get('piece_price') - ($request->get('piece_price') / 100) * $request->get('special_offer'));
            $isUpdated = $store->save();

            $adminActivity = new AdminActivity();
            $adminActivity->activity = 'You\'re updated ' . $store->name . ' store information.';
            $adminActivity->admin_id = auth('admin')->user()->id;
            $adminActivity->save();

            Product::where([
                ['store_id', $store->id],
            ])->update([
                'price' => $store->price - (($store->offer / 100) * $store->price),
            ]);

            return response()->json([
                'message' => $isUpdated ? 'Store updated successfully' : 'Faild to update store',
            ], $isUpdated ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST);
        } else {
            return response()->json([
                'message' => $validator->getMessageBag()->first(),
            ], Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function destroy(Store $store)
    {
        $exists = Store::where([
            ['id', $store->id],
            ['admin_id', auth('admin')->user()->id],
        ])->exists();
        if (!$exists)
            return redirect()->route('store.index');
        //
        if ($store->delete()) {
            $adminActivity = new AdminActivity();
            $adminActivity->activity = 'You\'re deleted ' . $store->name . ' store.';
            $adminActivity->admin_id = auth('admin')->user()->id;
            $adminActivity->save();
            return response()->json([
                'icon' => 'success',
                'title' => 'Deleted',
                'text' => 'Store deleted successfully',
            ], Response::HTTP_OK);
        } else {
            return response()->json([
                'icon' => 'error',
                'title' => 'Faild',
                'text' => 'Faild to delete store',
            ], Response::HTTP_BAD_REQUEST);
        }
    }
}
