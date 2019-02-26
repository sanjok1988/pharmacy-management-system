<template>
  <div class="animated fadeIn">
    <div class="row">
      <div class="col-sm-12">
        <b-card>
          <div slot="header">
            <strong>Create</strong> Form
          </div>
          <form id="create">
          <b-form-fieldset description="" label="Company Name" :label-cols="3" :horizontal="true">
          <b-form-input type="text" v-model="company.name"></b-form-input>
          </b-form-fieldset>
          <b-form-fieldset label="Details" :label-cols="3" :horizontal="true">
            <b-form-input :textarea="true" :rows="9" placeholder="Content.." v-model="company.details"></b-form-input>
          </b-form-fieldset>
          <b-form-fieldset description="" label="Address" :label-cols="3" :horizontal="true">
            <b-form-input type="text" v-model="company.address"></b-form-input>
          </b-form-fieldset>
          <b-form-fieldset label="Type" :label-cols="3" :horizontal="true">
            <b-form-select v-model="company.type" :plain="true" value="please select type"
              :options="['Please select','Option 1', 'Option 2', 'Option 3']"
            >
            </b-form-select>
          </b-form-fieldset>
          <b-form-fieldset label="Country"  :label-cols="3" :horizontal="true">
            <b-form-select size="sm" v-model="company.country" :plain="true"
              :options="['Please select','Nepal', 'China', 'UK']"
              value="Please select">
            </b-form-select>
          </b-form-fieldset>
          <b-form-fieldset label="Time Zome" :label-cols="3" :horizontal="true">
            <b-form-select
            v-model="company.time_zone" size="sm" :plain="true"
              :options="['Please select','Option 1', 'Option 2', 'Option 3']"
              value="Please select">
            </b-form-select>
          </b-form-fieldset>
          <b-form-fieldset label="Parent" :label-cols="3" :horizontal="true">
            <b-form-select size="sm" v-model="company.parent" :plain="true"
              :options="['Please select','Option 1', 'Option 2', 'Option 3']"
              value="Please select">
            </b-form-select>
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
  name: 'create_company',
  data() {
    return {
      company :{},
      is_editing:false
    }
  },
  created() {
      if(this.$route.params.id){
        this.is_editing = true;
        let uri = "api/company/edit/"+this.$route.params.id;
        axios(uri).then((response) => {
          this.company = response.data;
        }).catch(error => {
          console.log('Error fetching and parsing data', error);
        })
      }  
  },
  methods: {
    submit() {
     
      console.log(this.company);
			// var content = CKEDITOR.instances.myeditor.getData();
			// data.append('content', content);
      // data.append('file', this.file);
      var action = 'store';
      if(this.is_editing){
        action = 'update/'+this.$route.params.id;
      }
      axios.post('api/company/'+action, this.company).then((response) => {
  
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
