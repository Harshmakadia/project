@extends('masterhome')
@section('content')

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
    <form role="form">
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
          <td><input type="text" class="crdr form-control" id="crdr" name="crdr" value="Dr"></td>

          <td><div class="form-group"><input type="text" class="name form-control" id="name" name="name"></div></td>

          <td> <div class="form-group"><input type="number" class="debit form-control" id="debit" name="debit"><div></td>
          <td><div class="form-group"><input type="text" class="openingbalance form-control" id="openingbalance" name="openingbalance"></div></td>
          <td></td>
        </tr>
      </tfoot>
      <tbody>
      
        <!--data will be inserted into body-->
      </tbody>
    </table>


  </div>

</div> 

</div>
<input type="button" value="Submit Entries" id="add" class="btn btn-success center-block"/>
<div class="modal" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="label">Delete Entry!</h4>
            </div>
            <div class="modal-body">
                Are you sure you want to delete?
            </div>
            <div class="modal-footer">
                <a class="btn btn-danger" id="delete" data-dismiss="modal">Delete</a>
                <a class="btn btn-default" id="cancel" data-dismiss="modal">Cancel</a>  
            </div>
        </div>
    </div>
</div>

</form>



{!!Form::close()!!}

<style>
body {
    background-color: #E0FFFF;
}
hr {
border-top: 3px solid #2C3E50;}

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
/*var data = 
{
    @for ($i = 0; $i < count($users); $i++)
      '{!! $users[$i]->name !!}': "{!! $users[$i]->openingbalance !!}",
    @endfor
};*/
  /* var crdr = [
    "cr",
    "dr"
    ];

    $( ".crdr" ).autocomplete({
      source:crdr,
      //autoFocus: true ,
    }); */
bindAutoComplete('name');
checkTabKeyPress();

_t = $('#payment').DataTable( {
  "paging": false,
  "info": false,
  "bFilter":false,
  "aoColumns": [
    {"sClass": "crdr" },
    {"sClass": "name" },
    {"sClass": "debit" },
    {"sClass": "openingbalance" },
    null
    ],
    "columnDefs": [{
    "targets": 0,
    "render": function ( data, type, full, meta ) {
      return type === 'display' ?
        '<span class="keyCol" tabindex="1">'+data+'</span>' : data;
      }
    },
    {
    "targets": 1,
    "render": function ( data, type, full, meta ) {
      return type === 'display' ?
        '<span class="keyCol" tabindex="1">'+data+'</span>' : data;
      }
    },
    {
    "targets": 2,
    "render": function ( data, type, full, meta ) {
      return type === 'display' ?
        '<span class="keyCol" tabindex="1">'+data+'</span>' : data;
      }
    },
    {
    "targets": 3,
    "render": function ( data, type, full, meta ) {
      return type === 'display' ?
        '<span class="keyCol" tabindex="1">'+data+'</span><input type="hidden" class="hidden" value='+data+'>' : data;
      }
    
    }]

});


attachEvents();

$('#name').focus();
$('#crdr').keydown(function(e){
  //checkTabKeyPress();
  if(e.which == 13)
  {
    $("#name").focus();
  }
});
$('#name').keydown(function(e){
  //checkTabKeyPress();
  if(e.keyCode == 8 && $('#name').val() == '') {
    $('#crdr').focus();
  } 
  else
  {
    if($('#name').val() == ''){
      $('#name').focus();
    }
    else if(e.which == 13){
      if(!($("#name").hasClass('verify')))
      {
        $('#debit').focus();
      }
    }  
  }
});
$('#debit').keydown(function(e){
  //checkTabKeyPress();
  if(e.keyCode == 8 && $('#debit').val() == '') {
    $('#name').focus();
  } 
});

$('#debit').keypress(function(e){
  //checkTabKeyPress();
  if($('#debit').val() == '')
    $('#debit').focus();
  else if(e.which == 13){
           //if loop for checking color 
           var crdr = $("#crdr").val();
           var name = $("#name").val();
           var debit = $("#debit").val();
           var openingbalance = $("#openingbalance").val();
           openingbalance= parseInt(openingbalance) + parseInt(debit);

           _t.row.add( 
         /*
             [
              '<span class="keyCol" tabindex="1">'+crdr+'</span>',
              '<span class="keyCol" tabindex="1">'+name+'</span>',
              '<span class="keyCol" tabindex="1">'+debit+'</span>',
              '<span class="keyCol" tabindex="1">'+openingbalance+'</span>',
              '<span class="deleterow close glyphicon glyphicon-remove keyCol" tabindex="1"></span>'
            ] ).draw();*/

           [
            crdr,
            name,
            debit,
            openingbalance,
            '<span class="deleterow close glyphicon glyphicon-remove keyCol" tabindex="1"></span>'
          ] ).draw();
            $("#crdr").val("Dr");
            $("#name").val('');
            $("#debit").val('');
            $("#openingbalance").val('');
            $('#name').focus();
            attachEvents();
          }  
       });

 // attachEvents();
 $('html').on('click',function(e){
    destroyEditor($("#editor").val());
   // e.stopPropagation();
  });

  $("#delete").on('click',function(){
       var tr = $(selectedRow).closest('tr');
      _t.row(tr).remove().draw();
      $("#myModal").hide();
  });
   $("#cancel").on('click',function(){
      $("#myModal").hide();
  });

});


