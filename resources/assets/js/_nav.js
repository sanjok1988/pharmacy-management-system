export default {
  
  items: [
    {
      name: 'Dashboard',
      url: '/dashboard',
      icon: 'icon-speedometer',
      badge: {
        variant: 'primary',
        text: 'NEW'
      }
    },
    {
      title: true,
      name: 'UI elements'
    },
    {
      name: 'Admin',
      url: '/admin',
      icon: 'icon-puzzle',
      children: [
        
        {
          name: 'Company Setup',
          url: '/company',
          icon: 'icon-puzzle'
        },
        {
          name: 'Job Detail Setup',
          url: '/jobs/list',
          icon: 'icon-puzzle'
        },
        {
          name: 'Qualification Setup',
          url: '/qualification/create',
          icon: 'icon-puzzle'
        },
        // {
        //   name: 'Leave Settings',
        //   url: '/leave/settings',
        //   icon: 'icon-puzzle'
        // }
      ],
    },
    {
      name: 'Employees',
      url: '/employees',
      icon: 'icon-user',
      children: [
        {
          name: 'Employees List',
          url: '/employees/list',
          icon: 'fa fa-user'
        },
        // {
        //   name: 'Employees History',
        //   url: '/employees/history',
        //   icon: 'icon-clock'
        // },
        // {
        //   name: 'Document Mgnt',
        //   url: '/document/list',
        //   icon: 'icon-suitcase'
        // },
        {
          name: 'Monitor Attendance',
          url: '/attendance/list',
          icon: 'icon-puzzle'
        },
        // {
        //   name: 'HR Form Mgnt',
        //   url: '/template/list',
        //   icon: 'icon-sticky-note-o'
        // },
        {
          name: 'Performance Review',
          url: '/review/list',
          icon: 'icon-puzzle'
        }
      ]
    },
    // {
    //   name: 'Posts',
    //   url: '/posts',
    //   icon: 'icon-puzzle',
    //   children: [
    //     {
    //       name: 'List',
    //       url: '/posts/list',
    //       icon: 'icon-puzzle'
    //     },
    //   ]
    // },
    // {
    //   name: 'Category',
    //   url: '/category',
    //   icon: 'icon-puzzle',
    //   children: [
    //     {
    //       name: 'List',
    //       url: '/category/list',
    //       icon: 'icon-puzzle'
    //     },
    //   ]
    // },
    
    
    // {
    //   name: 'Review Form',
    //   url: '/reviews',
     
    // },
    
    
    {
      divider: true
    },
    {
      title: true,
      name: 'System'
    },
    {
      name: 'Management',
      url: '/management',
      icon: 'icon-star',
      children: [
        // {
        //   name: 'Settings',
        //   url: '/settings',
        //   icon: 'icon-cogs'
        // },
        
        {
          name: 'Roles',
          url: '/roles/list',
          icon: 'icon-key'
        },
        {
          name: 'Users',
          url: '/users/users',
          icon: 'icon-puzzle',
          
        },
        {
          name: 'Passport',
          url: '/passport',
          icon: 'icon-star'
        }
      ]
    },
    // {
    //   name: 'Pages',
    //   url: '/pages',
    //   icon: 'icon-star',
    //   children: [
    //     {
    //       name: 'Login',
    //       url: '/pages/login',
    //       icon: 'icon-star'
    //     },
    //     {
    //       name: 'Register',
    //       url: '/pages/register',
    //       icon: 'icon-star'
    //     },
    //     {
    //       name: 'Error 404',
    //       url: '/pages/404',
    //       icon: 'icon-star'
    //     },
    //     {
    //       name: 'Error 500',
    //       url: '/pages/500',
    //       icon: 'icon-star'
    //     }
    //   ]
    // },
    // {
    //   name: 'Icons',
    //   url: '/icons',
    //   icon: 'icon-star',
    //   children: [
    //     {
    //       name: 'Font Awesome',
    //       url: '/icons/font-awesome',
    //       icon: 'icon-star'
    //     },
    //     {
    //       name: 'Simple Line Icons',
    //       url: '/icons/simple-line-icons',
    //       icon: 'icon-star'
    //     }
    //   ]
    // },
    // {
    //   name: 'Widgets',
    //   url: '/widgets',
    //   icon: 'icon-calculator',
    //   badge: {
    //     variant: 'danger',
    //     text: 'NEW'
    //   }
    // },
    // {
    //   name: 'Charts',
    //   url: '/charts',
    //   icon: 'icon-pie-chart'
    // },
    // {
    //   name: 'Components',
    //   url: '/components',
    //   icon: 'icon-puzzle',
    //   children: [
    //     {
    //       name: 'Buttons',
    //       url: '/components/buttons',
    //       icon: 'icon-puzzle'
    //     },
    //     {
    //       name: 'Social Buttons',
    //       url: '/components/social-buttons',
    //       icon: 'icon-puzzle'
    //     },
    //     {
    //       name: 'Cards',
    //       url: '/components/cards',
    //       icon: 'icon-puzzle'
    //     },
    //     {
    //       name: 'Forms',
    //       url: '/components/forms',
    //       icon: 'icon-puzzle'
    //     },
    //     {
    //       name: 'Modals',
    //       url: '/components/modals',
    //       icon: 'icon-puzzle'
    //     },
    //     {
    //       name: 'Switches',
    //       url: '/components/switches',
    //       icon: 'icon-puzzle'
    //     },
    //     {
    //       name: 'Tables',
    //       url: '/components/tables',
    //       icon: 'icon-puzzle'
    //     }
    //   ]
    // }
  ]
}
