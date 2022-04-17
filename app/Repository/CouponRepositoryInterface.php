<?php

namespace App\Repository;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface CouponRepositoryInterface
{
    /**
    * @param $coupon
    */
    public function check($coupon);

    /**
    * @return Collection
    */
    public function all(): Collection;
}