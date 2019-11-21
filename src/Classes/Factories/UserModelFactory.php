<?php


namespace Example\Factories;


use Example\Models\UserModel;
use Psr\Container\ContainerInterface;

class UserModelFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $db = $container->get('databaseConnection');
        $db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        $db->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_ASSOC);
        $model = new UserModel($db);
        return $model;
    }


    // Thoth.123.Thor
}