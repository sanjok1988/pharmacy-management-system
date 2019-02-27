@extends('layouts.front-master')
@section('content')
<ul class="list-group">
<td class="list-group-item" v-for="value in products"></td>
       
      </ul>

      <table class="table">
            <thead>
              <tr>
                <th>Product Name</th>                
                <th>Company</th>        
                <th>MFD</th>
                <th>Exp. Date</th>
                <th>Price</th>                
                <th>Status</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
               
              <tr  v-for="value in products">
                <td>@{{ value.product_name }}</td>        
                <td>@{{ value.company }}</td>       
                <td>@{{ value.mfd }}</td>
                <td>@{{ value.exp_date }}</td>
                <td>@{{ value.price }}</td>
                <td>
                  
                  <span class="badge badge-success" ></span>
                 
                </td>
                <td>
                    <button @click="addToCart(value.id)" class="btn btn-outline-primary" alt="add to cart"> <i class="fa fa-plus"></i></button>
        
                    
                </td>
              </tr>    
                   
            </tbody>
          </table>
@endsection

@section('script')
<script>
const vue = new Vue({
    el:"#app",
    
    data:{
        products:[],
        cart : 0,
       
        pagination: {
			total: 0,
			per_page: 2,
			from: 1,
			to: 0,
			current_page: 1
		},
		offset: 4,
		formErrors: {},
		formErrorsUpdate: {},

		order:null
    },
    computed: {
        

        isActived: function () {
            return this.pagination.current_page;
        },
        pagesNumber: function () {
            if (!this.pagination.to) {
                return [];
            }
            var from = this.pagination.current_page - this.offset;
            if (from < 1) {
                from = 1;
            }
            var to = from + (this.offset * 2);
            if (to >= this.pagination.last_page) {
                to = this.pagination.last_page;
            }
            var pagesArray = [];
            while (from <= to) {
                pagesArray.push(from);
                from++;
            }
            return pagesArray;
        }
        },
    mounted(){
        this.getProducts();
    },
    methods:{
        addToCart(pid){alert(pid);
            var p = [];
            this.cart++;
            p = JSON.parse(localStorage.getItem('pid'));
            if(p)
            p.push(pid);
            else
            localStorage.setItem('pid', pid);
            
            localStorage.setItem('pid', JSON.stringify(p));
            // this.$http.get('products/add/to/cart').then((response) => {
				
				
			// });
        },

        getProducts(){
           
			this.$http.get('products/list').then((response) => {
				this.products = response.data.list.data;
                this.pagination = response.data.pagination;
				
			});
        },
        changePage: function (page) {
			this.pagination.current_page = page;
			this.fetchAll(page);
		},

    }
});
</script>
@endsection
@section('style')
        
@endsection