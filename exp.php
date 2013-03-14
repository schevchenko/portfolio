<html>

    <head>
        <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
            </head>
        <body>
            <div id="map" style="width: 600px; height: 600px;">
                
            </div>
<script language="javascript"> 
//  загрузка карты

//try{
//    var a = 0;
    function initializing(){
//   alert('ho');
//        a = 'pizda';
        var myLatlng = new google.maps.LatLng(48.17309, 11.745523);
//        if(myLatlng == null){
//            alert('hui');
//        }
        var myOptions = {
            zoom: 18,
            center: myLatlng,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        }
        var map = new google.maps.Map(document.getElementById("map"), myOptions);
        
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
    window.onload = initializing();
</script>

    </body>
</html>
