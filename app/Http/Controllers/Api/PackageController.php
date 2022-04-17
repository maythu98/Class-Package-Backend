<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repository\Eloquent\PackageRepository;
use App\Repository\PackageRepositoryInterface;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    private $packageRepository;

    public function __construct(PackageRepository $packageRepository) 
    {
        $this->packageRepository = $packageRepository;
    }


    //
    public function index()
    {
        $data = $this->packageRepository->all();

        return response()->json([
            'errorCode' => 0,
            'message' => "Success",
            'data' => [
                "total_item" => $data->count(),
                "total_page" => 1,
                "mem_tier" => "",
                "total_expired_class" => "",
                "pack_list" => $data,
            ]
        ]);
    }

    public function get($id)
    {
        $data = $this->packageRepository->find($id);

        return response()->json($data);
    }
}
