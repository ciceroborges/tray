<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\Contracts\IUserRepository;
use Illuminate\Database\Eloquent\Collection;

class UserRepository implements IUserRepository
{
    protected $model;
     
    /**
     * Setup ...
     */
    public function __construct(User $model)
    {
        $this->model = $model;
    }

    /**
     * Find all resources from storage.
     * 
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function findAll(): Collection
    {
        return $this->model->all();
    }
}
