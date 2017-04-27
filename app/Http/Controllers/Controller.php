<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Repository_services\Rsc\Service\Service;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $baseServices;

    protected $services;

    protected $baseServicesPath = 'App\Services';

    protected $resourcesNames = array(
        'CommunityService' => 'Community\CommunityServices',
        'CommunityTypeService' => 'Community\CommunityTypeServices'
    );

    public function __construct(Service $baseServices)
    {
        $this->baseServices =  $baseServices;
    }

    public function getService($serviceName) {
        $this->bootService($serviceName);
        return $this->baseServices->services[$serviceName];
    }

    protected function bootService($serviceName) {
        if (empty($this->resourcesNames[$serviceName])) {
            throw new \Exception("the $serviceName is not register in resourcesNames");
        }
        $this->baseServices->registerService($serviceName, $this->baseServicesPath.'\\'.$this->resourcesNames[$serviceName]);
    }
}

