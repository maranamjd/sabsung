<div class="container-fluid p-3">
  <div class="bg-white border rounded p-3 mt-5 mb-2">
    <span>
      <h4 class="text-info">Order</h4>
    </span>
  </div>
  <div class="bg-white border rounded p-3">
    <div class="row mt-3">
      <div class="col-md-12">
        <div class="float-right">
          <button type="button" class="btn btn-md btn-info" data-toggle="modal" data-target="#add_product_modal">
            <span class="text-white">
              <i class="fa fa-lg fa-plus"></i>
              Add
            </span>
          </button>
        </div>
      </div>
      <div class="col-md-12">
        <table id="order_table" class="table table-bordered table-striped">
          <thead class="">
            <tr>
              <th width="15%">Transaction No</th>
              <th width="20%">Receiver</th>
              <th width="25%">Address</th>
              <th width="15%">Date Ordered</th>
              <th width="25%">Status</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($this->orders as $order): ?>
              <tr>
                <td class="text-center">
                  <span class="h5 text-info">#<?php echo $order['transaction_id'] ?></span>
                </td>
                <td class="h6"><?php echo $order['name'] ?></td>
                <td class="h6"><?php echo $order['address'] ?></td>
                <td class="h6 text-center"><?php echo date('F d, Y H:i:s', strtotime($order['date'])) ?></td>
                <td class="h6 text-center" title="Click status to view details">
                  <?php if ($order['status'] == 0): ?>
                    <?php echo Helper::order_status($order['status'], $order['status_date']) ?>
                  <?php else: ?>
                    <?php echo Helper::order_status($order['status'], $order['status_date']) ?>
                  <?php endif; ?>
                  <input type="hidden" class="transaction_id" value="<?php echo $order['transaction_id'] ?>">
                  <input type="hidden" class="status" value="<?php echo $order['status'] ?>">
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="details_modal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-body">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <div class="mb-3">
          <center><img src="<?php echo URL ?>public/img/SAMSUNG LOGO.png" alt="SAMSUNG"></center>
        </div>
        <div class="">
          <h5>Order Details</h5>
        </div>
        <div>
         <ul class="list-group" id="details">

         </ul>
        </div>
        <div class="row mt-4">
          <div class="col-md-12">
            <div class="row">
              <div class="col-md-8 offset-md-4">
                <div class="row">
                  <div class="col-md-5">
                    <span>
                      <h6>SubTotal: </h6>
                    </span>
                    <span>
                      <h6>Shipping Fee: </h6>
                    </span>
                    <hr>
                    <span>
                      <h4>Total: </h4>
                    </span>
                  </div>
                  <div class="col-md-7">
                    <span style="text-align: right" class="mb-5">
                      <h6>&#8369; <span class="text-danger" id="subtotal">0.00</span></h6>
                    </span>
                    <span style="text-align: right" class="mb-5">
                      <h6>&#8369; <span class="text-danger" id="shipping">0.00</span></h6>
                    </span>
                    <hr>
                    <span style="text-align: right" class="mb-5">
                      <h4>&#8369; <span class="text-danger" id="total">0.00</span></h4>
                    </span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4 offset-md-8 mb-5">
          <center>
            <button type="submit" name="submit" class="btn btn-md btn-info w-100 mt-4" style="display: none" id="deliver">
              <input type="hidden" id="transaction_id" value="">
              <span class="text-white">
                <i class="fa fa-lg fa-truck"></i>
                Deliver
              </span>
            </button>
          </center>
        </div>
      </div>
    </div>
  </div>
</div>
