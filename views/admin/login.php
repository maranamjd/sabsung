<!DOCTYPE html>
<html lang="en">
  <head>
    <base href="./">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>SABSUNG</title>
    <link rel="icon" type="image/ico" href="<?php echo URL ?>public/img/sabsung.png" sizes="any" />
    <link href="<?php echo URL ?>public/css/style.min.css" rel="stylesheet">
    <link href="<?php echo URL ?>public/css/pace.min.css" rel="stylesheet">
    <?php
    if (isset($this->css)) {
      foreach ($this->css as $css) {
        echo "<link href='".URL."views/".$css."' rel='stylesheet' />";
      }
    }
    ?>
  </head>
  <body class="app flex-row align-items-center">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-5">
          <div class="card-group">
            <div class="card p-4">
              <div class="card-body">
                <h1>Login</h1>
                <p class="text-muted">Administrator</p>
                <form id="login_form">
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="icon-user"></i>
                      </span>
                    </div>
                    <input class="form-control" type="email" placeholder="Email" id="email" required>
                  </div>
                  <div class="input-group mb-4">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="icon-lock"></i>
                      </span>
                    </div>
                    <input class="form-control" type="password" placeholder="Password" id="password" required>
                  </div>
                  <div class="row">
                    <div class="col-6">
                      <label class="form-check-label" style="cursor: pointer"><input type="checkbox" class="showpass"> Show Password</label>
                    </div>
                    <div class="col-6 text-right">
                      <button class="btn btn-primary px-4" type="submit">Login</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
  <script src="<?php echo URL; ?>public/js/jquery3.3.1.js"></script>
  <script src="<?php echo URL ?>node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
  <script src="<?php echo URL; ?>public/js/chart.bundle.js"></script>
  <script src="<?php echo URL; ?>public/js/chartutils.js"></script>
  <script src="<?php echo URL; ?>public/js/app.js"></script>
  <script src="<?php echo URL; ?>public/js/bootstrap-rating.min.js"></script>
  <script src="<?php echo URL; ?>public/js/coreui.min.js"></script>
  <?php
  if (isset($this->js)) {
    foreach ($this->js as $js) {
      echo "<script src='".URL."views/".$js."'></script>";
    }
  }
  ?>
</body>
</html>
