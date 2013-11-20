function showMenu(id)
{
	var menu = $("#"+id+"-menu");
	var anchor = $("#"+id);
	if(anchor.hasClass("active"))
	{
		menu.slideUp("slow", function(){ anchor.removeClass("active"); });
	}
	else
	{
		if($(".js-menu-icon").hasClass("active"))
		{
			$(".js-menu-list").slideUp("slow");
			$(".js-menu-icon").removeClass("active");
		}
		anchor.addClass("active");
		menu.slideDown("slow");
	}
}

function post(form)
{
	var formobj = $("#"+form);
	var formerrors = $("#"+form+"-errors");

	$.ajax({
		type:"POST",
		url:formobj.attr("action"),
		data: formobj.serialize(),
		dataType: "JSON",
		success: function(data){
			if(typeof data.message !== "undefined")
			{
				formerrors.empty();
				formerrors.append('<li>'+data.message+'</li>');
			}
		}
	});
	return false;
}