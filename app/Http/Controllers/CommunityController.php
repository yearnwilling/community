<?php

namespace App\Http\Controllers;

use App\Services\Community\CommunityServices;
use Illuminate\Http\Request;
use Repository_services\Repository\rest;
use Repository_services\Rsc\Repository\BaseRepository;

class CommunityController extends Controller
{

    protected $communityController;

    public function __construct(CommunityServices $communityServices)
    {
        $this->communityController = $communityServices;
    }

    //
    public function index()
    {
        BaseRepository::rest();
        exit();
        $community = $this->communityController->find_community();
        var_dump($community);
        exit();
    }
}
