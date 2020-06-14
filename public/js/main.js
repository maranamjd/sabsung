// const url = 'http://sabsung.test/';
const url = 'http://localhost/sabsung/';

$(document).ready(function(){
  const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000
  });


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
          url: url+'user/logout',
          method: 'post',
          dataType: 'json',
          data: {key: true},
          success: function(data){
            Swal.fire({
              title: data['message'],
              text: 'Thank you for shopping with us!',
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


  $(document).on('submit', '#register_form', function(e){
    e.preventDefault();
    let formData = new FormData();
    formData.append('fname', $('#fname').val());
    formData.append('mname', $('#mname').val());
    formData.append('lname', $('#lname').val());
    formData.append('address', $('#address').val());
    formData.append('email', $('#email').val());
    formData.append('contact', $('#contact').val());
    Swal.fire({
      title: 'Continue?',
      text: 'you are about to register for an account',
      type: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Yes',
      cancelButtonText: 'No'
    }).then((result) => {
      if (result.value) {
        $.ajax({
          url: url+'user/create',
          method: 'post',
          dataType: 'json',
          data: formData,
          processData: false,
          contentType: false,
          success: function(data){
            if (data['res'] == 1) {
              Swal.fire({
                title: data['message'],
                text: 'Please wait while we redirect you to your account...',
                type: 'success',
                timer: 2000
              }).then((result) => {
                if (result.dismiss === Swal.DismissReason.timer) {
                  window.location = url+'user/account';
                }
              });
            }else {
              Swal.fire({
                title: 'Registration Failed!',
                text: data['message'],
                type: 'error'
              });
            }
            // console.log(data);
          }
        });
      }
    })
  });

  $(document).on('submit', '#login_form', function(e){
    e.preventDefault();
    let formData = new FormData();
    formData.append('email', $('#login_email').val());
    formData.append('password', $('#login_pass').val());
    $.ajax({
      url: url+'user/login',
      method: 'post',
      dataType: 'json',
      data: formData,
      processData: false,
      contentType: false,
      success: function(data){
        if (data['res'] == 1) {
          Swal.fire({
            title: data['message'],
            text: 'Setting up the store...',
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

  $(document).on('input', '#search', function(){
    if ($(this).val() != '') {
      $.ajax({
        url: url+'home/search',
        method: 'post',
        dataType: 'json',
        data: {key: $(this).val()},
        success: function(data){
          $('#matches').attr('style', 'display: ');
          outputHtml(data);
        }
      });
    }else {
      $('#matches').html('');
      $('#matches').attr('style', 'display: none');
    }
  });

  const outputHtml = data => {
    let html = '';
    if (data['products'].length > 0) {
      html += data['products'].map(product => `
        <a href="${url}product/show/${product.product_id}" class="searchLink">
          <div class="mb-1 mt-1">
            <div class="row">
              <div class="col-md-2">
                <img src="${url}system/upload/img/${product.image}" alt="${product.name}" class="img img-circle" width="50" height="30">
              </div>
              <div class="col-md-10">
                <p class="text-muted">Products - <span class="text-primary">${product.name}</span></p>
              </div>
            </div>
          </div>
        </a>
      `).join('');
    }
    if (data['categories'].length > 0) {
      html += data['categories'].map(category => `
        <a href="${url}category/show/${category.category_id}" class="searchLink">
          <div class="mb-1 mt-1">
            <div class="row">
              <div class="col-md-2">
                <img src="${url}system/upload/img/${category.image}" alt="${category.description}" class="thumbnail" width="50" height="30">
              </div>
              <div class="col-md-10">
                <p class="text-muted">Categories - <span class="text-primary">${category.description}</span></p>
              </div>
            </div>
          </div>
        </a>
      `).join('');
    }
    $('#matches').html(html);
  }

  $(document).on('click', '.showpass', function(){
    if ($(this).is(':checked')) {
      $('#login_pass').attr('type', 'text');
    }else {
      $('#login_pass').attr('type', 'password');
    }
  });

  $(document).on('click', '.login_first', function(){
    $('#login_message').html(`
      <div class="alert alert-warning mb-4">
      <h6>Please Sign In To Continue.</h6>
      </div>
    `);
    $('#login_modal').modal('show');
  });
  $(document).on('click', '.login', function(){
    $('#login_message').html(``);
  });

});
