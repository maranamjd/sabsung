<?php
  /**
   *
   */
   require 'models/Cart.php';
   require 'models/Transaction.php';
   require 'models/Product.php';
  class CartController extends Controller
  {

    function __construct()
    {
      parent::__construct();
    }

    function details(){
      Auth::admin();
      $transaction_id = $_POST['transaction_id'];
      $cart = new Cart();
      $product = new Product();
      $items = $cart->select(['*'], "transaction_id = '$transaction_id'");
      foreach ($items as $key => $item) {
        $details = $product->select(['name', 'price'], "product_id = ".$item['product_id'])[0];
        $items[$key]['name'] = $details['name'];
        $items[$key]['price'] = $details['price'];
      }
      echo json_encode($items);
    }

    function add(){
      Auth::user();
      $cart = new Cart();
      $user_id = Session::get('user_id');
      $product_id = $_POST['product_id'];
      $items = $cart->select(['cart_id'], "user_id = $user_id AND product_id = $product_id AND checkedOut = 0");
      if (count($items) > 0) {
        echo json_encode(['res' => 0, 'message' => 'This product is already in your Cart!']);
      }else {
        $cart->columns = [
          'cart_id' => null,
          'user_id' => $user_id,
          'product_id' => $product_id
        ];
        $result = $cart->save();
        if ($result == 1) {
          echo json_encode(['res' => 1, 'message' => 'Item Added to Cart!']);
        }else {
          echo json_encode(['res' => 0, 'message' => $result]);
        }
      }
    }

    function remove(){
      Auth::user();
      $cart = new Cart();
      $cart_id = $_POST['cart_id'];
      $result = $cart->delete("cart_id = $cart_id");
      if ($result == 1) {
        echo json_encode(['res' => 1, 'message' => 'Item Removed From Your Cart!']);
      }else {
        echo json_encode(['res' => 0, 'message' => $result]);
      }
    }

    function checkout(){
      Auth::user();
      $user_id = Session::get('user_id');
      $transaction = new Transaction();
      $cart = new Cart();
      $product = new Product();
      $date_today = date('Y').'-'.date('m').'-'.date('d');
      $transaction_id = date('Y').date('m').date('d');
      $tr_id = $transaction->select(['MAX(transaction_id) as id'], "transaction_id LIKE '%$transaction_id%'");
      if (count($tr_id[0]['id']) > 0) {
        $transaction_id = $tr_id[0]['id'] + 1;
      }else {
        $transaction_id .= '0001';
      }
      $transaction->columns = [
        'transaction_id' => $transaction_id,
        'user_id' => $user_id,
        'address' => $_POST['address'],
        'name' => $_POST['name'],
        'email' => $_POST['email'],
        'contact' => $_POST['contact']
      ];
      $result = $transaction->save();
      if ($result == 1) {
        foreach ($_POST['items'] as $item) {
          $cart->update([
            'transaction_id' => $transaction_id,
            'quantity' => $item['quantity'],
            'checkedOut' => 1
          ], "cart_id = ".$item['id']);

          //get product id
          $product_id = $cart->find("cart_id = ".$item['id'])['product_id'];
          $quantity = $product->find("product_id = $product_id")['quantity'];
          $product->update(['quantity' => ($quantity - $item['quantity'])], "product_id = $product_id");


        }
        echo json_encode(['res' => 1, 'message' => 'Order Placement Complete']);
      }else {
        echo json_encode(['res' => 0, 'message' => $tr_id]);
      }
    }

  }
