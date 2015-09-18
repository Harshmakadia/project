@extends('masterhome')
@section('content')
<!--{{ HTML::script('../resources/views/static/js/payment.js') }}-->

  <h2><label for="payment" class="label label-primary pull-left" id="label">Payment</label></h2>
	<input type="text" class="datepicker pull-right" id="datepicker">
	 {!!Form::open(['route' =>'payment.store','id' =>'form-search','name'=>'myform','method' =>'POST','class' => 'form-signin' , 'files' => true , 'autocomplete' => 'off'])!!}
     @if(Session::has('flash_error'))
        <div class="alert alert-danger">
          {{ Session::get('flash_error')}}
        </div>
        @endif
        @if(Session::has('flash_error1'))
        <div class="alert alert-success">
          {{ Session::get('flash_error1')}}
        </div>
        @endif  
   <div class="container">
    <div class="table-responsive">
      <br><br>
    <form role="form" id="payment">
      <table id="payment" class="table table-striped table-hover table-bordered" cellspacing="0" width="100%">
            <thead style="
        background-color: #18BC92;
    color: #2C3E50;">
                <tr>
                    <th>Cr/Dr</th>
                    <th>Name</th>
                    <th>Debit</th>
                    <th>Balance</th>
                    <th><span class=" glyphicon glyphicon-remove"></span></th>
                </tr>
            </thead>
            <tfoot>
            <tr>
              <input id="_token" type="hidden" name="_token" value="{{ csrf_token() }}">
                <td><input type="text" class="crdr form-control" id="crdr" name="crdr" value="Dr" disabled></td>
                 
                <td><div class="form-group"><input type="text" class="name form-control" id="name" name="name" ></div></td>
             
                <td> <div class="form-group"><input type="number" class="debit form-control" id="debit" name="debit"><div></td>
                <td><div class="form-group"><input type="text" class="openingbalance form-control" id="openingbalance" name="openingbalance"></div></td>
                <td></td>
            </tr>
            </tfoot>
            <tbody>
              <tr role="row" class="odd"><td class="sorting_1">Dr</td><td>Name</td><td>3434</td><td>3446</td><td><span class="deleterow close glyphicon glyphicon-remove"></span></td></tr>
                <!--data will be inserted into body-->
           </tbody>
        </table>
        
      
    </div>

    </div> 

  </div>
  <input type="button" value="Submit Entries" id="add" class="btn btn-success center-block"/>
  </form>
		<!--<button  id="add1" class="btn btn-success btn-block">Submit Entries</button>-->
    
	 
				{!!Form::close()!!}
	</body>
<style>
  .dataTables_empty {
   display:none;
      }

  .ui-autocomplete {
    max-height: 100px;
    overflow-y: auto;
    /* prevent horizontal scrollbar */
    overflow-x: hidden;
  }
   * html .ui-autocomplete {
    height: 100px;
  }

  input:-webkit-autofill {
    -webkit-box-shadow: 0 0 0px 1000px white inset;
}

.glyphicon-remove {
  color:red;
}
table.dataTable {
  border-collapse: collapse;
}
body
{
  background-color:aliceblue;
}
#datepicker
{
      margin-right: 12px;
    width: 90px;
}
#label
{
      margin-left: 13px;
}     
#add
{
 /* width: 430px; */
   
    margin-top: 18px;
}
  </style> 
  <style>
  .dataTables_empty {
   display:none;
      }
  </style>
<script>
 $(document).ready(function() {
  /* var crdr = [
    "cr",
    "dr"
    ];

    $( ".crdr" ).autocomplete({
      source:crdr,
      //autoFocus: true ,
      }); */
   bindAutoComplete('name');

    _t = $('#payment').DataTable( {
        "paging":   false,
       /* "ordering": false,*/
       "info":     false,
        "bFilter": false
    } );
    attachEvents();
    $('#name').focus();
    $('#crdr').keydown(function(e){
    if(e.which == 13)
    {
      $("#name").focus();
    }
 });
  $('#name').keydown(function(e){
    if(e.keyCode == 8 && $('#name').val() == '') {
      $('#crdr').focus();
    } 
    else
      {
        if ($('#name').val() == '')
        $('#name').focus();
        else if(e.which == 13){
         $('#debit').focus();
      } 
    }
  });
  $('#debit').keydown(function(e){
    if(e.keyCode == 8 && $('#debit').val() == '') {
      $('#name').focus();
    } 
  });
    /*else {
     if ($('#debit').val() == '')
        $('#debit').focus();
        else if(e.which == 13){
         $('#name').focus();
    } }
  });*/
  $('#debit').keypress(function(e){
    if($('#debit').val() == '')
      $('#debit').focus();
      else if(e.which == 13){
          //if loop for checking color 
            var crdr = $("#crdr").val();
            var name = $("#name").val();
            var debit = $("#debit").val();
            var openingbalance = $("#openingbalance").val();
            openingbalance= parseInt(openingbalance) + parseInt(debit);

             _t.row.add( [
                          crdr,
                          name,
                          debit,
                          openingbalance,
                          '<span class="deleterow close glyphicon glyphicon-remove"></span>'

                 ] ).draw();
            $("#crdr").val("Dr");
            $("#name").val('');
            $("#debit").val('');
            $("#openingbalance").val('');
            $('#name').focus();
            attachEvents();
            }
        });
  $('#payment tbody').on( 'click', '.deleterow', function () {
    var tr = $(this).closest('tr');
        _t.row(tr).remove().draw();
    });
    attachEvents();
  });

  var attachEvents = function() {
  $("#payment tbody tr td").on('click', function(e){
    if($("#editor").length == 0 ) {
      createEditor($(this));    
    } 
    else
      {
      if(!checkIfSame(this)) {
        destroyEditor($("#editor").val());
        createEditor($(this));
      }
    }
    bindAutoComplete('editor');
    e.stopPropagation();
  });

  $(document.body).on('click',function(e){
    destroyEditor($("#editor").val());
    e.stopPropagation();
  });
};

