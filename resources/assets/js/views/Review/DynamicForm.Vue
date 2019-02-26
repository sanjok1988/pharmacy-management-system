<template>
<div class="animated fadeIn">
    <div class="row">
      <div class="col-sm-12">
        <b-card>
          <div slot="header">
            <strong>Create</strong> Form
          </div>
          <div id="form-wrapper">
              <vue-dynamic-form @submit-form="submitForm" :fields="fields" :entity="entity"></vue-dynamic-form>
          </div>
          </b-card>
        </div>
    
      </div>
  </div>
</template>

<script>

  import VueDynamicForm from 'vue-dynamic-form'
  export default {
    name: 'edit-form-tester',
    methods: {
      submitForm(data) {
        console.log(data)
      }
    },
    data () {
      return {
        fields: [
          {
            name: 'title',
            label: 'Title',
            type: 'text'
          },
          {
            name: 'test',
            label: 'rest',
            type: 'text'
          },
          {
            name: 'yes-no',
            label: 'Yes or No?',
            type: 'select',
            options: {
              yes: 'Yes',
              no: 'No'
            }
          },
          {
            name: 'body',
            label: 'Body',
            type: 'textarea',
            rows: 8,
            cols: 30
          }
        ],
        entity: {
          'yes-no': 'yes',
          body: '<p>Welcome to paradise</p><p>Have another paragraph on me.</p>',
          title: 'Hello World'
        }
      }
    },
    components: {
      VueDynamicForm
    }
  }
</script>