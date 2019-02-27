Vue.config.devtools = true;
vm = new Vue({
    el:'#posts',
    url:'http://dinhatnao.sakura.ne.jp/JOBP/public/',
    data: {

    },
    mounted(){
       console.log('loading...');
    },
    methods:{
   
        register: function(){
            $("#r").removeAttr("hidden");
            var p = $('#password1').val();
            var confirmPass = $('#re_password').val();
           
            if(p !== confirmPass){
                alert('confirmation password donot match with password');
                $("#r").attr("hidden",true);
                return;
            }

            var data = new FormData(document.getElementById("register-customer"));
            
            this.$http.post('customer/register', data).then((response)=>{
                
                res = response.data[0];
              
                if(response.status != 200){
                    toastr.warning('failed to send email', 'Warning Alert', {
                        timeOut: 5000
                    });
                }else if(response.status === 200){                  
                
					//window.location.href = url+'mail.verification';
					$('#exampleModalLong').modal('hide');
					$('#interestedWithOutUser').hide();
                    $('#interestedWithUser').show();
                                       
                    vm.user_id = response.data[2];
                    
                    //window.location.replace(this.url+'mail.verification');
                }
                $("#r").attr("hidden",true);
            },(response) => {
                $("#r").attr("hidden",true);
				this.formErrors = response.data;
			});
        },
        submitForm: function(){
         
            $("#l").removeAttr("hidden");
            var data = new FormData();
            var data = new FormData(document.getElementById("submit"));
            this.$http.post('customer/login/verify', data).then((response)=>{
                res = response.data[0];
                if(res == 0 || res == 1){
                    toastr.warning(response.data[1], 'Warning Alert', {
                        timeOut: 5000
                    });
                }else if(res == 200){
					$('#exampleModalLong').modal('hide');
				
                    document.location.reload(); 
					this.user_id = response.data[2];
                    toastr.success(response.data[1], 'Successfully LoggedIn! Welcome sir', {
                        timeOut: 5000
                    });
                }
                $("#l").attr("hidden",true);
            },(response) => {
                $("#l").attr("hidden",true);
				this.formErrors = response.data;
			});
        },
        viewLogin(){
            $('#exampleModalLong').modal('show');$("#popup").hide();
        }
    }

});