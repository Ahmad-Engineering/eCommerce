<?php

namespace App\Http\Controllers;

use App\Models\AdminActivity;
use App\Models\Client;
use App\Models\ClientSocial;
use Dotenv\Validator;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ClientSocialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
            'client_id' => 'required|integer|exists:clients,id'
        ]);
        //
        if (!$validator->fails()) {
            $client = Client::where('id', $request->get('client_id'))->first();

            // Is The Client Socials Media Links Is Exists Or Not ?!
            $socials = ClientSocial::find($request->get('client_id'));
            if (is_null($socials))
                $clientSocial = new ClientSocial();
            else
                $clientSocial = $socials;

            $clientSocial->twitter = $request->get('twitter');
            $clientSocial->facebook = $request->get('facebook');
            $clientSocial->instagram = $request->get('instagram');
            $clientSocial->github = $request->get('github');
            $clientSocial->codepen = $request->get('codepen');
            $clientSocial->slack = $request->get('slack');
            $clientSocial->client_id = $request->get('client_id');

            $isCreated = $clientSocial->save();

            $adminActivity = new AdminActivity();
            $adminActivity->activity = 'You\'re added for ' . $client->name . ' client social links.';
            $adminActivity->admin_id = auth('admin')->user()->id;
            $adminActivity->save();

            return response()->json([
                'message' => $isCreated ? 'Social links added successfully' : 'Faild to add social links',
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
     * @param  \App\Models\ClientSocial  $clientSocial
     * @return \Illuminate\Http\Response
     */
    public function show(ClientSocial $clientSocial)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ClientSocial  $clientSocial
     * @return \Illuminate\Http\Response
     */
    public function edit(ClientSocial $clientSocial)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ClientSocial  $clientSocial
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ClientSocial $clientSocial)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ClientSocial  $clientSocial
     * @return \Illuminate\Http\Response
     */
    public function destroy(ClientSocial $clientSocial)
    {
        //
    }
}
