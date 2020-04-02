$(document).ready(function() 
{
  $.ajax({
    type: 'GET',
    url: '/js/data.json',
    dataType: 'json',
    success: function(data) {
                  console.log(data);
                  $.each(data, function(i, detail)
                  {
                    var path = "images/square/"+detail.path;
                    var title = detail.title;
                    var output = '<li ><img src="'+path+'" class="orginalPictures" alt="'+title+'"></li>';
                    $(".gallery").append(output);

                  }); 

                  var newdiv="";

                  $(".orginalPictures").mouseenter(function(event)
                  {
                        $(this).addClass("gray");
                        var alt = $(this).attr("alt");
                        var title="", city="", country="", date="", path="";
                        $.each(data, function(i, detail)
                        {
                          if(detail.title == alt) 
                          {
                            path = detail.path;
                            title = detail.title;
                            city = detail.city;
                            country = detail.country;
                            date = detail.taken;
                          }

                        }); 

                        var img_path = "images/medium/"+path;
                        var rx = event.pageX-80;// - $(this).offset().left;
                        var ry = event.pageY-80;//- $(this).offset().top;
                        newdiv = '<div id="preview" class="newdiv1"><img src="'+img_path+'" alt="'+alt+'"><p>'+title+'</p><p>'+city+', '+country+' ['+date+']</p></div>';
                        $(".gallery").append(newdiv);
                        $(".newdiv1").css("margin-left",rx);
                        $(".newdiv1").css("margin-top",ry);
                  });

                  $("img").mouseleave(function() 
                  {
                    $(this).removeClass("gray");
                    $('.newdiv1').fadeOut(1000,function(){$('.newdiv1').remove()});
                  });

               
                $("#preview").mousemove(function(event) 
                {
                  var relX = event.pageX-80 ;//- $(this).offset().left;
                  var relY = event.pageY-80;//- $(this).offset().top;
                   $(".newdiv1").css("margin-left",relX);
                   $(".newdiv1").css("margin-top",relY);
                });


    }, 
    error: function(error) 
    {
       alert(JSON.stringify(error));
    } 
  }); 
}); 