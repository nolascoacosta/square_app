const routes = [
  {
    path: '/',
    name: 'landing',
    component: () => import('layouts/LandingLayout.vue'),
    children: [
      {
        path: '', component: () => import('pages/posts/PagePosts.vue'), meta: {
          requiresAuth: false,
        },
      },
      {
        path: '/my-posts', name:'my-posts', component: () => import('pages/posts/MyPosts.vue'), meta: {
          requiresAuth: true,
        },
      },
      {
        path: '/post/create', name:'create_post', component: () => import('pages/posts/CreatePost.vue'), meta: {
          requiresAuth: true,
        },
      },
      {
        path: '/post/:id/show', name:'post_show', component: () => import('pages/posts/ShowPost.vue'), meta: {
          requiresAuth: true,
        },
      },
      {
        path: '/profile', name: 'profile', component: () => import('pages/Profile.vue'), meta: {
          requiresAuth: true,
        }
      }
    ]
  },


  // Always leave this as last one,
  // but you can also remove it
  {
    path: '*',
    component: () => import('pages/Error404.vue')
  }
]

export default routes
