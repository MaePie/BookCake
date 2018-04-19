$(document).ready(function(){
    var navbar = document.getElementsByClassName('nav-bot')[0];
    var sticky = navbar.offsetTop;

    function navbarSticky() {
        if (window.pageYOffset >= sticky) {
            navbar.classList.add("sticky")
        } else {
            navbar.classList.remove("sticky");
        }
    }

    window.onscroll = function() {
        navbarSticky()
    };
})


function addInfoReservation() {

    if($(window).width() <= 767){
        $('#reservationForm button').remove()
        $('#reservationForm .container:last').append('<div class="container"><button type="button" class="btn btn-primary btn-block">Réserver</button></div>')
        $('.hideForm').slideDown(650)
    } else {
        $('.hideForm').slideDown(650)
    }
}

$('#reservationForm button').click(() => {
    $.ajax({
        type: "POST",
        url: "/admin/reservationForm",
        dataType: 'json',
        data: $("#reservationForm").serialize(),
        success: function(data){
            if(data.dispo == 1){
                toastr.success('Veuillez renseigner vos informations personnelles pour pouvoir réserver', 'Il y a de la place !')
                addInfoReservation()
            } else {
                toastr.warning('Veuillez renseigner vos informations personnelles pour pouvoir réserver', 'Désolé il n\'y a pas de place ☹')
            }
        }
    });
});
