<?php


namespace Example\Controllers;


use Psr\Container\ContainerInterface;

class GetThisMonthExpensesController
{
    private $model;
    private $view;
    private $monthTotal;

    /**
     * GetThisMonthExpensesController constructor.
     * @param $model
     * @param $view
     */
    public function __construct($model, $view)
    {
        $this->model = $model;
        $this->view = $view;
    }

    public function __invoke($request, $response)
    {
        $expenses = $this->model->getExpensesByCategory();
        $expenses = $this->addTimeStamps($expenses);
        var_dump($expenses);
    }

    public function addTimeStamps($expenses) {
        foreach ($expenses as $key1 => $expenseByCategory) {
            foreach ($expenseByCategory as $key2 => $expense){
                $expenses[$key1][$key2]['timestamp'] = strtotime($expense['date']);
                if ($expenses[$key1][$key2]['timestamp'] > strtotime('midnight first day of this month')){
                    $this->monthTotal = ($this->monthTotal + $expense['expense-value']);
                } ;
            }
        }
        return $expenses;
        }

}