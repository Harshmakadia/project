@extends('masterhome')
@section('content')
<input type="text" class="datepicker pull-right" id="datepicker">
 
 	<div class="container">
 		<hr>
		<div class="table-responsive">
    		<table id="payment" class="table table-bordered table-striped keyword">
    			<thead style="background-color: #18BC92; color: #2C3E50;">
					<tr>
						<th>Cr/Dr</th>
						<th>Name</th>
						<th>Amount</th>
						<th>OpeningBalance</th>
						<th><span class=" glyphicon glyphicon-remove" style="width: 0.1818px;"></span></th>
						<th><span class="glyphicon glyphicon-pencil" style="width: 0.1818px;"></span></th>
					</tr>
				</thead>
				<tbody>
					@foreach ($users as $user)
						<tr>
							<input id="_token" type="hidden" name="_token" value="{{ csrf_token() }}">
							<td>Dr</td>
							<td>{{$user->Name}}</td>
							<td>{{$user->Debit}}</td>
							<td>{{$user->openingBalance}}</td>
							<td></td>
							<td></td>
							<!--<td><input type="button" value="Delete" id="delete" class="btn btn-danger center-block"/></td>
							<td><input type="button" value="Update" id="update" class="btn btn-warning center-block"/></td>-->
							
						</tr>			
					@endforeach
				</tbody>
			</table>
		<input type="button" value="check" id="update" class="btn center-block"/>
	   	</div>
	</div>
<style>
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

</style> 
<script>
$(document).ready(function(){
 
$('.deleterow').on('click',function(){
  //var rowValue = $(this).closest('tr').text();
  //alert(rowValue);
});
_t = $('#payment').DataTable({
	"aoColumns": [
    {"sClass":"crdr" },
    {"sClass":"name" },
    {"sClass":"debit" },
    {"sClass":"openingbalance" },
    null,
    null
    ]
});
attachEvents();
 $('html').on('click',function(e){
    destroyEditor($("#editor").val());
   // e.stopPropagation();
  });
});
var attachEvents = function() {
    $("#payment tbody tr td").on('click', function(e){
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
    clickedElement.html('<input type="text" class="'+className+'" id="editor" value="'+ clickedElementValue +'" />');
    $("#editor").focus();
    attachKeyEvents();
  }
  else if($(clickedElement).hasClass('debit')){
    className = "debit";
    clickedElement.html('<input type="text" class="'+className+'" id="editor" value="'+ clickedElementValue +'" />');
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
  $("#editor").parent().html('<span class="'+className+'">'+value+'</span>');
};

//creates Editor and stores value inside td before click
var createEditor = function(element) {
  _tdValueBeforeUpdate = element.text();
  replaceByEditor(element);
};

//editor's key events
var attachKeyEvents = function() {
  $("#editor").keydown(function(e) {
    // bindAutoComplete('name');
    if(e.keyCode == 13 && !$("#editor").parent().next().children().hasClass("openingbalance")) {
      if($("#editor").hasClass("name")) {
        //var data = $
        $("#editor").data('ui-autocomplete')._trigger('select', 'autocompleteselect', {item:{data:$("#editor").val()}});
      }
      var nextElement = $("#editor").parent().next();
      destroyEditor($("#editor").val());
      createEditor(nextElement);
      //bindAutoComplete("#debit");
      //console.log(nextElement.next().text());

    } 
    else if (e.keyCode == 27) {
      destroyEditor(_tdValueBeforeUpdate);
    }
    else if(e.keyCode == 8 && $("#editor").val() == ''){
      //code to move focus to previous td
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
        success: function( data ) {
          _da = data;
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
    select: function( event, ui) {
      var names = ui.item.data.split("|");
      if($("#editor").length == 0){

        $('#name').val(names[0]);
        $('#openingbalance').val(Math.abs(names[1]));
      }
      else
      {
        $("#editor").parent().next().next().text(Math.abs(names[1]));
      }
    }
  });
};
$('#update').click(function(){  
	console.log("worked");
  var x = _t.data();
  console.log(x);
  var jsonArr = [];
  console.log(jsonArr);
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