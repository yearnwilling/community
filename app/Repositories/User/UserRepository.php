<?php
/**
 * Created by PhpStorm.
 * User: yearnwilling
 * Date: 2017/5/10
 * Time: 上午9:35
 */

namespace app\Repositories\User;


use App\Repositories\BaseRepository;

class UserRepository extends BaseRepository
{
    protected $modelName = 'User';

    public function findByFields($fields)
    {
        $builder =  $this->model;
        foreach ($fields as $key => $value) {
            $builder = $this->searchWhere($builder,$key,$value);
        }
        return $builder->get();
    }

    public function searchWhere($builder ,$key, $value)
    {
        $conditions = explode(' ', trim($value), 2);
        return $builder->where($key , $conditions[0], $conditions[1]);
    }
}