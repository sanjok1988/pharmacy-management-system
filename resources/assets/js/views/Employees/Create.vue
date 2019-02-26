<template>
  <div class="animated fadeIn">
    <div class="row">
      <div class="col-sm-12">
        <b-card>
          <div slot="header">
            <strong>Create</strong> Form
          </div>
          <form id="create">
          <b-form-fieldset description="" label="First Name" :label-cols="3" :horizontal="true">
            <b-form-input type="text" v-model="data.first_name"></b-form-input>
          </b-form-fieldset>
          <b-form-fieldset label="Middle Name" :label-cols="3" :horizontal="true">
            <b-form-input type="text" v-model="data.middle_name"></b-form-input>
          </b-form-fieldset>
          <b-form-fieldset label="Last Name" :label-cols="3" :horizontal="true">
            <b-form-input type="text" v-model="data.last_name"></b-form-input>
          </b-form-fieldset>
          <b-form-fieldset description="" label="Nationality" :label-cols="3" :horizontal="true">
            <b-form-input type="text" v-model="data.nationality"></b-form-input>
          </b-form-fieldset>
          <b-form-fieldset description="" label="Date of birth" :label-cols="3" :horizontal="true">
            <b-form-input type="date" v-model="data.dob"></b-form-input>
          </b-form-fieldset>
          <b-form-fieldset label="Martial Status" :label-cols="3" :horizontal="true">
            <b-form-select size="sm" :plain="true"
              :options="['Please select','Married', 'Single', 'Widow']"
              value="Please select" v-model="data.martial_status">
            </b-form-select>
          </b-form-fieldset>
          <b-form-fieldset label="Immigration Status" :label-cols="3" :horizontal="true">
            <b-form-select size="sm" :plain="true"
              :options="['Please select','Option 1', 'Option 2', 'Option 3']"
              value="Please select">
            </b-form-select>
          </b-form-fieldset>
          <b-form-fieldset description="" label="Other ID" :label-cols="3" :horizontal="true">
            <b-form-input type="text" v-model="data.other_id"></b-form-input>
          </b-form-fieldset>
          <b-form-fieldset description="" label="Driving licence No." :label-cols="3" :horizontal="true">
            <b-form-input type="text" v-model="data.driving_licence_no"></b-form-input>
          </b-form-fieldset>
          <b-form-fieldset label="Employee Status" :label-cols="3" :horizontal="true">
            <b-form-select size="sm" :plain="true"
              :options="['Please select','working', 'not working']"
              value="Please select" v-model="data.employee_status">
            </b-form-select>
          </b-form-fieldset>
          <b-form-fieldset label="Job Title" :label-cols="3" :horizontal="true">
            <b-form-select size="sm" :plain="true"
              :options="['Please select','Er', 'DR']"
              value="Please select" v-model="data.job_title">
            </b-form-select>
          </b-form-fieldset>
          <b-form-fieldset label="Pay Grade" :label-cols="3" :horizontal="true">
            <b-form-select size="sm" :plain="true"
              :options="['Please select','Er', 'DR']"
              value="Please select" v-model="data.pay_grade">
            </b-form-select>
          </b-form-fieldset>
          <b-form-fieldset description="" label="Temporary Address" :label-cols="3" :horizontal="true">
            <b-form-input type="text" v-model="data.temp_address"></b-form-input>
          </b-form-fieldset>
           <b-form-fieldset description="" label="Permanent Address" :label-cols="3" :horizontal="true">
            <b-form-input type="text" v-model="data.per_address"></b-form-input>
          </b-form-fieldset>
          <b-form-fieldset description="" label="City" :label-cols="3" :horizontal="true">
            <b-form-input type="text" v-model="data.city"></b-form-input>
          </b-form-fieldset>
          <b-form-fieldset description="" label="Country" :label-cols="3" :horizontal="true">
            <b-form-input type="text" v-model="data.country"></b-form-input>
          </b-form-fieldset>
          <b-form-fieldset description="" label="Province" :label-cols="3" :horizontal="true">
            <b-form-input type="text" v-model="data.province"></b-form-input>
          </b-form-fieldset>
          <b-form-fieldset description="" label="Postal Code" :label-cols="3" :horizontal="true">
            <b-form-input type="text" v-model="data.postal_code"></b-form-input>
          </b-form-fieldset>
          <b-form-fieldset description="" label="Home Phone" :label-cols="3" :horizontal="true">
            <b-form-input type="text" v-model="data.home_phone"></b-form-input>
          </b-form-fieldset>
          <b-form-fieldset description="" label="Mobile" :label-cols="3" :horizontal="true">
            <b-form-input type="text" v-model="data.mobile"></b-form-input>
          </b-form-fieldset>
          <b-form-fieldset description="" label="Work Phone" :label-cols="3" :horizontal="true">
            <b-form-input type="text" v-model="data.work_phone"></b-form-input>
          </b-form-fieldset>
          <b-form-fieldset description="" label="work_email" :label-cols="3" :horizontal="true">
            <b-form-input type="text" v-model="data.work_email"></b-form-input>
          </b-form-fieldset>
          <b-form-fieldset description="" label="Private Email" :label-cols="3" :horizontal="true">
            <b-form-input type="text" v-model="data.private_email"></b-form-input>
          </b-form-fieldset>
          <b-form-fieldset description="" label="Joined Date" :label-cols="3" :horizontal="true">
            <b-form-input type="date" v-model="data.joined_date"></b-form-input>
          </b-form-fieldset>
          <b-form-fieldset description="" label="Termination Date" :label-cols="3" :horizontal="true">
            <b-form-input type="date" v-model="data.termination_date"></b-form-input>
          </b-form-fieldset>
          <b-form-fieldset description="" label="Department" :label-cols="3" :horizontal="true">
            <b-form-input type="text" v-model="data.department"></b-form-input>
          </b-form-fieldset>
          <b-form-fieldset description="" label="Gender" :label-cols="3" :horizontal="true">
            <b-form-select size="sm" :plain="true"
              :options="['Please select','Male', 'Female']"
              value="Please select" v-model="data.gender">
            </b-form-select>
          </b-form-fieldset>
          <b-form-fieldset description="" label="Supervisor" :label-cols="3" :horizontal="true">
            <b-form-select size="sm" :plain="true"
              :options="['Please select','Sanjok', 'Rajesh']"
              value="Please select" v-model="data.supervisor">
            </b-form-select>
          </b-form-fieldset>
          <b-form-fieldset label="Notes" :label-cols="3" :horizontal="true">
            <b-form-input :textarea="true" :rows="9" placeholder="Content.." v-model="data.notes"></b-form-input>
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
  name: 'create_employee',
  data() {
    return {
      data :{},
      is_editing:false
    }
  },
    created() {
      if(this.$route.params.id){
        this.is_editing = true;
        let uri = "api/employees/edit/"+this.$route.params.id;
        axios(uri).then((response) => {
          this.data = response.data;
        }).catch(error => {
          console.log('Error fetching and parsing data', error);
        })
      }  
  },
  methods: {
    submit() {
    
			// var content = CKEDITOR.instances.myeditor.getData();
			// data.append('content', content);
			// data.append('file', this.file);
      var action = 'store';
      if(this.is_editing){
        action = 'update/'+this.$route.params.id;
      }
      axios.post('api/employees/'+action, this.data).then((response) => {
  
        if(response.status == 200) {
          if(action == 'store')
          data = {};
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
