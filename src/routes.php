<?php

use Slim\App;
use Slim\Http\Request;
use Slim\Http\Response;

return function (App $app) {
    $container = $app->getContainer();
    $app->get('/', 'DashboardController');
    $app->get('/this-month', 'GetThisMonthExpensesController');
    $app->post('/add', 'AddExpenseController');
    $app->post('/delete', 'DeleteExpenseController');


};
