<div class="container-fluid mt-5">
  <div class="row">
    <div class="col-md-8">
      <div class="p-2 mt-3 bg-white border rounded shadow">
        <div class="row mb-2">
          <div class="col-md-5 mt-4 cart-title mb-3">
            <center>
              <span class="fa fa-shopping-cart"></span>
              <span class="text-dark text-lighten-5">Items in your cart</span>
            </center>
          </div>
        </div>
        <div class="col-md-12">
          <?php if (count($this->user['cart']) > 0): ?>
            <table class="mb-4">
              <thead>
                <tr>
                  <th width="5%">
                    <input type="checkbox" id="select_all">
                  </th>
                  <th width="75%"><span class="text-secondary" id="select_all_text" style="cursor: pointer">Select All</span></th>
                  <th width="10%"></th>
                  <th width="10%"></th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($this->user['cart'] as $item): ?>
                  <tr id="row_<?php echo $item['cart_id'] ?>">
                    <td>
                      <input type="checkbox" class="cart_item_select" id="cart_<?php echo $item['cart_id'] ?>">
                      <input type="hidden" class="hidden_name" value="<?php echo $item['name'] ?>">
                      <input type="hidden" class="hidden_price" value="<?php echo $item['price'] ?>">
                      <input type="hidden" class="hidden_id" value="<?php echo $item['cart_id'] ?>">
                    </td>
                    <td>
                      <div id="accordion">
                        <div class="card">
                          <span title="Click to View Product Details" data-toggle="collapse" data-target="#collapse_<?php echo $item['cart_id'] ?>" aria-expanded="true" aria-controls="collapse_<?php echo $item['cart_id'] ?>">
                            <div class="card-header" id="heading_<?php echo $item['cart_id'] ?>">
                              <p class="mb-0 text-info">
                                <span><?php echo $item['name'] ?></span>
                                <span class="float-right text-danger">&#8369; <span class="accordion_price"><?php echo number_format($item['price'], 2) ?></span></span>
                              </p>
                            </div>
                          </span>
                          <div id="collapse_<?php echo $item['cart_id'] ?>" class="collapse" aria-labelledby="heading_<?php echo $item['cart_id'] ?>" data-parent="#accordion">
                            <div class="card-body">
                              <div class="row">
                                <div class="col-md-6">
                                  <center>
                                    <img src="<?php echo URL ?>system/upload/img/<?php echo $item['image'] ?>" alt="" width="250">
                                  </center>
                                </div>
                                <div class="col-md-6">
                                  <?php $description = explode(';', $item['description']); ?>
                                  <center>
                                    <div class="mt-4 mb-4">
                                      <?php foreach ($description as $desc): ?>
                                        <span class="text-dark text-lighten-4"><?php echo $desc ?></span><br>
                                      <?php endforeach; ?>
                                    </div>
                                  </center>
                                </div>
                                <div class="col-md-12">
                                  <center><a href="<?php echo URL ?>product/show/<?php echo $item['product_id'] ?>" class="btn btn-info">Reviews</a></center>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </td>
                    <td>
                      <div class="form-group mt-3 ml-3">
                        <input type="number" class="form-control item_quantity" value="<?php echo $item['quantity'] > 0 ? 1 : 0 ?>" min="<?php echo $item['quantity'] > 0 ? 1 : 0 ?>" max="<?php echo $item['quantity'] ?>">
                      </div>
                    </td>
                    <td>
                      <span class="float-right">
                        <a href="#" class="btn btn-md btn-secondary remove_from_cart"><input type="hidden" id="cart_id" value="<?php echo $item['cart_id'] ?>"><i class="fa fa-trash-o"></i></a>
                      </span>
                    </td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
            <span class="font-weight-bold ml-4">Note: </span>
            <span class="text-dark text-lighten-7">Product/s that have a quantity of 0 are out of stock.</span>
            <div class="col-md-3 offset-md-9">
              <a href="#" class="btn btn-md btn-info w-100 add_checkout mb-3"><i class="fa fa-sign-out"></i> Check Out</a>
            </div>
          <?php else: ?>
            <div class="mt-4 mb-5">
              <center>
                <h4>No Items To Show...</h4>
              </center>
            </div>
          <?php endif; ?>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="row">
        <div class="col-md-12 mb-4">
          <div class="p-2 mt-3 bg-white border rounded shadow">
            <div class="row mb-2">
              <div class="col-md-8 mt-4 cart-title mb-3">
                <center>
                  <span class="fa fa-truck"></span>
                  <span class="text-dark text-lighten-5">Check Out</span>
                </center>
              </div>
              <div class="col-md-12">
                <div class="container">
                  <h6>Summary</h6>
                  <ul class="list-group mb-4" id="summary">
                  </ul>
                  <input type="hidden" id="summ_count" value="0">
                  <span class="float-right mb-3">
                    <h4>Total: &#8369; <span class="text-danger" id="total_price">0.00</span></h4>
                  </span>
                  <a href="#" class="btn btn-lg btn-info w-100 place_order"><i class="fa fa-book"></i> Place Order</a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-12">
          <div class="col-md-12">
            <div class="card shadow">
              <div class="card-header badge-dark">
                Other Products you might like
              </div>
              <div class="card-body">
                <ul class="list-group">
                  <?php if (isset($this->other)): ?>
                    <?php if (count($this->other) > 0): ?>
                      <?php foreach ($this->other as $product): ?>
                        <li class="list-group-item">
                          <a href="<?php echo URL ?>product/show/<?php echo $product['product_id'] ?>">
                            <div class="row">
                              <div class="col-md-4">
                                <img src="<?php echo URL ?>system/upload/img/<?php echo $product['image'] ?>" alt="<?php echo $product['name'] ?>" class="img img-thumbnail">
                              </div>
                              <div class="col-md-8">
                                <div class="row">
                                  <div class="col-md-12">
                                    <center><p class="text-secondary"><?php echo $product['name'] ?> </p></center>
                                  </div>
                                  <div class="col-md-12">
                                    <center>
                                      <span class="text-warning">
                                        <input type="hidden" class="rating" value="<?php echo $product['rating'] ?>" data-filled="fa fa-star fa-lg" data-empty="fa fa-star-o fa-lg" data-readonly>
                                      </span>
                                    </center>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </a>
                        </li>
                      <?php endforeach; ?>
                    <?php else: ?>
                      <center><h6>No Available Product To Show..</h6></center>
                    <?php endif; ?>
                  <?php endif; ?>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>




