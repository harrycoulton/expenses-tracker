<?php


namespace Example\Controllers;


class GetLast7DaysController
{
    private $userModel;
    private $expenseModel;
    private $view;
    public $weekTotal;

    /**
     * GetLast7DaysController constructor.
     * @param $userModel
     * @param $expenseModel
     * @param $view
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
        $weekTotalsByCat = $this->getweekTotalsByCat($expensesByCat);
        $weekTotalExpenditure = $this->weekTotal;
        $this->view->render($response, 'last-7-days.phtml',  [
            'userInfo' => $userInfo[0],
            'expensesByDate' => $expensesByDate,
            'expensesByCat'  => $expensesByCat,
            'weekTotalsByCat' => $weekTotalsByCat,
            'weekTotalExpenditure' => $weekTotalExpenditure]);
    }

    public function arrangeByDate($expenses) {
        $expenseByDate = [];
        foreach ($expenses as $expense) {
            if ($expense['timestamp'] > strtotime('-1 week') && $expense['timestamp'] < strtotime('11:59 +1 week')) {
                $expenseByDate[$expense['timestamp']][] = $expense;
            };
        }
        return $expenseByDate;
    }

    public function arrangeByCategory($expenses) {
        $expenseByCategory = [];
        foreach ($expenses as $expense) {
            if ($expense['timestamp'] > strtotime('-1 week') && $expense['timestamp'] < strtotime('11:59 +1 week')) {
                $expenseByCategory[$expense['category']][] = $expense;
            };
        }
        return $expenseByCategory;
    }

    public function getweekTotalsByCat($expensesByCat) {
        $weekCatTotals = [];
        foreach ($expensesByCat as $expenseList) {
            foreach ($expenseList as $expense) {
                if ($expense['timestamp'] > strtotime('-1 week') && $expense['timestamp'] < strtotime('11:59 +1 week')) {
                    $this->weekTotal = ($this->weekTotal + $expense['expense-value']);
                };
            }
        }
        foreach ($expensesByCat as $expenseList) {
            foreach ($expenseList as $expense) {
                if ($expense['timestamp'] > strtotime('-1 week')){
                    $weekCatTotals[$expense['category']]['weekTotal'] += $expense['expense-value'];
                    $weekCatTotals[$expense['category']]['weekPercentage'] = number_format((($weekCatTotals[$expense['category']]['weekTotal']/$this->weekTotal)*100), 2);
                };
            }
        }
        return $weekCatTotals;
    }

}