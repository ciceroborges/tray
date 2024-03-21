<?php

namespace App\Repositories\Contracts;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

interface IUserRepository
{
    /**
     * Setup ...
     */
    public function __construct(User $model);

    /**
     * Find all resources from storage.
     * 
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function findAll(): Collection;
}