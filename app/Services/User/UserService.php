<?php
/**
 * Created by PhpStorm.
 * User: yearnwilling
 * Date: 2017/5/10
 * Time: 上午9:21
 */

namespace app\Services\User;


use App\Services\BaseServices;

class UserService extends BaseServices
{
    public function resourcesNames()
    {
        return array(
            'UserRepository' => 'User\UserRepository'
        );
    }

    public function getPresidents()
    {
        return $this->getRepository('UserRepository')->getByRoles('super_admin');
    }

}