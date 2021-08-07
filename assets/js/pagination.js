var pagelimit=5;
$(document).ready(function(){
	$("#page").children().css("display", "none");
	for (var j = 0; j < pagelimit; j++) {
		$("#page").children().eq(j).css("display", "block");
	}
	console.log($("#page").children());

	var size = $("#page").children().size();

	var number_pages = Math.ceil(size / pagelimit);
	var pagination = "";
	pagination += "<a id='prevpage' href='javascript:prevpage();'><p id='prev'>Prev</p></a>";
	for (var i = 0; i < number_pages; i++) {
		pagination += "<a class='pagenumbers' id='page_" + (i + 1) + "' href='javascript:gotopage(" + (i + 1) + ")'><p>" + (i + 1) + "</p></a>";
	}

	pagination += "<a id='nextpage' href='javascript:nextpage()'><p id='next'>Next</p></a>";
	$("#pagination").html(pagination);
	$("#page_1").addClass("active");

});

function gotopage(pageno) {
    $("#page").children().css("display", "none");
    var child = $("#page").children();
    var start = (pageno - 1) * pagelimit;
    var end = (pageno - 1) * pagelimit + pagelimit;
    for (var k = start; k < end; k++) {
        $("#page").children().eq(k).css("display", "block");
    }
    $("#page_" + pageno).addClass("active");
    $("#page_" + pageno).siblings().removeClass("active");
    //page2
    var pagechild = $("#pagination").children();
    for (var i = pageno; i < (pageno + 5); i++) {
        $("#page_" + i).css("display", "block");
    }
    for (var i = 1; i < pageno; i++) {
        $("#page_" + i).css("display", "none");
    }
    for (var i = pageno + 6; i < pagechild.length; i++) {
        $("#page_" + i).css("display", "none");
    }
    console.log($('#page_' + (pagechild.length - 2)).css('display'));
    if ($('#page_' + (pagechild.length - 2)).css('display') == 'block') {
        $("span").remove();
    } else {
        $("span").remove();
        $("#next").prepend("<span id='nextspan'>............</span>");
    }
    if ($('#page_1').css('display') == 'block') {
        $("#prevspan").remove();
    } else {
        $("#prevspan").remove();
        $("#prev").append("<span id='prevspan'>...........</span>");
    }

}