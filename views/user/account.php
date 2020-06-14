<div class="container-fluid mt-3 mb-2">
  <div class="p-2 bg-white border rounded shadow">
    <div class="container">
      <div class="row">
        <div class="col-md-4 offset-md-4">
          <div class="mt-5 mb-4">
            <div class="hovereffect">
              <center><img src="<?php echo URL ?>system/upload/profile/<?php echo $this->user['account']['image'] ?>" alt="profile" width="200"></center>
              <div class="overlay">
                <h2>
                  <label class="custom-file-upload info" for="changeprofile">
                    <input type="file" name="image" id="changeprofile" >
                    <span class="fa fa-camera">
                    </label>
                  </h2>
                </div>
              </div>
          </div>
        </div>
        <div class="col-md-6">
        </div>
        <div class="col-md-12 mb-5">
          <div class="mt-4 mb-4">
            <ul class="nav nav-tabs mb-4" id="info_tab">
              <li class="nav-item">
                <a class="nav-link <?php echo (Hash::encrypt($this->user['info']['lname']) != $this->user['account']['password']) ? 'active' : '' ?>" href="#info">Personal Information</a>
              </li>
              <li class="nav-item">
                <a class="nav-link <?php echo (Hash::encrypt($this->user['info']['lname']) == $this->user['account']['password']) ? 'active' : '' ?>" href="#account">Account</a>
              </li>
            </ul>
          </div>
          <div class="container">
            <div class="col-lg-12 mb-4 tab-content">
              <div id="info" class="tab-pane fade <?php echo (Hash::encrypt($this->user['info']['lname']) != $this->user['account']['password']) ? 'show active fade' : '' ?>">
                <form id="info_form">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="fname">First Name</label>
                        <input type="text" class="form-control" id="account_fname" placeholder="your first name" value="<?php echo $this->user['info']['fname'] ?>" required>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="mname">Middle Name</label>
                        <input type="text" class="form-control" id="account_mname" placeholder="your middle name" value="<?php echo $this->user['info']['mname'] ?>">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="lname">Last Name</label>
                        <input type="text" class="form-control" id="account_lname" placeholder="your last name" value="<?php echo $this->user['info']['lname'] ?>" required>
                      </div>
                    </div>
                    <div class="col-md-6"></div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" class="form-control" id="account_address" placeholder="home no. street, brgy, municipality/region, province" value="<?php echo $this->user['info']['address'] ?>" required>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="account_email" placeholder="sample@sample.com" value="<?php echo $this->user['account']['email'] ?>" required>
                      </div>
                    </div>
                    <div class="col-md-6 mb-5">
                      <div class="form-group">
                        <label for="contact">Contact No.</label>
                        <input type="text" class="form-control" id="account_contact" placeholder="09456273641" value="<?php echo $this->user['info']['contact'] ?>" required>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group pull-right">
                        <button type="submit" class="btn btn-primary btn-lg">Save</button>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
              <div id="account" class="tab-pane <?php echo (Hash::encrypt($this->user['info']['lname']) == $this->user['account']['password']) ? 'show active fade' : '' ?>">
                <form id="account_form">
                  <div class="row">
                    <div class="col-md-6 offset-md-3">
                      <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="account_password" placeholder="your new password" required>
                      </div>
                    </div>
                    <div class="col-md-6 offset-md-3">
                      <div class="form-group">
                        <label for="confirm_password">Confirm Password</label>
                        <input type="password" class="form-control" id="account_confirm_password" placeholder="confirm new password" required>
                      </div>
                    </div>
                    <div class="col-md-6 offset-md-3 smb-5">
                      <div class="form-group">
                        <label class="form-check-label"><input type="checkbox" class="showpass"> Show Password</label>
                      </div>
                    </div>
                    <?php if (Hash::encrypt($this->user['info']['lname']) == $this->user['account']['password']): ?>
                      <div class="col-md-6 offset-md-3">
                        <span class="">
                          <h6 class="alert alert-info">Please change your password!!!</h6>
                        </span>
                      </div>
                    <?php endif; ?>
                    <div class="col-md-6 offset-md-3" id="warning" style="display: none">
                      <span class="">
                        <h6 class="alert alert-warning">Passwords do not match!</h6>
                      </span>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group pull-right">
                        <button type="submit" class="btn btn-primary btn-lg" id="save">Save</button>
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
</div>
