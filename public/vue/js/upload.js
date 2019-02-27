
    var vm = new Vue({
        el:'#posts',
        data:{
            image:''
        },
        mounted(){
        
        },
        methods:{
            upload: function () {
                
                $('#uploadfile').click();
               
                //$('#image').hide();
                // var data = new FormData();
                // data.append('file', this.file);
                // console.log(this.file.name);
                // this.$http.post('upload', data).then((response) => {
                //     return this.file.name;
                // });
            },
            onFileChange(e) {
                var files = e.target.files || e.dataTransfer.files;
                if (!files.length) return;
                this.file = files[0];
                this.createImage(files[0]);
$('#image').hide();
            },
            createImage(file) {
                //  console.log(file);
                var image = new Image();
                var reader = new FileReader();
                var vm = this;
                reader.onload = (e) => {
                    vm.image = e.target.result;
                };
                reader.readAsDataURL(file);
            },
            removeImage: function (e) {
                this.image = '';
            }
    
    
        }

    });
