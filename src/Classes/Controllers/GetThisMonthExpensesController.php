<?php

namespace Example\Controllers;

use Psr\Container\ContainerInterface;

class GetThisMonthExpensesController
{
    private $userModel;
    private $expenseModel;
    private $view;
    private $monthTotal;

    /**
     * GetThisMonthExpensesController constructor.
     * @param $userModel
     * @param $expenseModel
     * @param $view
     * @param $monthTotal
     */
    public function __construct($userModel, $expenseModel, $view)
    {
        $this->userModel = $userModel;
        $this->expenseModel = $expenseModel;
        $this->view = $view;
    }


    public function __invoke($request, $response)
    {
        $userInfo = $this->userModel->getUser();
        $expenses = $this->expenseModel->getExpenses();
        foreach ($expenses as $key => $expense){
            $expenses[$key]['timestamp'] = strtotime($expense['date']);
        }
        $expensesByDate = $this->arrangeByDate($expenses);
        $expensesByCat = $this->arrangeByCategory($expenses);
        $monthTotalsByCat = $this->getMonthTotalsByCat($expensesByCat);
        $monthTotalExpenditure = $this->monthTotal;
        $this->view->render($response, 'this-month.phtml',  [
            'userInfo' => $userInfo[0],
            'expensesByDate' => $expensesByDate,
                                                        'expensesByCat'  => $expensesByCat,
                                                         'monthTotalsByCat' => $monthTotalsByCat,
                                                        'monthTotalExpenditure' => $monthTotalExpenditure]);
    }

    public function arrangeByDate($expenses) {
        $expenseByDate = [];
            foreach ($expenses as $expense) {
                if ($expense['timestamp'] > strtotime('midnight last day of last month')) {
                    $expenseByDate[$expense['timestamp']][] = $expense;
                };
            }
        return $expenseByDate;
        }

        public function arrangeByCategory($expenses) {
            $expenseByCategory = [];
            foreach ($expenses as $expense) {
                if ($expense['timestamp'] > strtotime('midnight last day of last month')) {
                    $expenseByCategory[$expense['category']][] = $expense;
                };
            }
            return $expenseByCategory;
        }

        public function getMonthTotalsByCat($expensesByCat) {
            $monthCatTotals = [];
            foreach ($expensesByCat as $expenseList) {
                foreach ($expenseList as $expense) {
                    if ($expense['timestamp'] > strtotime('midnight last day of last month')) {
                        $this->monthTotal = ($this->monthTotal + $expense['expense-value']);
                         };
                }
            }
            foreach ($expensesByCat as $expenseList) {
                foreach ($expenseList as $expense) {
                    if ($expense['timestamp'] > strtotime('midnight last day of last month')){
                        $monthCatTotals[$expense['category']]['monthTotal'] += $expense['expense-value'];
                        $monthCatTotals[$expense['category']]['monthPercentage'] = number_format((($monthCatTotals[$expense['category']]['monthTotal']/$this->monthTotal)*100), 2);
                    };
                }
            }
            return $monthCatTotals;
        }

}