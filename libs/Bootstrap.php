<?php
/**
 *
 */
class Bootstrap
{

  function __construct()
  {
    Session::init();
    $url = isset($_GET['url']) ? $_GET['url'] : START_PAGE;
    $url = rtrim($url, '/');
    $url = explode('/', $url);
    // print_r($url);
    // $route = new Route();
    // $route->get('/', 'HomeController@index');
    // $route->get('about', 'HomeController@edit');
    // $route->get('about/edit', 'HomeController@index');
    //
    //
    //class
    $file = 'controllers/'. ucfirst($url[0]) .'Controller.php';
    $controller = $url[0].'controller';
    if(file_exists($file)){
      echo $file; die;
      require $file;
    }else {
      $this->error();
      return false;
    }
    $controller = new $controller;
    // $controller->loadModel($url[0]);


//methods
    if (isset($url[2])){
      if (method_exists($controller, $url[1])) {
        $controller->{$url[1]}($url[2]);
      }else {
        $this->error();
        return false;
      }
    }else {
      $url[1] = isset($url[1]) ? $url[1] : 'index';
      if (method_exists($controller, $url[1])) {
        $controller->{$url[1]}();
      }else {
        $this->error();
        return false;
      }
    }
  }

  function error(){
    $error = new Excptn();
    $error->show('404', 'Page not Found!');
  }
}
