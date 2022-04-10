<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Store;
use Illuminate\Http\Request;

class MarketController extends Controller
{
    //
    public function showMarket () {
        $stores = Store::where([
            ['admin_id', auth('admin')->user()->id],
            ['status', '1'],
        ])->get();
        return response()->view('ecommerce.mark.index', [
            'stores' => $stores,
        ]);
    }
}
