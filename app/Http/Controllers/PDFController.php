<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\ClientInfo;
use App\Models\Contract;
use App\Models\Product;
use App\Models\Store;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PDFController extends Controller
{
    //

    public function downloadContractAsPDF($id)
    {
        $contract = Contract::where([
            ['id', $id],
            ['admin_id', auth('admin')->user()->id]
        ])
            ->with('client', function ($query) {
                $query->select(['id', 'name', 'phone', 'email', 'location'])->with('clientInfo');
            })
            ->with('admin', function ($query) {
                $query->select(['id', 'name', 'phone', 'email', 'bio']);
            })
            ->with('store', function ($query) {
                $query->select(['id', 'name', 'price', 'offer']);
            })
            ->first();
        $client_info = ClientInfo::where('client_id', $contract->client->id)->exists();
        if (!$client_info)
            return redirect()->route('client.edit', $contract->client->id)->with([
                'message' => 'Complete your client information, please',
            ]);

        $pdf = Pdf::loadView('ecommerce.pdf.admin-client-contract', [
            'contract' => $contract,
        ]);
        return $pdf->download('contract.pdf');
    }

    public function adminCLientsAsPDF()
    {
        $clients = Client::select(['id', 'name', 'phone', 'email', 'location', 'status', 'created_at', 'updated_at'])
            ->whereHas('admins', function ($query) {
                $query->where('admin_id', auth('admin')->user()->id);
            })
            ->with('contracts', function ($query) {
                $query->sum('price');
            })
            ->get();

        $client_pdf = Pdf::loadView('ecommerce.pdf.admin-clients', [
            'clients' => $clients,
        ]);
        return $client_pdf->download('clients.pdf');
    }

    public function adminStoresAsPDF()
    {
        $stores = Store::where('admin_id', auth('admin')->user()->id)->get();
        $stores_pdf = Pdf::loadView('ecommerce.pdf.admin-store', [
            'stores' => $stores,
        ]);
        return $stores_pdf->download('stores.pdf');
    }

    public function adminProductsAsPDF()
    {
        $products = Product::where([
            ['status', '1'],
        ])
        ->with('store', function($query) {
            $query->where('admin_id', auth('admin')->user()->id);
        })
        ->get();

        $products_pdf = Pdf::loadView('ecommerce.pdf.admin-products', [
            'products' => $products,
        ]);
        return $products_pdf->download('products.pdf');

        // return response()->view('ecommerce.pdf.admin-products');
    }
}
