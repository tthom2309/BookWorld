<?php
	
	$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
	$segments = array_filter(explode('/', $uri));
	
	
	if (count($segments) === 1 or $segments[1] === '')
	{
		$segments[1] = 'welcome';
		$controller = 'controllers/'.$segments[1].'.php';
	}
	else
	{
		$controller = 'controllers/'.$segments[2].'.php';
	}	

	
	if (file_exists($controller)) {
		require $controller;
	}
	else {
		include 'controllers/error.php';
	}
?>