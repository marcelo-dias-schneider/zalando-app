<?php

namespace App\Http\Controllers;

use App\Models\ZalandoOrderNotification;
use App\Http\Requests\StoreZalandoOrderNotificationRequest;
use App\Http\Requests\UpdateZalandoOrderNotificationRequest;

class ZalandoOrderNotificationController extends Controller
{
    /**
     * Injecting the Model instance as contructor method .
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(ZalandoOrderNotification $order_notification)
    {
        $this->model = $order_notification;
    }

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
     * @param  \App\Http\Requests\StoreZalandoOrderNotificationRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreZalandoOrderNotificationRequest $request)
    {
        $this->model = $this->model->create($request->all());
        $this->model->items()->createMany($request->items);
        if ($request->delivery_details) $this->model->delivery_details()->create($request->delivery_details);
        if ($request->customer_billing_address) $this->model->customer_billing_address()->create($request->customer_billing_address);
        return response()->json([
            "success" => "[API] notification received successfully"
        ], 401);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ZalandoOrderNotification  $zalandoOrderNotification
     * @return \Illuminate\Http\Response
     */
    public function show(ZalandoOrderNotification $zalandoOrderNotification)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ZalandoOrderNotification  $zalandoOrderNotification
     * @return \Illuminate\Http\Response
     */
    public function edit(ZalandoOrderNotification $zalandoOrderNotification)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateZalandoOrderNotificationRequest  $request
     * @param  \App\Models\ZalandoOrderNotification  $zalandoOrderNotification
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateZalandoOrderNotificationRequest $request, ZalandoOrderNotification $zalandoOrderNotification)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ZalandoOrderNotification  $zalandoOrderNotification
     * @return \Illuminate\Http\Response
     */
    public function destroy(ZalandoOrderNotification $zalandoOrderNotification)
    {
        //
    }
}
