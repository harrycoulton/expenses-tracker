<?php


namespace Example\Factories;


use Example\Controllers\GetLast7DaysController;
use Interop\Container\ContainerInterface;

class GetLast7DaysControllerFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $userModel = $container->get('UserModel');
        $expenseModel = $container->get('ExpenseModel');
        $view = $container->get('renderer');
        $last7daysController = new GetLast7DaysController($userModel, $expenseModel, $view);
        return $last7daysController;
    }


}