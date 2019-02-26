<template>
  <div class="animated fadeIn">
    <div class="row">
      <div class="col-sm-12">
        <b-card>
          <div slot="header">
            <strong>Create</strong> Form
          </div>
          <form id="create">
          <b-form-fieldset description="" label="Job Title" :label-cols="3" :horizontal="true">
          <b-form-input type="text" v-model="job.name"></b-form-input>
          </b-form-fieldset>
          <b-form-fieldset label="Description" :label-cols="3" :horizontal="true">
            <b-form-input :textarea="true" :rows="9" placeholder="Content.." v-model="job.description">{{ job.description }}</b-form-input>
          </b-form-fieldset>
          <b-form-fieldset description="" label="Specification" :label-cols="3" :horizontal="true">
            <b-form-input :textarea="true" :rows="9" v-model="job.specification">{{ job.specification }}</b-form-input>
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
  name: 'create_job',
  data() {
    return {
      job :{},
      is_editing:false
    }
  },
  created() {
      if(this.$route.params.id){
        this.is_editing = true;
        let uri = "api/jobs/edit/"+this.$route.params.id;
        axios(uri).then((response) => {
          this.job = response.data;
        }).catch(error => {
          console.log('Error fetching and parsing data', error);
        })
      }  
  },
  methods: {
    submit() {
     
      var action = 'store';
      if(this.is_editing){
        action = 'update/'+this.$route.params.id;
      }
      axios.post('api/jobs/'+action, this.job).then((response) => {
  
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
    }
  }
}
</script>
