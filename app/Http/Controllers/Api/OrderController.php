<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\OrderResource;
use App\Repository\Eloquent\OrderRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    private $orderRepository;

    public function __construct(OrderRepository $orderRepository) 
    {
        $this->orderRepository = $orderRepository;
    }
    
    public function get($id)
    {
        $order = $this->orderRepository->find($id);

        return new OrderResource($order);
    }

    public function make(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'package_id' => 'required|numeric',
            'discount' => 'nullable|numeric',
            'gst' => 'required|numeric',
            'total' => 'required|numeric'
        ]);

        if ($validator->fails()) {
            return response(['errors' => $validator->errors()->first()], 422);
        }
        $request['user_id'] = Auth::user()->id;

        //Order Create
        $order = $this->orderRepository->create($request->all());

        //response
        return new OrderResource($order);

    }
}
