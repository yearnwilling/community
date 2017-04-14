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
    protected $communityTypeRepository;

    public function __construct(Container $container, CommunityTypeRepository $communityTypeRepository)
    {
        parent::__construct($container);
        $this->communityTypeRepository = $communityTypeRepository;
    }

    function model()
    {
        return 'App\Models\Community';
    }

    public function index()
    {
        return $this->model->get(array('*'));
//        return $this->communityTypeRepository->index();
    }
}