<?php


namespace Example\Factories;


use Example\Controllers\AddExpenseController;
use Psr\Container\ContainerInterface;

class AddExpenseControllerFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $view = $container->get('renderer');
        $model = $container->get('ExpenseModel');
        $addExpenseController = new AddExpenseController($model, $view);
        return $addExpenseController;
    }

}