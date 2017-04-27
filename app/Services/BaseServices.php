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
    protected $baseRepositoriesPath = 'App\Repositories';
    protected $baseServicesPath = 'App\Services';

    //当前service下需要注册的Service／Repository名字
    abstract function resourcesNames();

    public function getRepository($RepositoryName) {
        $this->registerRepository($RepositoryName);
        return $this->repositories[$RepositoryName];
    }

    protected function registerRepository($repositoryName, $repository = null) {
        $resourcesNames = $this->resourcesNames();
        if (empty($resourcesNames[$repositoryName])) {
            throw new \Exception("the $repositoryName is not register in resourcesNames function");
        }
        parent::registerRepository($repositoryName, $this->baseRepositoriesPath.'\\'.$resourcesNames[$repositoryName]);
    }

    public function getService($serviceName) {
        $this->registerService($serviceName);
        return $this->services[$serviceName];
    }

    public function registerService($serviceName, $service = null) {
        $resourcesNames = $this->resourcesNames();
        if (empty($resourcesNames[$serviceName])) {
            throw new \Exception("the $serviceName is not register in resourcesNames function");
        }
        parent::registerService($serviceName, $this->baseServicesPath.'\\'.$resourcesNames[$serviceName]);
    }
}