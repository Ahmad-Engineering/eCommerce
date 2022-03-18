<?php

namespace App\Http\Controllers;

use App\Models\AdminSocial;
use Dotenv\Validator;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminSocialController extends Controller
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
            'twitter' => 'nullable|string|min:5|max:100',
            'facebook' => 'nullable|string|min:5|max:100',
            'google' => 'nullable|string|min:5|max:100',
            'linkedln' => 'nullable|string|min:5|max:100',
            'intagram' => 'nullable|string|min:5|max:100',
            'quora' => 'nullable|string|min:5|max:100',
        ]);
        //
        if (!$validator->fails()) {
            $adminSocial = AdminSocial::where('admin_id', auth('admin')->user()->id)->first();
            if(is_null($adminSocial))
                $adminSocial = new AdminSocial();
                
            $adminSocial->twitter = $request->get('twitter');
            $adminSocial->facebook = $request->get('facebook');
            $adminSocial->linkedlin = $request->get('linkedln');
            $adminSocial->google = $request->get('google');
            $adminSocial->instagram = $request->get('instagram');
            $adminSocial->quora = $request->get('quora');
            $adminSocial->admin_id = auth('admin')->user()->id;
            $isCreated = $adminSocial->save();

            return response()->json([
                'message' => $isCreated ? 'Links added successfully' : 'Faild to add links',
            ], $isCreated ? Response::HTTP_CREATED : Response::HTTP_BAD_REQUEST);
        }else {
            return response()->json([
                'message' => $validator->getMessageBag()->first(),
            ], Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AdminSocial  $adminSocial
     * @return \Illuminate\Http\Response
     */
    public function show(AdminSocial $adminSocial)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AdminSocial  $adminSocial
     * @return \Illuminate\Http\Response
     */
    public function edit(AdminSocial $adminSocial)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AdminSocial  $adminSocial
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AdminSocial $adminSocial)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AdminSocial  $adminSocial
     * @return \Illuminate\Http\Response
     */
    public function destroy(AdminSocial $adminSocial)
    {
        //
    }
}
