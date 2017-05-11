<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommunityController extends Controller
{
    public function index()
    {
        $communities = $this->getService('CommunityService')->search_communities(1);
        return view('community.index', compact('communities'));
    }

    public function create()
    {
        $communityTypes = $this->getService('CommunityTypeService')->find_community_type();
        return view('community.add', compact('communityTypes'));
    }

    public function store(Request $request)
    {
        var_dump($request->toArray());
        exit();
    }
}
