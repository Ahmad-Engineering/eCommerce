<?php

namespace App\Http\Controllers;

use App\Models\AdminActivity;
use Illuminate\Http\Request;

class AdminActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $activities = AdminActivity::where('admin_id', auth('admin')->user()->id)->latest('created_at')->get();
        return response()->view('ecommerce.admin.activities.index', [
            'activities' => $activities,
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
    public function store($activityName)
    {
        //
        $adminActivity = new AdminActivity();
        $adminActivity->activity = $activityName;
        $adminActivity->admin_id = auth('admin')->user()->id;
        $adminActivity->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AdminActivity  $adminActivity
     * @return \Illuminate\Http\Response
     */
    public function show(AdminActivity $adminActivity)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AdminActivity  $adminActivity
     * @return \Illuminate\Http\Response
     */
    public function edit(AdminActivity $adminActivity)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AdminActivity  $adminActivity
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AdminActivity $adminActivity)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AdminActivity  $adminActivity
     * @return \Illuminate\Http\Response
     */
    public function destroy(AdminActivity $adminActivity)
    {
        //
    }
}
