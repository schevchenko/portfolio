<html>
    <head>
        <link rel="stylesheet" href="css/dreid.css">
        <script type="text/javascript" src="js/history.js"></script>
        <script type="text/javascript" src="js/jquery.js"></script>
        <!--<script type="text/javascript" src="js/tempdlates.js"></script>-->
        <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
        <script language="javascript">
            $(document).ready(function(){     
//                $('#header').append('<h1>'+localStorage.lastpage+'</h1>');
//                
//                if(localStorage.lastpage == null){
//                    $('#content').load('main.php',function(){
//                        $('#content').slideDown('slow','swing');
//                        localStorage.lastpage="main";
//                    });
//                };
              
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
                        $('#content').load('contacts.php');
                        localStorage.lastpage="contacts";
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
                    $('#content').slideUp('slow','swing',function(){
                        $('#content').load('contacts.php',function(){
                            $('#content').slideDown('slow','swing');
                        });
                        localStorage.lastpage="contacts";
                    });
                });
                
                $('#portfolio').click(function(){
                    $('#content').slideUp('slow','swing', function(){
                        $('#content').load('portfolio.php',function(){
                            $('#content').slideDown('slow','swing');
                        });
                        localStorage.lastpage="portfolio";
                    });
                });

            })
            
        </script>
    </head>

    <body>
        <div id="wrapper">
            <div id="header">
                <h1>
                    <!--Shevchenko.De-->
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
                
            </div>

            <div id="footer">
                <p>
                   &copy;&nbsp;2012&nbsp;ShevchenkoDenis
                </p>  
            </div>   
        </div>
    </body>
</html>