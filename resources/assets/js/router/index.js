import Vue from 'vue'
import Router from 'vue-router'

// Containers
import Full from '../containers/Full'

// Views
import Dashboard from '../views/Dashboard'
import Charts from '../views/Charts'
import Widgets from '../views/Widgets'

// Views - Components
import Buttons from '../views/components/Buttons'
import SocialButtons from '../views/components/SocialButtons'
import Cards from '../views/components/Cards'
import Forms from '../views/components/Forms'
import Modals from '../views/components/Modals'
import Switches from '../views/components/Switches'
import Tables from '../views/components/Tables'

// Views - Icons
import FontAwesome from '../views/icons/FontAwesome'
import SimpleLineIcons from '../views/icons/SimpleLineIcons'

// Views - Pages
import Page404 from '../views/pages/Page404'
import Page500 from '../views/pages/Page500'
import Login from '../views/pages/Login'
import Register from '../views/pages/Register'

//my modules
import Users from '../views/users/Users'
import CreateUser from '../views/users/Create'

import Roles from '../views/Roles/Index'

import Category from '../views/category/Category'
import CreateCategory from '../views/category/Create'
import EditCategory from '../views/category/Edit'

import Posts from '../views/Posts/Posts'
import CreatePost from '../views/Posts/Create'
import EditPost from '../views/Posts/Edit'

import Company from '../views/Companies/Index'
import Company_Create from '../views/Companies/Create'

import Employee from '../views/Employees/Index'
import Employee_Create from '../views/Employees/Create'

import Jobs from '../views/Jobs/Index'
import Jobs_Create from '../views/Jobs/Create'

import Attendance from '../views/Attendance/Index'
import Attendance_Create from '../views/Attendance/Create'
import Absent from '../views/Attendance/Absent'

import Review from '../views/Review/Index'
import Review_Template from '../views/Review/Create'

//passport
import PassportClients from '../components/passport/Clients'

//import DynamicForm from "../views/Review/DynamicForm"
import SendReview from "../views/Review/SendReview"

Vue.use(Router)

