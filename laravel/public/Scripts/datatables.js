
 $(document).ready(function() {
   var crdr = [
    "cr",
    "dr"
    ];

    $( ".crdr" ).autocomplete({
      source:crdr,
      //autoFocus: true ,
      });

      var name = [
          "abc",
          "xyz",
          "max",
          "paul"
    ];

    $( ".name" ).autocomplete({
      source:name,
      autoFocus: true ,
      });

   //var t = $('#payment').DataTable( {
    _t = $('#payment').DataTable( {
        "paging":   false,
        "ordering": false,
        "info":     false,
        "bFilter": false
    
    } );
    $('#crdr').focus();
    
    $('#crdr').keypress(function(e){
     if ($('#crdr').val() == '')
        $('#crdr').focus();
        else if(e.which == 13){
         $('#name').focus();
    } });

    $('#name').keypress(function(e){
     if ($('#name').val() == '')
        $('#name').focus();
        else if(e.which == 13){
         $('#debit').focus();
    } 
      });

    $('#debit').keypress(function(e){
     if ($('#debit').val() == '')
        $('#debit').focus();
        else if(e.which == 13){
         $('#openingbalance').focus();
    } });

   // $('#name').keypress(function(e){
    //   if(e.keycode == 8)
    //        $('#crdr').focus();
    // });

   $('#openingbalance').keypress(function(e){
     if($('#openingbalance').val() == '')
        $('#openingbalance').focus();
        else if(e.which == 13){
             _t.row.add( [
             $("#crdr").val(),
             $("#name").val(),
             $("#debit").val(),
             $("#openingbalance").val(),
             '<span class="deleterow close glyphicon glyphicon-remove"></span>'

                 ] ).draw();
            var crdr = $("#crdr").val('');
            var name = $("#name").val('');
            var debit = $("#debit").val('');
            var openingbalance = $("#openingbalance").val('');
            $('#crdr').focus();
            }
        });
  $('#payment tbody').on( 'click', '.deleterow', function () {
            var tr = $(this).closest('tr');
            _t.row(tr).remove().draw();
        });
  

 
} );

    