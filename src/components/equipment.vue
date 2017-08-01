<template>
    <div class="equipment">
        <header>
            <form>
                <input type="image" name="" src="http://sh1.hoopchina.com.cn/fis_static/shihuomobile/static/homefis/widget/header/search_0b8e800.png">
                <input type="text" name="" placeholder="搜索最好的运动装备">
            </form>
            <p @click="bol()"><img src="http://sh1.hoopchina.com.cn/fis_static/shihuomobile/static/common/widget/header/head_list_9992b6c.png"></p>
            <ul v-show="bool1">
                <li>
                    <router-link to="/home">
                        <p><img src="http://sh1.hoopchina.com.cn/fis_static/shihuomobile/static/common/widget/header/homepage-icon_cc50250.png"></p>
                        <span>首页</span>
                    </router-link>
                </li>
                <li>
                    <router-link to="/more">
                        <p><img src="http://sh1.hoopchina.com.cn/fis_static/shihuomobile/static/common/widget/header/user-center-icon_46c20aa.png"></p>
                        <span>我的</span>
                    </router-link>
                </li>
            </ul>
        </header>
        <!-- 头部导航 -->
        <div class="nav">
            <dl>
                <a href="javascript:void(0)">
                    <dt><img src="//sh1.hoopchina.com.cn/fis_static/shihuomobile/static/zhuangbei/index/zhuangbei-index-menu-1_f79f337.png"></dt>
                    <dd>热销排行</dd>
                </a>
            </dl>
            <dl>
                <a href="javascript:void(0)">
                    <dt><img src="//sh1.hoopchina.com.cn/fis_static/shihuomobile/static/zhuangbei/index/zhuangbei-index-menu-2_4b3ef21.png"></dt>
                    <dd>好价精选</dd>
                </a>
            </dl>
            <dl>
                <a href="javascript:void(0)">
                    <dt><img src="//sh1.hoopchina.com.cn/fis_static/shihuomobile/static/zhuangbei/index/zhuangbei-index-menu-3_680282c.png"></dt>
                    <dd>当季新款</dd>
                </a>
            </dl>
        </div>
        <!-- 图文展示区 -->
        <div class="tuwen">
            <div class="kuai">
                <div class="tu"><a href="javascript:void(0)"><img src="./../assets/equip1.png"></a></div>
                <div class="list">
                    <a href="javascript:void(0)">篮球鞋</a>
                    <a href="javascript:void(0)">篮球服饰</a>
                    <a href="javascript:void(0)">篮球配件</a>
                    <a href="javascript:void(0)">篮球 <img src="//sh1.hoopchina.com.cn/fis_static/shihuomobile/static/zhuangbei/index/icon-3_b996a60.png"></a>
                </div>
                <div class="list">
                    <a href="javascript:void(0)">Nike</a>
                    <a href="javascript:void(0)">adidas</a>
                    <a href="javascript:void(0)">Jordan</a>
                    <a href="javascript:void(0)">全部 <img src="//sh1.hoopchina.com.cn/fis_static/shihuomobile/static/zhuangbei/index/icon-3_b996a60.png"></a>
                </div>
            </div>
            <div class="kuai">
                <div class="tu"><a href="javascript:void(0)"><img src="./../assets/equip2.png"></a></div>
                <div class="list">
                    <a href="javascript:void(0)">跑步鞋</a>
                    <a href="javascript:void(0)">跑步服饰</a>
                    <a href="javascript:void(0)">跑步配件</a>
                    <a href="javascript:void(0)">运动补给 <img src="//sh1.hoopchina.com.cn/fis_static/shihuomobile/static/zhuangbei/index/icon-3_b996a60.png"></a>
                </div>
                <div class="list">
                    <a href="javascript:void(0)">adidas</a>
                    <a href="javascript:void(0)">asics</a>
                    <a href="javascript:void(0)">New Balance</a>
                    <a href="javascript:void(0)">全部 <img src="//sh1.hoopchina.com.cn/fis_static/shihuomobile/static/zhuangbei/index/icon-3_b996a60.png"></a>
                </div>
            </div>
            <div class="kuai">
                <div class="tu"><a href="javascript:void(0)"><img src="./../assets/equip3.png"></a></div>
                <div class="list">
                    <a href="javascript:void(0)">鞋类</a>
                    <a href="javascript:void(0)">服饰</a>
                    <a href="javascript:void(0)">配件</a>
                    <a href="javascript:void(0)">耳机 <img src="//sh1.hoopchina.com.cn/fis_static/shihuomobile/static/zhuangbei/index/icon-3_b996a60.png"></a>
                </div>
                <div class="list">
                    <a href="javascript:void(0)">Converse</a>
                    <a href="javascript:void(0)">CASLO</a>
                    <a href="javascript:void(0)">Vans</a>
                    <a href="javascript:void(0)">全部 <img src="//sh1.hoopchina.com.cn/fis_static/shihuomobile/static/zhuangbei/index/icon-3_b996a60.png"></a>
                </div>
            </div>
            <div class="kuai">
                <div class="tu"><a href="javascript:void(0)"><img src="./../assets/equip4.png"></a></div>
                <div class="list">
                    <a href="javascript:void(0)">健身装备</a>
                    <a href="javascript:void(0)">健身用品</a>
                    <a href="javascript:void(0)">营养补剂</a>
                    <a href="javascript:void(0)">全部类目 <img src="//sh1.hoopchina.com.cn/fis_static/shihuomobile/static/zhuangbei/index/icon-3_b996a60.png"></a>
                </div>
            </div>
        </div>
        <!-- 最新推荐 -->
        <div class="zui">
            <h2>最新推荐</h2>
            <div class="tui" v-for="item in list4">
                <a href="javascript:void(0)">
                    <div class="im">
                        <img :src="item.data.img">
                    </div>
                    <div class="right">
                        <p class="p1">{{item.data.title}}</p>
                        <p class="p2">{{item.data.intro}}</p>
                        <div class="p3">
                            <p><span>{{item.data.merchant}}</span><span class="sp1">￥{{item.data.price}}</span></p>
                            <p><img src="//sh1.hoopchina.com.cn/fis_static/shihuomobile/static/zhuangbei/index/icon-2_2bc8bc4.png"><span class="sp2">{{item.data.hits}}</span></p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios'
