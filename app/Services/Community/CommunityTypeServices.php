<?php
/**
 * Created by PhpStorm.
 * User: yearnwilling
 * Date: 2017/4/26
 * Time: 下午3:27
 */

namespace App\Services\Community;


use App\Services\BaseServices;

class CommunityTypeServices extends BaseServices
{
    public function resourcesNames() {
        return array(
            'CommunityTypeRepository' => 'Community\CommunityTypeRepository'
        );
    }

    public function find_community_type()
    {
        return $this->getRepository('CommunityTypeRepository')->index();
    }

}