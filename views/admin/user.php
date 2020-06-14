<div class="container-fluid p-3">
  <div class="bg-white border rounded p-3 mt-5 mb-2">
    <span>
      <h4 class="text-info">User</h4>
    </span>
  </div>
  <div class="bg-white border rounded p-3">
      <div class="col-md-12">
        <table id="user_table" class="table table-bordered table-striped">
          <thead class="">
            <tr>
              <th width="10%">Image</th>
              <th width="25%">Name</th>
              <th width="15%">email</th>
              <th width="20%">address</th>
              <th width="15%">contact</th>
              <th width="15%">Status</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($this->users as $user): ?>
              <tr>
                <td class="text-center">
                  <img src="<?php echo URL ?>system/upload/profile/<?php echo $user['image'] ?>" alt="category image" class="img img-thumbnail" width="40" height="40">
                </td>
                <td class="h6"><?php echo Helper::name_format($user['fname'],$user['lname'],$user['mname'],true) ?></td>
                <td class="h6"><?php echo $user['email'] ?></td>
                <td class="h6 text-center"><?php echo $user['address'] ?></td>
                <td class="h6 text-center"><?php echo $user['contact'] ?></td>
                <td class="text-center">
                  <?php if ($user['status'] == 1): ?>
                    <button type="button" class="btn btn-md btn-outline-success status" role="0">
                      Active
                      <input type="hidden" class="user_id" value="<?php echo $user['user_id'] ?>">
                    </button>
                  <?php else: ?>
                    <button type="button" class="btn btn-md btn-outline-secondary status" role="1">
                      Inactive
                      <input type="hidden" class="user_id" value="<?php echo $user['user_id'] ?>">
                    </button>
                  <?php endif; ?>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
