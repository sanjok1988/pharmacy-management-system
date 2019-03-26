const store = new Vuex.Store({
    state: {
        total_amount:0,
        gt:0
    },
    getters: {
        GT : state => {
            return state.gt
        }
    },
    mutations: {
        SET_GT : (state, payload)=>{
            state.name = payload
        }
    },
    actions:{
        SET_GT : (context, payload)=>{
            context.commit("SET_NAME", payload);
        },
        getTotal:function(event){
            this.$store.state.gt = getGt();
        },
        getGt(){
            this.$http.get('cart/total').then((response)=>{
              
                this.gt = response.data.total;
                 
             });
        }
    }
    
});
