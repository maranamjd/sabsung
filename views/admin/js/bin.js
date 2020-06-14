$(document).ready(function(){
  $('#category_table').DataTable();
  $('#product_table').DataTable();

  $(document).on('click', '.restore_product', function(e){
    e.preventDefault();
    Swal.fire({
      title: 'Continue?',
      text: 'you are about to restore one product',
      type: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Yes',
      cancelButtonText: 'No'
    }).then((result) => {
      if (result.value) {
        let formData = new FormData();
        formData.append('product_id', $(this).find('.product_id').val());
        formData.append('value', 0);
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
                title: "Failed to Restore!",
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

  $(document).on('click', '.restore_category', function(e){
    e.preventDefault();
    Swal.fire({
      title: 'Continue?',
      text: 'you are about to restore one category',
      type: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Yes',
      cancelButtonText: 'No'
    }).then((result) => {
      if (result.value) {
        let formData = new FormData();
        formData.append('category_id', $(this).find('.category_id').val());
        formData.append('value', 0);
        formData.append('type', 1);
        $.ajax({
          url: url+'category/update',
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
                title: "Failed to Restore!",
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
