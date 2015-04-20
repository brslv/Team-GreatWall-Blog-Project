<?php

class Main
{

        /**
         * Returns a new model object.
         * 
         * @param string $model
         * @return \model
         */
	protected function getModel($model) 
	{
		return new $model;
	}

        /**
         * Performs 'require_once' action and gets the specified view.
         * 
         * @param string $view
         * @param array $data
         */
	protected function getView($view, $data = []) 
	{
                $nav = (new Navigation())->load();
		require_once Config::get('paths', 'views') . $view . '.php';
	}

}