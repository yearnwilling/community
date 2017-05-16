<?php

namespace App\Http\Controllers;

use App\Exceptions\ServiceException;
use Illuminate\Http\Request;

class CommunityController extends Controller
{
    public function index()
    {
        $communities = $this->getService('CommunityService')->search_communities(10);
        return view('community.index', compact('communities'));
    }

    public function create()
    {
        $communityTypes = $this->getService('CommunityTypeService')->find_community_type();
        return view('community.add', compact('communityTypes'));
    }

    public function store(Request $request)
    {
        $this->getService('CommunityService')->create_community($request->toArray());
        return back()->with('success', '添加成功');
    }
}
