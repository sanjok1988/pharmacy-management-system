<?php
namespace App\Modules\Users\Repository;

use App\Contracts\EloquentRepository;
use App\Modules\Users\Repository\IUsers;
use App\Modules\Users\Models\Users as User;

class UsersRepository extends EloquentRepository implements IUsers
{
    /**
     * @Override
     *
     * @return Object
     */
    public function getModel()
    {
        return User::class;
    }
}
