<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repository\Eloquent\CouponRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CouponController extends Controller
{
    private $couponRepository;

    public function __construct(CouponRepository $couponRepository) 
    {
        $this->couponRepository = $couponRepository;
    }

    public function index()
    {
        $data = $this->couponRepository->all();

        return response()->json($data);
    }

    public function check(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'coupon' => 'required',
        ]);

        if ($validator->fails()) {
            return response(['errors' => $validator->errors()->first()], 422);
        }

        $check = $this->couponRepository->check(request('coupon'));

        return response()->json([
            'error_code' => $check ? 0 : 1,
            'message' => $check ? 0 : "Not Found",
            'data' => $check
        ]);
    }
}
