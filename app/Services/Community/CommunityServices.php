<?php
/**
 * Created by PhpStorm.
 * User: yearnwilling
 * Date: 2017/4/13
 * Time: 下午3:16
 */

namespace App\Services\Community;


use App\Repositories\Community\CommunityRepository;
use App\Repositories\Community\CommunityTypeRepository;
use App\Services\BaseServices;

class CommunityServices extends BaseServices
{
    public function repository()
    {
        return 'App\Repositories\Community\CommunityRepository';
    }

    public function find_community()
    {
        return $this->repository->index();
//        return $this->communityTypeRepository->index();
    }
}