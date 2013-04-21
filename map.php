<script language="javascript"> 

    function initializing(){
 
        var myLatlng = new google.maps.LatLng(40.72436422, -74.00115967);

        var myOptions = {
            zoom: 18,
            center: myLatlng,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        }
        var map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
        
        var contentString = '<div id="my_comment">Ich bin hier!</div>';
        var infowindow = new google.maps.InfoWindow({
            content: contentString
        });
        var marker = new google.maps.Marker({
            position: myLatlng,
            map: map,
            title: 'I\'m hear!'
        });
        google.maps.event.addListener(marker, 'click', function() {
            infowindow.open(map,marker);
        });
    return;
  }
  $(document).ready(function(){
    $('#map_canvas').css('backgroun-color','green');
    initializing();
  })
</script>