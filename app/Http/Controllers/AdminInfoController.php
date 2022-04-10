<?php

namespace App\Http\Controllers;

use App\Models\AdminActivity;
use App\Models\AdminInfo;
use Carbon\Carbon;
use Dotenv\Validator;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminInfoController extends Controller
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
            'bio' => ['nullable', 'string' ,'min:20', 'max:100'],
            'bod' => 'required|date',
            'country' => ['nullable', 'string', 'min:2', 'max:2'],
            'website' => ['nullable', 'string', 'min:10', 'max:100'],
            'phone' => 'required|string|min:7|max:20',
        ]);
        //
        if (!$validator->fails()) {
            $adminInfo = new AdminInfo();
            $adminInfo->bio = $request->get('bio');
            $adminInfo->DOB = $request->get('bod');
            $adminInfo->country = $request->get('country');
            $adminInfo->website = $request->get('website');
            $adminInfo->phone = $request->get('phone');
            $adminInfo->admin_id = auth('admin')->user()->id;
            $isCreated = $adminInfo->save();

            $adminActivity = new AdminActivity();
            $adminActivity->activity = 'You\'re updated your account info.';
            $adminActivity->admin_id = auth('admin')->user()->id;
            $isAdded = $adminActivity->save();

            return response()->json([
                'message' => $isCreated || $isAdded ? 'Information were added successfully' : 'Faild to add your infomation',
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
     * @param  \App\Models\AdminInfo  $adminInfo
     * @return \Illuminate\Http\Response
     */
    public function show(AdminInfo $adminInfo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AdminInfo  $adminInfo
     * @return \Illuminate\Http\Response
     */
    public function edit(AdminInfo $adminInfo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AdminInfo  $adminInfo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AdminInfo $adminInfo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AdminInfo  $adminInfo
     * @return \Illuminate\Http\Response
     */
    public function destroy(AdminInfo $adminInfo)
    {
        //
    }
}
