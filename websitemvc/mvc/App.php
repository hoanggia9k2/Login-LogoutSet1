<?php 

class App
{
	public $controller,$action,$param;

	public function __construct()
	{
		global $routes;

		//Cấu hình cho controller
		if (!empty($routes['default_controller'])) {
			$this->controller = $routes['default_controller'];
		}
		$this->action = 'index';
		$this->param = [];

		$this->handleUrl();
	}

	public function getUrl()
	{
		if(!empty($_SERVER['PATH_INFO'])){
			$url = $_SERVER['PATH_INFO'];
		}else {
			$url = "/";
		}
		return $url;
	}

	public function handleUrl()
	{
		$url = $this->getUrl();
		$urlArr = array_filter(explode("/",$url));
		$urlArr = array_values($urlArr);

		//Xử lý controller
		if (!empty($urlArr[0])) {
			$this->controller = ucfirst($urlArr[0]);
		}else{
			$this->controller = ucfirst($this->controller);
		}

		if(file_exists('mvc/controllers/'.$this->controller.'.php')){
			require 'mvc/controllers/'.$this->controller.'.php';
			//Kiểm tra class $this->controller có tồn tại
			if (class_exists($this->controller)) {
				$this->controller = new $this->controller();
				unset($urlArr[0]);
			}else{
				$this->loadError();
			}

		}else{
			$this->loadError();
		}

		//Xử lý action
		if (!empty($urlArr[1])) {
			$this->action = $urlArr[1];
			unset($urlArr[1]);
		}

		//Xử lý param
		$this->param = array_values($urlArr);
		//Kiểm tra method tồn tại
		if(method_exists($this->controller, $this->action)){
			call_user_func_array([$this->controller,$this->action],$this->param); //$this->param thuộc tính kiểu $id
		}
	}

	public function loadError(){
		require 'mvc/errors/404.php';
	}
}
 ?>