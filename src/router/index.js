import Vue from 'vue'
import Router from 'vue-router'
//import Hello from '@/components/Hello'
import Home from '@/components/home'
import Discount from '@/components/discount'
import Find from '@/components/find'
import Equipment from '@/components/equipment'
import More from '@/components/more'

Vue.use(Router)

export default new Router({
  routes: [
    {
      path: '/home',
      name: 'home',
      component: Home
    },
    {
      path: '/discount',
      name: 'discount',
      component: Discount
    },
    {
      path: '/find',
      name: 'find',
      component: Find
    },
    {
      path: '/equipment',
      name: 'equipment',
      component: Equipment
    },
    {
      path: '/more',
      name: 'more',
      component: More
    }
  ]
})
