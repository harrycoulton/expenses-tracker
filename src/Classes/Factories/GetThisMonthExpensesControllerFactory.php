<?php


namespace Example\Factories;


use Example\Controllers\GetThisMonthExpensesController;
use Psr\Container\ContainerInterface;

class GetThisMonthExpensesControllerFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $userModel = $container->get('UserModel');
        $expenseModel = $container->get('ExpenseModel');
        $view = $container->get('renderer');
        $getThisMonthExpensesController = new GetThisMonthExpensesController($userModel, $expenseModel, $view);
        return $getThisMonthExpensesController;
    }
}