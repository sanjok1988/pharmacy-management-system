<template>
  <div class="animated fadeIn">
    <div class="row">
      <div class="col-sm-12">
        <b-card>
          <div slot="header">
            <strong>Send For</strong> Review
          </div>
          <form id="create">
              <div class="row">
            <div class="col-sm-6">
                

                  <b-form-fieldset
                    label="Select Employees For Review"
                    :label-cols="9"
                    :horizontal="true" >
                    <div >
                        <b-form-checkbox :plain="true" v-for="emp in employees" :value="emp.id" v-model="selected">{{ emp.first_name }}</b-form-checkbox><br>
                    </div>
                     </b-form-fieldset>

            </div>
            
                <div class="col-sm-6">



                    <b-form-fieldset
                description="co-ordinator"
                label="Enter co-ordinator"
                :label-cols="6"
                :horizontal="true">
                <b-form-input type="text"></b-form-input>
                  </b-form-fieldset>

                <label>Select Form Template:</label>
                    <select v-model="temp_id">
                    <option disabled value="">Please select one</option>
                    <option v-for="item in templates" :value="item.id">{{item.name}}</option>
                </select>
            </div>
          </div>
          <div slot="footer">
            <b-button @click.prevent="submit" type="submit" size="sm" variant="primary"><i class="fa fa-dot-circle-o"></i> Send For Review</b-button>
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
  name: 'send_review',
  data() {
    return {
        selected:[],
        temp_id:"",
        employees:{},
        templates:{},
      data :{}
    }
  },
  mounted(){
      this.fetchEmployees();
      this.fetchTemplates();
  },
  methods: {
      fetchEmployees(){
            axios.get('api/employees/fetch').then((response) => {
                this.employees = response.data
            });
      },
      fetchTemplates(){
            axios.get('api/template/fetch').then((response) => {
                console.log(response.data)
                this.templates = response.data
                this.data = response.data
            });
      },
    submit() {
     
      console.log(this.data);
			// var content = CKEDITOR.instances.myeditor.getData();
			// data.append('content', content);
            // data.append('file', this.file);
            this.data = {'employee_ids': this.selected, 'temp_id':this.temp_id}

      axios.post('api/review/send', this.data).then((response) => {
  
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
