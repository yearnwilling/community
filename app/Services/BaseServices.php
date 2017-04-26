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

    abstract function servicesNames();

    public function repositories()
    {
        $repositories = array();
        foreach ($this->servicesNames() as $name => $path) {
            $repositories[$name] = $this->baseServicesPath.'\\'.$path;
        }
        return $repositories;
    }

    public function getService($serviceName) {
        return $this->repositories[$serviceName];
    }
}