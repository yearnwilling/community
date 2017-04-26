<?php
/**
 * Created by PhpStorm.
 * User: yearnwilling
 * Date: 2017/4/14
 * Time: 下午2:58
 */

namespace App\Services;


use App\Repositories\BaseRepository;
use Illuminate\Container\Container;
use Repository_services\Rsc\Service\Service;

abstract class BaseServices extends Service
{
    protected $baseServicesPath = 'App\Repositories';

    //当前service下需要注册的service名字
    abstract function repositoriesNames();

    public function repositories()
    {
        $repositories = array();
        foreach ($this->repositoriesNames() as $name => $path) {
            $repositories[$name] = $this->baseServicesPath.'\\'.$path;
        }
        return $repositories;
    }

    public function getRepository($serviceName) {
        return $this->repositories[$serviceName];
    }
}