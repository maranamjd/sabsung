<?php

  require 'config.php';

  function __autoload($class){
    require 'libs/'.$class.'.php';
  }

  $app = new Bootstrap();
