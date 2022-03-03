<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Dotenv\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;

class ClientChangePasswordController extends Controller
{
    //

    public function showChangePassword($id)
    {
        $client = Client::find($id);
        if (is_null($client)) {
            return redirect()->route('client.index');
        }
        return response()->view('ecommerce.client.client-auth.change-password', [
            'client' => $client
        ]);
    }

    public function changePassword(Request $request)
    {
        $validator = Validator($request->all(), [
            'new_password' => 'required|string|min:8|max:50',
            're_new_password' => 'required|string|min:8|max:50',
            'client_id' => 'required|integer|exists:clients,id',
        ]);
        //
        if (!$validator->fails()) {
            $isMatching = $request->get('new_password') == $request->get('re_new_password') ? true : false;

            if ($isMatching){
                $client = Client::find($request->get('client_id'));
                if(is_null($client))
                    return redirect()->route('client.index');

                $client->password = Hash::make($request->get('new_password'));
                $isChanged = $client->save();

                return response()->json([
                    'message' => $isChanged ? 'Client password changed successfully' : 'Faild to change client password',
                ], $isChanged ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST);
            }

        }else {
            return response()->json([
                'message' => $validator->getMessageBag()->first(),
            ], Response::HTTP_BAD_REQUEST);
        }
    }
}
