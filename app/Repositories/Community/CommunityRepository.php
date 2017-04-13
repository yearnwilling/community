<?php
/**
 * Created by PhpStorm.
 * User: yearnwilling
 * Date: 2017/4/13
 * Time: 下午4:17
 */

namespace App\Repositories\Community;


use App\Models\Community;
use App\Repositories\BaseRepository;

class CommunityRepository extends BaseRepository
{
//    protected $community;

//    public function __construct(Community $community)
//    {
//        $this->community = $community;
//    }
    function model()
    {
        return 'App\Models\Community';
    }

    public function index()
    {
        return $this->model->get(array('*'));
    }
}