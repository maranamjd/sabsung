$(document).ready(function(){
  $(document).on('submit', '#login_form', function(e){
    e.preventDefault();
    let formData = new FormData();
    formData.append('email', $('#email').val());
    formData.append('password', $('#password').val());
    $.ajax({
      url: 'admin/login',
      method: 'post',
      dataType: 'json',
      data: formData,
      processData: false,
      contentType: false,
      success: function(data){
        if (data['res'] == 1) {
          Swal.fire({
            title: data['message'],
            text: 'Welcome!!',
            type: 'success',
            timer: 2000,
            position: 'top-end',
            toast: true
          }).then((result) => {
            if (result.dismiss === Swal.DismissReason.timer) {
              window.location = 'admin/dashboard  ';
            }
          });
        }else {
          Swal.fire({
            title: "Login Failed!",
            text: data['message'],
            type: 'error'
          });
        }
        // console.log(data);
      }
    });
        // Toast.fire({
        //   type: 'success',
        //   title: 'Signed in successfully'
        // })
  });

  $(document).on('click', '.showpass', function(){
    if ($(this).is(':checked')) {
      $('#password').attr('type', 'text');
    }else {
      $('#password').attr('type', 'password');
    }
  });
});
