<?php


namespace Example\Controllers;


class UpdateSavingsTotalController
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
        $userInfo = $this->model->getUser();
        $formData['savingstotal']= (($userInfo[0]['savingstotal'] + $formData['savingstotal']));
        $this->model->setSavingsTotal($formData);
        return $response->withRedirect($formData['redirect']);
    }

}