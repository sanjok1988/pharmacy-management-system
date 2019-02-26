<template>
  <div class="app flex-row align-items-center">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="card-group mb-0">
            <div class="card p-4">
              <div class="card-body">
                <h1>Login</h1>
                <p class="text-muted">Sign In to your account</p>
                <p>{{error}}</p>
                <div class="input-group mb-3">
                  <span class="input-group-addon"><i class="icon-user"></i></span>
                  <input type="text" class="form-control" placeholder="Username" v-model="user.username" required>
                </div>
                <div class="input-group mb-4">
                  <span class="input-group-addon"><i class="icon-lock"></i></span>
                  <input type="password" class="form-control" placeholder="Password" v-model="user.password" required>
                </div>
                <div class="row">
                  <div class="col-6">
                    <button @click="login" type="button" class="btn btn-primary px-4">Login</button>
                  </div>
                  <div class="col-6 text-right">
                    <button type="button" class="btn btn-link px-0">Forgot password?</button>
                  </div>
                </div>
              </div>
            </div>
            <div class="card text-white bg-primary py-5 d-md-down-none" style="width:44%">
              <div class="card-body text-center">
                <div>
                  <h2>Demo credential</h2>
                  <p>email: admin@gmail.com</p>
                  <p>password: admin</p>
                  <!-- <button @click.prevent="login" type="button" class="btn btn-primary active mt-3">Register Now!</button> -->
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</template>

<script>
export default {
  name: 'login',
  data() {
      return {
          user : {},
          error:''
      }
  },
  methods: {
      login() {
        this.error = '';
          let uri = '/api/login';
          axios.post(uri, this.user)
          .then((response)=>{
            console.log(response);
            console.log(response.data.token);
              this.$auth.setToken(response.data.token, response.data.user,  Date.now())
              if(response.status == 200)
                this.$router.push('/');
          })
          .catch((error)=>{
            this.error = error.message;
            console.log(error);
          })
      }
  }
}
</script>
