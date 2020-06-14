<?php
  /**
   *
   */
   require 'models/User.php';
   require 'models/User_Info.php';
   require 'models/Category.php';
   require 'models/Cart.php';
   require 'models/Product.php';
  class CategoryController extends Controller
  {

    function __construct()
    {
      parent::__construct();
    }

    function create(){
      Auth::admin();
      $category = new Category();
      $image = md5(rand()).'.'.pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
      $category->columns = [
        'category_id' => null,
        'image' =>  $image,
        'description' => $_POST['description']
      ];
      $result = $category->save();
      if ($result == 1) {
        move_uploaded_file($_FILES['image']['tmp_name'], "system/upload/img/".$image);
        echo json_encode(['res' => 1, 'message' => 'Category Created!']);
      }else {
        echo json_encode(['res' => 0, 'message' => $result]);
      }
    }

    function update(){
      Auth::admin();
      $category_id = $_POST['category_id'];
      if ($_POST['type'] == 1) {
          $value = $_POST['value'];
          $category = new Category();
          $result = $category->update(['trash' => $value], "category_id = $category_id");
          if ($result == 1) {
            echo json_encode(['res' => 1, 'message' => $value == 1 ? 'Category moved to Bin!' : 'Category Restored!']);
          }else {
            echo json_encode(['res' => 0, 'message' => $result]);
          }

      }else {

        $category = new Category();
        $category_id = $_POST['category_id'];
        $condition = "category_id = $category_id";
        if (isset($_FILES['image'])) {
          $image = md5(rand()).'.'.pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
          $former = $category->find($condition)['image'];
          $result = $category->update([
            'image' => $image,
            'description' => $_POST['description']
          ], $condition);
          if ($result == 1) {
            move_uploaded_file($_FILES['image']['tmp_name'], "system/upload/img/".$image);
            unlink('system/upload/img/'.$former);
            echo json_encode(['res' => 1, 'message' => 'Category updated!']);
          }else {
            echo json_encode(['res' => 0, 'message' => $result]);
          }
        }else {
          $result = $category->update([
            'description' => $_POST['description']
          ], $condition);
          if ($result == 1) {
            echo json_encode(['res' => 1, 'message' => 'Category updated!']);
          }else {
            echo json_encode(['res' => 0, 'message' => $result]);
          }
        }

      }
    }

    function show($id){
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
      $category = new Category();
      $product = new Product();
      $this->view->category = $category->find("category_id = $id");
      $this->view->products = $product->select(['*'], "category_id = $id");
      $this->view->other = $category->select(['*'], "trash = 0 AND category_id != $id LIMIT 3");
      $this->view->js = ['category/js/show.js'];
      $this->view->render('category/show', 'user');
    }

  }
