<?php

namespace App\Http\Controllers;

use App\Models\Community;
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
//        if (!Auth::user()->can('view', Community::class)) {
//            throw new \RuntimeException('您无权访问此页面', 403);
//        }
        $communities = $this->getService('CommunityService')->find_community();
        return view('community.index', compact('communities'));
    }
}
