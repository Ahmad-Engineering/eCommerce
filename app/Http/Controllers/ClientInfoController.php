<?php

namespace App\Http\Controllers;

use App\Models\AdminActivity;
use App\Models\Client;
use App\Models\ClientInfo;
use Dotenv\Validator;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ClientInfoController extends Controller
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
            'age' => 'required|integer|min:0',
            'mobile' => 'required|string|min:9|max:20',
            'website' => 'required|string|min:5|max:200',
            'language' => 'required|string',
            'gender' => 'required|string|min:1|max:1|in:M,F',
            'email_contact' => 'required|boolean',
            'chat_contact' => 'required|boolean',
            'phone_contact' => 'required|boolean',
            'address_one' => 'required|string|min:5|max:100',
            'postcode' => 'required|string|min:3|max:7',
            'city' => 'required|string|min:3|max:20',
            'state' => 'required|string|min:3|max:20',
            'country' => 'required|string|min:3|max:20',
            'client_id' => 'required|integer|exists:clients,id'
        ], [
            'address_one.required' => 'First address must to enter.'
        ]);
        //
        if (!$validator->fails()) {

            $client = Client::where('id', $request->get('client_id'))->first();

            $clientInfo = ClientInfo::where('client_id', $request->get('client_id'))->first();
            if (is_null($clientInfo)) {
                $clientInfo = new ClientInfo();
            }
            $clientInfo->age = $request->get('age');
            $clientInfo->mobile = $request->get('mobile');
            $clientInfo->website = $request->get('website');
            $clientInfo->native_lan = $request->get('language');
            $clientInfo->gender = $request->get('gender');
            $clientInfo->email_contact = $request->get('email_contact');
            $clientInfo->chat_contact = $request->get('chat_contact');
            $clientInfo->phone_contact = $request->get('phone_contact');
            $clientInfo->first_address = $request->get('address_one');
            $clientInfo->second_address = $request->get('address_two');
            $clientInfo->post_code = $request->get('postcode');
            $clientInfo->city = $request->get('city');
            $clientInfo->state = $request->get('state');
            $clientInfo->country = $request->get('country');
            $clientInfo->client_id = $request->get('client_id');
            $isCreated = $clientInfo->save();

            $adminActivity = new AdminActivity();
            $adminActivity->activity = 'You\'re updated ' . $client->name. ', client.';
            $adminActivity->admin_id = auth('admin')->user()->id;
            $adminActivity->save();

            return response()->json([
                'message' => $isCreated ? 'Client personal informations updated successfully' : 'Faild to update client personal informations',
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
     * @param  \App\Models\ClientInfo  $clientInfo
     * @return \Illuminate\Http\Response
     */
    public function show(ClientInfo $clientInfo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ClientInfo  $clientInfo
     * @return \Illuminate\Http\Response
     */
    public function edit(ClientInfo $clientInfo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ClientInfo  $clientInfo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ClientInfo $clientInfo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ClientInfo  $clientInfo
     * @return \Illuminate\Http\Response
     */
    public function destroy(ClientInfo $clientInfo)
    {
        //
    }
}
