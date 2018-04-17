<section class="container-fluid" id="contact-panel">
    <header>
        <h3 class="text-center">NOUS CONTACTER</h3>
        <address class="row">
            <p class="col-xs-12 col-md-4 text-center"><i class="fas fa-map-marker"></i>&nbsp;Hôtel Le Deauville, 1 Rue du Bac, 31700 Blagnac</p>
            <p class="col-xs-12 col-md-4 text-center"><i class="fas fa-phone"></i>&nbsp;+336 80 63 16 39</p>
            <p class="col-xs-12 col-md-4 text-center"><i class="fas fa-at"></i>&nbsp;mpbookcake@gmail.com</p>
        </address>
    </header>
    <div class="row">
        <div class="col-xs-12 col-md-7" id="map">
            <script>
              function initMap() {
                var map = new google.maps.Map(document.getElementById('map'), {
                  center: {lat: 43.6238167, lng: 1.399773},
                  zoom: 18,
                  mapTypeId: 'hybrid'
                });
                map.setTilt(45);
              }
            </script>
            <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDjoUwUY66Lrv3sJ0aEGkawmsX4QBjXLM4&callback=initMap">
            </script>
        </div>
        <div class="Col-xs-12 col-md-5">
            <h4>Message rapide</h4>
            <form action="/sendNudes"  method="post" id="contact">
            <div class="row">
                <div class="form-group required col">
                    <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Votre mail" name="email" required>
                </div>
                <div class="form-group col">
                    <input type="name" class="form-control" id="name" aria-describedby="emailHelp" placeholder="Votre nom" name="name">
                </div>
            </div>
                <div class="form-group required">
                    <textarea class="form-control" id="message" placeholder="Entrez votre message ici" name="message"></textarea>
                </div>
              <button type="submit" class="btn btn-primary btn-block">Envoyer</button>
            </form>
        </div>
        <script>
            $('#contact').on('submit', function(){
                toastr.success('Votre message a bien été envoyé', 'Envoi réussi')
                $.ajax({
                    type: "POST",
                    url: "/sendNudes",
                    dataType: 'json',
                    data: $("#contact").serialize(),
                    success: function(data){
                        console.log(data);
                    }
                });
                return false;
            })
            //TODO set limiter l'envoi a une fois et afficher un message indiquant que l'envoie a déjà eu lieu si tel est le cas
        </script>
    </div>
</section>
