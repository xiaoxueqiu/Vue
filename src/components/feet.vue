<template>
  <ul class="feet">
    <li v-for="(a,index) in list1" @click='imgchange(index,a)'>
      <router-link :to='a.to' class='tab'>
        <img :src="a.src"><span>{{a.title}}</span>      
      </router-link>
    </li>
    
  </ul>
</template>

<script>
import Vue from 'vue'
export default {
  name: 'feet',
  data () {
    return {
      list1:[
        {
          title:'首页',
          to:'/home',
          src:'http://sh1.hoopchina.com.cn/images/trademobile/common/index-on.png?2016111114',          
          src1:'http://sh1.hoopchina.com.cn/images/trademobile/common/index-on.png?2016111114',          
        },
        {
          title:'优惠',
          to:'/discount',
          src:'http://sh1.hoopchina.com.cn/images/trademobile/common/youhui.png?2016111114',          
          src1:'http://sh1.hoopchina.com.cn/images/trademobile/common/youhui-on.png?2016111114',   

        },
        {
          title:'发现',
          to:'/find',
          src:'http://sh1.hoopchina.com.cn/images/trademobile/common/find.png?2016111114',          
          src1:'http://sh1.hoopchina.com.cn/images/trademobile/common/find-on.png?2016111114',            
        },
        {
          title:'装备',
          to:'/equipment',
          src:'http://sh1.hoopchina.com.cn/images/trademobile/common/zhuangbei.png?2016111114',          
          src1:'http://sh1.hoopchina.com.cn/images/trademobile/common/zhuangbei-on.png?2016111114',            
        },
        {
          title:'更多',
          to:'/more',
          src:'http://sh1.hoopchina.com.cn/images/trademobile/common/more.png?2016111114',          
          src1:'http://sh1.hoopchina.com.cn/images/trademobile/common/more-on.png?2016111114',            
        },

      ],
      list:[
        'http://sh1.hoopchina.com.cn/images/trademobile/common/index.png?2016111114',
        'http://sh1.hoopchina.com.cn/images/trademobile/common/youhui.png?2016111114',   
        'http://sh1.hoopchina.com.cn/images/trademobile/common/find.png?2016111114',   
        'http://sh1.hoopchina.com.cn/images/trademobile/common/zhuangbei.png?2016111114',   
        'http://sh1.hoopchina.com.cn/images/trademobile/common/more.png?2016111114'  
      ]
    }
  },
  methods:{
    imgchange(index,a){
      for (var i = 0; i < this.list1.length; i++) {
        this.list1[i].src = this.list[i];
      }
      a.src =this.list1[index].src1;
    }
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
.feet{
  width: 100%;
  height: 1.8rem;
  background: #fff;
  box-shadow: 0 -.05rem .3rem .03rem #999;
  display: flex;
  justify-content: space-around;
  position: fixed;
  left: 0;
  bottom: 0;
}
.feet li{
  width: 20%;
}
.feet a{
  text-decoration: none;
  color:#57575a;
  font-size:.4rem;
  text-align: center;
  display: block;
  height: 100%;
}
.feet a img{
  height: .9rem;
}
.feet span{
  display: block;
}
.tab:hover{
  color: #dd1712;
}

</style>
