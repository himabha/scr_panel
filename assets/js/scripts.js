function search(elem, searchType){
	var searchtext = $(elem).val();
	var url = '';
	if(searchType === 'students'){
		url += '/students/search';
	}
	else if(searchType === 'courses'){
		url += '/courses/search';
	}
	else if(searchType === 'subscriptions'){
		url += '/subscriptions/search';
	}
	$.ajax({
		url: url,
		method: 'POST',
		data: {
			'searchtext': searchtext
		},
		success: function(result){
			$("#page").html(result);
			onPageLimitSelect();
		}
	});
}