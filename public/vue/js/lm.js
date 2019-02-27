
var page = 2;
$(document).on('click','#btn-more',function(e){
    e.preventDefault();
    
    loadMoreData(page);
        page++;
        
});
$(document).ready(function(){
    AOS.init();	
    $("#showPopUp").click(function(e){
        e.preventDefault();
        $("#search").modal('show');
    }
    );
    
    
    // $(window).scroll(function() {
    //     if($(window).scrollTop() + $(window).height() >= $(document).height()) {
    //         page++;
    //         loadMoreData(page);
    //     }
    // });
});

$(document).on("click", "a.login", function(e){
    e.preventDefault();
    $('#exampleModalLong').modal('show');
    
});

function loadMoreData(page) {
    var data = {'page':page, 'BurdenCostId':bid, 'AnnualIncomeId':aid, 'jobcategoryId':jid, 'sortBy':sortBy}

    $("#btn-more").html("Loading....").hide().fadeIn(1000);
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
                $('#item').append(d);                                
            }
            else
            {                       
            
                $('#remove-row').remove();
            }
        }
    });
}
    