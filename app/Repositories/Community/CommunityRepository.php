<?php
/**
 * Created by PhpStorm.
 * User: yearnwilling
 * Date: 2017/4/13
 * Time: 下午4:17
 */

namespace App\Repositories\Community;


use App\Models\Community;

class CommunityRepository
{
    protected $community;

    public function __construct(Community $community)
    {
        $this->community = $community;
    }

    public function index()
    {
        return $this->community->get(array('*'));
    }
}