<?php

namespace App\Http\Controllers;

use App\Services\Community\CommunityServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $communities = $this->getService('CommunityService')->find_community();
        return view('community.index', compact('communities'));
    }
}
