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

    protected $repositories;

    public function __construct(Container $container)
    {
        $this->container = $container;
        $this->makeRepository();
    }

    abstract function repositories();


    protected function makeRepository()
    {
        $repositories_container = $this->repositories();

        foreach ($repositories_container as $key => $repository) {
            $repository = $this->container->make($repository);

            if (!$repository instanceof BaseRepository) {
                throw new \Exception("Class {$this->repositories()} must be an instance of App\\Repositories\\BaseRepository");
            }

            $this->repositories[$key] = $repository;

        }

        return $this->repositories;

    }
}