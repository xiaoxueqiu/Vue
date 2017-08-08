<template>
    <div class="home">
        <!-- 搜索框 -->
        <div class="topnav" ref="head">
            <form id="searchBox" method="get" class="searchBox" style="background: rgba(221, 23, 18, 0);">
                <div class="search_box">
                    <div class="search">
                        <input type="text" class="input" name="keywords" placeholder="搜索商品，品牌"  v-on:focus="focu" v-show="text" v-model="bang">
                    </div>
                    <router-link to="/index/more">
                        <a class="me" v-show="opens"><img src="//sh1.hoopchina.com.cn/fis_static/shihuomobile/static/homefis/widget/header/me_670cb9f.png" alt=""></a>
                    </router-link>
                    <span class="cancel" v-show="close" @click="quxiao()">取消</span>
                </div>
            </form>
        </div>
        <div class="search_page" id="search-page" v-show="page">
            <div class="inner" id="searchWrapper">
                <dl>
                    <dt>热门搜索</dt>
                    <dd class="sear_hot">
                        <span v-for="(hot_ss,index) in hotArr" @click="dian(hot_ss,index)">{{hot_ss}}</span>
                    </dd>
                    <dt class="his" v-show="his">历史搜索</dt>
                    <dd class="sear_record clearfix">
                        <span id="history" class="his" v-show="his" v-for="(x,index) in hisArr">{{x}}</span>
                    </dd>
                    <dd>
                        <p class="clear_history his">
                            <a href="javascript:void(0);" id="clear_history" v-show="his" @click="qc()">清空历史记录</a>
                        </p>
                    </dd>
                </dl>
            </div>
            <div class="inner" id="searchRelate" style="display:none;">
                <ul></ul>
            </div>
        </div>
        <!-- 轮播图 -->
        <lunbo></lunbo>
        <!-- 六个分类 -->
        <div class="pic_banner clearfix">
           <ul class="zone">
               <li v-for="(item,index) in listArr">
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
        <!-- 返回顶部 -->
        <div class="scroll_top" v-show="scr_top" @click="scrollTop()">
            <img src="//sh1.hoopchina.com.cn/images/trademobile/daigou/top.png">
        </div>
    </div>
</template>

<script>
// 轮播模块
import lunbo from './lunbo'
//数据区模块
import listview from './listview'
import axios from 'axios'

