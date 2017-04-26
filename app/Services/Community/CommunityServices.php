<?php
/**
 * Created by PhpStorm.
 * User: yearnwilling
 * Date: 2017/4/13
 * Time: 下午3:16
 */

namespace App\Services\Community;


use App\Services\BaseServices;

class CommunityServices extends BaseServices
{
    public function repositoriesNames() {
        return array(
            'CommunityRepository' => 'Community\CommunityRepository',
            'CommunityTypeRepository' => 'Community\CommunityTypeRepository'
        );
    }

    public function find_community()
    {
//        return $this->repositories['CommunityRepository']->index();
        return $this->getRepository('CommunityTypeRepository')->index();
    }
}