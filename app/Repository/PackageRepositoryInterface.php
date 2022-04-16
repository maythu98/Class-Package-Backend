<?php

namespace App\Repository;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface PackageRepositoryInterface
{
    /**
    * @return Collection
    */
    public function all(): Collection;
}