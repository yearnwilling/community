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
use Illuminate\Container\Container;

class CommunityRepository extends BaseRepository
{
    protected $modelName = 'Community';

    public function index()
    {
        return $this->model->get(array('*'));
    }

    public function getAll($preload = array())
    {
        return $this->model->with($preload)->get();
    }

    public function search($pageNumber = 10, $preload = array())
    {
        return $this->model->with($preload)->paginate($pageNumber);
    }

    public function get($id, $preload = array())
    {
        return $this->model->with($preload)->where('id', '=', $id)->firstOrFail();
    }

}