<?php

class Page extends Main{

    public function index() {
        Redirect::to('homepage');
    }

    public function show($id) {
        if (empty($id)){
            Redirect::to('homepage');
        } else {
            $model = $this->getModel('PageModel');
            $page = $model->goToPage($id[0]);
            $this->getView('pageView', $page);
        }

    }
}