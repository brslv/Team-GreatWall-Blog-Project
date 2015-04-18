<?php

class Home extends Main{

	public function index() {
        $this->getView('addpostView');
            //$this->getView('adminView');
    }
}
