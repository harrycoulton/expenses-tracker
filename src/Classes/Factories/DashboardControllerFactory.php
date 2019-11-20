<?php


namespace Example\Factories;


use Example\Controllers\DashboardController;
use Psr\Container\ContainerInterface;

class DashboardControllerFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $userModel = $container->get('UserModel');
        $expenseModel = $container->get('ExpenseModel');
        $view = $container->get('renderer');
        $monthData = $container->get('GetThisMonthExpensesController');
        $dashboardController = new DashboardController($userModel, $expenseModel, $view, $monthData);
        return $dashboardController;
    }

}