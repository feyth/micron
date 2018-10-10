<?php
class Core {
	public function run() {
		$url = '/';
		if(isset($_GET['url'])) {
			$url .= $_GET['url'];
		}
		$url = $this->checkRoutes($url);
		$params = array();
		if(!empty($_GET['url']) && $url != '/') {
			$url = explode('/', $url);
			array_shift($url);
			$currentController = $url[0].'Controller';
			array_shift($url);
			if(isset($url[0]) && !empty($url[0])) {
				$currentAction = $url[0];
				array_shift($url);
			} else {
				$currentAction = 'index';
			}
			if(count($url) > 0) {
				$params = $url;
			}
		} else {
			$currentController = 'homeController';
			$currentAction = 'index';
		}
		if(!file_exists('controllers/'.$currentController.'.php') || !method_exists($currentController, $currentAction)) {
			$currentController = 'homeController';
			$currentAction = 'index';
		}
		// echo $currentController . "<br>";
		// echo $currentAction;
		// die;
		$c = new $currentController();
		call_user_func_array(array($c, $currentAction), $params);
	}
	
	public function checkRoutes($url) {
		global $routes;
		foreach ($routes as $pt => $newurl) {
			$pattern = preg_replace('(\{[a-z0-9]{1,}\})', '([a-z0-9-]{1,})', $pt);
			if (preg_match('#^('.$pattern.')*$#i', $url, $matches) === 1) {
				array_shift($matches);
				array_shift($matches);
				$items = array();
				if (preg_match_all('(\{[a-z0-9]{1,}\})', $pt, $m)) {
					$items = preg_replace('(\{|\})', '', $m[0]);
				}
				$arg = array();
				foreach ($matches as $key => $match) {
					$arg[$items[$key]] = $match;
				}
				foreach ($arg as $argkey => $argvalue) {
					$newurl = str_replace(':'.$argkey, $argvalue, $newurl);
				}
				$url = $newurl;
				break;
			}
		}
		return $url;
	}
	
}
