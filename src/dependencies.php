<?php

use Example\Factories\AddExpenseControllerFactory;
use Example\Factories\DeleteExpenseControllerFactory;
use Example\Factories\DashboardControllerFactory;
use Example\Factories\ExpenseModelFactory;
use Example\Factories\GetLast7DaysControllerFactory;
use Example\Factories\GetThisMonthExpensesControllerFactory;
use Example\Factories\UpdateBudgetControllerFactory;
use Example\Factories\UpdateSavingsTargetControllerFactory;
use Example\Factories\UpdateSavingsTotalControllerFactory;
use Example\Factories\UserModelFactory;
use Slim\App;

return function (App $app) {
    $container = $app->getContainer();

    // view renderer
    $container['renderer'] = function ($c) {
        $settings = $c->get('settings')['renderer'];
        return new \Slim\Views\PhpRenderer($settings['template_path']);
    };

    // monolog
    $container['logger'] = function ($c) {
        $settings = $c->get('settings')['logger'];
        $logger = new \Monolog\Logger($settings['name']);
        $logger->pushProcessor(new \Monolog\Processor\UidProcessor());
        $logger->pushHandler(new \Monolog\Handler\StreamHandler($settings['path'], $settings['level']));
        return $logger;
    };

    $container['UserModel'] = new UserModelFactory();
    $container['ExpenseModel'] = new ExpenseModelFactory();
    $container['DashboardController'] = new DashboardControllerFactory();
    $container['GetThisMonthExpensesController'] = new GetThisMonthExpensesControllerFactory();
    $container['AddExpenseController'] = new AddExpenseControllerFactory();
    $container['DeleteExpenseController'] = new DeleteExpenseControllerFactory();
    $container['UpdateBudgetController'] = new UpdateBudgetControllerFactory();
    $container['UpdateSavingsTotalController'] = new UpdateSavingsTotalControllerFactory();
    $container['UpdateSavingsTargetController'] = new UpdateSavingsTargetControllerFactory();
    $container['GetLast7DaysController'] = new GetLast7DaysControllerFactory();
    $container['databaseConnection'] = new \PDO('mysql:host=127.0.0.1; dbname=expenses-tracker', 'root', 'password');
};
