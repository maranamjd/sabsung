<div class="container-fluid p-3">
  <div class="bg-white border rounded p-3 mt-5 mb-2">
    <span>
      <h4 class="text-info">Sales Report</h4>
    </span>
  </div>
  <div class="bg-white border rounded p-3" style="margin-bottom: 12em">
    <div class="row mt-3">
      <div class="container-fluid">
        <form id="sales_form">
          <div class="col-md-6">
            <div class="form-group">
              <label for="type">Type</label>
              <select class="form-control" id="type" name="" required>
                <option value="Date">Daily</option>
                <option value="Week">Weekly</option>
                <option value="Month">Monthly</option>
              </select>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="date" id="date_label">Date</label>
              <input type="date" id="date" class="form-control" value="" required>
            </div>
          </div>
          <div class="col-md-6">
            <span class="float-right">
              <button type="submit" class="btn btn-lg btn-info" id="generate" name="button">
                <span class="text-white">
                  <i class="fa fa-file"></i> Generate
                </span>
              </button>
            </span>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
