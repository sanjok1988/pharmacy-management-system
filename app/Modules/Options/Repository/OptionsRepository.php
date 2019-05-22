<?php

namespace App\Modules\Options\Repository;

use App\Modules\Options\Models\Options;
use App\Modules\Options\Repository\IOptions;

class OptionRepository implements IOptions
{
    protected $_model;

    public function __construct(Options $option)
    {
        $this->_model = $option;
    }
    public function getOption($option)
    {
        return $this->_model->where('option', 'LIKE', '%'.$option.'%')->first();
    }
    public function find($id)
    {
        return $this->_model->find($id);
    }
    public function save($array)
    {
        return $this->_model->create($array);
    }
    public function delete($id)
    {
        return $this->_model->delete($id);
    }
}
