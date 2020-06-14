<div class="container-fluid p-3">
  <div class="bg-white border rounded p-3 mt-5 mb-2">
    <span>
      <h4 class="text-info">Dashboard</h4>
    </span>
  </div>
  <div class="mt-5">
    <div class="row summary">
      <div class="col-md-4">
        <a href="<?php echo URL ?>admin/category">
          <div class="bg-white border rounded p-4">
            <h3 class="text-dark text-lighten-5">Categories</h3>
            <center>
              <h1 class="text-secondary font-weight-bold"><?php echo $this->summary['category'] ?></h1>
            </center>
          </div>
        </a>
      </div>
      <div class="col-md-4">
        <a href="<?php echo URL ?>admin/product">
          <div class="bg-white border rounded p-4">
            <h3 class="text-dark text-lighten-5">Products</h3>
            <center>
              <h1 class="text-secondary font-weight-bold"><?php echo $this->summary['product'] ?></h1>
            </center>
          </div>
        </a>
      </div>
      <div class="col-md-4">
        <a href="<?php echo URL ?>admin/user">
          <div class="bg-white border rounded p-4">
            <h3 class="text-dark text-lighten-5">Users</h3>
            <center>
              <h1 class="text-secondary font-weight-bold"><?php echo $this->summary['user'] ?></h1>
            </center>
          </div>
        </a>
      </div>
      <div class="col-md-12 mt-3">
        <div class="my-4">
          <div class="p-4 bg-white border shadow rounded">
            <div class="container">
              <div class="col-12">
                <h3>Sales This Week</h3>
                <p class="hint-text text-muted"><?php echo date('F d', strtotime('monday this week'))." - ".date('d, Y', strtotime('sunday this week')) ?></p>
              </div>
              <div class="col-12 border rounded">
                <canvas id="sales_chart" width="auto" height="180"></canvas>
              </div>
            </div>
          </div> <!-- box -->
        </div> <!-- container -->
      </div>
      <div class="col-md-12 mt-3">
        <div class="my-4">
          <div class="p-4 bg-white border shadow rounded">
            <div class="container">
              <div class="col-12">
                <h3>Top Sellers</h3>
              </div>
              <div class="col-12 border rounded">
                <canvas id="top_chart" width="auto" height="180"></canvas>
              </div>
            </div>
          </div> <!-- box -->
        </div> <!-- container -->
      </div>
    </div>
  </div>
</div>
