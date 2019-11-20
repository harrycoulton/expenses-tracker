<?php


namespace Example\Controllers;


class DashboardController
{
    private $view;
    private $userModel;
    private $expenseModel;
    private $monthData;

    /**
     * DashboardController constructor.
     * @param $view
     * @param $userModel
     * @param $expenseModel
     */
    public function __construct($userModel, $expenseModel, $view, $monthData)
    {
        $this->view = $view;
        $this->userModel = $userModel;
        $this->expenseModel = $expenseModel;
        $this->monthData = $monthData;
    }

    public function __invoke($request, $response)
    {
     // User Info
        $userInfo = $this->userModel->getUser();

     // Expenses Info
        $expenses = $this->expenseModel->getExpenses();
        foreach ($expenses as $key => $expense){
            $expenses[$key]['timestamp'] = strtotime($expense['date']);
        }
        $expensesByDate = $this->monthData->arrangeByDate($expenses);
        $expensesByCat = $this->monthData->arrangeByCategory($expenses);
        $monthTotalsByCat = $this->monthData->getMonthTotalsByCat($expensesByCat);
        $monthTotalExpenditure = $this->monthData->monthTotal;
        $this->view->render($response, 'dashboard.phtml',  [
              'userInfo' => $userInfo[0],
            'expensesByDate' => $expensesByDate,
            'expensesByCat'  => $expensesByCat,
            'monthTotalsByCat' => $monthTotalsByCat,
            'monthTotalExpenditure' => $monthTotalExpenditure]);
    }


}