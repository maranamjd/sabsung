const url = 'http://sabsung.test/';
$(document).ready(function(){

  $(document).on('click', '#logout', function(){
    Swal.fire({
      title: 'Continue?',
      text: 'you are about to logout',
      type: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Yes',
      cancelButtonText: 'No'
    }).then((result) => {
      if (result.value) {
        $.ajax({
          url: 'logout',
          method: 'post',
          dataType: 'json',
          data: {key: true},
          success: function(data){
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
          }
        });
      }
    });
  });

});
