<div class="container-fluid p-3">
  <div class="bg-white border rounded p-3 mt-5 mb-2">
    <span>
      <h4 class="text-info">Bin</h4>
    </span>
  </div>
  <div class="row mt-3">
    <div class="col-md-6">
      <div class="bg-white border rounded p-3">
        <h5>Category</h5>
        <table id="category_table" class="table table-bordered table-striped">
          <thead class="">
            <tr>
              <th width="20%">Image</th>
              <th width="60%">Description</th>
              <th width="20%">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($this->categories as $category): ?>
              <tr>
                <td class="text-center">
                  <img src="<?php echo URL ?>system/upload/img/<?php echo $category['image'] ?>" alt="category image" class="img" width="60" height="20">
                </td>
                <td class="h6"><?php echo $category['description'] ?></td>
                <td class="text-center">
                  <button type="button" class="btn btn-success btn-md restore_category">
                    <i class="fa fa-reply"></i>
                    <input type="hidden" class="category_id" value="<?php echo $category['category_id'] ?>">
                  </button>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
    <div class="col-md-6">
      <div class="bg-white border rounded p-3">
        <h5>Product</h5>
        <table id="product_table" class="table table-bordered table-striped">
          <thead class="">
            <tr>
              <th width="30%">Image</th>
              <th width="50%">Name</th>
              <th width="20%">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($this->products as $product): ?>
              <tr>
                <td class="text-center">
                  <img src="<?php echo URL ?>system/upload/img/<?php echo $product['image'] ?>" alt="category image" class="img img-thumbnail" width="60" height="20">
                </td>
                <td class="h6"><?php echo $product['name'] ?></td>
                <td class="text-center">
                  <button type="button" class="btn btn-success btn-md restore_product">
                    <i class="fa fa-reply"></i>
                    <input type="hidden" class="product_id" value="<?php echo $product['product_id'] ?>">
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
