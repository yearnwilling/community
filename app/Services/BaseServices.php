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

abstract class BaseServices
{
    protected $container;

    protected $repository;

    public function __construct(Container $container)
    {
        $this->container = $container;
        $this->makeRepository();
    }

    abstract function repository();


    protected function makeRepository()
    {
        $repository = $this->container->make($this->repository());

        if (!$repository instanceof BaseRepository)
            throw new \Exception("Class {$this->repository()} must be an instance of Illuminate\\Database\\Eloquent\\Model");

        return $this->repository = $repository;
    }
}