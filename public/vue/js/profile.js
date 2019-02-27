var vm = new Vue({
    el : "#posts",
    data:{
        user_id:id,
        aid:ad_id,
        ad:'',
        url:'JOBP/public'
    },
    mounted(){
      
    },
    methods:{
        detail(e) {
            element = e.currentTarget
                    
            this.aid = element.getAttribute('ad_id');         
           
            window.location.href = '../'+ this.aid +'/detail';
         
           
        },
        trainee_detail(e) {
            element = e.currentTarget
                    
            this.aid = element.getAttribute('ad_id');         
           
            window.location.href = '../detail/'+ this.aid ;
         
           
        },
      
        interestedWithUser: function(event){
           
            element = event.currentTarget
                    
            ad_id = element.getAttribute('ad_id');	
            this.aid = ad_id;		
            var element = document.getElementById("interestedWithUser");
            var star = document.getElementById("start");
            var m = $("#interestedWithUser");
            var status = m.attr("status");
           
            if(status === 'a'){
                m.attr("status", "b");
                    
                    $('.icon').removeClass("icon-star");
                    $('.icon').addClass("icon-star1");

                    $('#a').attr('hidden', true);
                    $("#b").removeAttr('hidden');
                   
                    element.classList.remove("secondary-lg");
            } else if(status === 'b') {
                m.attr("status", "a");
                $('#b').attr('hidden', true);
                    $("#a").removeAttr('hidden');
                   
                    element.classList.add("secondary-lg");
                    $('.icon').addClass("icon-star");
                    $('.icon').removeClass("icon-star1");
                   
                    
            }
    
            this.$http.get('../../../customer/interested/' + this.user_id + '/'+ad_type+'/' + ad_id).then((response) => {
                
                if(response.data[0] == '200'){
                    // $('#b').attr('hidden', true);
                    // $("#a").removeAttr('hidden');
                    // element.classList.add("mybtn");
                    // element.classList.remove("secondary-lg");

                    // $('.icon-star').attr('hidden', true);
                    // $('.icon-star1').removeAttr('hidden');

                }else if(response.data[0] == 'exist'){
                    // $('.icon-star1').attr('hidden', true);
                    // $('.icon-star').removeAttr('hidden');

                    // $('#a').attr('hidden', true);
                    // $("#b").removeAttr('hidden');
                    // element.classList.remove("mybtn");
                    // element.classList.add("secondary-lg");

                    // star.classList.remove("icon-star1");
                    // star.classList.add("icon-star");
                    
                }

            });
        }
        
        
    }
});