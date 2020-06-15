<?php
  /**
   *
   */
   require 'models/User.php';
   require 'models/User_Info.php';
   require 'models/Cart.php';
   require 'models/Transaction.php';
   require 'models/Product.php';
   require 'models/Review.php';

  class UserController extends Controller
  {

    function __construct()
    {
      parent::__construct();
    }

    function purchases(){
      Auth::user();
      if (Session::get('user_type') !== null) {
        if (Session::get('user_type') == 0) {
          $user = new User();
          $user_info = new User_Info();
          $product = new Product();
          $review = new Review();
          $transaction = new Transaction();
          $cart = new Cart();
          $user_id = Session::get('user_id');
          $items = $cart->select(['cart_id', 'product_id'], "user_id = $user_id AND checkedOut = 0");
          $purchases = $transaction->select(['*'], "user_id = $user_id ORDER BY transaction_id DESC");
          foreach ($purchases as $key => $purchase) {
            $orders = $cart->select(['*'], "transaction_id = '".$purchase['transaction_id']."'");
            $total = 0;
            foreach ($orders as $orderkey => $order) {
              $item = $product->find("product_id = ".$order['product_id']);
              $total += $item['price'];
              $orders[$orderkey]['image'] = $item['image'];
              $orders[$orderkey]['name'] = $item['name'];
              $orders[$orderkey]['price'] = $item['price'];
              $orders[$orderkey]['price'] = $item['price'];
            }
            $purchases[$key]['subtotal'] = $total;
            $purchases[$key]['total'] = count($orders) > 2 ? $total + 100 : $total + 300;
            $purchases[$key]['orders'] = $orders;
          }
          $account = $user->find("user_id = '$user_id'");
          $info    = $user_info->find("user_id = '$user_id'");
          $this->view->user = ['account' => $account, 'info' => $info, 'cart' => $items, 'purchases' => $purchases];
        }
      }
      $this->view->js = ['user/js/purchase.js'];
      $this->view->css = ['user/css/purchase.css'];
      $this->view->render('user/purchase', 'user');
    }

    function cart(){
      Auth::user();
      if (Session::get('user_type') !== null) {
        if (Session::get('user_type') == 0) {
          $user = new User();
          $user_info = new User_Info();
          $cart = new Cart();
          $product = new Product();
          $review = new Review();
          $user_id = Session::get('user_id');
          $others = array();
          $condition = '';
          $items = $cart->select(['cart_id', 'product_id'], "user_id = $user_id AND checkedOut = 0");
          foreach ($items as $key => $item) {
            $prod = $product->find('product_id = '.$item['product_id']);
            $items[$key]['name'] = $prod['name'];
            $items[$key]['description'] = $prod['description'];
            $items[$key]['quantity'] = $prod['quantity'];
            $items[$key]['price'] = $prod['price'];
            $items[$key]['image'] = $prod['image'];
            $condition .= " AND product_id != ".$prod['product_id'];
          }
          $others = $product->select(['*'], "trash = 0 $condition LIMIT 3");
          foreach ($others as $key => $value) {
            $reviews = $review->select(['*'], "product_id = ".$value['product_id']);
            $rating = 0;
            foreach ($reviews as $rkey => $value) {
              $rating += $value['score'];
            }
            if ($rating > 0) {
              $rating /= count($reviews);
            }else {
              $rating = 3;
            }
            $others[$key]['rating'] = $rating;
          }
          $this->view->other = $others;
          $account = $user->find("user_id = '$user_id'");
          $info    = $user_info->find("user_id = '$user_id'");
          $this->view->user = ['account' => $account, 'info' => $info, 'cart' => $items];
        }
      }
      $this->view->js = ['user/js/cart.js'];
      $this->view->css = ['user/css/cart.css'];
      $this->view->render('user/cart', 'user');
    }

    function account(){
      Auth::user();
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
      $this->view->js = ['user/js/default.js'];
      $this->view->css = ['user/css/default.css'];
      $this->view->render('user/account', 'user');
    }

    function create(){
      $user = new User();
      $user_info = new User_Info();
      $user_id = Helper::generateUserID();
      //save
      try {
        $user->columns = [
          'user_id' => $user_id,
          'email'   =>  $_POST['email'],
          'password'  => Hash::encrypt($_POST['lname'])
        ];
        $result = $user->save();

        if ($result == 1) {
          $user_info->columns = [
            'user_id' => $user_id,
            'fname'   =>  $_POST['fname'],
            'mname'   =>  $_POST['mname'] == '' ? null : $_POST['mname'],
            'lname'   =>  $_POST['lname'],
            'address' => $_POST['address'],
            'contact' => $_POST['contact']
          ];
          $result = $user_info->save();
          if ($result == 1) {
            Session::set([
              'user_id' => $user_id,
              'user_type' => 0
            ]);
            echo json_encode(['res' => 1, 'message' => 'Account Registered!']);
          }else {
            $user->delete("user_id = '$user_id'");
            echo json_encode(['res' => 0, 'message' => $result]);
          }
        }else {
          echo json_encode(['res' => 0, 'message' => $result]);
        }
      } catch (Exception $e) {
        echo json_encode(['res' => 0, 'message' => $e->getMessage()]);
      }
    }

    function update(){
      Auth::special();
      $user = new User();
      $user_info = new User_Info();
      $condition = "user_id = '".Session::get('user_id')."'";

      if ($_POST['type'] == 1) {
        $result = $user->update(['email' => $_POST['email']], $condition);
        if ($result == 1) {
          $result = $user_info->update([
            'fname' => $_POST['fname'],
            'mname' => $_POST['mname'] == '' ? null : $_POST['mname'],
            'lname' => $_POST['lname'],
            'address' => $_POST['address'],
            'contact' => $_POST['contact']
          ], $condition);
          if ($result == 1) {
            echo json_encode(['res' => 1, 'message' => 'Account Information Updated!']);
          }else {
            echo json_encode(['res' => 0, 'message' => $result]);
          }
        }else {
          echo json_encode(['res' => 0, 'message' => $result]);
        }
      }elseif ($_POST['type'] == 2) {
        $result = $user->update(['password' => Hash::encrypt($_POST['password'])], $condition);
        if ($result == 1) {
          echo json_encode(['res' => 1, 'message' => 'Password Updated!']);
        }else {
          echo json_encode(['res' => 0, 'message' => $result]);
        }
      }else if($_POST['type'] == 3){
        $former = $user->find($condition)['image'];
        $image = md5(rand()).'.'.pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
        $result = $user->update(['image' => $image], $condition);
        if ($result == 1) {
          move_uploaded_file($_FILES['image']['tmp_name'], "system/upload/profile/".$image);
          if ($former != 'unknown.png') {
            unlink("system/upload/profile/".$former);
          }

          echo json_encode(['res' => 1, 'message' => 'Profile Updated!']);
        }else {
          echo json_encode(['res' => 0, 'message' => $result]);
        }
      }else {
        $result = $user->update(['status' => $_POST['status']], "user_id = '".$_POST['user_id']."'");
        if ($result == 1) {
          echo json_encode(['res' => 1, 'message' => 'User Updated!']);
        }else {
          echo json_encode(['res' => 0, 'message' => $result]);
        }
      }
    }


    function login(){
      $user = new User();
      $email = $_POST['email'];
      $password = $_POST['password'];
      $result = $user->find("email = '$email' AND user_type = 0");
      if (count($result) > 0) {
        if ($password == Hash::decrypt($result['password'])) {
          if ($result['status'] == 0) {
            echo json_encode(['res' => 0, 'message' => 'Account deactivated. Please contact Administrator.']);
            return false;
          }
          Session::set([
            'user_id' => $result['user_id'],
            'user_type' => $result['user_type']
          ]);
          echo json_encode(['res' => 1, 'message' => 'Login Successful!']);
        }else {
          echo json_encode(['res' => 0, 'message' => 'User Email or Password do not match!']);
        }
      }else {
        echo json_encode(['res' => 0, 'message' => 'User Email or Password do not match!']);
      }
    }

    function logout(){
      Auth::user();
      Session::destroy();
      echo json_encode(['message' => 'Account Logged Out!']);
    }


  }
