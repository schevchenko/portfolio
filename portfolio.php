<?php
   // print_r($_SERVER);
?>
<div id="img-container">
    <div id="header-portfolio">
        
    </div>
    <div class="portfolio" id="fuck_you">
        <div class="link" style="cursor: pointer;">
            <p><a id="ubersatz" href="http://slovari.yandex.ru//de-ru/" target="_blank">&rarr; на сайт </a></p>
        </div>
        <a href="#">
            <img src="/images/tmp.jpg">
        </a>
    </div>
    <div class="portfolio">
        <div class="link" style="cursor: pointer;">
            <p><a id="ubersatz" href="http://slovari.yandex.ru//de-ru/" target="_blank">&rarr; на сайт </a></p>
        </div>
        <a href="#">
            <img src="/images/tmp.jpg">
        </a>
    </div>
    <div class="portfolio">
        <div class="link" style="cursor: pointer;">
            <p><a id="ubersatz" href="http://slovari.yandex.ru//de-ru/" target="_blank">&rarr; на сайт </a></p>
        </div>
        <a href="#">
            <img src="/images/tmp.jpg">
        </a>
    </div>
    <div id="new"></div>
</div>

<script language="javascript">
        $('#wort').change(function(){
            $.post(
                'translate.php',
                {
                    query: this.value
                },
                function(data){
                    alert(data);
                },'json'
            );
//            $('#ubersatz').attr('href','http://slovari.yandex.ru/'+$('#wort').val()+'/de-ru/');
////            $('#new').load('http://slovari.yandex.ru/'+$('#wort').val()+'/de-ru/');
// //           $('#new').load('http://konjugator.reverso.net/konjugation-deutsch-verb-'+$('#wort').val()+'.html');
//            function jsonp_callback(){
//                $('.b-translation__card b-translation__card_examples_visible').val();
//            }
//            $.ajax({
//                dataType: 'jsonp',
//                jsonp: 'jsonp_callback',
//                url: 'http://konjugator.reverso.net/konjugation-deutsch-verb-'+$('#wort').val()+'.html',
//               success: function (data) {
//                  alert('jsonp'); // тут уже ничего не работает!
//               }
//            });
        });

        $('.portfolio a').mouseenter(function(){
           // alert($(this.parentNode.children[0].length));
            $(this.parentNode.children[0]).fadeIn('fast', function() {
               // $('#footer').text('Zeitgeist');
            });
        });
        $('.link').mouseleave(function(){
            $('.link').fadeOut('fast', function() {
                //$('#footer').text('Zeitgeist');
            });
        }) 

</script>