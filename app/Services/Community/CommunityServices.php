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

class CommunityServices
{
    protected $communityRepository;
    protected $communityTypeRepository;

    public function __construct(CommunityRepository $communityRepository, CommunityTypeRepository $communityTypeRepository)
    {
        $this->communityRepository = $communityRepository;
        $this->communityTypeRepository = $communityTypeRepository;
    }

    public function find_community()
    {
        return $this->communityRepository->index();
//        return $this->communityTypeRepository->index();
    }
}