export default {
    name: 'equipment',
    data () {
        return {
            bool1:false,
            list4:[]
        }
    },
    watch:{
        '$route':'fetchData'
    },
    created () {
         this.fetchData()   
    },
    methods:{
        // 头部点击事件
        bol(){
            this.bool1 = this.bool1?false:true;
        },
        // 获取数据
        fetchData(){                           
            axios.get('../../static/json/equip1.json')
            .then((response)=>{       
               let list4 = response.data.data;
               //console.log(list4)
               this.list4 = list4;
            })
        }
    }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style lang="scss">
.equipment{
    margin-bottom: 3rem;
    width: 100%;
    /*头部区域*/
    header{
        width:100%;
        height:1.8rem;
        background: #f7f7f7;
        display: flex;
        justify-content: space-between;
        align-items: center;
        position: relative;
        form{
            width:84%;
            margin-left: 3%;
            height:1.2rem;
            background: #e8e8e8;
            border-radius: 2px;
            display: flex;
            align-items: center;
            input[type="image"]{
                width:.6rem;
                margin-left:.2rem;
            }
            input[type="text"]{
                width:90%;
                height:1.2rem;
                text-indent:.2rem;
                font-size:.5rem;
                color:#333;
                border: none;
                outline:medium;
                background: #e8e8e8;
            }
        }
        p{
            width:1.6rem;
            height:1.6rem;
            img{
                width:100%;
            }
        }
        ul{
            width:36%;
            background: rgba(0,0,0,0.7);
            position: absolute;
            top:1.8rem;
            right:.5rem;
            z-index:9;
            border-radius: 4px;
            li{
                width:100%;
                height:1.8rem;
                border-top:1px solid grey;
                a{
                    display: block;
                    width:100%;
                    height:100%;
                    display:flex;
                    justify-content: center;
                    align-items: center;
                }
                p{
                    width:.9rem;
                    height:.9rem;
                    margin-right: .5rem;
                    img{
                        width:100%;
                    }
                }
                span{
                    color:#fff;
                    font-size:.6rem;
                }
            }
        }
    }
    /*头部导航*/
    .nav{
        width:100%;
        overflow: hidden;
        display: flex;
        background-color:#fff;
        dl{
            width:33.33%;
            padding:.5rem 0;
            a{
                display: block;
                width:100%;
                border-right:1px solid #e3e3e3;
                text-align: center;
            }
            dt{
                width:18%;
                margin:0 auto;
                font-size:0px;
                img{
                    width:100%;
                }
            }
            dd{
                font-size:.65rem;
                color:#888;
                line-height: 1.1rem;
                margin-top: 0.3rem;
            }
        }
    }
}
.nav dl:nth-child(1) dt{
    width:54%;
    overflow: hidden;
}
.nav dl:nth-child(1) dt img{
    width:64%;
    float:right;
}

/*图文展示区*/
.tuwen{
    width:100%;
    overflow: hidden;
    background-color:#fff;
    .kuai{
        width:100%;
        border-bottom:0.4rem solid #f1f3f5;
        .tu{
            width:100%;
            overflow: hidden;
            img{
                width:100%;
            }
        }
        .list{
            width:100%;
            display:flex;
            a{
               display: block;
                width:25%;
                padding:.5rem 0;
                text-align:center;
                font-size:.65rem;
                color:#999;
                border-right: 1px solid #ececec;
                border-bottom: 1px solid #ececec;
                img{
                    width:8%;
                    margin-left: 0.3rem;
                } 
            }
        }
    }
}
/*最新推荐*/
.zui{
    width:100%;
    overflow: hidden;
    background-color:#fff;
    box-sizing: border-box;
    padding:.5rem 0 0 .5rem;
    h2{
        font-size:.8rem;
        color:#888;
        font-weight:300;
    }
    .tui{
        width:100%;
        padding:.5rem 0px;
        border-bottom:1px solid #e9e9e9;
        a{
            display: block;
            width:100%;
            overflow: hidden;
            .im{
                float:left;
                width:34%;
                font-size:0px;
                img{
                    width:100%;
                }
            }
        }
        .right{
            float:left;
            width:60%;
            height:100%;
            margin:0 2% 0 4%;
            font-size:.6rem;
            .p1{
                margin-bottom: 8%;
                color:#444;
                font-size:.65rem;
            }
            .p2{
                margin-bottom: 8%;
                color:#999;
            }
            .p3{
                display: flex;
                justify-content: space-between;
                color:#999;
                .sp1{
                    font-size:.7rem;
                    color:#dd1712;
                    font-weight:bold;
                }
                img{
                    width:.75rem;
                    margin-right:.3rem;
                }
                .sp2{
                    color:#444;
                }
            }
        }
    }
}
</style>
