<?php
  /**
   *
   */
  class Helper
  {
    function generateUserID(){
      // date('d').date('Y').date('m').
      $value = rand(1, 999);
      $length = strlen((string)$value);
      if ($length == 1) {
        return (int)date('Y').date('d').date('m').'00'.$value;
      }elseif ($length == 2) {
        return (int)date('Y').date('d').date('m').'0'.$value;
      }else {
        return (int)date('Y').date('d').date('m').$value;
      }
    }

    public function name_format($firstname, $lastname, $middlename = null, $middleinitial = false){
      $name = ucwords(strtolower($firstname)).' '.ucwords(strtolower($middlename)).' '.ucwords(strtolower($lastname));
      if ($middleinitial) {
        $name = ucwords(strtolower($firstname)).' '.strtoupper($middlename[0]).'. '.ucwords(strtolower($lastname));
        if ($middlename === null) {
          $name = ucwords(strtolower($firstname)).' '.ucwords(strtolower($lastname));
        }
      }
      return $name;
    }

    public function order_status($n, $date){
      $status = "<span class='btn btn-md btn-outline-info show' style='cursor: pointer'>Pending</span>";
      if ($n == 1) {
        $status = "<span class='btn btn-md btn-outline-success show' style='cursor: pointer'>Delivered on ".date('M. d, Y', strtotime($date))."</span>";
      }else if($n == 2){
        $status = "<span class='btn btn-md btn-outline-secondary show' style='cursor: pointer'>Cancelled on ".date('M. d, Y', strtotime($date))."</span>";
      }
      return $status;
    }

  }
