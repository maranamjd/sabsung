$(document).ready(function(){
  $('#order_table').DataTable({
    "order": [[4,'desc']]
  });

  $(document).on('click', '.show', function(){
    let transaction_id = $(this).parent().find('.transaction_id').val();
    let status = $(this).parent().find('.status').val();
    $.ajax({
      url: url+'cart/details',
      method: 'post',
      dataType: 'json',
      data: {transaction_id: transaction_id},
      success: function(data){
        let html = '';
        let total = 0;
        let shipping = (data.length > 2) ? 100 : 300;
        for (var x in data) {
          total += parseInt(data[x].price)  * data[x].quantity;
          html += `
          <li class="list-group-item">
            <div class="row">
              <div class="col-md-8 col-sm-8">
                ${data[x].name}
              </div>
              <div class="col-md-4 col-sm-4">
                <div class="row">
                  <div class="col-md-2 col-sm-2 p-0">
                  ${data[x].quantity}
                  </div>
                  <div class="col-md-10 col-sm-10">
                    <span class="float-right">
                      &#8369; ${(parseInt(data[x].price)  * data[x].quantity).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,')}
                   </span>
                  </div>
                </div>
              </div>
            </div>
          </li>
          `;
        }
        if (status == 0) {
          $('#deliver').attr('style', 'display: ');
        }else {
          $('#deliver').attr('style', 'display: none');
        }
        $('#subtotal').text(total.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,'));
        $('#shipping').text(shipping.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,'));
        $('#total').text((total + shipping).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,'));
        $('#details').html(html);
      }
    });
    $('#transaction_id').val(transaction_id);
    $('#details_modal').modal('show');
  });

  $(document).on('click', '#deliver', function(e){
    e.preventDefault();
    let formData = new FormData();
    formData.append('transaction_id', $(this).find('#transaction_id').val());
    formData.append('status', 1);
    Swal.fire({
      title: 'Continue?',
      text: 'you are about to deliver an order',
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
