<template>
  <div class="animated fadeIn">
    <div class="row">
      <div class="col-sm-6">
        <b-card>
          <div slot="header">
            <strong>Create</strong> Form
          </div>
          <form id="create">
          <b-form-fieldset
            label="Email"
            description="Enter Category Name.">
            <b-form-input type="text" placeholder="Category Display Name"  v-model="category.display_name"></b-form-input>
          </b-form-fieldset>
          <b-form-fieldset
            label="Slug"
            description="Please enter unique name.">
            <b-form-input type="name" placeholder="Unique Name" v-model="category.name"></b-form-input>
          </b-form-fieldset>
          <div slot="footer">
            <b-button @click.prevent="submit" type="submit" size="sm" variant="primary"><i class="fa fa-dot-circle-o"></i> Submit</b-button>
            <b-button type="reset" size="sm" variant="danger"><i class="fa fa-ban"></i> Reset</b-button>
          </div>
          </form>
        </b-card>
      </div><!--/.col-->
    </div><!--/.row-->
    
  </div>
</template>

<script>
export default {
  name: 'create_category',
  data() {
    return {
      category :{}
    }
  },
  methods: {
    submit() {
     
      console.log(this.category);
			// var content = CKEDITOR.instances.myeditor.getData();
			// data.append('content', content);
			// data.append('file', this.file);

      axios.post('api/category/store', this.category).then((response) => {
  
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
