<section class="container-fluid" id="contact-panel">
    <header class="mb-3">
        <h1 class="title">Nous contacter</h1>
        <address class="row">
            <p class="col-xs-12 col-md-4 text-center"><i class="fas fa-map-marker"></i>&nbsp;Hôtel Le Deauville, 1 Rue du Bac, 31700 Blagnac</p>
            <p class="col-xs-12 col-md-4 text-center"><i class="fas fa-phone"></i>&nbsp;+33 6 40 68 42 81</p>
            <p class="col-xs-12 col-md-4 text-center"><i class="fas fa-at"></i>&nbsp;client@restaurant-aufildeleau.com</p>
        </address>
    </header>
    <div class="row">
        <div class="col-xs-12 col-md-7 mb-3" id="map">
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
        <div class="col-xs-12 col-md-5 mb-3" id="formContact">
            <h2 class="header">Message rapide</h2>
            <form action="/quickContact"  method="post" id="contact">
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
              <button type="submit" class="btn btn-block">Envoyer</button>
            </form>
        </div>
        <div class="col-xs-12 col-md-8 col-lg-6 mb-3 mt-3">
            <h2 class="header">Horaires</h2>

            <div class="row">
                <label class="col-lg-3 text-bold">Lundi:</label><p class="col-lg-9"> 11h - 22h30</p>
                <label class="col-lg-3 text-bold">Mardi:</label><p class="col-lg-9"> 11h - 22h30</p>
                <label class="col-lg-3 text-bold">Mercredi:</label><p class="col-lg-9"> 11h - 22h30</p>
                <label class="col-lg-3 text-bold">Jeudi:</label><p class="col-lg-9"> 11h - 22h30</p>
                <label class="col-lg-3 text-bold">Vendredi:</label><p class="col-lg-9"> 11h - 22h30</p>
                <label class="col-lg-3 text-bold">Samedi:</label><p class="col-lg-9"> 11h - 22h30</p>
                <label class="col-lg-3 text-bold">Dimanche:</label><p class="col-lg-9"> 11h - 15h</p>
            </div>
        </div>
    </div>
</section>
