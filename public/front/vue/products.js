

var vm = new Vue({
    el:'#app',
    store,
    data:{
       
        pres:[],
        nonpres:[],
        gt:0

    },
    mounted(){
        this.get_products_by_type('pres');
        this.get_products_by_type('nonpres');
        this.getGT();
    },
    computed(){

    },
    methods:{
        show(id){

            window.location.href = '../product/view?id='+id;
        },
        upload(id){
            swal({
                title: "Please Upload Prescription!",
                text: "You Need To Sign In For Uploading!",
                type: "info",
                showCancelButton: true,
                confirmButtonClass: "btn-success",
                confirmButtonText: "Ok",
                closeOnConfirm: false
              },
              function(){
                window.location.href = '../upload?id='+id;
              });

          
        
            

           
            
        },
        add_to_cart(p){
            console.log('loading');
            
            this.$http.get('../add/to/cart?id='+p.id).then((response)=>{
                console.log(response.data.total);
                this.getGT(response.data.total);
                
                toastr.success('Thank You!', 'Added To Cart', {
                    timeOut: 5000
                });
    
            });
        },
        get_products_by_type(type){
            this.$http.get('data?type='+type).then((response)=>{
                console.log(response);
                if(type == 'pres')
                this.get_pres(response.data)
                else
                this.get_non_pres(response.data)
                
            });
        },
        get_pres(data){
            this.pres = data;
        },
        get_non_pres(data){
            this.nonpres = data;
        },
        getGT(){
            this.$http.get('../cart/total').then((response)=>{
              
               this.gt = response.data.total;
                
            });
           
        }
        

    }
});