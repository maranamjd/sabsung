$(document).ready(function(){


  $(document).on('click', '.add_review', function(){
    $('#review_image').attr('src', url+'system/upload/img/'+$(this).find('.image').val());
    $('#review_name').text($(this).find('.name').val());
    $('#review_product_id').val($(this).find('.product_id').val());
    $('#review_modal').modal('show');
  });

  $('#review_modal').on('hidden.bs.modal', function(){
    $('#review_rating').val(0);
    $('#review_comment').val('');
  });

  $(document).on('submit', '#review_form', function(e){
    e.preventDefault();
    if ($('#review_rating').val() == '') {
      Swal.fire({
        title: 'Oops!',
        text: 'Please provide a star rating!',
        type: 'warning'
      });
    }else {
      let formData = new FormData();
      formData.append('rating', $('#review_rating').val());
      formData.append('comment', $('#review_comment').val());
      formData.append('product_id', $('#review_product_id').val());
      Swal.fire({
        title: 'Continue?',
        text: 'you are about submit a review for '+$('#review_name').text(),
        type: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes',
        cancelButtonText: 'No'
      }).then((result) => {
        if (result.value) {
          $.ajax({
            url: url+'review/create',
            method: 'post',
            dataType: 'json',
            data: formData,
            processData: false,
            contentType: false,
            success: function(data){
              if (data['res'] == 1) {
                Swal.fire({
                  title: data['message'],
                  text: 'Thank you for your support!',
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
    }
  });

  $(document).on('click', '.cancel_order', function(){
    let formData = new FormData();
    formData.append('transaction_id', $(this).find('.transaction_id').val());
    formData.append('status', 2);
    Swal.fire({
      title: 'Continue?',
      text: 'you are about to cancel an order',
      type: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Yes',
      cancelButtonText: 'No'
    }).then((result) => {
      if (result.value) {
        $.ajax({
          url: url+'transaction/update',
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
