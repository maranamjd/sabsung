$(document).ready(function(){

  $(document).on('click', '.cart_item_select', function(){
    if ($(this).is(':checked')) {
      // alert('selected');
      let quantity = $(this).parent().parent().find('.item_quantity').val();
      if (quantity <= 0) {
        $(this).prop('checked', false);
      }
    }
  });

  $(document).on('click', '#select_all_text', function(){
    $('#select_all').click();
  });

  $(document).on('change', '#select_all', function(e){
    e.preventDefault();
    let me = $(this);
    $('.cart_item_select').each(function(index){
      if (me.is(':checked')) {
        if (!$(this).is(':checked')) {
          $(this).click();
        }
      }else {
        if ($(this).is(':checked')) {
          $(this).click();
        }
      }
    });
  });

  $(document).on('click', '#submit_order', function(){
    let items = [];
    $('.cart_item_select').each(function(index){
      if ($(this).is(':checked')) {
        items.push({
          id: $(this).parent().find('.hidden_id').val(),
          quantity: $(this).parent().parent().find('.item_quantity').val()
        });
      }
    });
    Swal.fire({
      title: 'Continue?',
      text: 'you are about to checkout item/s from your cart',
      type: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Yes',
      cancelButtonText: 'No'
    }).then((result) => {
      if (result.value) {
        $.ajax({
          url: url+'cart/checkout',
          method: 'post',
          dataType: 'json',
          data: {
            items: items,
            address: $('#order_address').val(),
            name: $('#order_name').val(),
            email: $('#order_email').val(),
            contact: $('#order_contact').val()
          },
          success: function(data){
            if (data['res'] == 1) {
              Swal.fire({
                title: data['message'],
                text: 'redirecting to your purchase history...',
                type: 'success',
                timer: 2000,
                position: 'top-end',
                toast: true
              }).then((result) => {
                if (result.dismiss === Swal.DismissReason.timer) {
                  window.location = url+'user/purchases';
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

  $(document).on('change', '.item_quantity', function(){
    let max = parseInt($(this).attr('max'));
    if ($(this).val() > max || $(this).val() == max) {
      Swal.fire({
        title: 'Oops!',
        text: 'There are only '+$(this).attr('max')+' available stocks for this item.',
        type: 'warning',
      });
      $(this).val(max);
    }
    else {
      let price = parseInt($(this).parent().parent().parent().find('.hidden_price').val());
      let checkbox = $(this).parent().parent().parent().find('.cart_item_select');
      // console.log(price);
      price *= $(this).val();

      if (!checkbox.is(':checked')) {
        checkbox.click();
      }
      $(this).parent().parent().parent().find('.accordion_price').text(price.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,'));
    }
  });


  let activeStep = 1;
  let step = "step" + activeStep;
  $(document).on('submit', '.checkout_form', function(e){
    e.preventDefault();
    var proceed = true;
    if (activeStep < 3) {
        hideStep(step);
        $('#'+step).attr('class', 'done');
        step = "step" + ++activeStep;
        // console.log(step);
        nextStep(step);
        $('#'+step).attr('class', 'active');

    }
  });
  $(document).on('click', '.back_btn', function(){
      hideStep(step);
      $('#'+step).attr('class', '');
      step = "step" + --activeStep;
      // console.log(step);
      nextStep(step);
      $('#'+step).attr('class', 'active');
  });
  function nextStep(step){
    $('.'+step).fadeIn('50');
  }
  function hideStep(step){
    $('.'+step).fadeOut('50');
  }

  $(document).on('change', '.different_address', function(){
    if ($(this).is(':checked')) {
      $('#order_address').val('');
      $('#order_address').focus();
    }else {
      $('#order_address').val($('#hidden_address').val());
    }
  });

  $(document).on('click', '.place_order', function(){
    let items = [];
    if ($('#summ_count').val() == 0) {
      Swal.fire({
        title: 'Oops!',
        text: 'please select an item to check out!',
        type: 'warning',
      });
    }else {
      $('.cart_item_select').each(function(index){
        if ($(this).is(':checked')) {
          items.push({
            id: $(this).parent().find('.hidden_id').val(),
            name: $(this).parent().find('.hidden_name').val(),
            price: $(this).parent().find('.hidden_price').val(),
            quantity: $(this).parent().parent().find('.item_quantity').val()
          });
          $('#row_'+$(this).parent().find('.hidden_id').val()).attr('style', 'display: none');
        }
      });
      if (items.length > 0) {
        let html = '';
        let total = 0;
        let shipping = (items.length > 2) ? 100.00 : 300.00;
        for (var x in items) {
          total += parseInt(items[x].price) * items[x].quantity;
          html += `
          <li class="list-group-item">
          <div class="row">
          <div class="col-md-8 col-sm-8">
          ${items[x].name}
          </div>
          <div class="col-md-4 col-sm-4">
          <div class="row">
          <div class="col-md-2 col-sm-2 p-0">
          ${items[x].quantity}
          </div>
          <div class="col-md-10 col-sm-10">
          <span class="float-right">
          &#8369; ${(parseInt(items[x].price)  * items[x].quantity).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,')}
          </span>
          </div>
          </div>
          </div>
          </div>
          </li>
          `;
        }
        $('#checkout_shipping_fee').text(shipping.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,'));
        $('#checkout_subtotal').text(total.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,'));
        $('#checkout_total_price').text((shipping + total).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,'));
        $('#checkout_summary').html(html);
        $('#checkout_modal').modal('show');
      }else {
        Swal.fire({
          title: 'Oops!',
          text: 'please select an item to check out!',
          type: 'warning',
        });
      }
    }
  });


  $(document).on('click', '.return_item', function(){
    $(this).parent().parent().parent().parent().parent().remove();
    $('#row_'+$(this).find('#return_id').val()).find('.cart_item_select').prop('checked', false);
    $('#row_'+$(this).find('#return_id').val()).attr('style', 'display: ');
    let items = [];
    $('.cart_item_select').each(function(index){
      if ($(this).is(':checked')) {
        items.push({
          id: $(this).parent().find('.hidden_id').val(),
          name: $(this).parent().find('.hidden_name').val(),
          price: $(this).parent().find('.hidden_price').val(),
          quantity: $(this).parent().parent().find('.item_quantity').val()
        });
        $('#row_'+$(this).parent().find('.hidden_id').val()).attr('style', 'display: none');
      }
    });
    let total = 0;
    $('#summ_count').val(items.length);

    for (var x in items) {
      total += parseInt(items[x].price) * items[x].quantity;
    }
    $('#total_price').text(total.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,'));
  });

  $(document).on('click', '.add_checkout', function(e){
    e.preventDefault();
    if ($('#select_all').is(':checked')) {
      $('#select_all').prop('checked', false);
    }
    let items = [];
    $('.cart_item_select').each(function(index){

      // if (!$(this).parent().parent().is(':hidden')) {
        if ($(this).is(':checked')) {
          items.push({
            id: $(this).parent().find('.hidden_id').val(),
            name: $(this).parent().find('.hidden_name').val(),
            price: $(this).parent().find('.hidden_price').val(),
            quantity: $(this).parent().parent().find('.item_quantity').val()
          });
          $('#row_'+$(this).parent().find('.hidden_id').val()).attr('style', 'display: none');
        }
      // }
    });
    if (items.length > 0 && items.length > $('#summ_count').val()) {
      let html = '';
      let total = 0;
      $('#summ_count').val(items.length);
      for (var x in items) {
        total += parseInt(items[x].price) * items[x].quantity;
        html += `
          <li class="list-group-item">
            <div class="row">
              <div class="col-md-6 col-sm-6">
                ${items[x].name}
              </div>
              <div class="col-md-6 col-sm-6">
                <div class="row">
                  <div class="col-md-1 col-sm-1 p-0">
                    ${items[x].quantity}
                  </div>
                  <div class="col-md-8 col-sm-8">
                    &#8369;${(parseInt(items[x].price) * items[x].quantity).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,')}
                  </div>
                  <div class="col-md-2 col-sm-2">
                    <a href="#" class="btn btn-sm btn-secondary return_item">
                      <input type="hidden" id="return_id" value="${items[x].id}">
                      <i class="fa fa-undo"></i>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </li>
        `;
      }
      $('#total_price').text(total.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,'));
      $('#summary').html(html);
    }else {
      Swal.fire({
        title: 'Oops!',
        text: 'please select an item to check out!',
        type: 'warning',
      });
    }
  });

  $(document).on('click', '.remove_from_cart', function(){
    let formData = new FormData();
    formData.append('cart_id', $(this).find('#cart_id').val());
    Swal.fire({
      title: 'Continue?',
      text: 'you are about to remove a product from your cart',
      type: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Yes',
      cancelButtonText: 'No'
    }).then((result) => {
      if (result.value) {
        $.ajax({
          url: url+'cart/remove',
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
