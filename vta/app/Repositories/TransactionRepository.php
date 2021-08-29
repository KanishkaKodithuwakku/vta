<?php

namespace App\Repositories;

use App\Transaction;
use DB;
use Hamcrest\Arrays\IsArray;

class TransactionRepository extends Repository
{
    public function __construct()
    {
        $this->model = new Transaction();
    }

    public function getItems($where = [], $orderBy = 'ASC')
    {
        $model = $this->model->join('activities','activities.id' ,'transactions.activity_id')
        ->join('categories','categories.id' ,'activities.category_id')
        ->join('projects', 'projects.id', 'categories.project_id');

        if (is_array($where) && count($where) > 0) {
            $model->where($where);
        }
        return $model->get('transactions.*');
    }

}
