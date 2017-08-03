<template>
    <div class="find">
        <!-- 轮播图 -->
        <div class="banner3">
            <swiper :options="swiperOption" ref="mySwiper">
                <!-- slides -->
                <swiper-slide v-for="aa in banner3Url">
                    <img :src="aa">
                </swiper-slide>
                <!-- Optional controls -->
                <div class="swiper-pagination"  slot="pagination"></div>
            </swiper>
        </div>
        <!-- 上部四个div -->
        <div class="four_d clearfix">
            <a href="javascript:void(0)" class="list">
               <img src="//sh1.hoopchina.com.cn/fis_static/shihuomobile/static/find/index/icon-zhongce_65770bc.png">
               <p>众测</p>
            </a>
            <a href="javascript:void(0)" class="list">
               <img src="//sh1.hoopchina.com.cn/fis_static/shihuomobile/static/find/index/icon-huati_624fa93.png">
               <p>栏目</p>
            </a>
            <a href="javascript:void(0)" class="list">
               <img src="//sh1.hoopchina.com.cn/fis_static/shihuomobile/static/find/index/icon-new_86b6c1f.png">
               <p>最新</p>
            </a>
            <a href="javascript:void(0)" class="list">
               <img src="//sh1.hoopchina.com.cn/fis_static/shihuomobile/static/find/index/icon-hot_2a01f3a.png">
               <p>最热</p>
            </a>
        </div>
        <!-- 文字图片区域 -->
        <div class="word_img">
            <p class="word_tit">热门话题</p>
            <div class="w_img">
                <a href="javascript:void(0)" v-for="wg in wordImgs">
                    <img :src="wg.img">
                    <p>{{wg.title}}</p>
                </a>
            </div>
        </div>

        <!-- tab切换栏 -->
        <div class="tabs">
            <ul>
                <li v-for="(list,index) in listArr" :class='{redli:counter==index}' @click="changCol(index)">{{list}}</li>
            </ul>
        </div>

        <!-- 数据渲染区 -->
        <div class="xrq">
            <ul>
                <li v-for="abc in list3">
                    <div class="shang chearfix">
                        <p class="shp"><img :src="abc.data.avatar"></p>
                        <div class="list-tit">
                            <h2>{{abc.data.author_name}}</h2>
                            <p>{{abc.data.date}}</p>
                        </div>
                    </div>
                    <div class="xia">
                        <a href="javascript:void(0)">
                            <p class="p1">{{abc.data.title}}</p>
                            <div><img :src="abc.data.img"></div>
                            <p class="p2"><span class="sp1">{{abc.data.praise}}</span><span class="sp2">{{abc.data.reply_count}}</span></p>
                        </a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</template>

