<?php


namespace Example\Factories;


use Example\Controllers\DeleteExpenseController;
use Psr\Container\ContainerInterface;

class DeleteExpenseControllerFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $view = $container->get('renderer');
        $model = $container->get('ExpenseModel');
        $deleteExpenseController = new DeleteExpenseController($model, $view);
        return $deleteExpenseController;
    }

}