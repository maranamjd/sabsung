$(document).ready(function(){

  $(document).on('change', '#type', function(){
    $('#date').attr('type', $(this).val());
    $('#date_label').text($(this).val());
  });

  $(document).on('submit', '#sales_form', function(e){
    e.preventDefault();
    let type = 'Monthly';
    if ($('#type').val() == 'Date') {
      type = 'Daily';
    }else if ($('#type').val() == 'Week') {
      type = 'Weekly';
    }
    Swal.fire({
      title: 'Continue?',
      text: 'you are about to generate a sales report',
      type: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Yes',
      cancelButtonText: 'No'
    }).then((result) => {
      if (result.value) {
        window.open(url+'admin/reports/Sales_'+type+'_'+$('#date').val(), '_blank');
      }
    });
  });

});
