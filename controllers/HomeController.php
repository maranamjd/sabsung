<?php
  /**
   *
   */
   require 'models/User.php';
   require 'models/User_Info.php';
   require 'models/Category.php';
   require 'models/Cart.php';
   require 'models/Product.php';

  class HomeController extends Controller
  {

    function __construct()
    {
      parent::__construct();
    }

    function index(){
      // echo 1;die;

      // if (Session::get('user_type') !== null) {
      //   if (Session::get('user_type') == 0) {
      //     $user = new User();
      //     $user_info = new User_Info();
      //     $cart = new Cart();
      //     $user_id = Session::get('user_id');
      //     $items = $cart->select(['*'], "user_id = $user_id AND checkedOut = 0");
      //     $account = $user->find("user_id = '$user_id'");
      //     $info    = $user_info->find("user_id = '$user_id'");
      //     $this->view->user = ['account' => $account, 'info' => $info, 'cart' => $items];
      //   }
      // }
      // $category = new Category();
      // $product = new Product();
      // $this->view->featured = $product->select(["MIN(price) as `price`", '(select description from category where category_id = product.category_id) as category', 'product_id', 'image', 'name', 'quantity', 'description'], "trash = 0 GROUP BY category_id");
      // $this->view->categories = $category->select(['*'], 'trash = 0');
      $this->view->js = ['home/js/default.js'];
      $this->view->css = ['home/css/default.css'];
      $this->view->render('home/index', 'user');
    }

    function suggestions(){
      if (Session::get('user_type') !== null) {
        if (Session::get('user_type') == 0) {
          $user = new User();
          $user_info = new User_Info();
          $cart = new Cart();
          $user_id = Session::get('user_id');
          $items = $cart->select(['*'], "user_id = $user_id AND checkedOut = 0");
          $account = $user->find("user_id = '$user_id'");
          $info    = $user_info->find("user_id = '$user_id'");
          $this->view->user = ['account' => $account, 'info' => $info, 'cart' => $items];
        }
      }
      $this->view->js = ['home/js/suggestions.js'];
      $this->view->render('home/suggestions', 'user');
    }

    function search(){
      $key = $_POST['key'];
      $product = new Product();
      $category = new Category();
      $data = array();
      $data['products'] = $product->select(['product_id', 'name', 'image'], "name LIKE '%$key%'");
      $data['categories'] = $category->select(['category_id', 'description', 'image'], "description LIKE '%$key%'");
      echo json_encode($data);
    }



  }
