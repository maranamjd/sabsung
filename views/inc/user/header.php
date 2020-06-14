<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title><?php echo strtoupper(SYSTEM_NAME) ?></title>
    <center> <a href="<?php echo URL ?>"><img src="<?php echo URL ?>public/img/SAMSUNG LOGO.png" alt="SAMSUNG"></a></center>
    <link rel="icon" href="<?php echo URL ?>public/img/sabsung.png">
    <link href="<?php echo URL; ?>public/css/app.css" rel="stylesheet" />
    <link href="<?php echo URL; ?>public/css/bootstrap-rating.css" rel="stylesheet" />
    <link href="<?php echo URL; ?>public/css/font-awesome.css" rel="stylesheet" />
    <link href="<?php echo URL; ?>public/css/main.css" rel="stylesheet" />
    <?php
      if (isset($this->css)) {
        foreach ($this->css as $css) {
          echo "<link href='".URL."views/".$css."' rel='stylesheet' />";
        }
      }
    ?>
  </head>
  <body>
    <div class="content">
