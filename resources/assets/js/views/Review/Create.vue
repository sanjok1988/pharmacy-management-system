<template>
  <div class="animated fadeIn">
    <div class="row">
      <div class="col-sm-4">
        <b-card>
          <div slot="header">
            <strong>Create</strong> Form
          </div>
<b-form-fieldset description="" label="Template Name" :label-cols="12" :horizontal="true">
            <b-form-input type="text" v-model="name"></b-form-input>
          </b-form-fieldset>
          <div class="panel-body">
            
            <vue-form-generator :schema="schema" :model="model" :options="formOptions"></vue-form-generator>
          </div>
     
        <div slot="footer">
            <b-button @click.prevent="submit" type="submit" size="sm" variant="primary"><i class="fa fa-dot-circle-o"></i> Submit</b-button>
            <b-button @click.prevent="store" type="submit" size="sm" variant="primary"><i class="fa fa-dot-circle-o"></i> Store Review</b-button>
            <b-button type="reset" size="sm" variant="danger"><i class="fa fa-ban"></i> Reset</b-button>
          </div>
        </b-card>

        

      </div><!--/.col-->
      

      <div class="col-sm-4">
        <b-card>
          <div slot="header">
            <strong>Create</strong> Form
          </div>
          <!-- <div v-for="field in schema.fields"> -->
          <b-form-fieldset description="" label="Label" :label-cols="3" :horizontal="true">
            <b-form-input type="text" v-model="field.label"></b-form-input>
          </b-form-fieldset>

           <b-form-fieldset label="Type" :label-cols="3" :horizontal="true">
            <b-form-select size="sm" :plain="true"
              :options="['input','label','textarea', 'select']"
              value="input" v-model="field.type">
            </b-form-select>
          </b-form-fieldset>  

        <b-form-fieldset label="Input Type" :label-cols="6" :horizontal="true">
            <b-form-select size="sm" :plain="true"
              :options="['input','text', 'select', 'checkbox', 'checklist', 'radio', 'email', 'password', 'number']"
              value="input" v-model="field.inputType" >
            </b-form-select>
          </b-form-fieldset>

          <div v-if="field.inputType">
            <div v-if="field.inputType == 'radio' || field.inputType == 'select'">
              
                        <b-form-fieldset label="Options" :label-cols="6" :horizontal="true">
                        <b-form-input size="sm" type="text"
                          value="" v-model="option">
                        </b-form-input>
                      </b-form-fieldset>
                      <b-button @click.prevent="addOption"  type="submit" size="sm" variant="danger"><i class="fa fa-ban"></i> Add Option</b-button>

            </div>
            </div>        
        <b-form-fieldset description="" label="Point" :label-cols="3" :horizontal="true">
            <b-form-input type="text" v-model="field.point"></b-form-input>
          </b-form-fieldset>
           <b-form-fieldset description="" label="Model" :label-cols="3" :horizontal="true">
            <b-form-input type="text" v-model="field.model"></b-form-input>
          </b-form-fieldset>
           <b-form-fieldset description="" label="PlaceHolder" :label-cols="3" :horizontal="true">
            <b-form-input type="text" v-model="field.placeholder"></b-form-input>
          </b-form-fieldset>  
          
          

          <b-form-fieldset label="ReadOnly" :label-cols="3" :horizontal="true">
            <b-form-select size="sm" :plain="true"
              :options="['true','false']"
              value="input" v-model="field.readonly">
            </b-form-select>
          </b-form-fieldset>

           
     
        <div slot="footer">
            
            <b-button @click.prevent="addField"  type="submit" size="sm" variant="danger"><i class="fa fa-ban"></i> Add Field</b-button>
          </div>
        </b-card>

        

      </div><!--/.col-->
      <div class="col-sm-4">
        <b-card>
          <div slot="header">
            <strong>Create</strong> Form
          </div>
<pre>
  {{ field }}
  </pre>
  <pre>
  {{ option }}
  </pre>
          <div class="panel panel-default">
            <div class="panel-heading">Model</div>
            <div class="panel-body">
              <pre v-if="model" v-html="prettyJSON(model)"></pre>
            </div>
          </div>

          <div class="panel-body">
             <div class="panel panel-default">
            <div class="panel-heading">Schema</div>
            <div class="panel-body">
              <pre v-if="model" v-html="prettyJSON(schema)"></pre>
            </div>
          </div>
          </div>
        </b-card>

        

      </div><!--/.col-->
    </div><!--/.row-->
    
  </div>
