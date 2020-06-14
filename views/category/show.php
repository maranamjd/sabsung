<!-- <?php echo json_encode($this->product) ?> -->
<div class="container-fluid">
  <div class="p-2 bg-white border rounded mt-2 mb-2">
    <center>
      <img src="<?php echo URL ?>system/upload/img/<?php echo $this->category['image'] ?>" alt="<?php echo $this->category['description'] ?>" class="img">
    </center>
  </div>
  <div class="row">
    <div class="col-md-12 mb-5">
      <div class="p-2 bg-white border rounded">
        <div class="container">
          <?php if (count($this->products) > 0): ?>
            <div class="mt-5 mb-3">
              <h3>Available Products</h3>
            </div>
            <div class="row">
              <?php if (isset($this->products)): ?>
                <?php foreach ($this->products as $product): ?>
                  <div class="col-md-4">
                    <div class="card-body">
                      <a href="<?php echo URL ?>product/show/<?php echo $product['product_id'] ?>" style="text-decoration: none;" title='<?php echo 'Click to view '.$product['name'].' details' ?>'>
                        <div class="card shadow">
                          <div class="card-header badge-dark">
                          </div>
                          <div class="" style="height:270px;">
                            <center><img src="<?php echo URL ?>system/upload/img/<?php echo $product['image'] ?>" height="165px" width="200px"/></center>
                            <center><h4 class="text-danger">&#8369; <?php echo number_format($product['price'], 2) ?></h4></center>
                            <center>
                              <h4 class="text-dark text-lighten-6"><?php echo $product['name'] ?></h4>
                            </center>
                          </div>
                        </div>
                      </a>
                    </div>
                  </div>
                <?php endforeach; ?>
              <?php endif; ?>
            </div>
          <?php else: ?>
            <div class="mt-5 mb-3">
              <center><h3>No Available Product To Show...</h3></center>
            </div>
          <?php endif; ?>
        </div>
      </div>
    </div>
    <div class="col-md-4 offset-md-4">
      <div class="row">
        <div class="col-md-12">
          <div class="card shadow">
            <div class="card-header badge-dark">
              Other Categories you might like
            </div>
            <div class="card-body">
              <ul class="list-group">
                <?php if (isset($this->other)): ?>
                  <?php if (count($this->other) > 0): ?>
                    <?php foreach ($this->other as $category): ?>
                      <li class="list-group-item">
                        <a href="<?php echo URL ?>category/show/<?php echo $category['category_id'] ?>">
                          <div class="row">
                            <div class="col-md-4">
                              <img src="<?php echo URL ?>system/upload/img/<?php echo $category['image'] ?>" alt="<?php echo $category['description'] ?>" class="img img-thumbnail">
                            </div>
                            <div class="col-md-8">
                              <center><p class="text-secondary"><?php echo $category['description'] ?> </p></center>
                            </div>
                          </div>
                        </a>
                      </li>
                    <?php endforeach; ?>
                  <?php else: ?>
                    <center><h6>No Available product/s to show..</h6></center>
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
