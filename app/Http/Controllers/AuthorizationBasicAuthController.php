<?php

namespace App\Http\Controllers;

use App\Models\AuthorizationBasicAuth;
use App\Http\Requests\StoreAuthorizationBasicAuthRequest;
use App\Http\Requests\UpdateAuthorizationBasicAuthRequest;

class AuthorizationBasicAuthController extends Controller
{
    /**
     * Injecting the Model instance as contructor method .
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(AuthorizationBasicAuth $authorizationBasicAuth)
    {
        $this->model = $authorizationBasicAuth;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->model->get();
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
        $basic = ['basic' => 'Basic ' . base64_encode($request->username . ":" . $request->password)];
        $authorizationBasicAuth = $this->model = $this->model->create(
            array_merge($request->all(), $basic)
        );

        return $authorizationBasicAuth;
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