<script>
import { swiper } from 'vue-awesome-swiper'
import axios from 'axios'
export default {
    name: 'find',
    data () {
        return{
            scroll:'' ,
            counter:0,
            // 轮播图路径
            banner3Url:['http://shihuo.hupucdn.com/appHome/201707/0715/20e477f7221c0c8fe1d86e640447b4ca.jpg?imageView2/2/w/750/h/268/interlace/1','http://shihuo.hupucdn.com/appHome/201707/2810/f85a86e48b3b4102e997724a9799f7ff.jpg?imageView2/2/w/750/h/268/interlace/1','http://shihuo.hupucdn.com/appHome/201707/2823/9191a4433d751fac8f9a555a8a348106.jpg?imageView2/2/w/750/h/268/interlace/1','http://shihuo.hupucdn.com/appHome/201707/2214/44683ee9c5db21cc4867f21b2d10beb4.jpg?imageView2/2/w/750/h/268/interlace/1','http://shihuo.hupucdn.com/appHome/201707/1513/8cee428ce9990508b3fc2783886e1987.jpg?imageView2/2/w/750/h/268/interlace/1'],
            swiperOption: {
                autoplay: 3000,
                pagination : '.swiper-pagination',
                loop : true//环路 
            },
            // 图片文字滚动条
            wordImgs:[
                {
                    title:'最炫AJ缤纷来袭',
                    img:'http://shihuo.hupucdn.com/appShiwuHome/201612/2719/1267919777022d0516cc1b4cc8b18d31.png?imageView2/2/w/240/h/240/interlace/1'
                },
                {
                    title:'经典工装靴合集',
                    img:'http://shihuo.hupucdn.com/appShiwuHome/201612/1514/c450c2db9f6cf046792493e5e522dca3.jpg?imageView2/2/w/240/h/240/interlace/1'
                },
                {
                    title:'最美签名鞋',
                    img:'http://shihuo.hupucdn.com/appShiwuHome/201611/0217/736513c94ba43b0ba6518f2a17b4ae90.jpg?imageView2/2/w/240/h/240/interlace/1'
                },
                {
                    title:'压马路神器',
                    img:'http://shihuo.hupucdn.com/appShiwuHome/201610/3110/7d511143c5a9e5885480a49e3e81d047.jpg?imageView2/2/w/240/h/240/interlace/1'
                },
                {
                    title:'大神穿的实战鞋',
                    img:'http://shihuo.hupucdn.com/appShiwuHome/201610/2018/53d7d9da01ee0a15065b13b6d0db0fa0.png?imageView2/2/w/240/h/240/interlace/1|imageMogr2/format/jpg'
                }
            ],
            // tab切换数据
            listArr:['全部','实战推荐','潮流穿搭','健身党','测评档案','跑步有道','数码控','绿茵装备库','开箱首晒','品质生活'],
            // json文件所在路径
            data3Arr:['../../static/json/find_qb1.json','../../static/json/find_sztj1.json','../../static/json/find_clcd1.json','../../static/json/find_jsd1.json','../../static/json/find_cpda1.json','../../static/json/find_pbyd1.json','../../static/json/find_smk1.json','../../static/json/find_lyzbk1.json','../../static/json/find_kxss1.json','../../static/json/find_pzsh1.json'],
            // 存放数据的容器
            list3:[]
        }
    },
    watch:{
        '$route':'fetchData'
    },
    created(){
        this.fetchData()
    },
    methods:{
        changCol(i){
            let _this = this;
            _this.counter = i;
            console.log(_this.counter);
            axios.get(_this.data3Arr[i])
            .then((response)=>{       
                let list3 = response.data.data;
                this.list3 = list3;
            })
        },
        // 获取数据
        fetchData(){                           
            axios.get('./../../static/json/find_qb1.json')
            .then((response)=>{       
               let list3 = response.data.data;
               this.list3 = list3;
            })
        },

       /* menu() {
            let _this = this;
            _this.scroll = document.body.scrollTop+document.documentElement.scrollTop;
            console.log(_this.scroll)
            if(_this.scroll ==0){
               this.flag = 'fixed';
            }else{
                this.falg ="";
            }
        }*/
    },
    //监听滚轮
    /*mounted() {
        window.addEventListener('scroll', this.menu)
    }*/
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style lang="scss">
/*tab切换栏*/
    .fixed{
        position: fixed;
        top:0;
        ul{
            font-size:.65rem;
            color:#444;
            white-space: nowrap;
            overflow: auto;
            padding-bottom:.5rem;
            &::-webkit-scrollbar {/*隐藏滚轮*/
                display: none;
            }
            li{     
                display: inline-block;
                line-height: 1.6rem;
                padding:0 2.5%;
                position: relative;
                border-bottom:1px solid #e3e3e3;
            }
            .redli{
                color:#dd1712;
                pointer-events: auto;
                &::after{
                    display: block;
                    width:1.3rem;
                    height:3px;
                    content: '';
                    background:#dd1712;
                    position: absolute;
                    left: 50%;
                    transform: translate(-50%, -50%);
                }  
            }
        }
    }
    .tabs{
        position: relative;
        width:100%;
        ul{
            font-size:.65rem;
            color:#444;
            white-space: nowrap;
            overflow: auto;
            padding-bottom:.5rem;
            &::-webkit-scrollbar {/*隐藏滚轮*/
                display: none;
            }
            li{     
                display: inline-block;
                line-height: 1.6rem;
                padding:0 2.5%;
                position: relative;
                border-bottom:1px solid #e3e3e3;
            }
            .redli{
                color:#dd1712;
                pointer-events: auto;
                &::after{
                    display: block;
                    width:1.3rem;
                    height:3px;
                    content: '';
                    background:#dd1712;
                    position: absolute;
                    left: 50%;
                    transform: translate(-50%, -50%);
                }  
            }
        }
    }
.find{
    margin-bottom: 70px;
    width: 100%;
    background-color: #f3f3f3;
    /*轮播图*/
    .banner3{
        width:100%;
        .swiper-container {
            width:100%;
            img{
                width:100%;
            }
        }
        .swiper-pagination{
            text-align:right;
        }
    }
    .four_d{
        width:100%;
        margin-top:-.2rem;
        background-color:#fff;
        margin-bottom:.45rem;
        .list {
            display: inline-block;
            width: 25%;
            float: left;
            text-align: center;
            padding-top: .26667rem;
            height: 2.88rem;
            font-size: 12px;
            color: #666;
            img{
                width:1.6rem;
                height:1.3rem;
            }
        }
    }
    /*文字图片区域*/
    .word_img{
        width:100%;
        background-color:#fff;
        border-bottom:8px solid #f7f7f7;
        box-sizing: border-box;
        .word_tit{
            font-size:.65rem;
            color:#222;
            line-height: 1.6rem;
            padding-bottom: .15rem;
            padding-left: 3%;
        }
        .w_img{
            padding:0px 1.5%;
            white-space: nowrap;//不换行
            overflow: auto;
            overflow-x: scroll;
            -webkit-overflow-scrolling: touch;
            &::-webkit-scrollbar {/*隐藏滚轮*/
                display: none;
            }
            a{
                position: relative;
                display: inline-block;
                width:26%;
                margin:0px 1.5%;
                text-align: center;
                img{
                    width:100%;
                }
                p{
                    position: relative;
                    word-wrap: break-word;
                    line-height:.6rem;
                    font-size:.5rem;
                    color:#666;
                }
            }
        }
    }
    
    /*渲染区*/
    .xrq{
        width:100%;
        overflow: hidden;
        box-sizing: border-box;
        padding-left: 2.5%;
        ul{
            width:100%;
            li{
                border-bottom:1px solid #e6e6e6;
                padding:.6rem 2.5% .6rem 0;
                .shang{
                    width:100%;
                    overflow: hidden;
                    .shp{
                        float:left;
                        width:9.5%;
                        margin-right:3%;
                        font-size:0px;
                        border-radius: 50%;
                        overflow: hidden;
                        img{
                            width:100%;
                        }
                    }
                    .list-tit{
                        float:left;
                        h2{
                            font-size:.95rem;
                            color:#555;
                            font-weight:300;
                            line-height: 1.4rem; 
                        }
                        p{
                            font-size:.9rem;
                            color:#999;
                            line-height: 1.4rem;
                        }
                    }
                }
                .xia{
                    margin-left: 12.5%;
                    .p1{
                        font-size:.75rem;
                        color:#444;
                    }
                    div{
                        margin: .5rem 0;
                        padding-bottom:.4rem;
                        font-size: 0px;
                        img{
                            width:100%;
                        }
                    }
                    .p2{
                        span{
                            display: inline-block;    
                            padding-left: 1rem; 
                        }
                        .sp1{
                            font-size:.7rem;
                            line-height: 1.2rem;
                            color:#a4a4a4;
                            background-image: url(http://sh1.hoopchina.com.cn/fis_static/shihuomobile/static/find/index/like_537e53f.png);
                            background-size: 60%;
                            background-repeat: no-repeat;
                            background-position: center left;
                        }
                        .sp2{
                            font-size:1rem;
                            line-height: 1.2rem;
                            color:#a4a4a4;
                            margin-left: 1.2rem;
                            background-image:url(http://sh1.hoopchina.com.cn/fis_static/shihuomobile/static/find/index/say_348570f.png);
                            background-size: 50%;
                            background-repeat: no-repeat;
                            background-position: center left;
                        }
                    }
                }
            }
        }
    }
    
}

</style>
