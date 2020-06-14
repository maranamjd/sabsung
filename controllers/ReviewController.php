<?php
  /**
   *
   */
   require 'models/Review.php';
  class ReviewController extends Controller
  {

    function __construct()
    {
      parent::__construct();
    }

    function create(){
      Auth::user();
      $review = new Review();
      $user_id = Session::get('user_id');
      $review->columns = [
        'review_id' => null,
        'user_id' => $user_id,
        'product_id' => $_POST['product_id'],
        'review' => $_POST['comment'] == '' ? null : $_POST['comment'],
        'date' => date('Y').'-'.date('m').'-'.date('d'),
        'score' => $_POST['rating']
      ];
      $result = $review->save();
      if ($result == 1) {
        echo json_encode(['res' => 1, 'message' => 'Review added!']);
      }else {
        echo json_encode(['res' => 0, 'message' => $result]);
      }
    }

  }
