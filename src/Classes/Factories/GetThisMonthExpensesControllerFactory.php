<?php


namespace Example\Factories;


use Example\Controllers\GetThisMonthExpensesController;
use Psr\Container\ContainerInterface;

class GetThisMonthExpensesControllerFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $model = $container->get('ExpenseModel');
        $view = $container->get('renderer');
        $getThisMonthExpensesController = new GetThisMonthExpensesController($model, $view);
        return $getThisMonthExpensesController;
    }
}