<?php

class Main
{

	protected function getModel($model) 
	{
		return new $model;
	}

	protected function getView($view, $data = []) 
	{
		require_once Config::get('paths', 'views') . $view . '.php';
	}

}