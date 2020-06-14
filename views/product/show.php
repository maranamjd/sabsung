<!-- <?php echo json_encode($this->product) ?> -->
<div class="p-2 bg-white border rounded mt-2 mb-2">
  <center>
    <img src="<?php echo URL ?>system/upload/img/<?php echo $this->category['image'] ?>" alt="<?php echo $this->category['description'] ?>" class="img">
  </center>
</div>
<div class="container mt-5 mb-5">
  <div class="row">
    <div class="col-md-8">
      <div class="row">
        <div class="col-md-12">
          <div class="container-fluid mt-3 mb-2">
            <div class="p-2 bg-white border rounded shadow">
              <img src="<?php echo URL ?>system/upload/img/<?php echo $this->product['image'] ?>" alt="<?php echo $this->product['name'] ?>" class="img img-thumbnail" width="100%">
              <center><h4 class="text-dark text-lighten-6 mt-4"><?php echo $this->product['name'] ?></h4></center>
              <div class="mb-4">
                <center>
                  <h5 class="text-info">Rating</h5>
                  <span><?php echo number_format($this->product['rating'], 2) ?></span><br>
                  <span class="text-warning">
                    <input type="hidden" class="rating" value="<?php echo $this->product['rating'] ?>" data-filled="fa fa-star fa-lg" data-empty="fa fa-star-o fa-lg" data-readonly>
                  </span>
                </center>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="row">
        <div class="col-md-12 mb-5">
          <div class="container-fluid mt-3">
            <div class="p-2 bg-white border rounded shadow">
              <div class="container-fluid">
                <div class="row">
                  <div class="col-md-12">
                    <center>
                      <h4 class="text-dark text-lighten-6 mt-4"><?php echo $this->product['name'] ?></h4>
                      <a href="<?php echo URL ?>category/show/<?php echo $this->category['category_id'] ?>"><p class="text-info text-lighten-6"><?php echo $this->category['description'] ?></p></a>
                    </center>
                    <?php $description = explode(';', $this->product['description']); ?>
                    <center>
                      <div class="mt-4 mb-4">
                        <?php foreach ($description as $desc): ?>
                          <span class="text-dark text-lighten-4"><?php echo $desc ?></span><br>
                        <?php endforeach; ?>
                      </div>
                    </center>
                    <center><h4 class="text-danger mt-4 mb-4">&#8369; <?php echo number_format($this->product['price'], 2) ?></h4></center>
                  </div>
                  <?php if (isset($this->user)): ?>
                    <a href="#" class="btn btn-lg btn-info w-100 add_to_cart" data-toggle="modal" data-target="login_modal"><input type="hidden" id="product_id" value="<?php echo $this->product['product_id'] ?>"><i class="fa fa-shopping-cart"></i> Add to Cart</a>
                  <?php else: ?>
                    <a href="#" class="btn btn-lg btn-info w-100 login_first"><i class="fa fa-shopping-cart"></i> Add to Cart</a>
                  <?php endif; ?>
                </div>
              </div>
            </div>
          </div>
        </div>
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
    <?php if (count($this->reviews) > 0): ?>
      <div class="col-md-12 mt-5">
        <h4 class="text-muted">Notable Reviews</h4>
        <ul class="list-group">
          <?php foreach ($this->reviews as $review): ?>
            <li class="list-group-item mb-1">
              <div class="row">
                <div class="col-md-3">
                  <h5><?php echo $review['name'] ?></h5>
                  <p class="text-muted"><?php echo $review['date'] ?></p>
                </div>
                <div class="col-md-6">
                  <p><?php echo $review['review'] ?></p>
                </div>
                <div class="col-md-3">
                  <center>
                    <h5 class="text-info">Rating</h5>
                    <span><?php echo $review['score'] ?></span><br>
                    <span class="text-warning">
                      <input type="hidden" class="rating" value="<?php echo $review['score'] ?>" data-filled="fa fa-star fa-lg" data-empty="fa fa-star-o fa-lg" data-readonly>
                    </span>
                  </center>
                </div>
              </div>
            </li>
          <?php endforeach; ?>
        </ul>
      </div>
    <?php endif; ?>
  </div>
</div>
