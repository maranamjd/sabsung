$(document).ready(function(){
  $('#product_table').DataTable();

  $(document).on('change', '.image', function(){
    if ($(this)[0].files[0].type != 'image/jpeg' && $(this)[0].files[0].type != 'image/png') {
      Swal.fire({
        title: "Please choose a valid image!",
        text: '',
        type: 'warning'
      });
      $(this).val('');
    }
  });

  $(document).on('click', '.edit', function(){
    $('#ecategory').val($(this).find('.category').val()).change();
    $('#ename').val($(this).find('.name').val());
    $('#edescription').val($(this).find('.description').val());
    $('#eprice').val($(this).find('.price').val());
    $('#equantity').val($(this).find('.quantity').val());
    $('#equantity').attr('min', $(this).find('.quantity').val());
    $('#product_id').val($(this).find('.product_id').val());
    $('#eimg').attr('src', url+'system/upload/img/'+$(this).find('.image').val());
    $('#edit_product_modal').modal('show');
  });

  $(document).on('submit', '#update_form', function(e){
    e.preventDefault();
    Swal.fire({
      title: 'Continue?',
      text: 'you are about to update an existing product',
      type: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Yes',
      cancelButtonText: 'No'
    }).then((result) => {
      if (result.value) {
        let formData = new FormData();
        formData.append('name', $('#ename').val());
        formData.append('description', $('#edescription').val());
        formData.append('category_id', $('#ecategory').val());
        formData.append('price', $('#eprice').val());
        formData.append('quantity', $('#equantity').val());
        formData.append('product_id', $('#product_id').val());
        formData.append('type', 2);
        if ($('#eimage').get(0).files.length !== 0) {
          formData.append('image', $('#eimage')[0].files[0]);
        }
        $.ajax({
          url: url+'product/update',
          method: 'post',
          dataType: 'json',
          data: formData,
          processData: false,
          contentType: false,
          success: function(data){
            if (data['res'] == 1) {
              Swal.fire({
                title: data['message'],
                text: '',
                type: 'success',
                timer: 2000,
                position: 'top-end',
                toast: true
              }).then((result) => {
                if (result.dismiss === Swal.DismissReason.timer) {
                  window.location.reload();
                }
              });
            }else {
              Swal.fire({
                title: "Failed to Update!",
                text: data['message'],
                type: 'error'
              });
            }
            // console.log(data);
          }
        });
      }
    });
  });

  $(document).on('submit', '#add_form', function(e){
    e.preventDefault();
    Swal.fire({
      title: 'Continue?',
      text: 'you are about to add new product',
      type: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Yes',
      cancelButtonText: 'No'
    }).then((result) => {
      if (result.value) {
        let formData = new FormData();
        formData.append('name', $('#name').val());
        formData.append('description', $('#description').val());
        formData.append('price', $('#price').val());
        formData.append('quantity', $('#quantity').val());
        formData.append('category_id', $('#category').val());
        formData.append('image', $('#image')[0].files[0]);
        $.ajax({
          url: url+'product/create',
          method: 'post',
          dataType: 'json',
          data: formData,
          processData: false,
          contentType: false,
          success: function(data){
            if (data['res'] == 1) {
              Swal.fire({
                title: data['message'],
                text: '',
                type: 'success',
                timer: 2000,
                position: 'top-end',
                toast: true
              }).then((result) => {
                if (result.dismiss === Swal.DismissReason.timer) {
                  window.location.reload();
                }
              });
            }else {
              Swal.fire({
                title: "Failed to Add!",
                text: data['message'],
                type: 'error'
              });
            }
            // console.log(data);
          }
        });
      }
    });
  });

  $(document).on('click', '.delete', function(e){
    e.preventDefault();
    Swal.fire({
      title: 'Continue?',
      text: 'you are about to delete one product',
      type: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Yes',
      cancelButtonText: 'No'
    }).then((result) => {
      if (result.value) {
        let formData = new FormData();
        formData.append('product_id', $(this).find('.product_id').val());
        formData.append('value', 1);
        formData.append('type', 1);
        $.ajax({
          url: url+'product/update',
          method: 'post',
          dataType: 'json',
          data: formData,
          processData: false,
          contentType: false,
          success: function(data){
            if (data['res'] == 1) {
              Swal.fire({
                title: data['message'],
                text: '',
                type: 'success',
                timer: 2000,
                position: 'top-end',
                toast: true
              }).then((result) => {
                if (result.dismiss === Swal.DismissReason.timer) {
                  window.location.reload();
                }
              });
            }else {
              Swal.fire({
                title: "Failed to delete!",
                text: data['message'],
                type: 'error'
              });
            }
            // console.log(data);
          }
        });
      }
    });
  });


});
