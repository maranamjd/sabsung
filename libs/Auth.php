<?php
  /**
   *
   */
  class Auth
  {

    function __construct()
    {

    }
    function user(){
      if (Session::get('user_type') !== null) {
        if (Session::get('user_type') != 0) {
          header('Location: '.URL.'admin/dashboard');
        }else {
          return false;
        }
      }else {
        Session::destroy();
        header('Location: '.URL);
      }
    }

    function special(){
      if (Session::get('user_type') !== null) {
        return false;
      }else {
        Session::destroy();
        header('Location: '.URL);
      }
    }

    function login(){
      if (Session::get('user_type') !== null) {
        if (Session::get('user_type') == 1) {
          header('Location: '.URL.'admin/dashboard');
        }else {
          return false;
        }
      }
    }

    function admin(){
      if (Session::get('user_type') !== null) {
        if (Session::get('user_type') != 1) {
          header('Location: '.URL);
        }else {
          return false;
        }
      }else {
        Session::destroy();
        header('Location: '.URL.'admin');
      }
    }
  }
