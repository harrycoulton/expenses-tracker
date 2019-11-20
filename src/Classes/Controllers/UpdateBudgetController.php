<?php


namespace Example\Controllers;


class UpdateBudgetController
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
        $this->model->setBudget($formData);
        return $response->withRedirect($formData['redirect']);
    }


}