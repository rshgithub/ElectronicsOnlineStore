<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use App\Http\Requests\Users\newUserRequest;
use App\Http\Requests\Users\updateUserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(User::all());
    }

    public function getDeletedUsers()
    {
        return response()->json((User::onlyTrashed()->get()));
    }

    public function getUsersWithDeleted()
    {
        return response()->json((User::withTrashed()->get()));
    }

    public function restoreDeletedUser($user)
    {
        $trashed = User::withTrashed()->find($user);
        if ($trashed) {
            $trashed->restore();
            return response()->json(['message' => 'success', 'data' => $trashed]);
        } else {
            return response()->json(['message' => 'this User is not trashed']);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(newUserRequest $request)
    {
        $user = User::create($request->validated());
        return response()->json(['message' => 'success']);

    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function show($user)
    {
        if ($user) {
            return response()->json(['message' => 'success', 'data' => UserResource::make($user)]);
        } else {
            return response()->json(['message' => 'this user does not exist']);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function update(updateUserRequest $request, $user)
    {
        if ($user) {
            $user->update($request->validated());
            return response()->json(['message' => 'success', 'data' => UserResource::make($user)]);
        } else {
            return response()->json(['message' => 'this user does not exist']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($user)
    {
        if ($user) {
            $user->delete();
            return response()->json(['message' => 'success']);
        } else {
            return response()->json(['message' => 'this user does not exist']);
        }
    }


}
