<?php

class Home extends Main
{
    
	public function index() 
	{
            $this->getView('homeView');
//            $this->getView('adminView');
            
	}
        
        public function login() {
            $this->getView('loginView');
        }
        
        public function register() {
            $this->getView('registerView');
        }
       
}