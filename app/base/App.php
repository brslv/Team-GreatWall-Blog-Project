<?php 

class App 
{

	private static $instance;

	private $controller = "Home";

	private $method = "index";

	private $params = [];

	private function __construct() {}

	/**
	 * Returns the App::instance.
	 * 
	 * @return App 
	 */
	public function getInstance() 
	{
		if(!isset(self::$instance)) {
			self::$instance = new App();
		}

		return self::$instance;
	}

	/**
	 * FrontController method.
	 * 
	 * It simply extracts the information from the URL.
	 * 
	 */
	public function run() 
	{
		// Get the url
		$url = $this->parseUrl();

		if(isset($url[0]) && ucfirst($url[0]) != 'Main') {
			if(file_exists(Config::get('paths', 'controllers') . ucfirst($url[0]) . 'Controller.php')) {
				// If the controller exists => change the default controller.
				$this->controller = ucfirst($url[0]);

				// Remove the controller from the url array.
				unset($url[0]);
			}
		}

		require_once Config::get('paths', 'controllers') . $this->controller . 'Controller.php'; 

		// Create a new controller object.
		// This gives us access to the methods of this controller.
		$this->controller = new $this->controller;

                if (isset($url[1])) {
                    if (method_exists($this->controller, $url[1])) {
                        // If this controller has the provided method...
                        $this->method = $url[1];
                        unset($url[1]);
                    }
                }

                if (!empty($url)) {
                        // And if the user provided some parameters for this method....
                    $this->params = array_values($url);
                }

                // Call the method with these parameters.
                call_user_func([$this->controller, $this->method], $this->params);
	}

	/**
	 * Parses the url
	 * 
	 * @return array The URL components (controller/method/params)
	 */
	private function parseUrl() 
	{	
		if (isset($_GET['url'])) {
            $url = $_GET['url'];
            $_url = explode('/', filter_var(rtrim($url, '/'), FILTER_SANITIZE_URL));
            return $_url;
        }

        return false;
	}
 	
	public function autoLoad() {
		spl_autoload_register(function($class) 
		{
		    $base = "../app/base/" . $class . ".php";
		    $checkBase = file_exists($base);

		    $controller = Config::get("paths", "controllers") . ucfirst($class) . "Controller.php";
		    $checkController = file_exists($controller);

		    $model = Config::get("paths", "models") . $class . ".php";
		    $checkModel = file_exists($model);

		    $view = Config::get("paths", "views") . $class . ".php";
		    $checkView = file_exists($view);

		    if ($checkController) 
		    {
		        require_once $controller;
		    } 
		    else if ($checkBase) 
		    {
		        require_once $base;
		    } 
		    else if ($checkModel) 
		    {
		        require_once $model;
		    } 
		    else if ($checkView) 
		    {
		        require_once $view;
		    }
		});
	}

}