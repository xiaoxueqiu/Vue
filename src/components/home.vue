<template>
    <div class="home">
        <!-- 搜索框 -->
        <topnav></topnav>
        <!-- 轮播图 -->
        <lunbo></lunbo>
        <!-- 六个分类 -->
        <div class="pic_banner clearfix">
           <ul class="zone">
               <li v-for="(item,index) in list">
                   <a :href="item.url">
                       <div class="tit">
                           <h2>{{item.tit}}</h2>
                           <p>{{item.content}}</p>
                       </div>
                       <div class="pic">
                           <img :src="item.img">
                       </div>
                   </a>
               </li>
           </ul>
        </div>
        <!-- 三个优惠 -->
        <section class="hot clearfix">
            <a :href="item3.url" class="block" v-for="item3 in arr3">
                <h2>{{item3.tit}}</h2>
                <p class="desc">{{item3.cont}}</p>
                <p class="imgs"><img :src="item3.imgUrl"></p>
            </a>
        </section>
        <a href="//www.shihuo.cn/shaiwu/detail/53134.html" class="advert"><img src="http://shihuo.hupucdn.com/appHome/201707/3109/899186ca740680e6670da3961b74230d.jpg" alt=""></a>
        <!-- 切换数据区 -->
        <listview></listview>
    </div>
</template>

<script>
import lunbo from './lunbo'
import topnav from './topnav'
import listview from './listview'
import axios from 'axios'

export default {
    name: 'home',
    components:{
        lunbo,
        topnav,
        listview  
    },
    data(){
        return{
            list:[] ,
            arr3:[
                {
                    tit:"今日优惠",
                    cont:"天猫玩物节嗨购",
                    imgUrl:"http://shihuo.hupucdn.com/appHome/201707/2815/2c443c907749538de991dbe65212fb2f.jpg?imageView2/2/w/120/h/120/interlace/1",
                    url:"//m.shihuo.cn/youhui#qk=jryouhui"
                },
                {
                    tit:"限时团购",
                    cont:"使节9镇团好价",
                    imgUrl:"http://shihuo.hupucdn.com/appHome/201707/3011/df4e0ead320be4774ce6317e1cea8983.jpg?imageView2/2/w/120/h/120/interlace/1",
                    url:"//m.shihuo.cn/tuangou#qk=tuangou"
                },
                {
                    tit:"一键海淘",
                    cont:"下单赠好礼",
                    imgUrl:"http://shihuo.hupucdn.com/appHome/201707/3020/744cb42343c11a234c769c5350bc55a5.jpg?imageView2/2/w/120/h/120/interlace/1",
                    url:"//m.shihuo.cn/haitao#qk=haitao"
                }
            ],   
        }
    },
    created () {
        this.getData()      
    },
    methods:{
        getData(){
           let _this = this;
            axios.get('../../static/json/shopfl.json')
            .then(function (res) {
            let list = res.data.lists;
            console.log(list);
            _this.list = list;
            //_this.$root.shopArr.push(item);
          }).then(function(err){
            console.log(err)
          })
        }
    },
   
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style lang="scss">
.home{
    margin-bottom: 70px;
    width: 100%;
    height:100%;
    background-color: #f3f3f3;
    .pic_banner {
        background: #fff;
        margin-top: .26667rem;
        border-bottom: 1px solid #e6e6e6;
        li{
            width: 50%;
            float: left;
            border-bottom: 1px solid #f0f3f5;
            border-left: 1px solid #f0f3f5;
            padding: .1rem .4rem;
            .tit{
                float:left;
                margin-top:.2rem;
                h2{
                    font-size: .4rem;
                    color:#333;
                    font-weight: 600;
                }
                p{
                   font-size: .2rem;
                    color:#666; 
                }
            }
            .pic{
                float:right;
                img{
                    width:1.4rem;
                    height:1.4rem;
                }
            }
        }
    }
    .hot{
        margin: .13333rem 0;
        background: #f0f3f5;
        margin: .08rem;
        width:100%;
        .block{
            text-align: center;
            float: left;
            background: #fff;
            width: 31.2%;
            padding: 10px 0;
            margin: 1%;
            h2{
                font-size: .37333rem;
                color: #333;
                font-weight: 400;
                margin-bottom: 10px;
            }
            .desc{
                font-size: .12rem;
                color: #666;
                margin-bottom: 10px;
            }
            .imgs{
                text-align: center;
                padding-bottom: 1.6rem;
                height: 0;
                img{
                    width:2rem;
                }
            }
        }
    }
    .advert {
        margin: 5px 0;
        display: block;
        margin-bottom: 10px;
        img {
            display: block;
            width: 100%;
        }
    }
}

</style>
