<?php

  /**
   *
   */
  class View
  {

    function __construct()
    {
      // echo 'this is the view<br>';
    }

    public function render($name, $type = 'user', $include = true, $nav = true){

      if ($include == false && $nav == false) {
        require 'views/'. $name .'.php';
      }elseif ($include == true && $nav == false) {
        require 'views/inc/'.$type.'/header.php';
        require 'views/'. $name .'.php';
        require 'views/inc/'.$type.'/footer.php';
      }elseif ($include == false && $nav == true) {
        require 'views/inc/'.$type.'/nav.php';
        require 'views/'. $name .'.php';
      }else {
        require 'views/inc/'.$type.'/header.php';
        require 'views/inc/'.$type.'/nav.php';
        require 'views/'. $name .'.php';
        require 'views/inc/'.$type.'/footer.php';
      }
    }
  }
