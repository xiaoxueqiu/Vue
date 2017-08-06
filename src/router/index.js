import Vue from 'vue'
import Router from 'vue-router'
import Feet from '../components/feet'
import Home from '@/components/home'
import Listview from '../components/listview'
import Discount from '@/components/discount'
import Find from '@/components/find'
import Equipment from '@/components/equipment'
import More from '@/components/more'
import Login from '@/components/login'
import Detail from '../components/detail'
import Shopcar from '../components/shopcar'
import Shop_model from '../components/shop_model'

Vue.use(Router)

export default new Router({
  routes: [
  {
      path: '/index',
      name: 'feet',
      component: Feet,
      children:[
        {
          path: 'home',
          name: 'home',
          component: Home
        },
        {
          path: 'discount',
          name: 'discount',
          component: Discount
        },
        {
          path: 'find',
          name: 'find',
          component: Find
        },
        {
          path: 'equipment',
          name: 'equipment',
          component: Equipment
        },
        {
          path: 'more',
          name: 'more',
          component: More
        }
      ]
    },
    {
      path:'/detail',
      name:'detail',
      component:Detail
    },
    {
      path:'/listview',
      name:'listview',
      component:Listview
    },
    {
      path:'/shopcar',
      name:'shopcar',
      component:Shopcar
    },
    {
      path: '/login',
      name: 'login',
      component: Login
    },
    {
      path: '/shop_model',
      name: 'shop_model',
      component: Shop_model
    },
    {
      path:"*",
      redirect:"/index/home"
    }
  ]
})
