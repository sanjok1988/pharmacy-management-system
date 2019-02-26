<template>
  <div class="animated fadeIn">
    <div class="row">
      <div class="col-sm-12">
        <b-card>
          <div slot="header">
            <strong>Create</strong> Form
          </div>
          <form id="create">
            <b-form-fieldset label="Employee *" :label-cols="3" :horizontal="true" aria-required="true">
            <b-form-select size="sm" v-model="att.employee" :plain="true"
              :options="['Please select','Option 1', 'Option 2', 'Option 3']"
              value="Please select">
            </b-form-select>
          </b-form-fieldset>
          <div class="row">
          <div class="col-sm-3">
            <h4>Click Here</h4>
          </div>
          <div class="col-sm-6">
          <b-button @click.prevent="submit" type="submit" size="sm" variant="success"><i class="fa fa-dot-circle-o"></i> Time-In *</b-button>
          <b-button @click.prevent="submit" type="submit" size="sm" variant="danger" class="pull-right"><i class="fa fa-dot-circle-o"></i> Time-Out *</b-button>
          </div>
          </div>
          <b-form-fieldset description="" label="Note" :label-cols="3" :horizontal="true">
            <b-form-input :textarea="true" :rows="9" v-model="att.specification">{{ att.note }}</b-form-input>
          </b-form-fieldset>
          
          <!-- <div slot="footer">
            <b-button @click.prevent="submit" type="submit" size="sm" variant="primary"><i class="fa fa-dot-circle-o"></i> Submit</b-button>
            <b-button type="reset" size="sm" variant="danger"><i class="fa fa-ban"></i> Reset</b-button>
          </div> -->
          </form>
        </b-card>
      </div><!--/.col-->
    </div><!--/.row-->
    
  </div>
</template>

<script>
export default {
  name: 'create_attendance',
  data() {
    return {
      att :{},
      is_editing:false
    }
  },
  created() {
      if(this.$route.params.id){
        this.is_editing = true;
        let uri = "api/attendance/edit/"+this.$route.params.id;
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
      axios.post('api/attendance/'+action, this.job).then((response) => {
  
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
