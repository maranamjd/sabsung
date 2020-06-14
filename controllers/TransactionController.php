<?php
  /**
   *
   */
   require 'models/Transaction.php';
   require 'models/Product.php';
   require 'models/Cart.php';
  class TransactionController extends Controller
  {

    function __construct()
    {
      parent::__construct();
    }

    function update(){
      Auth::special();
      $transaction = new Transaction();
      $product = new Product();
      $cart = new Cart();
      $transaction_id = $_POST['transaction_id'];
      $status = $_POST['status'];
      $date_today = date('Y').'-'.date('m').'-'.date('d');
      $result = $transaction->update(['status' => $status, 'status_date' => $date_today], "transaction_id = '$transaction_id'");
      if ($status == 2) {
        $items = $cart->select(['product_id', 'quantity'], "transaction_id = '$transaction_id'");
        foreach ($items as $key => $item) {
          $product_id = $item['product_id'];
          $item_quantity = $item['quantity'];
          $quantity = $product->find("product_id = $product_id")['quantity'];
          $product->update(['quantity' => ($quantity + $item_quantity)], "product_id = $product_id");
        }
      }
      if ($result == 1) {
        echo json_encode(['res' => 1, 'message' => $status == 1 ? 'Order will be delivered!' : 'Order Cancelled!']);
      }else {
        echo json_encode(['res' => 0, 'message' => $result]);
      }
    }
  }
