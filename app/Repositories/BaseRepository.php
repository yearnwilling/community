<?php
/**
 * Created by PhpStorm.
 * User: yearnwilling
 * Date: 2017/4/13
 * Time: 下午11:49
 */

namespace App\Repositories;

use Illuminate\Container\Container;
use \Repository_services\Rsc\Repository\Repository ;

abstract class BaseRepository extends Repository
{
    protected $modelsPath = "App\\Models\\";

    protected $modelName = null;

    public function model()
    {
        return $this->modelsPath.$this->modelName();
    }

    function modelName()
    {
        return $this->modelName;
    }
}