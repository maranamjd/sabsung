    <!--Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav">
          <li class="nav-item mt-2">
            <div class="form-group">
              <input type="text" class="form-control" id="search" placeholder="Search Item/Category">
              <div id="matches" class="card container" style="display: none">
              </div>
            </div>
          </li>
        </ul>
        <ul class="navbar-nav ml-auto nav-flex-icons">
          <?php if (isset($this->user)): ?>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo URL ?>user/cart" class="pull-right">
                <img src="<?php echo URL ?>public/img/cart.png" width="20px" height="20px">
                <span class="badge badge-primary"><?php echo count($this->user['cart']) ?></span>
              </a>
            </li>
            <li class="nav-item avatar dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink-55" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img src="<?php echo URL ?>system/upload/profile/<?php echo $this->user['account']['image'] ?>" class="rounded-circle z-depth-0" alt="avatar image" width="40" height="40">
              </a>
              <div class="dropdown-menu dropdown-menu-lg-right dropdown-secondary" aria-labelledby="navbarDropdownMenuLink-55">
                <a class="dropdown-item" href="#">
                  <h5><?php echo Helper::name_format($this->user['info']['fname'],$this->user['info']['lname'],$this->user['info']['mname'], true); ?></h5>
                  <p class="text-muted"><?php echo $this->user['account']['email'] ?></p>
                </a>
                <a class="dropdown-item" href="<?php echo URL ?>user/purchases">Purchase History</a>
                <a class="dropdown-item" href="<?php echo URL ?>user/account">Account</a>
                <a class="dropdown-item" href="#" id="logout">Logout</a>
              </div>
            </li>
          <?php else: ?>
            <li class="nav-item">
              <a class="nav-link login" href="#" data-toggle="modal" data-target="#login_modal">Login</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#" data-toggle="modal" data-target="#signup_modal">Sign Up</a>
            </li>
          <?php endif; ?>
        </ul>
      </div>
    </nav>



    <div class="modal fade" id="image_modal" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
          <div class="modal-body">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <div class="image mt-5 mb-5">

            </div>

            <div class="col-md-12">
              <div class="form-group">
                <button type="submit" class="btn btn-primary w-100" id="update_profile">Update Profile</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    	<!-- modal for login begins -->

    <div class="modal fade" id="login_modal" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
          <div class="modal-body">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <div class="mb-4">
              <center><img src="<?php echo URL ?>public/img/SAMSUNG LOGO.png" alt="SAMSUNG"></center>
            </div>
            <div id="login_message">

            </div>
            <div class="container">
              <form id="login_form">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="inputEmail">Email</label>
                      <input type="email" class="form-control" placeholder="sample@sample.com" id="login_email" name="email" required>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="inputPassword">Password</label>
                      <input type="password" class="form-control" placeholder="your password" id="login_pass" name="password" required>
                    </div>
                  </div>
                  <div class="col-md-12 mb-5">
                    <div class="form-group">
                      <label class="form-check-label"><input type="checkbox" class="showpass"> Show Password</label>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <button type="submit" class="btn btn-primary w-100">Sign in</button>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

    	<!-- modal for login ends -->



    	<!-- modal for signup begins -->

    <div class="modal fade" id="signup_modal" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-body">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <div class="mb-4">
              <center><img src="<?php echo URL ?>public/img/SAMSUNG LOGO.png" alt="SAMSUNG"></center>
            </div>
            <div class="container">
              <p class="hint-text text-muted">Create your account. It's free and only takes a minute.</p>
              <div class="container">
                <form id="register_form">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="fname">First Name</label>
                        <input type="text" class="form-control" id="fname" placeholder="your first name" required>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="mname">Middle Name</label>
                        <input type="text" class="form-control" id="mname" placeholder="your middle name">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="lname">Last Name</label>
                        <input type="text" class="form-control" id="lname" placeholder="your last name" required>
                      </div>
                    </div>
                    <div class="col-md-6"></div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" class="form-control" id="address" placeholder="home no. street, brgy, municipality/region, province" required>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" placeholder="sample@sample.com" required>
                      </div>
                    </div>
                    <div class="col-md-6 mb-5">
                      <div class="form-group">
                        <label for="contact">Contact No.</label>
                        <input type="text" class="form-control" id="contact" placeholder="09456273641" required>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <button type="submit" class="btn btn-primary w-100">Register</button>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>


    	<!-- modal for signup ends -->
