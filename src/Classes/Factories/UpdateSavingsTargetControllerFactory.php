<?php


namespace Example\Factories;


use Example\Controllers\UpdateSavingsTargetController;
use Example\Controllers\UpdateSavingsTotalController;
use Interop\Container\ContainerInterface;

class UpdateSavingsTargetControllerFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $model = $container->get('UserModel');
        $view = $container->get('renderer');
        $updateSavingsTargetController = new UpdateSavingsTargetController($model, $view);
        return $updateSavingsTargetController;
    }

}