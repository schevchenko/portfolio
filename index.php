<html>
    <head>
        <link rel="stylesheet" href="css/dreid.css">
        <link rel="stylesheet" href="slider/flexslider.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
        <script type="text/javascript" src="slider/jquery.flexslider.js"></script>
        <script type="text/javascript" src="js/history.js"></script>
        <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>

        <script language="javascript">
            $(document).ready(function(){         
// current page 
                switch(localStorage.lastpage){
                    case 'main':
                        $('#content').load('main.php');
                        localStorage.lastpage="main";
                        break;
                    case 'portfolio':
                        localStorage.lastpage="portfolio";
                        $('#content').load('portfolio.php');
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

//  pages animation

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
  
  //    **********  Hints for "hot contacts"    **************
  //    
 //     Show hints
 //         1.skype
                $($('.hot_contact a').children(':last')).mouseenter(function(){
                    $('#hint').text('job.indevelop', function(){
                        $('#hint').css("display", "inline-block");                          
                    });
                    $('#hint').fadeIn('100');
                });
//          2.gmail
                $($('.hot_contact a').children(':first')).mouseenter(function(){
                    $('#hint').text('job.indevelop@gmail.com', function(){
                        $('#hint').css("display", "inline-block");

                    });
                    $('#hint').fadeIn('100');
                });

//      Hide hints
                $('.hot_contact a').mouseleave(function(){
                    $('#hint').css("display", "none");
                }) 
            })
        </script>
    </head>

    <body>
        <div id="wrapper">
<!--HEADER-->
            <div id="header">
                <h1>
                    <a href="/">indevelopment<span>.</span>tk</a>
                </h1>
                <div class="hot_contact">
                    <a href="mailto:job.indevelop@gmail.com">
                        <img src="/images/contacts/Gmail.png">
                    </a>
                    <a href="skype:echo123?call">
                        <img src="/images/contacts/Skype.png">
                    </a>
                </div>
                <div id="hint"></div>
            </div>
<!--MAIN MENU-->
            <div class="menu">
                <ul>
                    <li><a href="#" id="main">Main</a></li>
                    <li><a href="#" id="contacts">Contacts</a></li>
                    <li><a href="#" id="portfolio">Portfolio</a></li>
                </ul>
            </div>
<!--AJAX-CONTENT-->
            <div id="content">
            </div>
<!--FOOTER-->
            <div id="footer">
                <p>
                   &copy;&nbsp;2012-2013&nbsp;
                </p>  
            </div>   
        </div>
    </body>
</html>