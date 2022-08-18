<?php

namespace App\Http\Controllers;

use App\Models\ZalandoOrderNotification;
use App\Http\Requests\StoreZalandoOrderNotificationRequest;
use App\Http\Requests\UpdateZalandoOrderNotificationRequest;
use Illuminate\Http\Request;

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
     * Retrieve the resource by id.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function retrieve($order_number)
    {
        $notifications = $this->model
            ->with('items')
            ->with('delivery_details')
            ->with('customer_billing_address')
            ->where('order_number', '=', $order_number)
            ->get();

        return response()->json(['notifications' => $notifications], 200);
    }

    /**
     * Retrieve the resource by id.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function retrieve_orders(Request  $request)
    {
        $orders = $this->model->limit(100);
        if ($request->has('limit')) {
            $orders = $orders->limit($request->limit);
        }
        if ($request->has('items')) {
            if ($request->items) {
                $orders = $orders->with("items:zalando_order_notification_id,$request->items");
            } else {
                $orders = $orders->with('items');
            }
        }
        if ($request->has('delivery_details')) {
            if ($request->delivery_details) {
                $orders = $orders->with("delivery_details:zalando_order_notification_id,$request->delivery_details");
            } else {
                $orders = $orders->with('delivery_details');
            }
        }
        if ($request->has('customer_billing_address')) {
            if ($request->customer_billing_address) {
                $orders = $orders->with("customer_billing_address:zalando_order_notification_id,$request->customer_billing_address");
            } else {
                $orders = $orders->with('customer_billing_address');
            }
        }
        if ($request->has('authorization_basic_auth')) {
            $orders = $orders->with("authorization_basic_auth:id,app");
        }
        if ($request->has('created_at_min') && $request->has('created_at_max')) {
            $orders = $orders->whereBetween(
                'created_at',
                [$request->created_at_min, $request->created_at_max]
            );
        }
        if ($request->has('fields')) {
            $fields = explode(',', $request->fields);
            $orders = $orders->select($fields);
        }
        if ($request->has('state')) {
            $state = explode(',', $request->state);
            $orders = $orders->whereIn('state', $state);
        }
        if ($request->has('ids')) {
            $ids = explode(',', $request->ids);
            $orders = $orders->whereIn('id', $ids);
        }
        if ($request->has('order_numbers')) {
            $order_numbers = explode(',', $request->order_numbers);
            $orders = $orders->whereIn('order_number', $order_numbers);
        }
        if ($request->has('authorization_basic_auth_ids')) {
            $authorization_basic_auth_ids = explode(',', $request->authorization_basic_auth_ids);
            $orders = $orders->whereIn('authorization_basic_auth_id', $authorization_basic_auth_ids);
        }
        $orders = $orders->get();
        return response()->json([
            "orders" => $orders->toArray()
        ], 200);
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
        $this->model = $this->model->create(
            array_merge(
                $request->all(),
                ['authorization_basic_auth_id' => $request->get('authorization_basic_auth_id')]
            )
        );
        $this->model->items()->createMany($request->items);
        if ($request->delivery_details) $this->model->delivery_details()->create($request->delivery_details);
        if ($request->customer_billing_address) $this->model->customer_billing_address()->create($request->customer_billing_address);
        return response()->json([
            "success" => "[API] notification received successfully"
        ], 200);
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

    /**
     * Remove the duplicated resource storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function sync(Request  $request, $order_number)
    {
        // $order_numbers = $this->model->distinct()->get(['order_number']);
        // dd($order_numbers->toArray());

        $diff_notifications = [];
        $notifications = $this->model
            // ->with('items')
            // ->with('delivery_details')
            // ->with('customer_billing_address')
            ->where('order_number', '=', $order_number)
            ->get();
        foreach ($notifications as $key => $notification) {
            $diff_notifications[$order_number][$key] = array_diff($notification->toArray(), $notifications[0]->toArray());
            $diff_notification = array_diff($notification->toArray(), $notifications[0]->toArray());
            if (
                isset($diff_notification['id']) &&
                isset($diff_notification['created_at']) &&
                isset($diff_notification['updated_at']) &&
                count($diff_notification) == 3
            ) {
                $notification->delete();
            }
        }
        return response()->json(['diff_notifications' => $diff_notifications], 200);
    }
}
