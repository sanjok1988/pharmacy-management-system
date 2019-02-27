
var page = 2;
$(document).on('click','#btn-more',function(e){
    e.preventDefault();
    
    loadMoreData(page);
        page++;
        
});
$(document).on("click", "a.login", function(e){
    e.preventDefault();
    $('#exampleModalLong').modal('show');
    
});
$(document).ready(function(){   
    AOS.init();	                
    $("#showPopUp").click(function(e){
        e.preventDefault();
        $("#search").modal('show');
    });
    // 
    // $(window).scroll(function() {
    //     if($(window).scrollTop() + $(window).height() >= $(document).height()) {
    //         page++;
    //         loadMoreData(page);
    //     }
    // });

    
});

function loadMoreData(page) {
    //var page = $(this).attr('page');      

        $("#btn-more").html("Loading....").hide().fadeIn(1000);;
        var data = {'page':page, 'burdenCostId':bid, 'scholarshipId':sid, 'universityId':uid, 'sortBy':sortBy }
        $.ajax({
            url : cur_url,
            type : "POST",
            data : data,
            
            success : function (data)
            {
                
               //typeof yourVariable === 'object'
               if(typeof data !== 'object' && data != '')
               {
                 data = data.toString();
                 var d = data.replace(/{"html":null}/g, '')
                   $('#remove-row').remove();
                    $('#item').append(d).show('slow');                                 
               }
               else
               {                     
                   $('#remove-row').remove();
               }
            },
            error: function(jqXHR, textStatus, errorThrown) 
             {
                 console.log(errorThrown);
                 // console.warn(jqXHR.responseText)
             }
        });
 }