export default {
    name: 'home',
    components:{
        lunbo,
        listview  
    },
    data(){
        return{
            id1:"",
            scr_top:false,
            i:0,
            bang:"",
            his:false,
            opens:true,
            text:true,
            close:false,
            reset:false,
            page:false,
            listArr:[] ,
            hisArr:[],
            hotArr:["欧文","篮球鞋","Air Jordan","boost","三叶草","阿迪达斯","T恤","vans","安德玛","耐克"],
            arr3:[
                {
                    tit:"今日优惠",
                    cont:"天猫玩物节嗨购",
                    imgUrl:"http://shihuo.hupucdn.com/appHome/201707/2815/2c443c907749538de991dbe65212fb2f.jpg?imageView2/2/w/120/h/120/interlace/1",
                    url:"http://localhost:8080/#/index/discount"
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
            scroll:''  
        }
    },
    watch:{
        '$route':'getData'
    },
    created () {
        this.getData()      
    },
    methods:{
        //聚焦
        focu(){
            this.close=true,
            this.reset=true,
            this.page=true,
            this.opens=false,
            this.$refs.head.style.background='rgb(247,247,247)'
        },
        //点击热门搜索的每一项
        dian(hot_ss,index){
            //console.log(index)
            this.his = true;
            this.bang = hot_ss;
            //把绑定的内容添加到数组里
            this.hisArr.push(hot_ss);
            console.log(this.bang)
            this.$router.push({path:'../shop_model',query:{id1:this.bang}});
        },
        //点击清除历史记录
        qc(){
           this.his = false; 
           this.hisArr = [];
        },
        ///点击取消
        quxiao(){
            this.close=false,
            this.reset=false,
            this.page=false,
            this.opens=true,
            this.$refs.head.style.background= '-webkit-linear-gradient(top,rgba(0,0,0,.4),transparent)'
        },
        //六个分类的数据
        getData(){
            let _this = this;
            axios.get('../../static/json/shopfl.json')
            .then(function (res) {
            let listArr = res.data.lists;
            _this.listArr = listArr;
            //console.log(_this.listArr)
          }).then(function(err){
            //console.log(err)
          })
        },
        //搜索框背景逐渐变色
        menu() {
            let _this = this;
            _this.scroll = document.body.scrollTop+document.documentElement.scrollTop;
            //console.log( _this.scroll)
            let i = 0;
            if(_this.scroll <=600){
                _this.i=_this.scroll/600;
                _this.$refs.head.style.background='rgba(221,23,18,'+_this.i+')';
                _this.scr_top = false;
            }else{
                _this.scr_top = true;
                console.log(121)
            };
        },
        //返回顶部
        scrollTop(){
            this.scr_top = false;
            document.body.scrollTop=0
            document.documentElement.scrollTop=0
        }
    },
    //监听滚轮
    mounted() {
        window.addEventListener('scroll', this.menu);
        // 1 先绑定 scroll 事件
        var map = {};
        window.onhashchange = function() {
            document.body.scrollTop = 0;
        }
        /*  2 再屏蔽掉浏览器自动恢复滚动位置行为带来的影响
            a 在 hashchange 时强制 document.body.scrollTop = 0
            b 在 scroll 事件里面, 当 document.body.scrollTop = 0 的时候不做 存操作.*/
        window.onscroll = function() {
            if (document.body.scrollTop) {
                // 存
                map[location.hash] = document.body.scrollTop;
            } else {
                var timer = null;
                //3 在读操作里面, 设置一个定时任务, 去判断 document.body.scrollTop 的值和你保存的位置是不是相同的
                timer = setInterval(function(){
                    if (document.body.scrollTop == map[location.hash]) {
                        clearInterval(timer);
                    } else {
                        document.body.scrollTop = map[location.hash];
                    }
                }, 20);
            }
        }
    }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style lang="scss">
// 返回顶部
.scroll_top {
    position: fixed;
    bottom: 3em;
    right: 10px;
    z-index: 10;
    //border:3px solid #000;
    img{
        width:1.5rem;
    }
}
.home{
    margin-bottom: 70px;
    width: 100%;
    height:100%;
    background-color: #f3f3f3;
    //搜索框
    .topnav{
        width: 100%;
        overflow: hidden;
        position: fixed;
        top: 0;
        z-index: 10;
        border: 0;
        background: -webkit-linear-gradient(top,rgba(0,0,0,.4),transparent);
        form {
            width: 100%;
            background: rgba(221, 23, 18, 0);
            .search_box {
                width: 100%;
                overflow: hidden;
                height: 100%;
                .search {
                    width: 85%;
                    float: left;
                    padding-left: .3rem;
                    position: relative;
                    .input {
                        width: 100%;
                        border-radius: .2rem;
                        height: 1.4rem;
                        margin: .2rem 0;
                        padding-left: .9rem;
                        color: #666;
                        font-size: .5rem;
                        background: #eaeaea url(//sh1.hoopchina.com.cn/fis_static/shihuomobile/static/homefis/widget/header/search_c57b24b.png) .2rem center no-repeat;
                        background-size: .6rem;
                        overflow: hidden;
                    }
                }
                .me {
                    display: block;
                    float: right;
                    width: 15%;
                    padding: 0 .2rem;
                    padding-top: .2rem;
                    text-align: center;
                    img{
                        width:1.3rem;
                    }
                }
                .cancel{
                    font-size:.6rem;
                    margin-left:15px;
                }
            }
        }
    }
    .search_page {
        background: #fff;
        position: fixed;
        top: 0;
        width: 100%;
        height: 100%;
        padding-top: 2.4rem;
        overflow-y: scroll;
        z-index: 2;
        #searchWrapper {
            width: 100%;
            background: #fff;
            position: absolute;
            z-index: 81;
            left: 0;
            top: 2rem;
        }
        #searchRelate {
            background: #fff;
            overflow: hidden;
            position: absolute;
            z-index: 82;
            left: 0;
            top: 1.26667rem;
            width: 100%;
            height: 100%;
        }
        dl {
            background: #fff;
            padding: .5rem;
            padding-right: 0;
            padding-bottom: 0;
            dt {
                font-size: .6rem;
                color: #999;
                margin-bottom: .5rem;
            }
            .sear_hot {
                margin-bottom: .13333rem;
                span {
                    font-size: .55rem;
                    display: inline-block;
                    margin-right: .22rem;
                    margin-bottom: .2rem;
                    border: 1px solid #aeaeae;
                    color: #444;
                    padding: .2rem;
                    border-radius: 3px;
                }
            }
            .his {
                margin-bottom: 0;
            }
        }
        .sear_record{
            border-bottom: 1px solid #e6e6e6;
            border-top: 1px solid #e6e6e6;
            padding-top:.3rem;
            clear: both;
            span{
                border: 1px solid #aeaeae;
                border-radius: 3px;
                display:inline-block;
                padding: .2rem;
                text-align:center;
                float: left;
                margin-right:.3rem;
                margin-bottom:.3rem;
                font-size: .55rem;
                color: #444;
            }
        }
        .clear_history {
            margin: .4rem auto;
            text-align: center;
        }
    }
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
