function doTransition(clickedLink) {
	$("body").css("display", "none");
	$("body").fadeIn(500);
	$(".transition").click(function(event){
		event.preventDefault();
		linkLocation = this.href;
		$("body").fadeOut(3000, window.location = linkLocation);
	});
}

function setActiveMenu(menuItem) {
	menuItem = '#'+menuItem;
	console.log(menuItem);
	$(menuItem).siblings('li').removeClass('active');
	$(menuItem).addClass('active');
}
