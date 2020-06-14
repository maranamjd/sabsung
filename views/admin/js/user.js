$(document).ready(function(){
  $('#user_table').DataTable();

  $(document).on('click', '.status', function(e){
    e.preventDefault();
    let status = $(this).attr('role');
    let action = status == 1 ? 'activate' : "deactivate";
    Swal.fire({
      title: 'Continue?',
      text: 'you are about to '+action+' a user account',
      type: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Yes',
      cancelButtonText: 'No'
    }).then((result) => {
      if (result.value) {
        let formData = new FormData();
        formData.append('status', status);
        formData.append('user_id', $(this).find('.user_id').val());
        formData.append('type', 4);
        $.ajax({
          url: url+'user/update',
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


});
