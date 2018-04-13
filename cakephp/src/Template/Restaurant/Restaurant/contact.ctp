<div class="container-fluid" id="contact-panel">
    <h3>NOUS CONTACTER</h3>
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
            <form action="/sendNudes"  method="post" id="contact">
              <div class="form-group required">
                <label for="email">Adresse mail</label>
                <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Entrer votre mail" name="email" required>
              </div>
              <div class="form-group">
                <label for="name">Nom Prénom</label>
                <input type="name" class="form-control" id="name" aria-describedby="emailHelp" placeholder="Entrer votre nom et prénom" name="name">
              </div>
              <div class="form-group required">
                  <label for="message">Message</label>
                  <textarea class="form-control" id="message" placeholder="Entrez votre message ici" name="message"></textarea>
              </div>
              <button type="submit" class="btn btn-primary btn-block">Submit</button>
            </form>
        </div>
        <script>
            $('#contact').on('submit', function(){
                console.log($('#contact').serialize())
                $.ajax({
                    type: "POST",
                    url: "/sendNudes",
                    data: $("#contact").serialize(),
                    success: function(data){
                        console.log(data);
                    }
                });
                return false;
            })
        </script>
    </div>
</div>
