<?php

namespace App\Http\Controllers;

class CommunityController extends Controller
{
    public function index()
    {
        $communities = $this->getService('CommunityService')->search_communities(1);
        return view('community.index', compact('communities'));
    }
}
