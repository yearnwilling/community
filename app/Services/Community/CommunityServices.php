<?php
/**
 * Created by PhpStorm.
 * User: yearnwilling
 * Date: 2017/4/13
 * Time: 下午3:16
 */

namespace App\Services\Community;


use App\Models\Community;
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
        return $this->getRepository('CommunityRepository')->getAll(array('president', 'communityType'));
    }

    public function search_communities($pageNumber)
    {
        return $this->getRepository('CommunityRepository')->search($pageNumber);
    }

    public function create_community($community)
    {
        return $this->getRepository('CommunityRepository')->create($community);
    }

    public function getCommunity($communityId)
    {
        return $this->getRepository('CommunityRepository')->get($communityId, array('president'));
    }
}