</template>

<script>
import 'vue-form-generator/dist/vfg.css'
import VueFormGenerator from "vue-form-generator";
  import "vue-form-generator/dist/vfg.css";  // optional full css additions

  export default {
  data () {
    return {
      name:'',
      is_editing: false,
      option:[],
      field:{
            type: '',
            inputType: '',
            label: '',
            model: '',
            point:'',
            values:[],
            readonly: false,
            disabled: false,

      },
           
      model: {
        // id: 1,
        // name: 'John Doe',
        // password: 'J0hnD03!x4',
        // skills: ['Javascript', 'VueJS'],
        // email: 'john.doe@gmail.com',
        // status: true
      },
      schema: {
        fields: [
          // {
          //   type: '',
          //   inputType: '',
          //   label: '',
          //   model: '',
          //   point:'',
          //   readonly: true,
          //   disabled: true
          // },
          // {
          //   type: 'input',
          //   inputType: 'text',
          //   label: 'Name',
          //   model: 'name',
          //   placeholder: 'Your name',
          //   featured: true,
          //   required: true
          // },
          // {
          //   type: 'input',
          //   inputType: 'password',
          //   label: 'Password',
          //   model: 'password',
          //   min: 6,
          //   required: true,
          //   hint: 'Minimum 6 characters',
          //   validator: VueFormGenerator.validators.string
          // },
          // {
          //   type: 'select',
          //   label: 'Skills',
          //   model: 'skills',
          //   values: ['Javascript', 'VueJS', 'CSS3', 'HTML5']
          // },
          // {
          //   type: 'input',
          //   inputType: 'email',
          //   label: 'E-mail',
          //   model: 'email',
          //   placeholder: 'User\'s e-mail address'
          // },
          // {
          //   type: 'checkbox',
          //   label: 'Status',
          //   model: 'status',
          //   default: true
          // }
        ]
      },
      formOptions: {
        validateAfterLoad: true,
        validateAfterChanged: true,
        validateAsync: true
      }
    }
  },
  watch: {
    
  },
  created: function() {
   
  },
 
  mounted() {
    if(this.$route.params.id){
        this.is_editing = true;
        let uri = "api/template/edit/"+this.$route.params.id;
        axios(uri).then((response) => {
          console.log(response.data.name);
          this.name = response.data.name;
          this.schema.fields = response.data.fields;
        }).catch(error => {
          console.log('Error fetching and parsing data', error);
        })
      }  
  },
  methods: {
    
    addOption(){
      
      this.field.values.push(this.option);
      this.option = "";

    },
    addField() {
      //this.field.type = "input";
      this.schema.fields.push(Vue.util.extend({}, this.field));
      
    },
    submit() {
      console.log(this.model);
      var data = [];
      data.push({'name':this.name, 'schema':this.schema});
       axios.post('api/template/create', data).then((response) => {
  
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
    store() {
      console.log(this.model);
       axios.post('api/review/employee/store', this.model).then((response) => {
  
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
    removeApartment: function (index) {
      Vue.delete(this.fields, index);
    },
    prettyJSON: function(json) {
            if (json) {
                json = JSON.stringify(json, undefined, 4);
                json = json.replace(/&/g, '&').replace(/</g, '<').replace(/>/g, '>');
                return json.replace(/("(\\u[a-zA-Z0-9]{4}|\\[^u]|[^\\"])*"(\s*:)?|\b(true|false|null)\b|-?\d+(?:\.\d*)?(?:[eE][+\-]?\d+)?)/g, function(match) {
                    var cls = 'number';
                    if (/^"/.test(match)) {
                        if (/:$/.test(match)) {
                            cls = 'key';
                        } else {
                            cls = 'string';
                        }
                    } else if (/true|false/.test(match)) {
                        cls = 'boolean';
                    } else if (/null/.test(match)) {
                        cls = 'null';
                    }
                    return '<span class="' + cls + '">' + match + '</span>';
                });
            }
        },
        getIndex (item) {
          return item.findIndex(i => i.id === 2)
        }
  }
}
</script>