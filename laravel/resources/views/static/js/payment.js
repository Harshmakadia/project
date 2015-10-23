var datatablesSample = "";
var PaymentNameAutoComplete = function(data){
	return $.map( data, function( item ) {
		return {
			label: item.name,
			value: item.name,
			balance : item.openingbalance
		}
	});
};
var PaymentName = PaymentNameAutoComplete(PaymentDetailData);
$(document).ready(function() {	
	datatablesSample = $('#example').DataTable({
		responsive: true,
		"paging":   false,
		"ordering": false,
		"info":     false,
		"bFilter":  false,
		"columnDefs": [{
			"targets": 0,
			"render": function ( row, type, val, meta ) {
				if(type === 'display') {
					return '<select size="1" name="crdr" class="crdr keyCol navigation" tabindex="1"><option value="Cr" selected="selected">Cr</option><option value="Dr">Dr</option></select>';
				}
				return row;
			}
		},
		{	
			"targets": 1,
			"render": function ( row, type, val, meta ) {
				if(type === 'display'){
					return '<input type="text" class="name keyCol navigation" name="name" value="" tabindex="1">';
				}
				return row;
			}
		},
		{
			"targets": 2,
			"render": function ( row, type, val, meta ) {
				if(type === 'display'){
					return '<input type="number" class="debit keyCol navigation" name="debit" value="" tabindex="1">';
				}
				return row;
			}
		},
		{	
			"targets": 3,
			"render": function ( row, type, val, meta ) {
				if(type === 'display'){
					return '<input type="hidden" class="openingbalance" value=""><span class="balanceDisplay" ></span><input type="hidden" class="newOpeningBalance" name="balance" value="">';
				}
				return row;
			},
		},
		{
			"targets": 4,
			"render": function ( row, type, val, meta ) {
				if(type === 'display'){
					return '<span class="deleterow close glyphicon glyphicon-remove keyCol navigation" tabindex="1"></span>';
				}
				return true;
			},
		}]
	});

	// Generate first blank datatable row 
	datatablesSample.row.add(["","","",""]).draw();
	$(".crdr").focus();
  
	$("body").on("keydown",".crdr",function(e) {
		checkTabKeyPress();
		if(e.keyCode==13){
			$(this).closest('tr').find('.name').focus();
		}
		else if(e.keyCode==8){
			e.preventDefault();
			e.stopPropagation();
			var rownum = $(this).closest('tr');
			moveFocusBackToPreviousRow(rownum);
			return false;
		}
	});
   
	$("body").on("keydown",".name",function(e) {
		bindAutoComplete('name');
		var currentNameValue = $(this).closest('tr').find('.name').val();
		if(e.keyCode==13  && $(this).val()!=''  &&  !!_.findWhere(PaymentName, {value:currentNameValue}) == true) { 
			var crdr = "", name = "", debit = "", openingbalance = "";
			for(i=0;i<PaymentName.length;i++){
				var value = PaymentName[i].value;
				var balance = PaymentName[i].balance;
			
			if(value != "" && balance !="") {
					var updateAmount = countTotalAmount(value);
					var addedValue = +updateAmount + +balance ;
					setNewBalance(value,addedValue);							
				}
			}
			$(this).closest('tr').find('.debit').focus();
		}
		else if(e.keyCode==8 && $(this).val()=='') {
			$(this).closest('tr').find('.crdr').focus();
			$(this).closest('tr').find('.balanceDisplay').text('');
			$(this).closest('tr').find('.newOpeningBalance').val('');
		}
	});
	
	$("body").on("keydown",".debit",function(e){
		if(e.keyCode==13 && $(this).val()!='' && $(this).closest('tr').find('.name').val()!='') {
			var x = $(this).closest('tr');
			var val;
			moveToNextRow(x);
			//var result = 0;
			var name = x.find('.name').val();
			result = countTotalAmount(name);
			
			var addedValue = +result + +$(this).closest('tr').find('.openingbalance').val();
			$(this).closest('tr').find('.balanceDisplay').text(addedValue ); 
			$(this).closest('tr').find('.newOpeningBalance').val(addedValue);
			
			setNewBalance(name,addedValue);
		}
		else if(e.keyCode==8 && $(this).val()=='') {
			var x = $(this).closest('tr');
			var name = x.find('.name').val();
			result = countTotalAmount(name);
			var addedValue = +result + +$(this).closest('tr').find('.openingbalance').val();
				
            setNewBalance(name,addedValue);
            var HiddenValue = $(this).closest('tr').find('.openingbalance').val();
            $(this).closest('tr').find('.balanceDisplay').text(+HiddenValue + +countTotalAmount(name));
            $(this).closest('tr').find('.newOpeningBalance').val(HiddenValue);
			$(this).closest('tr').find('.name').focus();
		}
	});
	
	//Displays original value of the balance if the value in the amount field is Null
	$("body").on("blur",".debit",function(){
		var CheckValueISNull = $(this).closest('tr').find('.debit').val();
		if(CheckValueISNull ==''){
			var HiddenValue = $(this).closest('tr').find('.openingbalance').val();
			$(this).closest('tr').find('.balanceDisplay').text('');
			$(this).closest('tr').find('.newOpeningBalance').val(HiddenValue);
		}
	});
  
	//pops up message for confirmation
	$("body").on('click','.glyphicon-remove',function() {
		var currentRow = $(this).closest('tr');
		var currentRowName = $(this).closest('tr').find('.name').val();
		deleterow(currentRow,currentRowName);
	});
	
	//Displays Modal and takes appropriate action
	var deleterow = function(row,currentRowName){
		var rowCountNumber = datatablesSample.rows().count();
		if(rowCountNumber != 1){
			$("#myModal").show();
			$("#myModal").on("click","#cancel",function() {
				$("#myModal").hide();
			});
			$("#myModal").on("click","#delete",function() {
				datatablesSample.row(row).remove().draw();
				var TotalAmount = countTotalAmount(currentRowName);
				var addedValue = +TotalAmount + +row.find('.openingbalance').val();
				setNewBalance(currentRowName,addedValue);
				$("#myModal").hide();
			});
		}
	};

	//Generate a blank row
	var rowGenerator = function(){
		datatablesSample.row.add(["","","",""]).draw();
	};
  
	//checks if row is present below the current row
	var CheckifRowPresentBelow = function(row) {
		var rowCount = datatablesSample.rows().count();
		var rowIndex = datatablesSample.row(row).index();
		return rowCount <= (rowIndex+1) ? true : false;
    };
  
	//generates new row only if its last row else shift focus on the next row
	var moveToNextRow = function(row) {
		if(CheckifRowPresentBelow(row)) {
			rowGenerator();
			$('.crdr').focus();
		}
		else{
			row.next().find('.crdr').focus();
		}
	};
 
	//checks if row is present above the current row
	var CheckifRowPresentAbove = function(row) {
		var rowCount = datatablesSample.rows().count();
		var rowIndex = datatablesSample.row(row).index();
		return rowCount >= (rowIndex+1) ? true : false;
	};
 
	//moves focus to previous row 
	var moveFocusBackToPreviousRow = function(row) {
		var rowCountNumber = datatablesSample.rows().count();
		if(CheckifRowPresentAbove(row)) {
			if(rowCountNumber != 1) {
				//row.prev().find('.debit').focus();
				datatablesSample.row(row).remove().draw();
				//will move focus to last row's debit class
				$('.debit').last().focus();
			}	
		}
		else{
			row.prev().find('.debit').focus();
		}
	};
	
	//Checks if tab is pressed or not
	var checkTabKeyPress = function(){
		$("body").on("keydown",".keyCol",function(e) {
		//left arrow - 37 or // tab - 9
			if(e.keyCode==37 || (e.shiftKey && e.keyCode==9)) {
				e.stopPropagation();
				e.preventDefault();
				var $items = $('.keyCol').not(".disabled").not(":hidden");
				var index = $items.index(this);
				var $element;
				if($items.length > index-1) {
					$element = $($items[index-1]).focus();
				}
				else{
					$element = $($items[0]).focus();
				}
			}
			//right arrow - 39 or // tab - 9
			else if (e.keyCode==39 || e.keyCode==9) {
				if(e.keyCode==39 || e.keyCode==9) {
					e.stopPropagation();
					e.preventDefault();
				}
				var $items = $('.keyCol').not(".disabled").not(":hidden");
				var index = $items.index(this);
				var $element;
				if($items.length > index+1) {
					$element = $($items[index+1]).focus();
				}
				else{
					$element = $($items[0]).focus();
				}	
			}
		});
	};

	//Display balance of the name entered fetching there values from database 
	var bindAutoComplete = function(identifier) {
		var selector = "." + identifier;
		$(selector).autocomplete({
			source: PaymentName,    
			minLength: 0,
			select: function( event, ui) {
				var names = ui.item.value;
				var balance = ui.item.balance;
				var localCopyBalance = "";
				$(this).val(names);
				$(this).closest('tr').find('.openingbalance').val(Math.abs(balance));
				//If balance is present in localCopy it will display balance from it
				var update = $(this).closest('tr').find('.balanceDisplay').text((Math.abs(balance)) + +countTotalAmount(names));
				setNewBalance(names,update.text());
				$(this).closest('tr').find('.newOpeningBalance').val(Math.abs(balance));
			}
		});
	};
	
	//Fetches all the row with same name and adds there amount value.
	var countTotalAmount = function(x) {
		var fetchRow = _.filter($('.name').closest('tr'), function(obj,name) { 
			if($(obj).find(".name").val() == x) {
				return obj;
			}
		});
		var result = 0;
		_.filter(fetchRow,function(obj) { 
			result = +result + +($(obj).find('.debit').val());
		});
		return result;
	};
	
	//updates the value of name which is repeated.
	var setNewBalance =  function(x,addedValue) {
		var fetchRow = _.filter($('.name').closest('tr'), function(obj,name) { 
			if($(obj).find(".name").val() == x) {
				return obj;
			}
		});
		_.filter(fetchRow,function(obj) {
			$(obj).find(".balanceDisplay").text(addedValue);
			return obj;
		});
		return;	
	};
});
	//Submitting values to database 
	$('#add').click(function(){  
		var data = datatablesSample.$('input,select').serialize();
		var formData = JSON.stringify(jQuery('input, select').serializeArray()); 
		var jsonArr = [];
		var totalDebit=0;
		var type=1;
		var date=$( "#datepicker" ).datepicker( "option", "dateFormat", "yy-mm-dd" ).val();
		var crdr = "", name = "", debit = "", openingbalance = "";
		for(i=0;i<$('input, select').serializeArray().length;i++){
			if($('input, select').serializeArray()[i].name == "crdr") {
				crdr = $('input, select').serializeArray()[i].value;  
			}
			if($('input, select').serializeArray()[i].name == "name") {
				name = $('input, select').serializeArray()[i].value; 
			}
			if($('input, select').serializeArray()[i].name == "debit") {
				debit = $('input, select').serializeArray()[i].value; 
			}
			if($('input, select').serializeArray()[i].name == "balance") {
				openingbalance = $('input, select').serializeArray()[i].value; 
			}
			if(name != "" && crdr !="" && debit != "" && openingbalance != "") {
				jsonArr.push ({
					crdr1: crdr,
					name2: name,
					debit3: debit,
					openingbalance4: openingbalance,
					totalDebit: totalDebit += parseInt(debit)
				});  
				crdr = ""; name = ""; debit = ""; openingbalance = "";
			}
		}
		$.ajax ({
			url: 'payment',
			type: "post",
			data: {'json':jsonArr,'_token': $('input[name=_token]').val(),'totalDebit':totalDebit,'type':type,'date':date}
		});
		//location.reload();
		//$('#name').focus();
	});