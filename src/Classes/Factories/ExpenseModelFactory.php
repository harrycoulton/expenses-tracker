<?php


namespace Example\Factories;


use Example\Models\ExpenseModel;
use Psr\Container\ContainerInterface;

class ExpenseModelFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $db = new \PDO('mysql:host=127.0.0.1; dbname=expenses-tracker', 'root', 'password');
        $db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        $db->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_ASSOC);
        $model = new ExpenseModel($db);
        return $model;
    }
}