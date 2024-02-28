<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserProfileStoreRequest;
use App\Models\UserProfile;
use Illuminate\Http\Request;

class UserProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $usersProfiles = UserProfile::all();
        return view('admin.components.userProfile.index',compact('usersProfiles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserProfileStoreRequest $request)
    {
        $userP=UserProfile::create($request->validated());
        dd($userP);
        // $notification = [
        //     'message' => 'User Profile Created Successfully',
        //     'alert-type' => 'success',
        // ];

        // return redirect()->route('admin.userProfile.index')->with($notification);
    }

    /**
     * Display the specified resource.
     */
    public function show(UserProfile $userProfile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UserProfile $userProfile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, UserProfile $userProfile)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UserProfile $userProfile)
    {
        $userProfile->delete();

        return response()->json([
            'status' => true,
            'message' => 'UserProfile Type Deleted Successfully',
        ]);
    }
}