<html>
    <head>
        <link rel="stylesheet" href="css/dreid.css">
        <script type="text/javascript" src="js/history.js"></script>
        <script type="text/javascript" src="js/jquery.js"></script>
        <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
        <script language="javascript">
            $(document).ready(function(){                   
                switch(localStorage.lastpage){
                    case 'main':
                        $('#content').load('main.php');
                        localStorage.lastpage="main";
                        break;
                    case 'portfolio':
                        $('#content').load('portfolio.php');
                        localStorage.lastpage="portfolio";
                        break;
                    case 'contacts':
                        localStorage.lastpage="contacts";
                        $('#content').load('contacts.php',function(){
                            $('#content').append('<div id="map_canvas"></div>');
                            $('#map_canvas').load('map.php',function(){
                                $('#map_canvas').animate({opacity: '1'},1000);
                            });                            
                        });
                        break;
                    default:
                        $('#content').load('main.php');
                        localStorage.lastpage="main";
                        break;
                }



                $('#main').click(function(){
                    $('#content').slideUp('slow','swing',function(){
                        $('#content').load('main.php',function(){
                            $('#content').slideDown('slow','swing');
                        });
                        localStorage.lastpage="main";
                    });

                });
                
                $('#contacts').click(function(){
                    $('#content').slideToggle('slow','swing',function(){
                        $('#content').load('contacts.php',function(){
                            $('#content').slideToggle('slow','swing', function(){
                                 if(localStorage.lastpage == "contacts"){
                                $('#content').append('<div id="map_canvas"></div>');
                                $('#map_canvas').load('map.php',function(){
                                    $('#map_canvas').animate({opacity: '1'},1000);
                                }); }
                            });

                        });
                        localStorage.lastpage="contacts";
                    });
                });
                
                $('#portfolio').click(function(){
                    $('#content').slideToggle('slow','swing', function(){
                        $('#content').load('portfolio.php',function(){
                            $('#content').slideToggle('slow','swing');
 
                            
                        });
                        localStorage.lastpage="portfolio";
                    });
                });
//            if($('#introduction').length > 0){
//                alert('hello');
//            }

            })
//                alert($('#introduction').length);

        //$('#my_dates').prepend('<div id="map_canvas"></div>');
        // установим обработчик события resize
//        $(window).resize(function(){
//        initializing();
//         // alert('Размеры окна браузера изменены.');
//        });
//
//        // вызовем событие resize
//        $(window).resize();
        </script>
    </head>

    <body>
        <div id="wrapper">
            <div id="header">
                <h1>

                </h1>
            </div>
            <div class="menu">
                <ul>
                    <li><a href="#" id="main">Main</a></li>
                    <li><a href="#" id="contacts">Contacts</a></li>
                    <li><a href="#" id="portfolio">Portfolio</a></li>
                </ul>
            </div>
            <div id="content">
<!--        <div id="map_canvas" style="background: red; width: 600px ; height: 340px; position: relative;
                                    float: right; display: block; opacity: 0.5;z-index: 1000;"></div>-->

            </div>

            <div id="footer">
                <p>
                   &copy;&nbsp;2012&nbsp;
                </p>  
            </div>   
        </div>
        <script language="javascript">
            $(document).ready(function(){
                $('#map_canvas').css('background','green');                
            })
        </script>
    </body>
</html>