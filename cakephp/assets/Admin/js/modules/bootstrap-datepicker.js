;(function($){
	$.fn.datepicker.dates['fr'] = {
		days: ["dimanche", "lundi", "mardi", "mercredi", "jeudi", "vendredi", "samedi"],
		daysShort: ["dim.", "lun.", "mar.", "mer.", "jeu.", "ven.", "sam."],
		daysMin: ["Di", "Lu", "Ma", "Me", "Je", "Ve", "Sa"],
		months: ["janvier", "février", "mars", "avril", "mai", "juin", "juillet", "août", "septembre", "octobre", "novembre", "décembre"],
		monthsShort: ["janv.", "févr.", "mars", "avril", "mai", "juin", "juil.", "août", "sept.", "oct.", "nov.", "déc."],
		today: "Aujourd'hui",
		monthsTitle: "Mois",
		clear: "Effacer",
		weekStart: 1,
		format: "dd/mm/yyyy"
	};
}(jQuery));


$('.hasDatepicker').datepicker({
	todayBtn: true,
    startDate: "today",
    autoclose: true,	
    language: "fr",
    clearBtn: true,
    todayHighlight: true
});

$('#dp').datepicker()
  .on('changeDate', function(ev){
    var href = new Date();
	href.setTime(ev.date.getTime());
	var month = href.getMonth() + 1
    window.location.href = '/admin/r-res/day-list/' + href.getFullYear() + '-' + month + '-' + href.getDate();
});