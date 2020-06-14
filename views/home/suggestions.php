<div class="container-fluid p-3">
  <div class="bg-white border rounded p-3 mt-5 mb-2">
    <span>
      <h4 class="text-info">Send Suggestions or Complains</h4>
    </span>
    <div class="container">
      <form id="suggestion_form">
        <div class="row">
          <div class="col-md-7">
            <div class="form-group">
              <label for="suggestion_name">Name</label>
              <input type="text" id="suggestion_name" class="form-control" placeholder="Name" value="<?php echo (isset($this->user)) ? Helper::name_format($this->user['info']['fname'],$this->user['info']['lname'],$this->user['info']['mname'],true) : '' ?>" required>
            </div>
          </div>
          <div class="col-md-7">
            <div class="form-group">
              <label for="suggestion_email">Email</label>
              <input type="text" id="suggestion_email" class="form-control" placeholder="Email" value="<?php echo (isset($this->user)) ? $this->user['account']['email'] : '' ?>" required>
            </div>
          </div>
          <div class="col-md-8">
            <div class="form-group">
              <label for="suggestion_email">Email</label>
              <textarea id="suggestion_message" class="form-control" placeholder="Message" rows="8" cols="80" required></textarea>
            </div>
          </div>
          <div class="col-md-8">
            <button type="submit" class="btn btn-lg btn-info" name="button">
              <span class="text-white">
                <i class="fa fa-lg fa-envelope"></i> Send
              </span>
            </button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
