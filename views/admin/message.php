<div class="container-fluid p-3">
  <div class="bg-white border rounded p-3 mt-5 mb-2">
    <span>
      <h4 class="text-info">Message</h4>
    </span>
  </div>
  <div class="bg-white border rounded p-3">
    <div class="row mt-3">
      <div class="col-md-12">
        <table id="message_table" class="table table-bordered table-striped">
          <thead class="">
            <tr>
              <th width="20%">Name</th>
              <th width="20%">Email</th>
              <th width="40%">Message</th>
              <th width="20%">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($this->messages as $message): ?>
              <tr>
                <td class="text-center">
                  <?php echo $message['name'] ?>
                </td>
                <td class="h6"><?php echo $message['email'] ?></td>
                <td class="text-center"><?php echo $message['message'] ?></td>
                <td class="text-center">
                  <button type="button" class="btn btn-info btn-md read text-white">
                    <i class="fa fa-eye"></i>
                    <input type="hidden" class="message_id" value="<?php echo $message['message_id'] ?>">
                  </button>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
