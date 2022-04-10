<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\AdminActivity;
use App\Models\AdminClients;
use App\Models\Client;
use App\Models\ClientInfo;
use App\Models\ClientSocial;
use App\Models\Contract;
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
        $client = Client::where('email', $request->get('email'))->first();
        if (!is_null($client))
            return response()->json([
                'message' => 'This email is already used, please use another client email.',
            ], Response::HTTP_BAD_REQUEST);

        if (!$validator->fails()) {
            $client = new Client();
            $client->name = $request->get('name');
            $client->phone = $request->get('phone');
            $client->email = $request->get('email');
            $client->position = 'client';
            $client->location = $request->get('location');
            $client->status = $request->get('status') == 'active' ? '1' : '0';
            $client->notes = $request->get('notes');
            $client->password = Hash::make('password');
            $isCreated = $client->save();
            $client = Client::where('email', $request->get('email'))->first();

            $adminActivity = new AdminActivity();
            $adminActivity->activity = 'You\'re added new client: ' . $client->name . '.';
            $adminActivity->admin_id = auth('admin')->user()->id;
            $adminActivity->save();

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

        $exists = Client::whereHas('admins', function ($query) use ($client) {
            $query->where([
                ['admin_id', auth('admin')->user()->id],
                ['client_id', $client->id]
            ]);
        })->exists();

        if (!$exists)
            return redirect()->route('client.index');

        $clientSocial = $client->clientSocial();
        $clientInfo = $client->clientInfo();
        return response()->view('ecommerce.client.edit', [
            'client' => $client,
            'clientSocial' => $clientSocial,
            'clientInfo' => $clientInfo,
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
        $exists = Client::whereHas('admins', function ($query) use ($client) {
            $query->where([
                ['admin_id', auth('admin')->user()->id],
                ['client_id', $client->id]
            ]);
        })->exists();

        if (!$exists)
            return redirect()->route('client.index');

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

            $adminActivity = new AdminActivity();
            $adminActivity->activity = 'You\'re updated client: ' . $client->name . ', information.';
            $adminActivity->admin_id = auth('admin')->user()->id;
            $adminActivity->save();

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
        $exists = Client::whereHas('admins', function ($query) use ($client) {
            $query->where([
                ['admin_id', auth('admin')->user()->id],
                ['client_id', $client->id]
            ]);
        })->exists();

        if (!$exists)
            return redirect()->route('client.index');
        //
        if ($client->delete()) {

            // Remove Client Information From System
            Contract::where([
                ['client_id', $client->id],
                ['admin_id', auth('admin')->user()->id]
            ])->delete();
            ClientInfo::where([
                ['client_id', $client->id],
                ['admin_id', auth('admin')->user()->id],
            ])->delete();

            $adminActivity = new AdminActivity();
            $adminActivity->activity = 'You\'re deleted ' . $client->name . ', client.';
            $adminActivity->admin_id = auth('admin')->user()->id;
            $adminActivity->save();

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

    public function blockedClient()
    {
        $clients = Client::whereHas('admins', function ($query) {
            $query->where('admin_id', auth('admin')->user()->id);
        })
            ->where('status', 0)
            ->get();
        return response()->view('ecommerce.client.blocked-clients', [
            'clients' => $clients,
        ]);
    }

    public function unblockClient($id)
    {
        $exists = Client::whereHas('admins', function ($query) use ($id) {
            $query->where([
                ['admin_id', auth('admin')->user()->id],
                ['client_id', $id]
            ]);
        })->exists();
        if (!$exists)
            return redirect()->route('client.index');

        $validator = Validator([
            'id' => 'required|integer|exists:clients,id',
        ]);

        if (!$validator->fails()) {
            $client = Client::whereHas('admins', function ($query) {
                $query->where('admin_id', auth('admin')->user()->id);
            })
                ->where([
                    ['id', $id],
                    ['status', '0']
                ])
                ->first();

            if (is_null($client))
                return redirect()->route('blocked.client');

            $client->status = '1';
            $isUnBlocked = $client->save();

            $adminActivity = new AdminActivity();
            $adminActivity->activity = 'You\'re Unblock ' . $client->name . ', client.';
            $adminActivity->admin_id = auth('admin')->user()->id;
            $adminActivity->save();

            return response()->json([
                'message' => $isUnBlocked ? 'Client un-blocked successfully' : 'Faild to un-block client',
            ], $isUnBlocked ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST);
        } else {
            return response()->json([
                'message' => $validator->getMessageBag()->first(),
            ], Response::HTTP_BAD_REQUEST);
        }
    }

    public function blockClient($id)
    {

        $exists = Client::whereHas('admins', function ($query) use ($id) {
            $query->where([
                ['admin_id', auth('admin')->user()->id],
                ['client_id', $id]
            ]);
        })->exists();
        if (!$exists)
            return redirect()->route('client.index');

        $validator = Validator([
            'id' => 'required|integer|exists:clients,id',
        ]);

        if (!$validator->fails()) {
            $client = Client::whereHas('admins', function ($query) {
                $query->where('admin_id', auth('admin')->user()->id);
            })
                ->where([
                    ['id', $id],
                    ['status', '1']
                ])
                ->first();

            if (is_null($client))
                return redirect()->route('client.index');

            $client->status = '0';
            $isBlocked = $client->save();

            $adminActivity = new AdminActivity();
            $adminActivity->activity = 'You\'re bloked ' . $client->name . ', client.';
            $adminActivity->admin_id = auth('admin')->user()->id;
            $adminActivity->save();

            return response()->json([
                'message' => $isBlocked ? 'Client blocked successfully' : 'Faild to block client',
            ], $isBlocked ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST);
        } else {
            return response()->json([
                'message' => $validator->getMessageBag()->first(),
            ], Response::HTTP_BAD_REQUEST);
        }
    }
}
