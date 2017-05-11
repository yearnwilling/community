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
        $builder = $this->wheres($builder, $fields);
        return $builder->get();
    }
}