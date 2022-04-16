<?php
namespace App\Repository\Eloquent;

use App\Models\Order;

class OrderRepository extends BaseRepository
{
    /**
    * OrderRepository constructor.
    *
    * @param Order $model
    */
    public function __construct(Order $model)
    {
        parent::__construct($model);
    }
    
}