var attachEvents = function() {
    $("#payment tbody tr td").on('click', function(e){
      //alert( _t.cell( this ).data() );
      if($("#editor").length == 0) {
        if(!$(this).children().hasClass('glyphicon')){
          if($(this).hasClass('openingbalance') || $(this).hasClass('crdr')){
          }
          else {
            createEditor($(this));      
          }
        }
      else 
      { 
        selectedRow = this;
        //console.log(_selectedRow);
        $("#myModal").show();
      }
    }
   else
    {
      if(!checkIfSame(this) && !$(this).hasClass('glyphicon')) {
        destroyEditor($("#editor").val());
        createEditor($(this));
       }
    }
      if($(this).hasClass('name')){
        bindAutoComplete('editor');  
   }
      e.stopPropagation();
  });
};

//replaces td with editor
var replaceByEditor = function(clickedElement) {
  var clickedElementValue = clickedElement.text();
  var className;
  if($(clickedElement).hasClass('name')){
    className = "name";
    clickedElement.html('<input type="text" class="'+className+' keyCol" tabindex="1" id="editor" value="'+ clickedElementValue +'" />');
    $("#editor").focus();
    attachKeyEvents();
  }
  else if($(clickedElement).hasClass('debit')){
    className = "debit";
    clickedElement.html('<input type="text" class="'+className+' keyCol" tabindex="1" id="editor" value="'+ clickedElementValue +'" />');
    $("#editor").focus();
    attachKeyEvents();
    }
    else{
}};

//replaces editor with td. td contains value
var destroyEditor = function(value) {
  var className;
  if($("#editor").hasClass('name'))
  {
    className = "name";
  }
  else
     className ="debit";
  $("#editor").parent().html('<span class="'+className+' keyCol" tabindex="1">'+value+'</span>');
};

//creates Editor and stores value inside td before click
var createEditor = function(element) {
  _tdValueBeforeUpdate = element.text();
  replaceByEditor(element);
};

//editor's key events
var attachKeyEvents = function() {
 $("#editor").keydown(function(e) {
    if(e.keyCode == 13 && !$("#editor").parent().next().children().hasClass("openingbalance")) {
      if($("#editor").hasClass("name")) {
          $( "#editor" ).autocomplete("search",$("#editor").val());
      }
      setTimeout(function(){
            var nextElement = $("#editor").parent().next();
            destroyEditor($("#editor").val());
            createEditor(nextElement);
      },50);
     
    }
    else if (e.keyCode == 27) {
      destroyEditor(_tdValueBeforeUpdate);
    }
    else if(e.keyCode == 8 && $("#editor").val() == ''){
      $("#editor").parent().prev().focus();
    }
    if(e.keyCode == 13 && $("#editor").parent().hasClass("debit")){
     var newbalance =  +$("#editor").closest('tr').find('.hidden').val() + +$("#editor").closest('tr').find('.debit').last().val();
     $("#editor").parent().next().text(newbalance);
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

//checks if tab is pressed
var checkTabKeyPress = function(){
  $("body").on("keydown",".keyCol",function(e){
 if(e.keyCode==9){
    e.stopPropagation();
    e.preventDefault();
    var $items = $('.keyCol').not(".disabled").not(":hidden");
    var index = $items.index(this);
    console.log(index);
    var $element;
    if($items.length > index+1){
    $element = $($items[index+1]).focus();
    }
    else{
    $element = $($items[0]).focus();
    }
  }
  else if(e.keyCode == 13){
    $(this).click();
  } 
  });
};
  


var bindAutoComplete = function(identifier) {
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
        success: function( data ){
          //_da = data;
          if(data.length == 0)
          {
            $(selector).addClass('verify');
          }
          else
          {
            $(selector).removeClass('verify');
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
    select: function( event, ui)
     {
      console.log("test");
      var names = ui.item.data.split("|");
       if($("#editor").length == 0){

        $('#name').val(names[0]);
        $('#openingbalance').val(Math.abs(names[1]));
      }
      else
      {
        //$("#editor").parent().next().next().text(Math.abs(names[1]));
          $("#editor").closest('tr').find('.openingbalance').first().text(Math.abs(names[1]));
      }
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

  //location.reload();
  $('#name').focus();
});
</script> 
@stop