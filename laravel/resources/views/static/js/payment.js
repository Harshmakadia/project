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
          console.log(data.length);
          if(data.length == 0)
          {
            $(selector).css('border-color','red');

          }
          else
          {
            $(selector).addClass('border-color','yellow');
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