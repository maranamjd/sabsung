$(document).ready(function(){
  $('#info_tab a').on('click', function (e) {
    e.preventDefault();
    $(this).tab('show');
  });

  $(document).on('click', '.showpass', function(){
    if ($(this).is(':checked')) {
      $('#account_password').attr('type', 'text');
      $('#account_confirm_password').attr('type', 'text');
    }else {
      $('#account_password').attr('type', 'password');
      $('#account_confirm_password').attr('type', 'password');
    }
  });

  $(document).on('input', '#account_password, #account_confirm_password', function(){
    let password = $('#account_password').val();
    let confirm = $('#account_confirm_password').val();
    if (password != confirm) {
      $('#warning').attr('style', 'display: ');
      $('#save').attr('disabled', 'true');
    }else {
      $('#warning').attr('style', 'display: none');
      $('#save').attr('disabled', false);
    }
  });

  function showImage(input){
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function (e) {
        let html = '<center><img src="'+ e.target.result +'" alt="Image" id="modalConfirmImage" width="200" height="200" /></center>';
        $('#image_modal').find('div .image').html(html);
      }
      reader.readAsDataURL(input.files[0]);
    }
  }
  $('#image_modal').on('hidden.bs.modal', function () {
      $(this).find('div .image').html('');
  });

$(document).on('change', '#changeprofile', function(){
  var input = $(this);
  if (input[0].files[0].type != 'image/png' && input[0].files[0].type != 'image/jpeg') {
    Swal.fire({
      title: 'Please select an image file!',
      text: '',
      type: 'warning'
    })
    $(this).val('');
  }else {
    showImage(this);
    $('#image_modal').modal('show');
  }

  $(document).on('click', '#update_profile', function(){
    let formData = new FormData();
    formData.append('image', input[0].files[0]);
    formData.append('type', 3);
    Swal.fire({
      title: 'Continue?',
      text: 'you are about to update your Profile Picture',
      type: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Yes',
      cancelButtonText: 'No'
    }).then((result) => {
      if (result.value) {
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
                title: 'Update Failed!',
                text: data['message'],
                type: 'error'
              });
            }
          }
        });
      }
    })
  });

});

  $(document).on('submit', '#account_form', function(e){
    e.preventDefault();
    let formData = new FormData();
    formData.append('password', $('#account_password').val());
    formData.append('type', 2);
    Swal.fire({
      title: 'Continue?',
      text: 'you are about to update your Password',
      type: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Yes',
      cancelButtonText: 'No'
    }).then((result) => {
      if (result.value) {
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
                title: 'Update Failed!',
                text: data['message'],
                type: 'error'
              });
            }
          }
        });
      }
    })
  });

  $(document).on('submit', '#info_form', function(e){
    e.preventDefault();
    let formData = new FormData();
    formData.append('fname', $('#account_fname').val());
    formData.append('mname', $('#account_mname').val());
    formData.append('lname', $('#account_lname').val());
    formData.append('address', $('#account_address').val());
    formData.append('email', $('#account_email').val());
    formData.append('contact', $('#account_contact').val());
    formData.append('type', 1);
    Swal.fire({
      title: 'Continue?',
      text: 'you are about to update your personal information',
      type: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Yes',
      cancelButtonText: 'No'
    }).then((result) => {
      if (result.value) {
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
                title: 'Update Failed!',
                text: data['message'],
                type: 'error'
              });
            }
          }
        });
      }
    })
  });
});
