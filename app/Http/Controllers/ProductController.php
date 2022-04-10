<?php

namespace App\Http\Controllers;

use App\Models\AdminActivity;
use App\Models\Product;
use App\Models\Store;
use Dotenv\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Symfony\Component\HttpFoundation\Response;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::where([
            ['status', 1],
        ])
            ->with('store', function ($query) {
                $query->where('admin_id', auth('admin')->user()->id);
            })
            ->get();
        //
        return response()->view('ecommerce.product.index', [
            'products' => $products,
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
        $stores = Store::where([
            ['admin_id', auth('admin')->user()->id],
            ['status', 1],
        ])->get();
        return response()->view('ecommerce.product.create', [
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
            'product_name' => 'required|string|min:3|max:50',
            'store_id' => 'required|integer|exists:stores,id',
            'product_image' => 'required|image|mimes:jpg,png,jpeg|max:5024',
            'status' => 'required|boolean'
        ], [
            'product_image.required' => 'Add new image for your new product'
        ]);
        // 
        if (!$validator->fails()) {
            $store = Store::where([
                ['id', $request->get('store_id')],
                ['status', '1']
            ])->first();
            if (is_null($store))
                return response()->json([
                    'message' => 'Unavialable Resources'
                ], Response::HTTP_BAD_REQUEST);

            $product = new Product();
            $product->name = $request->get('product_name');
            $product->price = $store->price_after_offer;
            $product->status = $request->get('status');
            $product->admin_id = auth('admin')->user()->id;
            $product_image = $request->file('product_image');
            $product_image_name = time() . '_product_' . auth('admin')->user()->id . '_.' . $product_image->getClientOriginalExtension();
            $product_image->move(public_path('/images/products/'), $product_image_name);
            $product->image = $product_image_name;
            $product->store_id = $store->id;
            $isCreated = $product->save();

            $adminActivity = new AdminActivity();
            $adminActivity->activity = 'You\'re added new product: ' . $product->name . '.';
            $adminActivity->admin_id = auth('admin')->user()->id;
            $adminActivity->save();

            return response()->json([
                'message' => $isCreated ? 'Product added successfully' : 'Faild to add product',
            ], $isCreated ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST);
        } else {
            return response()->json([
                'message' => $validator->getMessageBag()->first(),
            ], Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        if (auth('admin')->user()->id != $product->store->admin_id)
            return redirect()->route('product.index');
        //
        $stores = Store::where([
            ['admin_id', auth('admin')->user()->id],
            ['status', '1']
        ])->get();
        return response()->view('ecommerce.product.edit', [
            'product' => $product,
            'stores' => $stores,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $validator = Validator($request->all(), [
            'product_name' => 'required|string|min:3|max:50',
            'store_id' => 'required|integer|exists:stores,id',
            'status' => 'required|boolean',
        ]);
        //
        if (!$validator->fails()) {
            $product->name = $request->get('product_name');
            $product->store_id = $request->get('store_id');
            $product->status = $request->get('status');
            $isUpdated = $product->save();

            $adminActivity = new AdminActivity();
            $adminActivity->activity = 'You\'re updated ' . $product->name . ' product information.';
            $adminActivity->admin_id = auth('admin')->user()->id;
            $adminActivity->save();

            return response()->json([
                'message' => $isUpdated ? 'Product updated successfully' : 'Faild to update product',
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
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        if ($product->store->admin_id != auth('admin')->user()->id)
            return redirect()->route('product.index');
        //
        $product_image_path = public_path('/images/products/') . $product->image;
        if (File::exists($product_image_path))
            File::delete($product_image_path);

        if ($product->delete()) {
            $adminActivity = new AdminActivity();
            $adminActivity->activity = 'You\'re deleted ' .  $product->name . ' product.';
            $adminActivity->admin_id = auth('admin')->user()->id;
            $adminActivity->save();
            return response()->json([
                'icon' => 'success',
                'title' => 'Deleted!',
                'text' => 'Product deleted successfully',
            ], Response::HTTP_OK);
        } else {
            return response()->json([
                'icon' => 'error',
                'title' => 'Faild!',
                'text' => 'Faild to delete product',
            ], Response::HTTP_BAD_REQUEST);
        }
    }
}
