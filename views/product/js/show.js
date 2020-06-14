$(document).ready(function(){

  $(document).on('click', '.add_to_cart', function(){
    let formData = new FormData();
    formData.append('product_id', $(this).find('#product_id').val());
    Swal.fire({
      title: 'Continue?',
      text: 'you are about to add a product to your cart',
      type: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Yes',
      cancelButtonText: 'No'
    }).then((result) => {
      if (result.value) {
        $.ajax({
          url: url+'cart/add',
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
                title: data['message'],
                text: '',
                type: 'error'
              });
            }
          }
        });
      }
    });
  });

});
