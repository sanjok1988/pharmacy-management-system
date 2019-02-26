<template>
  <div class="animated fadeIn">
    

    <div class="row">
      <div class="col-12">
          
          <router-link to="/attendance/" class="btn btn-primary"> <i class="fa fa-star"></i>&nbsp; View Attendance Of Year</router-link>
         <router-link to="/attendance/absent/" class="btn btn-primary"> <i class="fa fa-star"></i>&nbsp; View Absent Employees</router-link>
        <b-card header="<i class='fa fa-align-justify'></i> Daily Attendace">
        
          <table class="table table-bordered table-striped table-sm">
            <thead>
              <tr>
                <th>Employee Id</th>
                <th>Employee Name</th>
                <th>Time In</th>
                <th>Time Out</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="item in attendance_data" :key="item.id">
				<td>{{item.employee_id}}</td>
                <td>{{item.first_name}} {{middle_name}} {{last_name}}</td>
                <td>{{item.time_in}}</td>
                <td v-if="item.time_in != item.time_out">{{item.time_out}}</td>
                <td v-else><span class="badge badge-success">Present</span></td>
                <td>
                    <router-link :to="{ path: 'edit/'+item.id}" class="btn btn-outline-primary"> <i class="fa fa-pencil"> Write Note</i></router-link>
                    <router-link :to="{ path: 'view/profile/'+item.employee_id}" class="btn btn-outline-primary"> <i class="fa fa-eye"></i>
                </router-link> 
                    <!-- <a @click.prevent="destroy(item.id)" class="btn btn-outline-danger" alt="delete"><i class="fa fa-trash"></i></a> -->
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
				<li v-for="page in pagesNumber" v-bind:class="[ page == isActived ? 'active' : '']" class="page-item"> <a class="page-link" href="#" @click.prevent="changePage(page)">{{ page }}</a>
				</li>
				<li v-if="pagination.current_page < pagination.last_page">
					<a href="#" aria-label="Next" @click.prevent="changePage(pagination.current_page + 1)"> <span aria-hidden="true">»</span>
					</a>
				</li>
			</ul>
		</nav>


        </b-card>
      </div><!--/.col-->
    </div><!--/.row-->
  </div>

</template>

<script>

// import router from '../../router'
export default {
        name: 'jobs',

        data() {
            return {
                jobs_data : [],
                page: 1,
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
            
                axios.get('api/attendance?page='+page ).then((response) => {
                
                    this.attendance_data = response.data.data.data;
                    this.pagination = response.data.pagination;             
                  
                    
                })
                .catch(error => {
                   
                    console.log('Error fetching and parsing data', error);
                });
            },

            destroy(id) {
                axios.post('api/jobs/delete/'+id ).then((response) => {                
                   
                    if(response.status == 200) {
                        this.attendance_data.splice(this.attendance_data.indexOf(id), 1);
                            toastr.success('Success', 'Success Alert', {
                            timeOut: 3000
                        });

                    } else {
                        toastr.success('Failed', 'Error Alert', {
                            timeOut: 3000
                        });
                    }
            
                })
                .catch(error => {
                    alert(4);
                    console.log('Error fetching and parsing data', error);
                });
            },

            changePage: function (page) {
                this.pagination.current_page = page;
                this.fetch(page);
            },
        }
    
}
</script>
