function disableForm(id){
    $(id).find('[type="submit"]').attr('type','button')
}

$('#contact').on('click','[type="button"]', function(){
    toastr.warning('Votre message à déjà été envoyé')
})

$('#contact').on('submit', function(){
    $.ajax({
        type: "POST",
        url: "/quickContact",
        dataType: 'json',
        data: $("#contact").serialize(),
        success: function(data){
            toastr.success('Votre message a bien été envoyé', 'Envoi réussi')
            disableForm('#contact')
        }
    });
    return false;
})
