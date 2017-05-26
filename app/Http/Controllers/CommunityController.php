<?php

namespace App\Http\Controllers;

use App\Exceptions\ServiceException;
use App\Http\Requests\CommunityPost;
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
        return view('community.add', array_merge(compact('communityTypes'), array('type' => 'add')));
    }

    public function store(CommunityPost $request)
    {
        $this->getService('CommunityService')->create_community($request->toArray());
        return response()->json(array('status' =>  200 , 'msg' => '添加成功'));
    }

    public function edit($communityId)
    {
        $community = $this->getService('CommunityService')->getCommunity($communityId);
        $communityTypes = $this->getService('CommunityTypeService')->find_community_type();
        return view('community.add', array_merge(
            compact('communityTypes'),
            compact('community'),
             array('type' => 'edit')   )
        );
    }

    public function update(CommunityPost $request, $communityId)
    {
        var_dump($request->route('communityId'));
        throw new \Exception('dd');
//        $this->getService('CommunityService')->updateCommunity($communityId, $request->toArray());
    }
}
