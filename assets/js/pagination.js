
$(document).ready(function(){
	
	onPageLimitSelect();
});

function onPageLimitSelect(){
	var pagelimit=$("#pagelimit option:selected").val();
	
	for (var j = 0; j < pagelimit; j++) {
		$("#page").children().eq(j).removeClass("hide").addClass("show");
	}	

	var size = $("#page").children().size();
	
	for (var j = pagelimit; j < size; j++) {
		$("#page").children().eq(j).addClass("hide");
	}

	var number_pages = Math.ceil(size / pagelimit);
	console.log(pagelimit, number_pages);
	var pagination = "";
	pagination += "<li id='prevpage'><a href='javascript:prevpage(" + pagelimit + ");'>Prev</a></li>";
	for (var i = 0; i < number_pages; i++) {
		pagination += "<li class='pagenumbers' id='page_" + (i + 1) + "'><a href='javascript:gotopage(" + (i + 1) + ", "+pagelimit +")'>" + (i + 1) + "</a></li>";
	}

	pagination += "<li id='nextpage'><a href='javascript:nextpage("+ pagelimit +")'>Next</a></li>";
	$("#pagination").html(pagination);
	$("#page_1").addClass("active");
	//page1
	var pagechild = $(".pagenumbers");

	if ($('#page_' + (pagechild.length)).css("display") === "none") {
		$("#nextpage").before("<li class='prevnext'>...</li>");
	}
	for (var i = 1; i <=5; i++) {
		$("#page_" + i).css("display", "block");
	}
	for (var i = 6; i <= pagechild.length; i++) {
		$("#page_" + i).css("display", "none");
	}

	if ($('#page_' + (pagechild.length)).css("display") === "none") {
		$("#nextpage").before("<li class='prevnext' id='nexti'>...</li>");
	}
}

function gotopage(pageno, pagelimit) {
    $("#page").children().addClass("hide");
    var child=$("#page").children();
    var start = (pageno - 1) * pagelimit;
    var end = (pageno - 1) * pagelimit + pagelimit;
    for (var k = start; k < end; k++) {
        $("#page").children().eq(k).removeClass("hide").addClass("show");
    }
    $("#page_" + pageno).addClass("active");
    $("#page_" + pageno).siblings().removeClass("active");
    //page2
    var pagechild = $(".pagenumbers");
    for (var i = pageno; i < (pageno + 5); i++) {
        $("#page_" + i).css("display", "block");
    }
    for (var i = 1; i < pageno; i++) {
        $("#page_" + i).css("display", "none");
    }
    for (var i = pageno + 6; i < pagechild.length; i++) {
        $("#page_" + i).css("display", "none");
    }
    console.log($('#page_' + (pagechild.length)).css('display'));
    if ($('#page_' + (pagechild.length)).css('display') === 'block') {
        $(".prevnext").remove();
    } else {
        $(".prevnext").remove();
        $("#nextpage").before("<li class='prevnext' id='nexti'>...</li>");
    }
    if ($('#page_1').css('display') === 'block') {
        $("#previ").remove();
    } else {
        $("#previ").remove();
        $("#prevpage").after("<li class='prevnext' id='previ'>...</li>");
    }

}

function prevpage(pagelimit) {
    if ($("#page_1").hasClass("active") != true) {
        $("#page").children().addClass("hide");
        var abc = $(".active").attr("id").split("_");
        var start = (parseInt(abc[1]) - 2) * pagelimit;
        var end = (parseInt(abc[1]) - 2) * pagelimit + pagelimit;
        for (var l = start; l < end; l++) {

            $("#page").children().eq(l).removeClass("hide").addClass("show");
        }
        var p_no = parseInt(abc[1]) - 1;
        $("#page_" + p_no).addClass("active");
        $("#page_" + p_no).siblings().removeClass("active");
    }
    //page3
    var pagechild = $(".pagenumbers");
    for (var i = p_no; i < (p_no + 5); i++) {
        $("#page_" + i).css("display", "block");
    }
	console.log("prev"+p_no);
    for (var i = 1; i < p_no; i++) {
        $("#page_" + i).css("display", "none");
    }
    for (var i = p_no + 5; i <= pagechild.length; i++) {
        $("#page_" + i).css("display", "none");
    }
    console.log($('#page_' + (pagechild.length)).css('display'));
    if ($('#page_' + (pagechild.length)).css("display") === "block") {
        $(".prevnext").remove();
    } else {
        $(".prevnext").remove();
        $("#nextpage").before("<li class='prevnext' id='nexti'>...</li>");
    }
    if ($('#page_1').css("display") === "block") {
        $("#previ").remove();
    } else {
        $("#previ").remove();
        $("#prevpage").after("<li class='prevnext' id='previ'>...</li>");
    }
}

function nextpage(pagelimit) {
    var child = $("#page").children().size();
    var total_page = Math.ceil(child / pagelimit);
    var total_page = parseInt(total_page);

    if ($("#page_" + total_page).hasClass("active") != true) {

        $("#page").children().addClass("hide");
        var abc = $(".active").attr("id").split("_");
        var start = parseInt(abc[1]) * pagelimit;
        var end = parseInt(abc[1]) * pagelimit + pagelimit;
        console.log(start);
        console.log(end);
        for (var l = start; l < end; l++) {

            $("#page").children().eq(l).removeClass("hide").addClass("show");
        }
        var p_no = parseInt(abc[1]) + 1;
        console.log(p_no);
        $("#page_" + p_no).addClass("active");
        $("#page_" + p_no).siblings().removeClass("active");
    }
    //page3
    var pagechild = $(".pagenumbers");
    for (var i = p_no; i < (p_no + 5); i++) {
        $("#page_" + i).css("display", "block");;
    }
    for (var i = 1; i < p_no; i++) {
        $("#page_" + i).css("display", "none");;
    }
    for (var i = p_no + 5; i <= pagechild.length; i++) {
        $("#page_" + i).css("display", "none");;
    }
    console.log($('#page_' + (pagechild.length)).css('display'));
    if ($('#page_' + (pagechild.length)).css("display") === "block") {
        $(".prevnext").remove();
    } else {
        $(".prevnext").remove();
        $("#nextpage").before("<li class='prevnext' id='nexti'>...</li>");
    }

    if ($('#page_1').css("display") === "block") {
        $(".prevnext").remove();
    } else {
        $(".prevnext").remove();
        $("#prevpage").after("<li class='prevnext'>...</li>");
    }
}