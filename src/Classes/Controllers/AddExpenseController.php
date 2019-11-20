<?php


namespace Example\Controllers;


class AddExpenseController
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
        $formData = $request->getParsedBody();
        $this->model->createExpense($formData);
        return $response->withRedirect($formData['redirect']);
    }
}