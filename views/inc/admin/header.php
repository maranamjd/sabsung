<!DOCTYPE html>
<html lang="en">
  <head>
    <base href="./">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Administrator</title>
    <link rel="icon" type="image/ico" href="<?php echo URL ?>public/img/sabsung.png" sizes="any" />
    <link href="<?php echo URL ?>public/css/style.min.css" rel="stylesheet">
    <link href="<?php echo URL ?>public/css/pace.min.css" rel="stylesheet">
    <link href="<?php echo URL; ?>public/css/bootstrap-rating.css" rel="stylesheet" />
    <link href="<?php echo URL; ?>public/css/font-awesome.css" rel="stylesheet" />
    <link href="<?php echo URL; ?>public/css/admin.css" rel="stylesheet" />
    <?php
    if (isset($this->css)) {
      foreach ($this->css as $css) {
        echo "<link href='".URL."views/".$css."' rel='stylesheet' />";
      }
    }
    ?>
  </head>
  <body class="app header-fixed sidebar-fixed aside-menu-fixed sidebar-lg-show">
    <header class="app-header navbar">
      <button class="navbar-toggler sidebar-toggler d-lg-none mr-auto" type="button" data-toggle="sidebar-show">
        <span class="navbar-toggler-icon"></span>
      </button>
      <a class="navbar-brand" href="#">
        <img class="navbar-brand-full" src="<?php echo URL ?>public/img/SAMSUNG LOGO.png" width="89" height="25" alt="sabsung logo">
        <img class="navbar-brand-minimized" src="<?php echo URL ?>public/img/SAMSUNG LOGO.png" width="30" height="30" alt="sabsung logo">
      </a>
      <button class="navbar-toggler sidebar-toggler d-md-down-none" type="button" data-toggle="sidebar-lg-show">
        <span class="navbar-toggler-icon"></span>
      </button>
      <ul class="nav navbar-nav ml-auto">
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
            <?php echo Helper::name_format($this->user['info']['fname'],$this->user['info']['lname'],$this->user['info']['mname'], true) ?>
            <img class="img-avatar" src="<?php echo URL ?>system/upload/profile/unknown.png" alt="admin@bootstrapmaster.com">
          </a>
          <div class="dropdown-menu dropdown-menu-right">
            <div class="dropdown-header text-center">
              <strong>Account</strong>
            </div>
            <a class="dropdown-item" href="<?php echo URL ?>admin/profile">Profile</a>
            <span class="dropdown-item" id="logout" style="cursor: pointer">Logout</span>
          </div>
        </li>
      </ul>
    </header>
