<?php


namespace Example\Controllers;


class UpdateSavingsTargetController
{
    private $model;
    private $view;

    /**
     * UpdateBudgetController constructor.
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
        $this->model->setSavingsTarget($formData);
        return $response->withRedirect($formData['redirect']);
    }
}