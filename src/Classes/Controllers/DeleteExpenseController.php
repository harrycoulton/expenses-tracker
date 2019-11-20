<?php


namespace Example\Controllers;


class DeleteExpenseController
{
    private $model;
    private $view;

    /**
     * DeleteExpenseController constructor.
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
        $this->model->deleteExpense($formData);
        return $response->withRedirect($formData['redirect']);
    }


}