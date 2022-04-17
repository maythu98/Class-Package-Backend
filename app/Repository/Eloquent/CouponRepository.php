<?php
namespace App\Repository\Eloquent;

use App\Models\Coupon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class CouponRepository extends BaseRepository
{
    /**
    * CouponRepository constructor.
    *
    * @param Coupon $model
    */
    public function __construct(Coupon $model)
    {
        parent::__construct($model);
    }

    /**
    * @param $coupon    
    *
    */
    public function check($coupon)
    {
        return $this->model->where('code', $coupon)->first();
    }

    /**
    *
    * @return Collection
    */
    public function all(): Collection
    {
        return $this->model->all();
    }
    
}