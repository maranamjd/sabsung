<?php
  /**
   *
   */
   require 'models/Message.php';
  class MessageController extends Controller
  {

    function __construct()
    {
      parent::__construct();
    }

    function create(){
      $message = new Message();
      $message->columns = [
        'message_id' => null,
        'name' => $_POST['name'],
        'email' => $_POST['email'],
        'message' => $_POST['message']
      ];
      $result = $message->save();
      if ($result == 1) {
        echo json_encode(['res' => 1, 'message' => 'Message sent!']);
      }else {
        echo json_encode(['res' => 0, 'message' => $result]);
      }
    }

    function update(){
      $message_id = $_POST['message_id'];
      $value = $_POST['value'];
      $message = new Message();
      $result = $message->update(['status' => $value], "message_id = $message_id");
      if ($result == 1) {
        echo json_encode(['res' => 1, 'message' => 'Message marked as read!']);
      }else {
        echo json_encode(['res' => 0, 'message' => $result]);
      }
    }

  }
