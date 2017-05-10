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

    public function getByRoles($roles)
    {
        return $this->model->where('roles', '=', $roles)->get();
    }
}