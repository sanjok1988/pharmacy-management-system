


$(document).ready(function(){                   
	AOS.init();		
	var page = 1;
	$(window).scroll(function() {
		if($(window).scrollTop() + $(window).height() + 100 >= $(document).height()) {			
			page++;		
			vm.loadmore(page);			
		}
	});
});

Vue.config.devtools = true;
//Vue.http.headers.common['X-CSRF-TOKEN'] = document.querySelector('#token').getAttribute('value');
Vue.http.headers.common['Access-Control-Allow-Origin'] = true,
Vue.http.headers.common['Access-Control-Allow-Origin'] = '*';
Vue.http.options.emulateJSON = true;
var vm = new Vue({
	el: "#posts",

	data: {
		ads:[],
		allAds:[],
		latestAds:[],
		online_url: '',

		isLatestActive: true,
		isInterestedActive:false,
		isAllActive:false,			
		
        customer_id :"",
        user_id:'',
		username:'',
		
		aid:'',
		url:url,
        
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
	
	mounted() {
		this.online_url = this.get_env();
        if(error == 1){
            $('#exampleModalLong').modal('show');
		}
		if(tab === 0){
			this.latest();
		}
		
		if(tab === 2){
			this.isLatestActive = false,
				this.isInterestedActive = true,
				this.isAllActive =false;
			
				this.fetchInterested();
		}
		if(tab === 3){
			this.isLatestActive = false,
				this.isInterestedActive = false,
				this.isAllActive =true
				this.fetchAll();
		}
	
	},
	methods: {
		get_env() {
			if(window.location.hostname === "127.0.0.1") {
				return '';
			}
			return '/JOBP/public/';
		},
		view_detail(id) {
			if(user_id > 0)
			window.location.href = this.online_url+'trainee/Profile/detail/'+id;
			else
			this.interested();
		},

		switchTabs(tab) {
			if (tab === 'latest') {
				this.isLatestActive = true,
				this.isInterestedActive = false,
				this.isAllActive =false
				this.latest();
				
			} else if (tab === 'interested'){
				this.isLatestActive = false,
				this.isInterestedActive = true,
				this.isAllActive =false
			
				this.fetchInterested();
				
			} else if (tab === 'all'){
				this.isLatestActive = false,
				this.isInterestedActive = false,
				this.isAllActive =true
				this.fetchAll();
				
			}
		
			
		  },
		  latest(){
			this.$http.get('ads/all/list/'+ ad_type).then((response) => {
				this.latestAds = response.data;
				
			});

		  },

		fetchInterested() {
			//JOBP/public remove if needed
			this.$http.get('ads/interested/list/'+ ad_type + '/' + user_id).then((response) => {
				this.ads = response.data;			
				
			});
		},
		fetchAll(page) {
			this.$http.get('ads/'+ ad_type + '?page=' + page).then((response) => {
				//response.header("Access-Control-Allow-Origin", "*");
				this.allAds = response.data.list.data;
				this.pagination = response.data.pagination;
				
			});
		},
			
		interested: function(){
			
			$('#exampleModalLong').modal('show');
			$('#loginform').show();
			$('#register-customer').hide();
	
			
		},
		register: function(){
			$('#exampleModalLong').modal('hide');
			toastr.success('Please Wait!', 'We are sending verification link to your email. It takes sometime depending on your internet speed', {
				timeOut: 5000
			});
			var data = new FormData(document.getElementById("register-customer"));
            this.$http.post('customer/register', data).then((response)=>{
                res = response.data[0];
	
if(response.status === 200){

					$('#interestedWithOutUser').hide();
					$('#interestedWithUser').show();
//window.location.href = 'mail/verification';
toastr.success('cảm ơn bạn', response.body, {
                        timeOut: 5000
                    });
}
		
                if(res == 0 || res == 1){
                    toastr.warning(response.data[1], 'Warning Alert', {
                        timeOut: 5000
                    });
                }else if(res == 200){
					window.location.href = 'mail.verification';
					$('#exampleModalLong').modal('hide');
					$('#interestedWithOutUser').hide();
					$('#interestedWithUser').show();
					
					vm.user_id = response.data[2];
                    toastr.success(response.data[1], 'Successfully LoggedIn! Welcome sir', {
                        timeOut: 5000
                    });
                }
                
            
            },(response) => {
				this.formErrors = response.data;
			});
		},
		interestedWithUser: function(event){
			element = event.currentTarget
					
			ad_id = element.getAttribute('ad_id');	
			this.aid = ad_id;		
		
			ad_type = element.getAttribute("ad_type");
	
			this.$http.get('customer/interested/' + user_id + '/' + ad_type + '/' + ad_id).then((response) => {
				
				if(response.data[0] == '200'){
					
					
					
				}else if(response.data[0] == 'exist'){
					toastr.warning(response.data[1], 'Warning Alert', {
						timeOut: 5000
					});
				}

			});
		},
		removeFromInterestedList: function(event, ad){
			
			var id = ad.ad_id;
	
			this.$http.get('ads/interested/remove/' + user_id + '/trainee/' + ad.ad_id).then((response) => {
				$("#"+id).hide( "drop", { direction: "down" }, "slow" );
				if(response.data[0] == '200'){
					
					var index = this.ads.indexOf(ad);
					this.ads.splice(index, 1);
					
					
				}else if(response.data[0] === 0){
					toastr.warning(response.data[1], 'Warning Alert', {
						timeOut: 5000
					});
				}

			});

			event.stopImmediatePropagation();
		},
		showDetail: function(ad){
			//remove JOBP/public if needed
			window.location.href = this.online_url+'trainee/Profile/detail/'+ad.ad_id;
			
		},		
        submitForm: function(){
            var data = new FormData(document.getElementById("submit"));
            this.$http.post('customer/login/verify', data).then((response)=>{
                res = response.data[0];
                if(res == 0 || res == 1){
                    toastr.warning(response.data[1], 'Warning Alert', {
                        timeOut: 5000
                    });
                }else if(res == 200){
					$('#exampleModalLong').modal('hide');
					$('#interestedWithOutUser').hide();
					$('#interestedWithUser').show();
document.location.reload(); 
					this.user_id = response.data[2];
                    toastr.success(response.data[1], 'Successfully LoggedIn! Welcome sir', {
                        timeOut: 5000
                    });
                }
                
               console.log(response.data[1]);
            },(response) => {
				this.formErrors = response.data;
			});
        },
		
		changePage: function (page) {
			this.pagination.current_page = page;
			this.fetchAll(page);
		},
		loadmore: function () {
			console.log('loadmore');
			var page = this.pagination.current_page;
			page += 1;		
			this.$http.get('ads/'+ ad_type + '?page=' + page).then((response) => {				
				let d = response.data.list.data;
				this.pagination = response.data.pagination;
				this.addRow(d);
				if(this.pagination.current_page === this.pagination.last_page )
				{
					$("#remove-row").remove()
				}
			});
		},
		addRow(arr){
			arr.forEach(function(d) {
				let ad = {
					Ads_start_day: d.Ads_start_day,
					Ads_start_month: d.Ads_start_month,
					Ads_start_year: d.Ads_start_year,
					ad_id: d.ad_id,
					companyname: d.companyname,
					cost: d.cost,
					image: d.image,
					salary: d.salary,
					start_date: d.start_date
				}
				vm.allAds.push(ad);
				
			});		
		
		}

	}
});
