<?php
/**
 * Created by PhpStorm.
 * User: yearnwilling
 * Date: 2017/4/13
 * Time: 下午3:16
 */

namespace App\Services\Community;


use App\Repositories\Community\CommunityRepository;

class CommunityServices
{
    protected $communityRepository;

    public function __construct(CommunityRepository $communityRepository)
    {
        $this->communityRepository = $communityRepository;
    }

    public function find_community()
    {
        return $this->communityRepository->index();
    }
}