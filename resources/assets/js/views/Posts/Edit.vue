<template>
  <div class="animated fadeIn">
    <div class="row">
      <div class="col-sm-6">
        <b-card>
          <div slot="header">
            <strong>Edit</strong> Form
          </div>
          <form @submit.prevent="update">
          <b-form-fieldset
            label="Email"
            description="Enter Category Name.">
            <b-form-input type="text" placeholder="Category Display Name"  v-model="category.display_name"></b-form-input>
          </b-form-fieldset>
          <b-form-fieldset
            label="Slug"
            description="cannot change unique name.">
            <b-form-input type="name" placeholder="Unique Name" v-model="category.name" readonly></b-form-input>
          </b-form-fieldset>
          <div slot="footer">
            <b-button type="submit" size="sm" variant="primary"><i class="fa fa-dot-circle-o"></i> Submit</b-button>
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
  name: 'forms',
  data() {
    return {
      category:{}
    }
  },
  created() {
    
      let uri = "api/category/edit/"+this.$route.params.id;
      axios(uri).then((response) => {
        this.category = response.data;
      }).catch(error => {
         console.log('Error fetching and parsing data', error);
      })
  
  },
  methods: {
     update() {
          let uri = 'api/category/update/'+this.$route.params.id;
          axios.post(uri, this.category).then((response) => {
            
            this.$router.push({name: 'category'});
              
          });
        }
  }
}
</script>
