<?php


namespace Example\Factories;


use Example\Controllers\UpdateBudgetController;
use Psr\Container\ContainerInterface;

class UpdateBudgetControllerFactory
{
    public function __invoke(ContainerInterface $container)
    {
       $model = $container->get('UserModel');
       $view = $container->get('renderer');
       $updateBudgetController = new UpdateBudgetController($model, $view);
       return $updateBudgetController;
    }

}