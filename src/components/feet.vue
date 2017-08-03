<template>
  <div class="feet">
    <router-view></router-view>
    <ul class="tabbar">
      <li v-for="(a,index) in list1">
        <router-link :to='a.to' :activeClass="a.activeCla">
          <p :class="a.cla"></p>
          <span>{{a.title}}</span>      
        </router-link>
      </li>
    </ul>
  </div>
</template>

<script>
import Vue from 'vue'
export default {
  name: 'feet',
  data () {
    return {
      active:0,
      list1:[
        {
          title:'首页',
          to:'/index/home',
          cla:'homecol',
          activeCla:'home_col',
          /*src:'http://sh1.hoopchina.com.cn/images/trademobile/common/index-on.png?2016111114',          
          src1:'http://sh1.hoopchina.com.cn/images/trademobile/common/index-on.png?2016111114',   */       
        },
        {
          title:'优惠',
          to:'/index/discount',
          cla:'discountcol',
          activeCla:'discount_col',
          /*src:'http://sh1.hoopchina.com.cn/images/trademobile/common/youhui.png?2016111114',          
          src1:'http://sh1.hoopchina.com.cn/images/trademobile/common/youhui-on.png?2016111114',*/   

        },
        {
          title:'发现',
          to:'/index/find',
          cla:'findcol',
          activeCla:'find_col',
          /*src:'http://sh1.hoopchina.com.cn/images/trademobile/common/find.png?2016111114',          
          src1:'http://sh1.hoopchina.com.cn/images/trademobile/common/find-on.png?2016111114',*/            
        },
        {
          title:'装备',
          to:'/index/equipment',
          cla:'equipmentcol',
          activeCla:'equipment_col',
          /*src:'http://sh1.hoopchina.com.cn/images/trademobile/common/zhuangbei.png?2016111114',          
          src1:'http://sh1.hoopchina.com.cn/images/trademobile/common/zhuangbei-on.png?2016111114', */           
        },
        {
          title:'更多',
          to:'/index/more',
          cla:'morecol',
          activeCla:'more_col',
         /* src:'http://sh1.hoopchina.com.cn/images/trademobile/common/more.png?2016111114',          
          src1:'http://sh1.hoopchina.com.cn/images/trademobile/common/more-on.png?2016111114',*/            
        },

      ],
      /*list:[
        'http://sh1.hoopchina.com.cn/images/trademobile/common/index.png?2016111114',
        'http://sh1.hoopchina.com.cn/images/trademobile/common/youhui.png?2016111114',   
        'http://sh1.hoopchina.com.cn/images/trademobile/common/find.png?2016111114',   
        'http://sh1.hoopchina.com.cn/images/trademobile/common/zhuangbei.png?2016111114',   
        'http://sh1.hoopchina.com.cn/images/trademobile/common/more.png?2016111114'  
      ]*/
    }
  },
  /*methods:{
    imgchange(index,a){
      for (var i = 0; i < this.list1.length; i++) {
        this.list1[i].src = this.list[i];
      }
      a.src =this.list1[index].src1;
    }
  }*/
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style lang="scss">
.tabbar{
  position: fixed;
  left: 0;
  bottom: 0;
  width: 100%;
  z-index: 20;
  font-size:.6rem;
  line-height: 2.45rem;
  background: #fff;
  box-shadow: 0 0 10px #999;
  display: flex;
  justify-content: space-around;
  li{
    text-align:center;
    p{
      width:1.2rem;
      height:1.2rem;
      background-size: 100% 100%;
    }
    span{
      display: block;
      line-height:.9rem;
      color:#666;
    }
  }
  .homecol{
    background-image: url(http://sh1.hoopchina.com.cn/images/trademobile/common/index.png?2016111114);
  }
  .discountcol{
      background-image: url(http://sh1.hoopchina.com.cn/images/trademobile/common/youhui.png?2016111114);
  }
  .findcol{
      background-image:url(http://sh1.hoopchina.com.cn/images/trademobile/common/find.png?2016111114);
  }
  .equipmentcol{
      background-image:url(http://sh1.hoopchina.com.cn/images/trademobile/common/zhuangbei.png?2016111114);
  }
  .morecol{
      background-image: url(http://sh1.hoopchina.com.cn/images/trademobile/common/more.png?2016111114);
  }
}
/*点击之后的样式*/
.tabbar .home_col span,.tabbar .discount_col span,.tabbar .find_col span,.tabbar .equipment_col span,.tabbar .more_col span{
  color:#dd1712;
}

.tabbar .home_col .homecol{
    background-image: url(http://sh1.hoopchina.com.cn/images/trademobile/common/index-on.png?2016111114);
}
.tabbar .discount_col .discountcol{
    background-image: url(http://sh1.hoopchina.com.cn/images/trademobile/common/youhui-on.png?2016111114);
}
.tabbar .find_col .findcol{
    background-image:url(http://sh1.hoopchina.com.cn/images/trademobile/common/find-on.png?2016111114);
}
.tabbar .equipment_col .equipmentcol{
    background-image:url(http://sh1.hoopchina.com.cn/images/trademobile/common/zhuangbei-on.png?2016111114);
}
.tabbar .more_col .morecol{
    background-image: url(http://sh1.hoopchina.com.cn/images/trademobile/common/more-on.png?2016111114);
}
</style>
</style>