export default new Router({
  mode: 'hash', // Demo is living in GitHub.io, so required!
  linkActiveClass: 'open active',
  scrollBehavior: () => ({ y: 0 }),
  routes: [
    {
      path: '/login',
      name: 'Login',
      component: Login,
      meta: {
        requiresAuth: false,
        auth:true
      }
    },
    {
      path: '/',
      redirect: '/dashboard',
      name: 'Home',
      component: Full,
      meta: {
        requiresAuth: true,
        auth: false
      },
      children: [
        {
          path: 'dashboard',
          name: 'Dashboard',
          component: Dashboard
        },
        {
          path: 'company',
          name: 'Company',
          redirect: '/company/list',
          component: {
            render (c) { return c('router-view') }
          },
          meta: {
            requiresAuth: true,
            auth: false
          },
          children: [
            {
              path: 'list',
              name: 'list',
              component: Company
            },
            {
              path: 'create',
              name: 'create',
              component: Company_Create
            },
            {
              path: 'edit/:id',
              name: 'Edit',
              component: Company_Create
            }
          ]
        },

        {
          path: 'employees',
          name: 'Employee',
          redirect: '/employees/list',
          component: {
            render (c) { return c('router-view') }
          },
          meta: {
            requiresAuth: true,
            auth: false
          },
          children: [
            {
              path: 'list',
              name: 'list',
              component: Employee
            },
            {
              path: 'create',
              name: 'create',
              component: Employee_Create
            },
            {
              path: 'edit/:id',
              name: 'Edit',
              component: Employee_Create
            }
          ]
        },
        {
          path: 'jobs',
          name: 'Jobs',
          redirect: '/jobs/list',
          component: {
            render (c) { return c('router-view') }
          },
          meta: {
            requiresAuth: true,
            auth: false
          },
          children: [
            {
              path: 'list',
              name: 'list',
              component: Jobs
            },
            {
              path: 'create',
              name: 'create',
              component: Jobs_Create
            },
            {
              path: 'edit/:id',
              name: 'Edit',
              component: Jobs_Create
            }
          ]
        },

        {
          path: 'attendance',
          name: 'Attendance',
          redirect: '/attendance/list',
          component: {
            render (c) { return c('router-view') }
          },
          meta: {
            requiresAuth: true,
            auth: false
          },
          children: [
            {
              path: 'list',
              name: 'list',
              component: Attendance
            },
            {
              path: 'create',
              name: 'create',
              component: Attendance_Create
            },
            {
              path: 'edit/:id',
              name: 'Edit',
              component: Attendance_Create
            },
            {
              path: 'absent/',
              name: 'Absent Employees',
              component: Absent
            }
          ]
        },
        {
          path: 'reviews',
          name: 'Review',
          component: Review
          
        },
        {
          path: 'template',
          name: 'Form Template',
          component: Review
        },
        
        {
          path: 'charts',
          name: 'Charts',
          component: Charts
        },
        {
          path: 'widgets',
          name: 'Widgets',
          component: Widgets
        },
        {
          path: 'users',
          redirect: '/users/users',
          name: 'users',
          component: {
            render (c) { return c('router-view') }
          },
          meta: {
            requiresAuth: true,
            auth: false
          },
          children: [
            {
              path: 'users',
              name: 'Users',
              component: Users
            },
            {
              path: 'create',
              name: 'create',
              component: CreateUser
            },
            {
              path: 'edit/:id',
              name: 'Edit',
              component: CreateUser
            }
            
          ]
        },
        {
          path: 'roles',
          redirect: '/roles/list',
          name: 'roles',
          component: {
            render (c) { return c('router-view') }
          },
          meta: {
            requiresAuth: true,
            auth: false
          },
          children: [
            {
              path: 'list',
              name: 'List',
              component: Roles
            },
            {
              path: 'create',
              name: 'create',
              component: CreateUser
            },
            {
              path: 'edit/:id',
              name: 'Edit',
              component: CreateUser
            }
            
          ]
        },
        {
          path: 'review',
          redirect: '/review/list',
          name: 'review',
          component: {
            render (c) { return c('router-view') }
          },
          meta: {
            requiresAuth: true,
            auth: false
          },
          children: [
            {
              path: 'list',
              name: 'Review',
              component: Review
            },
            {
              path: 'template/create',
              name: 'template',
              component: Review_Template
            },
            {
              path: 'edit/:id',
              name: 'Edit',
              component: Review_Template
            },
            {
              path: 'start/:id',
              name: 'Start Review',
              component: SendReview
            }
          ]
        },
        {
          path: 'posts',
          redirect: '/posts/list',
          name: 'posts',
          
          component: {
            render (c) { return c('router-view') }
          },
         
          children: [
            {
              path: 'list',
              name: 'List',
              component: Posts
            },
            {
              path: 'create',
              name: 'Create',
              component: CreatePost
            },
            {
              path: 'edit/:id',
              name: 'Edit',
              component: EditPost
            }
          ]
        },
        {
          path: 'category',
          redirect: '/category/list',
          name: 'category',
          
          component: {
            render (c) { return c('router-view') }
          },
          meta: {
            requiresAuth: true,
            auth: false
          },
          children: [
            {
              path: 'list',
              name: 'List',
              component: Category
            },
            {
              path: 'create',
              name: 'Create',
              component: CreateCategory
            },
            {
              path: 'edit/:id',
              name: 'Edit',
              component: EditCategory
            }
          ]
        },
        
        {
          path: 'components',
          redirect: '/components/buttons',
          name: 'Components',
          component: {
            render (c) { return c('router-view') }
          },
          children: [
            {
              path: 'buttons',
              name: 'Buttons',
              component: Buttons
            },
            {
              path: 'social-buttons',
              name: 'Social Buttons',
              component: SocialButtons
            },
            {
              path: 'cards',
              name: 'Cards',
              component: Cards
            },
            {
              path: 'forms',
              name: 'Forms',
              component: Forms
            },
            {
              path: 'modals',
              name: 'Modals',
              component: Modals
            },
            {
              path: 'switches',
              name: 'Switches',
              component: Switches
            },
            {
              path: 'tables',
              name: 'Tables',
              component: Tables
            }
          ]
        },
        {
          path: 'icons',
          redirect: '/icons/font-awesome',
          name: 'Icons',
          component: {
            render (c) { return c('router-view') }
          },
          children: [
            {
              path: 'font-awesome',
              name: 'Font Awesome',
              component: FontAwesome
            },
            {
              path: 'simple-line-icons',
              name: 'Simple Line Icons',
              component: SimpleLineIcons
            }
          ]
        }
      ]
    },
    {
      path: '/pages',
      redirect: '/pages/p404',
      name: 'Pages',
      component: {
        render (c) { return c('router-view') }
      },
      children: [
        {
          path: '404',
          name: 'Page404',
          component: Page404
        },
        {
          path: '500',
          name: 'Page500',
          component: Page500
        },
        
        {
          path: 'register',
          name: 'Register',
          component: Register
        }
      ]
    },
    {
      path: '/passport',
      
      name: 'PassportClients',
      component: PassportClients
      
      
    }
    
    
  ]
})