<div class="modal fade" id="checkout_modal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <div class="mb-4">
          <center><img src="<?php echo URL ?>public/img/SAMSUNG LOGO.png" alt="SAMSUNG"></center>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="progressbar">
              <ul>
                <li id="step1" class="active">
                  Contact info.
                </li>
                <li id="step2" class="">
                  Billing info.
                </li>
                <li id="step3" class="">
                  Summary
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="container mt-4">
          <center>
            <h4 class="hint-text text-muted">Complete Your Order.</h4>
          </center>
          <div class="steps">
            <div class="step1 step">
              <div class="container">
                <form class="checkout_form">
                  <div class="row">
                    <div class="col-md-8">
                      <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="order_name" placeholder="Name" value="<?php echo Helper::name_format($this->user['info']['fname'],$this->user['info']['lname'],$this->user['info']['mname'], true); ?>" required>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="order_email" placeholder="sample@sample.com" value="<?php echo $this->user['account']['email'] ?>" required>
                      </div>
                    </div>
                    <div class="col-md-6 mb-5">
                      <div class="form-group">
                        <label for="contact">Contact No.</label>
                        <input type="text" class="form-control" id="order_contact" placeholder="09456273641" value="<?php echo $this->user['info']['contact'] ?>" required>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <span class="float-right">
                          <button type="submit" class="btn btn-info btn-lg w-100">Next</button>
                        </span>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
            <div class="step2 step">
              <div class="container">
                <form class="checkout_form">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="address">Billing Address</label>
                        <input type="text" class="form-control" id="order_address" placeholder="home no. street, brgy, municipality/region, province" value="<?php echo $this->user['info']['address'] ?>" required>
                        <input type="hidden" id="hidden_address" value="<?php echo $this->user['info']['address'] ?>">
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="form-check-label"><input type="checkbox" class="different_address "> Use Different Shipping Address</label>
                      </div>
                    </div>
                    <div class="col-md-12 mt-2 mb-5">
                      <div class="container border rounded">
                        <h5 class="text-dark text-lighten-5 p-3">Payment Options</h5>
                        <div class="container">
                          <div class="form-group">
                            <h6><input type="radio" name="" checked> Cash On Delivery</h6>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <span class="float-left">
                          <button type="button" class="btn btn-info btn-lg w-100 back_btn">Previous</button>
                        </span>
                        <span class="float-right">
                          <button type="submit" class="btn btn-info btn-lg w-100">Next</button>
                        </span>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
            <div class="step3 step">
              <div class="container">
                <form class="checkout_form">
                  <div class="row">
                    <div class="col-md-12">
                      <div id="checkout_summary" class="mb-5">

                      </div>
                      <div class="row">
                        <div class="col-md-6 offset-md-6">
                          <div class="row">
                            <div class="col-md-5">
                              <span>
                                <h5>SubTotal: </h5>
                              </span>
                              <span>
                                <h5>Shipping Fee: </h5>
                              </span>
                              <hr>
                              <span>
                                <h4>Total: </h4>
                              </span>
                            </div>
                            <div class="col-md-7">
                              <span style="text-align: right" class="mb-5">
                                <h5>&#8369; <span class="text-danger" id="checkout_subtotal">0.00</span></h5>
                              </span>
                              <span style="text-align: right" class="mb-5">
                                <h5>&#8369; <span class="text-danger" id="checkout_shipping_fee">0.00</span></h5>
                              </span>
                              <hr>
                              <span style="text-align: right" class="mb-5">
                                <h4>&#8369; <span class="text-danger" id="checkout_total_price">0.00</span></h4>
                              </span>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-12 mt-5">
                      <div class="form-group">
                        <span class="float-left">
                          <button type="button" class="btn btn-info btn-lg w-100 back_btn">Previous</button>
                        </span>
                        <span class="float-right">
                          <button type="submit" class="btn btn-info btn-lg w-100" id="submit_order">Place Order</button>
                        </span>
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
</div>
