<?php

namespace App\Http\Controllers;

use App\Models\AuthorizationBasicAuth;
use App\Http\Requests\StoreAuthorizationBasicAuthRequest;
use App\Http\Requests\UpdateAuthorizationBasicAuthRequest;

class AuthorizationBasicAuthController extends Controller
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
     * @param  \App\Http\Requests\StoreAuthorizationBasicAuthRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAuthorizationBasicAuthRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AuthorizationBasicAuth  $authorizationBasicAuth
     * @return \Illuminate\Http\Response
     */
    public function show(AuthorizationBasicAuth $authorizationBasicAuth)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AuthorizationBasicAuth  $authorizationBasicAuth
     * @return \Illuminate\Http\Response
     */
    public function edit(AuthorizationBasicAuth $authorizationBasicAuth)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAuthorizationBasicAuthRequest  $request
     * @param  \App\Models\AuthorizationBasicAuth  $authorizationBasicAuth
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAuthorizationBasicAuthRequest $request, AuthorizationBasicAuth $authorizationBasicAuth)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AuthorizationBasicAuth  $authorizationBasicAuth
     * @return \Illuminate\Http\Response
     */
    public function destroy(AuthorizationBasicAuth $authorizationBasicAuth)
    {
        //
    }
}
