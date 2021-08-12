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

function sort(elem, columnName, searchType){
	var sort = $(elem).attr("data-order");
	sort =(sort == -1 || sort == 0) ? 1 : -1;
	$("th.active").attr("data-order", 0);
	$("th.active").removeClass("active");
	$(elem).addClass('active');
	$(elem).attr("data-order", sort);
	var url = '';
	var searchValue = $("input[name='search']").val();
	if(searchType === 'students'){
		url += '/students/sort';
	}
	else if(searchType === 'courses'){
		url += '/courses/sort';
	}
	else if(searchType === 'subscriptions'){
		url += '/subscriptions/sort';
	}
	$.ajax({
		url: url,
		method: 'POST',
		data: {
			'searchValue': searchValue,
			'columnName': columnName,
			'sort': sort
		},
		success: function(result){
			$("#page").html(result);
			onPageLimitSelect();
		}
	});
}