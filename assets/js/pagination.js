
$(document).ready(function(){
	
	onPageLimitSelect();
});

function onPageLimitSelect(){
	var pagelimit=$("#pagelimit option:selected").val();
	$("#page").children().css("display", "none");
	for (var j = 0; j < pagelimit; j++) {
		$("#page").children().eq(j).css("display", "block");
	}

	var size = $("#page").children().size();

	var number_pages = Math.ceil(size / pagelimit);
	console.log(pagelimit, number_pages);
	var pagination = "";
	pagination += "<a id='prevpage' href='javascript:prevpage(" + pagelimit + ");'><p id='prev'>Prev</p></a>";
	for (var i = 0; i < number_pages; i++) {
		pagination += "<a class='pagenumbers' id='page_" + (i + 1) + "' href='javascript:gotopage(" + (i + 1) + ", "+pagelimit +")'><p>" + (i + 1) + "</p></a>";
	}

	pagination += "<a id='nextpage' href='javascript:nextpage("+ pagelimit +")'><p id='next'>Next</p></a>";
	$("#pagination").html(pagination);
	$("#page_1").addClass("active");
	//page1
	var pagechild = $("#pagination").children();

	if ($('#page_' + (pagechild.length - 2)).css('display') == 'none') {
		$("#next").prepend('<i>......</i>');
	}
	for (var i = 1; i < 6; i++) {
		$("#page_" + i).css("display", "block");
	}
	for (var i = 6; i < pagechild.length; i++) {
		$("#page_" + i).css("display", "none");
	}

	if ($('#page_' + (pagechild.length - 2)).css('display') == 'none') {
		$("#next").prepend("<i id='nexti'>............</i>");
	}
}

function gotopage(pageno, pagelimit) {
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
        $("i").remove();
    } else {
        $("i").remove();
        $("#next").prepend("<i id='nexti'>............</i>");
    }
    if ($('#page_1').css('display') == 'block') {
        $("#previ").remove();
    } else {
        $("#previ").remove();
        $("#prev").append("<i id='previ'>...........</i>");
    }

}

function prevpage(pagelimit) {
    if ($("#page_1").hasClass("active") != true) {
        $("#page").children().css("display", "none");
        var abc = $(".active").attr("id").split("_");
        var start = (parseInt(abc[1]) - 2) * pagelimit;
        var end = (parseInt(abc[1]) - 2) * pagelimit + pagelimit;
        for (var l = start; l < end; l++) {

            $("#page").children().eq(l).css("display", "block");
        }
        var p_no = parseInt(abc[1]) - 1;
        $("#page_" + p_no).addClass("active");
        $("#page_" + p_no).siblings().removeClass("active");
    }
    //page3
    var pagechild = $("#pagination").children();
    for (var i = p_no; i < (p_no + 5); i++) {
        $("#page_" + i).css("display", "block");
    }
    for (var i = 1; i < p_no; i++) {
        $("#page_" + i).css("display", "none");
    }
    for (var i = p_no + 6; i < pagechild.length; i++) {
        $("#page_" + i).css("display", "none");
    }
    console.log($('#page_' + (pagechild.length - 2)).css('display'));
    if ($('#page_' + (pagechild.length - 2)).css('display') == 'block') {
        $("i").remove();
    } else {
        $("i").remove();
        $("#next").prepend("<i id='nexti'>............</i>");
    }
    if ($('#page_1').css('display') == 'block') {
        $("#previ").remove();
    } else {
        $("#previ").remove();
        $("#prev").append("<i id='previ'>...........</i>");
    }
}

function nextpage(pagelimit) {
    var child = $("#page").children().size();
    var total_page = Math.ceil(child / pagelimit);
    var total_page = parseInt(total_page);

    if ($("#page_" + total_page).hasClass("active") != true) {

        $("#page").children().css("display", "none");
        var abc = $(".active").attr("id").split("_");
        var start = parseInt(abc[1]) * pagelimit;
        var end = parseInt(abc[1]) * pagelimit + pagelimit;
        console.log(start);
        console.log(end);
        for (var l = start; l < end; l++) {

            $("#page").children().eq(l).css("display", "block");
        }
        var p_no = parseInt(abc[1]) + 1;
        console.log(p_no);
        $("#page_" + p_no).addClass("active");
        $("#page_" + p_no).siblings().removeClass("active");
    }
    //page3
    var pagechild = $("#pagination").children();
    for (var i = p_no; i < (p_no + 5); i++) {
        $("#page_" + i).css("display", "block");
    }
    for (var i = 1; i < p_no; i++) {
        $("#page_" + i).css("display", "none");
    }
    for (var i = p_no + 6; i < pagechild.length; i++) {
        $("#page_" + i).css("display", "none");
    }
    console.log($('#page_' + (pagechild.length - 2)).css('display'));
    if ($('#page_' + (pagechild.length - 2)).css('display') == 'block') {
        $("i").remove();
    } else {
        $("i").remove();
        $("#next").prepend("<i id='nexti'>............</i>");
    }

    if ($('#page_1').css('display') == 'block') {
        $("i").remove();
    } else {
        $("i").remove();
        $("#prev").append("<i>...........</i>");
    }
}