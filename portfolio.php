<div id="slider_container" style="overflow: visible; min-height: 500px;">
    <div class="flexslider">
        <div class="description">           
        </div>
        <ul class="slides">
          <li>
            <img src="images/sliders/automega.png" />
          </li>
          <li>
            <img src="images/sliders/osmart.png" />
          </li>
          <li>
            <img src="images/sliders/kontaktelektro.png" />
          </li>
          <li>
            <img src="images/sliders/pumpe.png" />
          </li>
        </ul>
    </div>

</div>

<script language="javascript">

//  Companies list
        var arr = [ 
           {name: '\"Megapolis-Concert\"', description: "Аренда автомобилей премиум-класса", hyperlink: 'http://avto-mega.ru'}, 
           {name: '\"O-Smart\"', description: "Информационный ресурс посвященный автомобилям Smart", hyperlink: 'http://osmart.ru'}, 
           {name: 'Контакт-Электроарматура', description: "Производство линейно-подвесной арматуры для линий электропередач.", hyperlink: 'http://kontaktelektro.ru'}, 
           {name: '\"Hydro-Shop\"', description: "Поставки оборудования для инженерных систем водоснабжения, отопления и канализации.", hyperlink: 'http://www.pumpe.ru/'}, 
        ];
        
//  Show/Hide Description
        $('.flexslider').flexslider({

            end: function(slider){
               $('.description').fadeOut(1000);
            },
            start: function(slider){
               $('.description').fadeIn(1200,function(){$('.description').html(function(){
                    return a = "<h4>"+arr[slider.currentSlide]['name']+"</h4>"+"<p>"+
                                arr[slider.currentSlide]['description']+"</p>"+
                                "<a href=\""+arr[slider.currentSlide]['hyperlink']+"\" target=\"_blank\">"+arr[slider.currentSlide]['hyperlink']+"</a>";
                        });
                     });
            },
            before: function(slider){
               $('.description').fadeOut(1000);
            },
            after: function(slider){
               $('.description').fadeIn(800);
               $('.description').html(function(){
                    return a = "<h4>"+arr[slider.currentSlide]['name']+"</h4>"+"<p>"+
                            arr[slider.currentSlide]['description']+"</p>"+
                            "<a href=\""+arr[slider.currentSlide]['hyperlink']+"\" target=\"_blank\">"+arr[slider.currentSlide]['hyperlink']+"</a>";
               });
            }
        });

</script>