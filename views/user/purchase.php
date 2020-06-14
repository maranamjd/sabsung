<div class="container-fluid">
  <div class="bg-light rounded border mt-3 p-2">
    <div class="row mb-2">
      <div class="col-md-5 mt-4 cart-title mb-3">
        <center>
          <span class="fa fa-credit-card"></span>
          <span class="text-dark text-lighten-5">Purchase History</span>
        </center>
      </div>
      <div class="container">
        <?php if (count($this->user['purchases']) < 1): ?>
          <div class="mt-4 mb-5">
            <center>
              <h4>No Items To Show...</h4>
            </center>
          </div>
        <?php endif; ?>
        <?php foreach ($this->user['purchases'] as $purchase): ?>
          <div id="accordion" class="mb-2">
            <div class="card">
              <span title="Click to View Order Details" data-toggle="collapse" data-target="#collapse_<?php echo $purchase['transaction_id'] ?>" aria-expanded="true" aria-controls="collapse_<?php echo $purchase['transaction_id'] ?>">
                <div class="card-header" id="heading_<?php echo $purchase['transaction_id'] ?>">
                  <div class="row">
                    <div class="col-md-6 col-sm-6">
                      <p class="mb-0">
                        <h5>Order <span class="text-info">#<?php echo $purchase['transaction_id'] ?></span></h5>
                        <p class="text-muted">Placed on <?php echo date('F d, Y H:i:s', strtotime($purchase['date'])) ?></p>
                      </p>
                    </div>
                    <div class="col-md-3 offset-md-3 col-sm-6">
                      <?php echo Helper::order_status($purchase['status'], $purchase['status_date']) ?>
                    </div>
                  </div>
                </div>
              </span>
              <div id="collapse_<?php echo $purchase['transaction_id'] ?>" class="collapse" aria-labelledby="heading_<?php echo $purchase['transaction_id'] ?>" data-parent="#accordion">
                <div class="card-body">
                  <div class="container">
                    <div class="row">
                      <div class="col-md-6">
                        <h6>Receiver: <span class="text-secondary"><?php echo $purchase['name'] ?></span></h6>
                        <h6>Email: <span class="text-secondary"><?php echo $purchase['email'] ?></span></h6>
                        <h6>Contact No: <span class="text-secondary"><?php echo $purchase['contact'] ?></span></h6>
                        <h6>Billing Address: <span class="text-secondary"><?php echo $purchase['address'] ?></span></h6>
                      </div>
                      <div class="col-md-4">
                        <h5>Subtotal: <span class="text-danger float-right">&#8369; <?php echo number_format($purchase['subtotal'], 2) ?></span></h5>
                        <h5>shipping Fee: <span class="text-danger float-right">&#8369; <?php echo count($purchase['orders']) > 2 ? '100.00' : '300.00' ?></span></h5>
                        <hr>
                        <h3>Total: <span class="text-danger float-right">&#8369; <?php echo number_format($purchase['total'], 2) ?></span></h3>
                      </div>
                      <div class="col-md-12 mt-3">
                        <h5>Ordered Product/s</h5>
                        <hr>
                      </div>
                      <div class="col-md-12 mb-5">
                        <div class="container">
                          <div class="row">
                            <?php foreach ($purchase['orders'] as $order): ?>
                              <div class="col-md-4">
                                <div class="card-body">
                                  <div class="card shadow">
                                    <div class="card-header badge-dark">
                                    </div>
                                    <div class="" style="height:330px;">
                                      <center><img src="<?php echo URL ?>system/upload/img/<?php echo $order['image'] ?>" height="165px" width="200px"/></center>
                                      <center><h6 class="text-dark text-lighten-6"><?php echo $order['quantity'] ?> pc/s.</h6></center>
                                      <center><h5 class="text-dark text-lighten-6"><?php echo $order['name'] ?></h5></center>
                                      <center><h5 class="text-danger">&#8369; <?php echo number_format($order['price'] * $order['quantity'], 2) ?></h5></center>
                                      <?php if ($purchase['status'] == 1): ?>
                                        <center>
                                          <a href="<?php echo URL ?>product/show/<?php echo $order['product_id'] ?>" class="btn btn-sm btn-info mr-3">View Item</a>
                                          <button class="btn btn-sm btn-info add_review ml-3">
                                            Add Review
                                            <input type="hidden" class="product_id" value="<?php echo $order['product_id'] ?>">
                                            <input type="hidden" class="name" value="<?php echo $order['name'] ?>">
                                            <input type="hidden" class="image" value="<?php echo $order['image'] ?>">
                                          </button>
                                        </center>
                                      <?php else: ?>
                                        <center>
                                          <a href="<?php echo URL ?>product/show/<?php echo $order['product_id'] ?>" class="btn btn-sm btn-info">View Item</a>
                                        </center>
                                      <?php endif; ?>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            <?php endforeach; ?>
                            <?php if ($purchase['status'] == 0): ?>
                              <div class="col-md-12">
                                <span class="float-right">
                                  <button class="btn btn-lg btn-secondary cancel_order ml-3">
                                    Cancel Order
                                    <input type="hidden" class="transaction_id" value="<?php echo $purchase['transaction_id'] ?>">
                                  </button>
                                </span>
                              </div>
                            <?php endif; ?>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="review_modal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <div class="">
          <center><img src="<?php echo URL ?>public/img/SAMSUNG LOGO.png" alt="SAMSUNG"></center>
        </div>
        <center><img src="" height="145px" width="200px" id="review_image"/></center>
        <center>
          <h4 class="text-dark text-lighten-6" id="review_name"></h4>
        </center>
        <div class="container">
          <div class="row">
            <form id="review_form">
              <div class="col-md-12">
                <div class="form-group">
                  <textarea name="comment" id="review_comment" class="form-control" rows="4" cols="80" placeholder="your comment"></textarea required>
                </div>
              </div>
              <div class="col-md-12">
                <center>
                  <h5 class="text-info">Rating</h5>
                  <span class="text-warning">
                    <input type="hidden" class="rating" id="review_rating" data-filled="fa fa-star fa-lg" data-empty="fa fa-star-o fa-lg" required>
                  </span>
                </center>
              </div>
              <input type="hidden" id="review_product_id">
              <div class="col-md-12">
                <center>
                  <button type="submit" name="submit" class="btn btn-md btn-info w-100 mt-4">Submit Review</button>
                </center>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