//replaces td with editor
var replaceByEditor = function(clickedElement) {
  var clickedElementValue = clickedElement.text();
  clickedElement.html('<input type="text" id="editor" value="'+ clickedElementValue +'" />');
  $("#editor").focus();
  attachKeyEvents();
};

//replaces editor with td. td contains value
var destroyEditor = function(value) {
  $("#editor").parent().html(value);
};

//creates Editor and stores value inside td before click
var createEditor = function(element) {
  _tdValueBeforeUpdate = element.text();
  replaceByEditor(element);
};

//editor's key events
var attachKeyEvents = function() {
  $("#editor").keydown(function(e) {
    if(e.keyCode == 13) {
      var nextElement = $("#editor").parent().next();
      destroyEditor($("#editor").val());
      createEditor(nextElement);
    } 
      else if (e.keyCode == 27) {
      destroyEditor(_tdValueBeforeUpdate);
    }
  });
};

//checks if the editor's getting clicked again. Stops calling again of destroyEditor() and createEditor().
var checkIfSame = function(clickedElement) {
  var currentElement = $("#editor").parent();
  if(currentElement.get(0) == $(clickedElement).get(0)) {
    return true;
  }
  else 
  {
    return false;
  }
};

/*var bindAutoComplete = function(identifier) {
    var selector = "#" + identifier;
    $(selector).autocomplete({
        source: function( request, response ) {
      $.ajax({
          url : 'ledger.php',
          dataType: "json",
          data:{
              name_startsWith: request.term,
              type: 'ledger',
              _token: $('input[name=_token]').val()
             },
        success: function( data ) {
          console.log(data.length);
          if(data.length == 0)
          {
            $(selector).css('border-color','red');
            $(selector).keydown(function(e){
              if(e.which == 13)
              {
                $(selector).focus();
              }
              else
              {
                  //
              }
          });
           }
          else
          {
            $(selector).css('border-color','');
         $(selector).keypress(function(e){
              if(e.which == 13)
              {
                alert("ss0");
              }
          });

          }
         
          response( $.map( data, function( item ) {
            var code = item.split("|");
            return {
              label: code[0],
              value: code[0],
              data : item
              }
          }));
          }
        });
      },    
      minLength: 0,
      select: function( event, ui ) {
      var names = ui.item.data.split("|");
      $('#name').val(names[0]);
      $('#openingbalance').val(Math.abs(names[1]));
    }         
  });
  };*/
  var bindAutoComplete = function(identifier) {
    var selector = "#" + identifier;
    $(selector).autocomplete({
        source: function( request, response ) {
      $.ajax({
          url : 'ledger.php',
          dataType: "json",
          data:{
              name: request.term,
              openingbalance: request.term,
              type: 'ledger',
              _token: $('input[name=_token]').val()
             },
        success: function( data ) {
          console.log(data.length);
          if(data.length == 0)
          {
            $(selector).css('border-color','red');
            $(selector).keydown(function(e){
              if(e.which == 13)
              {
                $(selector).focus();
              }
              else
              {
                  //
              }
          });
           }
          else
          {
            $(selector).css('border-color','');
         $(selector).keypress(function(e){
              if(e.which == 13)
              {
                alert("ss0");
              }
          });

          }
         
          response( $.map( data, function( item ) {
            var code = item.split("|");
            return {
              label: code[0],
              value: code[0],
              data : item
              }
          }));
          }
        });
      },    
      minLength: 0,
      select: function( event, ui ) {
      var names = ui.item.data.split("|");
      $('#name').val(names[0]);
      $('#openingbalance').val(Math.abs(names[1]));
    }         
  });
  };

$('#add').click(function(){  
    var x = _t.data();
    var jsonArr = [];
    var totalDebit=0;
    var type=1;
    var date=$( "#datepicker" ).datepicker( "option", "dateFormat", "yy-mm-dd" ).val();
    for(var i=0;i<x.length;i++)
    { 
      var crdr, name, debit, openingbalance;
      for(var j=0;j<x[i].length - 1;j++)
      {    
        crdr = x[i][0], name = x[i][1] , debit = x[i][2]  , openingbalance =  x[i][3];
      }
      jsonArr.push({
          crdr: crdr,
          name: name,
          debit: debit,
          openingbalance: openingbalance,
          totalDebit: totalDebit += parseInt(x[i][2])
      });
    }
    $.ajax({
            url: 'payment',
            type: "post",
            data: {'json':jsonArr,'_token': $('input[name=_token]').val(),'totalDebit':totalDebit,'type':type,'date':date}
          });
    location.reload();
    $('#name').focus();
    //location.reload();
    //window.alert("Success");
    //console.log(date);
  });
</script> -->
@stop