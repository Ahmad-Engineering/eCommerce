<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\AdminClients;
use App\Models\Client;
use App\Models\ClientSocial;
use Dotenv\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;

use function PHPUnit\Framework\isEmpty;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $password = random_int(100000, 99999999);
        $clients = Client::select(['id', 'name', 'email', 'phone', 'location', 'notes', 'status'])
            ->whereHas('admins', function ($query) {
                $query->where('admin_id', auth('admin')->user()->id);
            })
            ->get();
        return response()->view('ecommerce.client.index', [
            'clients' => $clients,
            'password' => $password,
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
            'name' => 'required|string|min:3|max:40',
            'phone' => 'required|string|min:9|max:20',
            'email' => 'required|string|min:9|max:45',
            'location' => 'required|string|min:5|max:100',
            'password' => 'required|string|min:8|max:50',
            'status' => 'required|string|in:active,blocked'
        ]);
        //
        if (!$validator->fails()) {
            $client = new Client();
            $client->name = $request->get('name');
            $client->phone = $request->get('phone');
            $client->email = $request->get('email');
            $client->position = 'client';
            $client->location = $request->get('location');
            $client->status = $request->get('status') == 'active' ? '1' : '0';
            $client->notes = $request->get('notes') == NULL ? NULL : $request->get('notes');
            $client->password = Hash::make('password');
            $isCreated = $client->save();
            $client = Client::where('email', $request->get('email'))->first();

            DB::insert('insert into admin_client (admin_id, client_id, cooperate) values (?, ?, ?)', [
                auth('admin')->user()->id,
                $client->id,
                1,
            ]);

            return response()->json([
                'message' => $isCreated ? 'Created Successfully' : 'Faild to create client!',
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
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        //
        $clientSocial = $client->clientSocial();
        return response()->view('ecommerce.client.edit', [
            'client' => $client,
            'clientSocial' => $clientSocial,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {
        $validator = Validator($request->all(), [
            'name' => 'required|string|min:3|max:40',
            'phone' => 'required|string|min:9|max:20',
            'email' => 'required|string|min:9|max:45',
            'location' => 'required|string|min:5|max:100',
            'status' => 'required|string|in:active,blocked'
        ]);
        //
        if (!$validator->fails()) {
            $client->name = $request->get('name');
            $client->phone = $request->get('phone');
            $client->email = $request->get('email');
            $client->location = $request->get('location');
            $client->status = $request->get('status') == 'active' ? '1' : '0';
            $client->notes = $request->get('notes') == NULL ? NULL : $request->get('notes');
            $isUpdated = $client->save();

            return response()->json([
                'message' => $isUpdated ? 'Client updated successfully' : 'Faild to update client!',
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
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        //
        if ($client->delete()) {
            return response()->json([
                'icon' => 'success',
                'title' => 'Deleted',
                'text' => 'Client deleted successfully',
            ], Response::HTTP_OK);
        } else {
            return response()->json([
                'icon' => 'error',
                'title' => 'Faild',
                'text' => 'Faild to delete client',
            ], Response::HTTP_BAD_REQUEST);
        }
    }
}
