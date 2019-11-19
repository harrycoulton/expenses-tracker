<?php


namespace Example\Controllers;


class GetExpenseController
{
    private $model;
    private $view;

    /**
     * ExpenseController constructor.
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
        $expenses = $this->model->getExpenses();
        $expenseByDate = [];
        foreach ($expenses as $expense) {
            $expenseByDate[$expense['deadlineDate']][] = $expense ;
        }

        $this->view->render($response, 'index.phtml',  ['expenses' => $expenseByDate]);
        }
}
