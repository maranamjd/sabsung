<div class="container-fluid p-3">
  <div class="bg-white border rounded p-3 mt-5 mb-2">
    <span>
      <h4 class="text-info">Category</h4>
    </span>
  </div>
  <div class="bg-white border rounded p-3">
    <div class="row mt-3">
      <div class="col-md-12">
        <div class="float-right">
          <button type="button" class="btn btn-md btn-info" data-toggle="modal" data-target="#add_category_modal">
            <span class="text-white">
              <i class="fa fa-lg fa-plus"></i>
              Add
            </span>
          </button>
        </div>
      </div>
      <div class="col-md-12">
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
                  <button type="button" class="btn btn-secondary btn-md edit">
                    <i class="fa fa-edit"></i>
                    <input type="hidden" class="category_id" value="<?php echo $category['category_id'] ?>">
                    <input type="hidden" class="description" value="<?php echo $category['description'] ?>">
                    <input type="hidden" class="image" value="<?php echo $category['image'] ?>">
                  </button>
                  <button type="button" class="btn btn-danger btn-md delete">
                    <i class="fa fa-trash-o"></i>
                    <input type="hidden" class="category_id" value="<?php echo $category['category_id'] ?>">
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

<div class="modal fade" id="add_category_modal" tabindex="-1" role="dialog" aria-hidden="true">
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
          <div class="col-md-12">
            <div class="form-group">
              <label for="description">Description</label>
              <input type="text" class="form-control" id="description" placeholder="Category Description" required>
            </div>
          </div>
          <div class="col-md-12">
            <div class="form-group">
              <input type="file" id="image" class="image" placeholder="Category Image" required>
            </div>
          </div>
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

<div class="modal fade" id="edit_category_modal" tabindex="-1" role="dialog" aria-hidden="true">
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
          <div class="col-md-12">
            <div class="form-group">
              <label for="description">Description</label>
              <input type="text" class="form-control" id="edescription" placeholder="Category Description" required>
            </div>
          </div>
          <div class="col-md-12">
            <div class="form-group">
              <input type="file" id="eimage" class="image" placeholder="Category Image">
            </div>
          </div>
          <input type="hidden" id="category_id">
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
