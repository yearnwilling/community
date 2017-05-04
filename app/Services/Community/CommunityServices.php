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
    public function resourcesNames() {
        return array(
            'CommunityRepository' => 'Community\CommunityRepository',
            'CommunityTypeRepository' => 'Community\CommunityTypeRepository',
            'CommunityTypeService' => 'Community\CommunityTypeServices'
        );
    }

    public function find_communities()
    {
        $communities =  $this->getRepository('CommunityRepository')->index();
        foreach ($communities as &$community) {
            var_dump($community);
            exit();
        }
    }
}