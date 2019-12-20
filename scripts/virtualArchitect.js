
function doSearch() {
	$('.planSearch').empty();
	$('#planSearch').css('background-color', '');
	var Bedrooms     = $('#Bedrooms').val();
	var Bathrooms    = $('#Bathrooms').val();
	var Garages      = $('#Garages').val();
	var checkboxes   = [];
	
	$('input[type=checkbox]:checked').each(function() {
		checkboxes.push(this.id);
	})
	obj = JSON.stringify(checkboxes);

	$.ajax({
		url: 'searchFirst.php',
		data:{
			Bedrooms:   Bedrooms,
			Bathrooms:  Bathrooms,
			Garages:    Garages,
			Zones:		obj
        },
		success: function(data){
			$('#searchResults').html(data);
		}
	});
}

function showPlan(planId) {
	$.ajax({
		url:'showPlans.php',
		data:{planId:planId},
		success: function(data) {
			$('#planSearch').css('background-color', '#FFF');
			$('#planSearch').html(data);
			$('#planCode').text($('#plan'+planId).val());
			$('#planCodeId').val($('#plan'+planId).val());
		}
	});
}

function swapImages(imageName) {
	$('.showBig').attr('src',imageName);
}

var added = [];
function addItem(description, id) {
    var alreadyAdded = added.indexOf(id);

    if(alreadyAdded == -1) {
        added.push(id);
        var check = document.createElement('tr');

        check.className = 'form-group form-inline';

        check.innerHTML = '<td><label for="' + id + '" class="search">' + description + '</label></td>\
                        <td><input type="checkbox" class="form-control" id="' + id + '" name="' + id + '" onchange="doSearch();"></td>'
        
        document.getElementById('tblSelection').appendChild(check);
		doSearch();
    }
}


