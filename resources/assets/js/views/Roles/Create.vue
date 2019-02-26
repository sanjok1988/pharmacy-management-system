<template>
  <div class="animated fadeIn">
    <div class="row">
      <div class="col-sm-6">
        <b-card>
          <div slot="header">
            <strong><span v-if="is_editing">Edit</span><span v-else>Create</span></strong> Form
          </div>
          <b-form-fieldset label="Name" description="Please enter your Name.">
            <b-form-input type="text" placeholder="Enter Name.." v-model="data.name"></b-form-input>
          </b-form-fieldset>
          <b-form-fieldset label="Email" description="Please enter your email.">
            <b-form-input type="email" placeholder="Enter Email.." v-model="data.email"></b-form-input>
          </b-form-fieldset>
          <div v-if="is_editing">
            <b-form-fieldset label="Old Password" description="Please enter old password.">
            <b-form-input type="password" placeholder="Enter Password.." v-model="data.current_password"></b-form-input>
          </b-form-fieldset>
       
          <b-form-fieldset>          
              <b-form-checkbox :plain="true" v-model="is_change_password">Click To Change Password</b-form-checkbox>              
          </b-form-fieldset>
          </div>
          <div v-else>
            <b-form-fieldset label="Password" description="Please enter your password.">
              <b-form-input type="password" placeholder="Enter Password.." v-model="data.password"></b-form-input>
            </b-form-fieldset>
   
          </div>
          <div v-if="is_change_password">
            <b-form-fieldset label="New Password" description="Please enter your new password.">
              <b-form-input type="password" placeholder="Enter New Password.." v-model="data.new_password"></b-form-input>
            </b-form-fieldset>
            
          </div>
          <div v-if="!is_editing || is_editing && is_change_password">
            <b-form-fieldset label="Confirm Password" description="Please enter your confirmation password.">
              <b-form-input type="password" placeholder="Enter Confirmation Password.." v-model="data.password_confirmation"></b-form-input>
            </b-form-fieldset>
          </div>
          <div slot="footer">
            <b-button @click.prevent="submit" type="submit" size="sm" variant="primary"><i class="fa fa-dot-circle-o"></i> Submit</b-button>
            <b-button type="reset" size="sm" variant="danger"><i class="fa fa-ban"></i> Reset</b-button>
          </div>
        </b-card>
      </div><!--/.col-->
    </div><!--/.row-->
    
  </div>
</template>

<script>
export default {
  name: 'create_users',
  data() {
    return {
      data :{},
      is_editing:false,
      is_change_password:false
    }
  },
    created() {
      if(this.$route.params.id){
        this.is_editing = true;
        let uri = "api/users/edit/"+this.$route.params.id;
        axios(uri).then((response) => {
          this.data = response.data;
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
      axios.post('api/users/'+action, this.data).then((response) => {
  
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
