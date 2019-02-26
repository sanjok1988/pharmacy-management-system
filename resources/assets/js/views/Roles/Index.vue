<template>
  <div class="animated fadeIn">
    

    <div class="row">
      <div class="col-12">
          
          <router-link to="/roles/create" class="btn btn-primary"> <i class="fa fa-star"></i>&nbsp; Create New</router-link>
         
        <b-card header="<i class='fa fa-align-justify'></i> Users">
        
          <table class="table table-bordered table-striped table-sm">
            <thead>
              <tr>
                <th>Roles</th>
               
                <th>Status</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="item in roles_data" :key="item.id">
					

						<td>{{item.name}}</td>

                <td>
                  <span class="badge badge-success">Active</span>
                </td>
                <td>
                     <router-link :to="{ path: 'edit/'+item.id}" class="btn btn-outline-primary"> <i class="fa fa-pencil"> Edit</i></router-link>

                    <a @click.prevent="destroy(item.id)" class="btn btn-outline-danger" alt="delete"><i class="fa fa-trash"></i></a>
                </td>
              </tr>
              
            </tbody>
          </table>
          <!-- Pagination -->
		<nav>
			<ul class="pagination">
				<li v-if="pagination.current_page > 1">
					<a href="#" aria-label="Previous" @click.prevent="changePage(pagination.current_page - 1)"> <span aria-hidden="true">«</span>
					</a>
				</li>
				<li v-for="page in pagesNumber" v-bind:class="[ page == isActived ? 'active' : '']" class="page-item"> <a class="page-link" href="#" @click.prevent="changePage(page)">@{{ page }}</a>
				</li>
				<li v-if="pagination.current_page < pagination.last_page">
					<a href="#" aria-label="Next" @click.prevent="changePage(pagination.current_page + 1)"> <span aria-hidden="true">»</span>
					</a>
				</li>
			</ul>
		</nav>

          <!-- <nav>
            <ul class="pagination">
              <li class="page-item"><a class="page-link" href="#">Prev</a></li>
              <li class="page-item active">
                <a class="page-link" href="#">1</a>
              </li>
              <li class="page-item"><a class="page-link" href="#">2</a></li>
              <li class="page-item"><a class="page-link" href="#">3</a></li>
              <li class="page-item"><a class="page-link" href="#">4</a></li>
              <li class="page-item"><a class="page-link" href="#">Next</a></li>
            </ul>
          </nav> -->
        </b-card>
      </div><!--/.col-->
    </div><!--/.row-->
  </div>

</template>

<script>

// import router from '../../router'
export default {
        name: 'roles',

        data() {
            return {
                roles_data : [],
                pagination: {
                    total: 0,
                    per_page: 2,
                    from: 1,
                    to: 0,
                    current_page: 1
                }
            }
            

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
            },
        
            
        },
        mounted() {

            this.fetch(this.pagination.current_page);

        },
        methods: {        

            fetch(page) {
            
                axios.get('api/roles?page='+page ).then((response) => {
                
                    this.roles_data = response.data.data.data;
                    this.pagination = response.data.pagination;
                    
                })
                .catch(error => {
                   
                    console.log('Error fetching and parsing data', error);
                });;
            },

            changePage: function (page) {
                this.pagination.current_page = page;
                this.fetch(page);
            },
        }
    
}
</script>
