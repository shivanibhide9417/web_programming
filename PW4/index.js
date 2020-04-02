$(document).ready(function(){
  console.debug("hello");
  $.ajax({
          type:"GET",
          url:"books.xml",
          dataType:"xml",
          success: function(data)
          {
            jQuery(data).find('book').each(function()
            {alert("book");
              var title=$(this).find('title').text();
              console.log(title);
              var authors = $(this).find('author');
      var author="";
      $(authors).each(function()
        {
                    author += $(this).text() + ", ";
                });
              console.log(author);
              var price=$(this).find('price').text();
              console.log(price);
              var year=$(this).find('year').text();
              console.log(year);
              var catagory=jQuery(this).attr('category');
              console.log(catagory);
              $("table").append("<tr><td>"+title+"</td><td>"+author+"</td><td>"+price+"</td><td>"+year+"</td><td>"+catagory+"</td></tr>");
            })
          }
        });
})