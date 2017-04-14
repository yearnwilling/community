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
    public function repositories()
    {
        return array(
            'CommunityRepository' => 'App\Repositories\Community\CommunityRepository',
            'CommunityTypeRepository' => 'App\Repositories\Community\CommunityTypeRepository'
        );
    }

    public function find_community()
    {
//        return $this->repositories['CommunityRepository']->index();
        return $this->repositories['CommunityTypeRepository']->index();
//        return $this->communityTypeRepository->index();
    }
}