<?php
namespace App\Repository\Eloquent;

use App\Models\Package;
use App\Repository\PackageRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use PhpParser\ErrorHandler\Collecting;

class PackageRepository extends BaseRepository implements PackageRepositoryInterface  
{
    /**
    * PackageRepository constructor.
    *
    * @param Package $model
    */
    public function __construct(Package $model)
    {
        parent::__construct($model);
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