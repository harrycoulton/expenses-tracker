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
        $expenses = $this->model->getExpenses();
        foreach ($expenses as $key => $expense){
            $expenses[$key]['timestamp'] = strtotime($expense['date']);
        }
        $expensesByDate = $this->arrangeByDate($expenses);
        $expensesByCat = $this->arrangeByCategory($expenses);
        $monthTotalsByCat = $this->getMonthTotalsByCat($expensesByCat);
        $monthTotalExpenditure = $this->monthTotal;
        $this->view->render($response, 'index.phtml',  ['expensesByDate' => $expensesByDate,
                                                        'expensesByCat'  => $expensesByCat,
                                                         'monthTotalsByCat' => $monthTotalsByCat,
                                                        'monthTotalExpenditure' => $monthTotalExpenditure]);
    }

    public function arrangeByDate($expenses) {
        $expenseByDate = [];
            foreach ($expenses as $expense) {
                $expenseByDate[$expense['timestamp']][] = $expense;
            }
        return $expenseByDate;
        }

        public function arrangeByCategory($expenses) {
            $expenseByCategory = [];
            foreach ($expenses as $expense) {
                $expenseByCategory[$expense['category']][] = $expense;
            }
            return $expenseByCategory;
        }

        public function getMonthTotalsByCat($expensesByCat) {
            $monthCatTotals = [];
            foreach ($expensesByCat as $expenseList) {
                foreach ($expenseList as $expense) {
                    if ($expense['timestamp'] > strtotime('midnight first day of this month')) {
                        $this->monthTotal = ($this->monthTotal + $expense['expense-value']);
                         };
                }
            }
            foreach ($expensesByCat as $expenseList) {
                foreach ($expenseList as $expense) {
                    if ($expense['timestamp'] > strtotime('midnight first day of this month')){
                        $monthCatTotals[$expense['category']]['monthTotal'] += $expense['expense-value'];
                        $monthCatTotals[$expense['category']]['monthPercentage'] = number_format((($monthCatTotals[$expense['category']]['monthTotal']/$this->monthTotal)*100), 2);
                    };
                }
            }
            return $monthCatTotals;
        }

}