<?php
  /**
   *
   */
   require 'models/User.php';
   require 'models/Category.php';
   require 'models/Product.php';
   require 'models/User_Info.php';
   require 'models/Transaction.php';
   require 'models/Cart.php';
   require 'models/Message.php';
  class AdminController extends Controller
  {

    function __construct()
    {
      parent::__construct();
      $user = new User();
      $user_info = new User_Info();
      $user_id = Session::get('user_id');
      $account = $user->find("user_id = '$user_id'");
      $info    = $user_info->find("user_id = '$user_id'");
      $this->user = ['account' => $account, 'info' => $info];
    }

    function reports($data){
      Auth::admin();
      $category = explode('_', $data)[0];
      $type = explode('_', $data)[1];
      $date = explode('_', $data)[2];
      $report = new Report();
      $transaction = new Transaction();
      $cart = new Cart();
      $product = new Product();
      $user_info = new User_Info();


      $report->generated_by = Helper::name_format($this->user['info']['fname'],$this->user['info']['lname'],$this->user['info']['mname'], true);
      $report->file_name = $data;
      $report->category = strtoupper($category);
      $report->report_type = strtoupper($type);
      if ($type == 'Daily') {
        $report->report_date = date('F d, Y', strtotime($date));
        $condition = "date LIKE '%".date('Y-m-d', strtotime($date))."%' AND status = 1";
      }elseif ($type == 'Weekly') {
        $report->report_date = date('F d ', strtotime($date)).date('- d, Y', strtotime($date.'+6 days'));
        $condition = "date BETWEEN '".date('Y-m-d', strtotime($date))."' AND '".date('Y-m-d', strtotime($date.'+6 days'))."' AND status = 1";
      }else {
        $report->report_date = date('F Y', strtotime($date));
        $condition = "date LIKE '%".date('Y-m', strtotime($date))."%' AND status = 1";
      }
      $orders = $transaction->select(['*'], $condition);
      $total_items = 0;
      foreach ($orders as $key => $order) {
        $items = $cart->select(['*'], "transaction_id = '".$order['transaction_id']."'");
        $total = 0;
        foreach ($items as $itemkey => $item) {
          $info = $product->find("product_id = ".$item['product_id']);
          $items[$itemkey]['name'] = $info['name'];
          $items[$itemkey]['price'] = $info['price'];
          $total += $info['price'] * $item['quantity'];
          $total_items++;
        }
        $user = $user_info->find("user_id = '".$order['user_id']."'");
        $orders[$key]['user'] = Helper::name_format($user['fname'],$user['lname'],$user['mname'],true);
        $orders[$key]['total'] = $total;
        $orders[$key]['items'] = $items;
      }
      $report->total_items = $total_items;
      $report->data = $orders;
      $report->generate();

    }

    private function _salesData($date){
      $transaction = new Transaction();
      $cart = new Cart();
      $product = new Product();
      $condition = "status_date = '$date' AND status = 1";
      $orders = $transaction->select(['transaction_id'], $condition);
      $total = 0;
      foreach ($orders as $key => $order) {
        $items = $cart->select(['product_id', 'quantity'], "transaction_id = '".$order['transaction_id']."'");
        $shipping = (count($items) > 2) ? 100 : 300;
        foreach ($items as $itemkey => $item) {
          $price = $product->find("product_id = ".$item['product_id'])['price'];
          $total += $price * $item['quantity'];
        }
        $total += $shipping;
      }
      return $total;
    }

    function chartData(){
      Auth::admin();
      $mon = date('Y-m-d', strtotime('monday this week'));
      $tue = date('Y-m-d', strtotime('tuesday this week'));
      $wed = date('Y-m-d', strtotime('wednesday this week'));
      $thu = date('Y-m-d', strtotime('thursday this week'));
      $fri = date('Y-m-d', strtotime('friday this week'));
      $sat = date('Y-m-d', strtotime('saturday this week'));
      $sun = date('Y-m-d', strtotime('sunday this week'));

      $data['sales'] = [
        'dates' => [
          date('F d, Y', strtotime($mon)),
          date('F d, Y', strtotime($tue)),
          date('F d, Y', strtotime($wed)),
          date('F d, Y', strtotime($thu)),
          date('F d, Y', strtotime($fri)),
          date('F d, Y', strtotime($sat)),
          date('F d, Y', strtotime($sun))
        ],
        'data' => [
          $this->_salesData($mon),
          $this->_salesData($tue),
          $this->_salesData($wed),
          $this->_salesData($thu),
          $this->_salesData($fri),
          $this->_salesData($sat),
          $this->_salesData($sun)
        ]
      ];

      $cart = new Cart();
      $product = new Product();
      $items = $cart->select(['product_id', 'quantity'], 'checkedOut = 1');
      $count = array();
      foreach ($items as $key => $item) {
        if (!isset($count[$item['product_id']])) {
          $count[$item['product_id']]['count'] = 0;
        }
        $count[$item['product_id']]['name'] = $product->find("product_id = ".$item['product_id'])['name'];
        $count[$item['product_id']]['count'] += $item['quantity'];
      }
      usort($count, function($a, $b){
        if($a["count"] == $b["count"]) return 0;
        return $a["count"] < $b["count"] ? 1 : -1;
      });
      $count = array_slice($count, 0, 5);
      foreach ($count as $key => $item) {
        $data['topseller'][] = $item;
      }
      echo json_encode($data);
    }

    function index(){
      Auth::login();
      $this->view->user = $this->user;
      $this->view->js = ['admin/js/login.js'];
      $this->view->render('admin/login', 'admin', 0, 0);
    }

    function dashboard(){
      Auth::admin();
      $category = new Category();
      $product = new Product();
      $user = new User();

      $categories = $category->select(['count(category_id) as count'], "1")[0]['count'];
      $products = $product->select(['count(product_id) as count'], "1")[0]['count'];
      $users = $user->select(['count(user_id) as count'], "1")[0]['count'];


      $this->view->summary = ['category' => $categories, 'product' => $products, 'user' => $users];
      $this->view->user = $this->user;
      $this->view->css = ['admin/css/dashboard.css'];
      $this->view->js = ['admin/js/dashboard.js'];
      $this->view->render('admin/dashboard', 'admin');
    }

    function sales(){
      Auth::admin();

      $this->view->user = $this->user;
      $this->view->js = ['admin/js/sales.js'];
      $this->view->render('admin/sales', 'admin');
    }

    function message(){
      Auth::admin();

      $message = new Message();
      $this->view->messages = $message->select(['*'], "status = 0");
      $this->view->user = $this->user;
      $this->view->js = ['admin/js/message.js'];
      $this->view->render('admin/message', 'admin');
    }

    function bin(){
      Auth::admin();

      $category = new Category();
      $product = new Product();
      $this->view->categories = $category->select(['*'], "trash = 1");
      $this->view->products = $product->select(['*'], "trash = 1");
      $this->view->user = $this->user;
      $this->view->js = ['admin/js/bin.js'];
      $this->view->render('admin/bin', 'admin');
    }

    function category(){
      Auth::admin();

      $category = new Category();
      $this->view->categories = $category->select(['*'], "trash = 0");
      $this->view->user = $this->user;
      $this->view->js = ['admin/js/category.js'];
      $this->view->render('admin/category', 'admin');
    }

    function product(){
      Auth::admin();

      $category = new Category();
      $product = new Product();
      $this->view->categories = $category->select(['*'], "1");
      $this->view->products = $product->select(['*'], "trash = 0");
      $this->view->user = $this->user;
      $this->view->js = ['admin/js/product.js'];
      $this->view->render('admin/product', 'admin');
    }

    function order(){
      Auth::admin();

      $transaction = new Transaction();
      $this->view->orders = $transaction->select(['*'], '1');
      $this->view->user = $this->user;
      $this->view->js = ['admin/js/order.js'];
      $this->view->render('admin/order', 'admin');
    }

    function user(){
      Auth::admin();
      $user = new User();
      $user_info = new User_Info();
      $this->view->user = $this->user;
      $users = $user->select(['*'], 'user_type = 0');
      foreach ($users as $key => $value) {
        $info = $user_info->find("user_id = '".$value['user_id']."'");
        $users[$key]['fname'] = $info['fname'];
        $users[$key]['mname'] = $info['mname'];
        $users[$key]['lname'] = $info['lname'];
        $users[$key]['address'] = $info['address'];
        $users[$key]['contact'] = $info['contact'];
      }
      $this->view->users = $users;
      $this->view->js = ['admin/js/user.js'];
      $this->view->render('admin/user', 'admin');
    }

    function login(){
      $user = new User();
      $email = $_POST['email'];
      $password = $_POST['password'];
      $result = $user->find("email = '$email' AND user_type = 1");
      if (count($result) > 0) {
        if ($password == Hash::decrypt($result['password'])) {
          Session::set([
            'user_id' => $result['user_id'],
            'user_type' => $result['user_type']
          ]);
          echo json_encode(['res' => 1, 'message' => 'Login Successful!']);
        }
      }else {
        echo json_encode(['res' => 0, 'message' => 'User Email or Password do not match!']);
      }
    }

    function logout(){
      Auth::admin();
      Session::destroy();
      echo json_encode(['message' => 'Account Logged Out!']);
    }

  }
