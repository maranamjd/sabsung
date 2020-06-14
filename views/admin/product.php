<div class="container-fluid p-3">
  <div class="bg-white border rounded p-3 mt-5 mb-2">
    <span>
      <h4 class="text-info">Product</h4>
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
        <table id="product_table" class="table table-bordered table-striped">
          <thead class="">
            <tr>
              <th width="10%">Image</th>
              <th width="20%">Name</th>
              <th width="30%">Description</th>
              <th width="15%">Price</th>
              <th width="10%">Quantity</th>
              <th width="15%">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($this->products as $product): ?>
              <tr>
                <td class="text-center">
                  <img src="<?php echo URL ?>system/upload/img/<?php echo $product['image'] ?>" alt="category image" class="img img-thumbnail" width="60" height="20">
                </td>
                <td class="h6"><?php echo $product['name'] ?></td>
                <td class="h6">
                  <?php $description = explode(';', $product['description']); ?>
                  <?php foreach ($description as $desc): ?>
                    - <?php echo $desc ?><br>
                  <?php endforeach; ?>
                </td>
                <td class="h6 text-center">&#8369; <?php echo number_format($product['price'], 2) ?></td>
                <td class="h6 text-center"><?php echo $product['quantity'] ?></td>
                <td class="text-center">
                  <button type="button" class="btn btn-secondary btn-md edit">
                    <i class="fa fa-edit"></i>
                    <input type="hidden" class="product_id" value="<?php echo $product['product_id'] ?>">
                    <input type="hidden" class="name" value="<?php echo $product['name'] ?>">
                    <input type="hidden" class="description" value="<?php echo $product['description'] ?>">
                    <input type="hidden" class="price" value="<?php echo $product['price'] ?>">
                    <input type="hidden" class="quantity" value="<?php echo $product['quantity'] ?>">
                    <input type="hidden" class="category" value="<?php echo $product['category_id'] ?>">
                    <input type="hidden" class="image" value="<?php echo $product['image'] ?>">
                  </button>
                  <button type="button" class="btn btn-danger btn-md delete">
                    <i class="fa fa-trash-o"></i>
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

<div class="modal fade" id="add_product_modal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-body">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <div class="">
          <center><img src="<?php echo URL ?>public/img/SAMSUNG LOGO.png" alt="SAMSUNG"></center>
        </div>
        <form id="add_form">
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <input type="file" id="image" class="image" placeholder="Category Image" required>
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" placeholder="Product Name" required>
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <label for="category">Category</label>
                <select class="form-control" id="category" placeholder="Product Category" required>
                  <option value="" selected disabled>Product Category</option>
                  <?php foreach ($this->categories as $category): ?>
                    <option value="<?php echo $category['category_id'] ?>"><?php echo $category['description'] ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" placeholder="Product Description" id="description" rows="4" cols="80" required></textarea>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="price">Price</label>
                <input type="number" class="form-control" id="price" min="1" required>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="quantity">Quantity</label>
                <input type="number" class="form-control" id="quantity" min="1" required>
              </div>
            </div>
          </div>
          <input type="hidden" id="product_id">
          <div class="col-md-4 offset-md-8">
            <center>
              <button type="submit" name="submit" class="btn btn-md btn-info w-100 mt-4">
                <span class="text-white">
                  Save
                </span>
              </button>
            </center>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="edit_product_modal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-body">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <div class="">
          <center><img src="<?php echo URL ?>public/img/SAMSUNG LOGO.png" alt="SAMSUNG"></center>
        </div>
        <center><img src="" id="eimg" alt="category image" height="130" width="160"></center>
        <form id="update_form">
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <input type="file" id="eimage" class="image" placeholder="Category Image">
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="ename" placeholder="Product Name" required>
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <label for="category">Category</label>
                <select class="form-control" id="ecategory" placeholder="Product Category" required>
                  <option value="" selected disabled>Product Category</option>
                  <?php foreach ($this->categories as $category): ?>
                    <option value="<?php echo $category['category_id'] ?>"><?php echo $category['description'] ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" placeholder="Product Description" id="edescription" rows="4" cols="80"></textarea>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="price">Price</label>
                <input type="number" class="form-control" id="eprice" min="1" required>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="quantity">Quantity</label>
                <input type="number" class="form-control" id="equantity" min="1" required>
              </div>
            </div>
          </div>
          <input type="hidden" id="product_id">
          <div class="col-md-4 offset-md-8">
            <center>
              <button type="submit" name="submit" class="btn btn-md btn-info w-100 mt-4">
                <span class="text-white">
                  Save
                </span>
              </button>
            </center>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
