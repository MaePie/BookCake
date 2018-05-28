$(document).ready(function () {
  setTimeout(function () {
      $('#flash').hide();
  }, 6000);
});

$(document).ready(function() {
	$('#navbar-toggler').on('click', function() {
		if ($('#navbar-right').attr('style') === 'display: none;') $('#navbar-right').css('display', 'inline');
		else if ($('#navbar-right').attr('style') === 'display: inline;') $('#navbar-right').css('display', 'none');
	});
});