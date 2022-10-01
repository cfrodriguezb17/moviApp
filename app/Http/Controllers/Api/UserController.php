<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all()->map(function($user){
            return [
                'id' => $user->id,
                'name' => $user->name,
                'profile' => $user->rol_id,
                'email' => $user->email,
                'state' => $user->state
            ];
        });
        return response()->json([
            'status' => true,
            'users' => $users
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
        $validated = $request->validate([
            'name' => ['required'],
            'email' => ['required'],
            'profile' => ['required']
        ]);
        $user = array(
            'name' => $validated['name'],
            'email' => $validated['email'],
            'rol_id' => $validated['profile']
        );
        $user = User::create($user);
        return response()->json([
            'status' => true,
            'message' => 'Creacion Exitosa'
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $attUser = array(
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
            'profile' => $user->rol_id,
            'state' => $user->state,
        );
        return response()->json([
            'status' => true,
            'user' => $attUser
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'name' => ['required'],
            'email' => ['required'],
            'profile' => ['required'],
            'state' => ['required'],
        ]);
        $requestValidated = array(
            'name' => $validated['name'],
            'email' => $validated['email'],
            'rol_id' => $validated['profile'],
            'state' => $validated['state'],
        );
        $user->update($requestValidated);
        return response()->json([
            'status' => true,
            'message' => 'Usuario editado con exito',
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
