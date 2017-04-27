<?php

namespace App\Http\Controllers;

use App\Services\Community\CommunityServices;
use Illuminate\Http\Request;

class CommunityController extends Controller
{

//    protected $communityController;
//
//    public function __construct(CommunityServices $communityServices)
//    {
//        $this->communityController = $communityServices;
//    }

    //
    public function index()
    {
//        $community = $this->getService('CommunityService')->find_community();
        $community = $this->getService('CommunityTypeService')->find_community_type();
        return $community;
    }
}
