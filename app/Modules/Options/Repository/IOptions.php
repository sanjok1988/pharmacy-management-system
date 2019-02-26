<?php

namespace App\Modules\Options\Repository;

use App\Contracts\RepositoryInterface;

interface IOptions
{
    public function get($option);
    public function save($array);
    public function update($array);
    public function delete($option);
    public function find($id);
}
