// autocomplet : this function will be executed every time we change the text
function autocomplet() {
	var min_length = 0; // min caracters to display the autocomplete
	var keyword = $('#50').val();
	if (keyword.length >= min_length) {
		$.ajax({
			url: 'ajax_refresh.php',
			type: 'POST',
			data: {keyword:keyword},
			success:function(data){
				$('#miDiv').show();
				$('#miDiv').html(data);
			}
		});
	} else {
		$('#miDiv').hide();
	}
}

// set_item : this function will be executed when we select an item
