
<template>

  <div class="animated fadeIn">
    <div class="">
      <div class="card">
        <div class="card-header"><div><i class="fa fa-edit"></i> Create Posts
        </div>
      </div>
      <div class="row card-block">
       <div class="col-8">
         <b-form-fieldset
                label="Title"
                description="">
                <b-form-input type="text" placeholder="Enter Post Title"  v-model="posts.title"></b-form-input>
              </b-form-fieldset>
              <b-form-fieldset
                label="Post Content"
                description="">
                <textarea id="editor" rows="9" name="editor" placeholder="Content.." class="form-control"></textarea>
                
              </b-form-fieldset>

       </div>
      <div class="col-4">
        <b-form-fieldset label="Choose Category">
          <div v-for="item in category" :key="item.id">
                <!-- <input v-model="checked" type="radio" name="category[]" :value="item.name"> {{item.display_name}} -->
                <!-- <input v-model="checked" type="checkbox" name="category[]" :value="item.name">{{ item.name }}</label> -->
                <b-form-checkbox id="checkbox1"
                     v-model="checked"
                     :value="item.name"
                     unchecked-value="not_accepted">
                {{item.display_name}}
                </b-form-checkbox>
  
          </div>
              </b-form-fieldset>
      </div>
      <div slot="footer">
            <b-button @click.prevent="submit" type="submit" size="sm" variant="primary"><i class="fa fa-dot-circle-o"></i> Submit</b-button>
            <b-button type="reset" size="sm" variant="danger"><i class="fa fa-ban"></i> Reset</b-button>
      </div>
      </div>
      </div>
      
    </div><!--/.row-->
    
  </div>
  
</template>

<script>

ClassicEditor
		.create( document.querySelector( '#editor' ), {
			 toolbar: [ 'heading', '|', 'bold', 'italic', 'link' ]
		} )
		.then( editor => {
			window.editor = editor;
		} )
		.catch( err => {
			console.error( err.stack );
		} );

export default {
  name: 'create-post',
  data() {
    return {
      posts :{},
      category:{},
      checked:[]
    }
  },
  created(){
    this.fetch();
  },
  methods: {
    fetch() {
      axios.get('api/category/list')
      .then(response => {
        this.category = response.data.category
      })
      .catch(error => {

      })
    },
    submit() {
     

			// var content = CKEDITOR.instances.myeditor.getData();
			// data.append('content', content);
			// data.append('file', this.file);

      axios.post('api/posts/store', this.posts).then((response) => {
  
        if(response.status == 200) {
          toastr.success('Success', 'Success Alert', {
            timeOut: 3000
          });

        } else {
          toastr.success('Failed', 'Error Alert', {
            timeOut: 3000
          });
        }

      }).catch(error => {
         console.log('Error fetching and parsing data', error);
      })
    },
    click () {
      // do nothing
    }
  }
}
</script>
