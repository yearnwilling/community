<?php

namespace App\Http\Controllers;

class CommunityController extends Controller
{
    public function index()
    {
        $communities = $this->getService('CommunityService')->find_communities();
        return view('community.index', compact('communities'));
    }
}
