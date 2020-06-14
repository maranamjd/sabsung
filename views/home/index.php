<!-- slider begins -->
<div id="carouselExampleIndicators" class="carousel slide mb-5" data-ride="carousel">
  <ul class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ul>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="<?php echo URL ?>public/img/experience.jpeg" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="<?php echo URL ?>public/img/spaceman.png"  alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="<?php echo URL ?>public/img/mega breakdown sale.jpg"  alt="Third slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
	<!-- slider ends -->
<!-- body -->
<div class="container-fluid mt-4 content">
  <div class="row">
    <div class="col-md-8">
      <div class="card shadow">
        <div class="card-header badge-dark">
          Featured Products
        </div>
        <div class="container">
          <div class="row">
            <?php if (isset($this->featured)): ?>
              <?php foreach ($this->featured as $product): ?>
                <div class="col-md-4">
                  <div class="card-body">
                    <h5 class="card-title"><?php echo $product['category'] ?></h5>
                    <a href="<?php echo URL ?>product/show/<?php echo $product['product_id'] ?>" style="text-decoration: none;" title='<?php echo 'Click to view '.$product['name'].' details' ?>'>
                      <div class="card">
                        <div class="card-header badge-dark">
                        </div>
                        <div class="" style="height:270px;">
                          <center><img src="<?php echo URL ?>system/upload/img/<?php echo $product['image'] ?>" height="165px" width="190px"/></center>
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
        </div>
      </div>
    </div>
    <div class="col-md-4 mt-5">
      <div class="card shadow">
        <div class="card-header badge-dark">
          Categories
        </div>
        <div class="card-body">
          <?php if (isset($this->categories)): ?>
            <?php foreach ($this->categories as $category): ?>
              <a href="<?php echo URL ?>category/show/<?php echo $category['category_id'] ?>" class="searchLink">
                <div class="row">
                  <div class="col-md-4 col-sm-4">
                    <center><img src="<?php echo URL ?>system/upload/img/<?php echo $category['image'] ?>" alt="<?php echo $category['description'] ?>" height="30" width="70"></center>
                  </div>
                  <div class="col-md-8 col-sm-4">
                    <p class="text-secondary">
                      <?php echo $category['description'] ?>
                    </p>
                  </div>
                </div>
              </a>
            <?php endforeach; ?>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- /body -->
