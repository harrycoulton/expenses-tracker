<?php


namespace Example\Factories;


use Example\Controllers\UpdateSavingsTotalController;
use Interop\Container\ContainerInterface;

class UpdateSavingsTotalControllerFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $model = $container->get('UserModel');
        $view = $container->get('renderer');
        $updateSavingsController = new UpdateSavingsTotalController($model, $view);
        return $updateSavingsController;
    }
}