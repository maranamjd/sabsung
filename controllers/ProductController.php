<?php
  /**
   *
   */
   require 'models/User.php';
   require 'models/User_Info.php';
   require 'models/Category.php';
   require 'models/Cart.php';
   require 'models/Product.php';
   require 'models/Review.php';
  class ProductController extends Controller
  {

    function __construct()
    {
      parent::__construct();
    }

    function show($id){
      $category = new Category();
      $product = new Product();
      $review = new Review();
      $user = new User();
      $user_info = new User_Info();
      $cart = new Cart();
      if (Session::get('user_type') !== null) {
        if (Session::get('user_type') == 0) {
          $user_id = Session::get('user_id');
          $items = $cart->select(['*'], "user_id = $user_id AND checkedOut = 0");
          $account = $user->find("user_id = '$user_id'");
          $info    = $user_info->find("user_id = '$user_id'");
          $this->view->user = ['account' => $account, 'info' => $info, 'cart' => $items];
        }
      }
      $item = $product->find("product_id = $id");
      $reviews = $review->select(['*'], "product_id = ".$item['product_id']." ORDER BY date DESC");
      $product_rating = 0;
      foreach ($reviews as $key => $value) {
        $product_rating += $value['score'];
        $name = $user_info->find("user_id = ".$value['user_id']);
        $reviews[$key]['name'] = Helper::name_format($name['fname'], $name['lname'], $name['mname'], true);
        $reviews[$key]['date'] = date('F d, Y', strtotime($value['date']));
      }
      if ($product_rating > 0) {
        $product_rating /= count($reviews);
      }else {
        $product_rating = 3;
      }
      $item['rating'] = $product_rating;
      $this->view->reviews = $reviews;

      $others = $product->select(['*'], "category_id = ".$item['category_id']." AND trash = 0 AND product_id != ".$item['product_id']." LIMIT 3");
      foreach ($others as $key => $value) {
        $reviews = $review->select(['*'], "product_id = ".$value['product_id']);
        $rating = 0;
        foreach ($reviews as $rkey => $value) {
          $rating += $value['score'];
        }
        if ($rating > 0) {
          $rating /= count($others);
        }else {
          $rating = 3;
        }
        $others[$key]['rating'] = $rating;
      }

      $this->view->category = $category->find("category_id = ".$item['category_id']);
      $this->view->product = $item;
      $this->view->other = $others;
      $this->view->js = ['product/js/show.js'];
      $this->view->render('product/show', 'user');
    }

    function create(){
      Auth::admin();
      $product = new Product();
      $image = md5(rand()).'.'.pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
      $product->columns = [
        'product_id' => null,
        'category_id' => $_POST['category_id'],
        'image' => $image,
        'name' => $_POST['name'],
        'description' => $_POST['description'],
        'price' => $_POST['price'],
        'quantity' => $_POST['quantity']
      ];
      $result = $product->save();
      if ($result == 1) {
        move_uploaded_file($_FILES['image']['tmp_name'], "system/upload/img/".$image);
        echo json_encode(['res' => 1, 'message' => 'Product Added!']);
      }else {
        echo json_encode(['res' => 0, 'message' => $result]);
      }
    }

    function update(){
      Auth::admin();
      $product_id = $_POST['product_id'];
      if ($_POST['type'] == 1) {

          $value = $_POST['value'];
          $product = new Product();
          $result = $product->update(['trash' => $value], "product_id = $product_id");
          if ($result == 1) {
            echo json_encode(['res' => 1, 'message' => $value == 1 ? 'Product moved to Bin!' : 'Product Restored!']);
          }else {
            echo json_encode(['res' => 0, 'message' => $result]);
          }

      }else {
        $product = new Product();
        $product_id = $_POST['product_id'];
        $condition = "product_id = $product_id";
        if (isset($_FILES['image'])) {
          $image = md5(rand()).'.'.pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
          $former = $product->find($condition)['image'];
          $result = $product->update([
            'category_id' => $_POST['category_id'],
            'image' => $image,
            'name' => $_POST['name'],
            'description' => $_POST['description'],
            'price' => $_POST['price'],
            'quantity' => $_POST['quantity']
          ], $condition);
          if ($result == 1) {
            move_uploaded_file($_FILES['image']['tmp_name'], "system/upload/img/".$image);
            unlink('system/upload/img/'.$former);
            echo json_encode(['res' => 1, 'message' => 'Product updated!']);
          }else {
            echo json_encode(['res' => 0, 'message' => $result]);
          }
        }else {
          $result = $product->update([
            'category_id' => $_POST['category_id'],
            'name' => $_POST['name'],
            'description' => $_POST['description'],
            'price' => $_POST['price'],
            'quantity' => $_POST['quantity']
          ], $condition);
          if ($result == 1) {
            echo json_encode(['res' => 1, 'message' => 'Product updated!']);
          }else {
            echo json_encode(['res' => 0, 'message' => $result]);
          }
        }

      }
    }

  }
