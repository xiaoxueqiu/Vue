<template>
    <div class="more" ref="morediv">
        <!-- 头部区域 -->
        <div class="black">
            <div class="toux"><img src="//sh1.hoopchina.com.cn/fis_static/shihuomobile/static/user/head_02977e3.png">
            <p v-bind:msg="msg">{{msg}}</p>
            </div>
            <div class="dz">
                <router-link to="/login"><span v-show="log">登录</span></router-link>
                <span v-show="out" @click="outBtn()">退出</span>
                <p>金币 0</p>
            </div>
        </div>
        <!-- 我的识货 -->
        <div class="gnq">
            <div class="tit"><span>我的识货</span></div>
            <ul>
                <li>
                    <a href="javascript:void(0)">
                        <img src="http://sh1.hoopchina.com.cn/images/trade/app/personal/collect_content.png">
                        <p>我的收藏</p>
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0)">
                        <img src="http://sh1.hoopchina.com.cn/images/trade/app/personal/my_shaiwu.png">
                        <p>我的晒物</p>
                    </a>
                </li>
                <li>
                    <a href="//m.shihuo.cn/user/my_wallet">
                        <img src="http://sh1.hoopchina.com.cn/images/trade/app/personal/kaiquan.png">
                        <p>我的礼品</p>
                    </a>
                </li>
            </ul>
        </div>
        <!-- 我的海淘 -->
        <div class="gnq">
            <div class="tit"><span>我的海淘</span></div>
            <ul>
                <li>
                    <a href="javascript:void(0)" @click='jump'>
                        <img src="http://sh1.hoopchina.com.cn/images/trade/app/personal/cart.png">
                        <p>购物车</p>
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0)">
                        <img src="http://sh1.hoopchina.com.cn/images/trade/app/personal/haitao_order.png">
                        <p>海淘订单</p>
                    </a>
                </li>
                <li>
                    <a href="//m.shihuo.cn/user/kefuAbout">
                        <img src="http://sh1.hoopchina.com.cn/images/trade/app/personal/haitao_kefu.png">
                        <p>海淘客服</p>
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0)">
                        <img src="http://sh1.hoopchina.com.cn/images/trade/app/personal/my_address.png">
                        <p>地址管理</p>
                    </a>
                </li>
            </ul>
        </div>
        <!-- 识货必备 -->
        <div class="gnq">
            <div class="tit"><span>识货必备</span></div>
            <ul>
                <li>
                    <a href="//m.shihuo.cn/recShop">
                        <img src="http://sh1.hoopchina.com.cn/images/trade/app/personal/tuijiandianpu.png">
                        <p>推荐店铺</p>
                    </a>
                </li>
                <li>
                    <a href="http://a.app.qq.com/o/simple.jsp?pkgname=com.hupu.shihuo&g_f=991653">
                        <img src="http://sh1.hoopchina.com.cn/images/trade/app/personal/identify.png">
                        <p>装备鉴定</p>
                    </a>
                </li>
                <li>
                    <a href="//www.shihuo.cn/app/assets/xuanxie/xuanxie.html">
                        <img src="http://sh1.hoopchina.com.cn/images/trade/app/personal/select_shoe.png">
                        <p>黑科技选鞋</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</template>

<script>

export default {
    name: 'more',
    data () {
        return{
            msg:'未登录',
            log:true,
            out:false,
        }
    },
    methods:{
        jump() {
            this.$router.push('../shopcar');
        },
        outBtn(){
            localStorage.clear();
            this.log = true;
            this.out = false;
        }
    },
    mounted () {
　　    let h = window.innerHeight || document.documentElement.clientHeight || document.body.clientHeight;
        // ref在官网上的解释简单来说就是用来绑定某个dom元素，或者来说用来绑定某个组件，然后在$refs里面调用
        this.$refs.morediv.style.height = h +'px';
        this.msg = JSON.parse(localStorage.getItem('username'));
        if (this.msg) {
            this.log = false;
            this.out = true;   
        }else{
            this.log = true;
            this.out = false;
        }
    }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style lang="scss">
.more{
    margin-bottom: 70px;
    width: 100%;
    background-color: #f7f7f7;
    //头部区域
    .black{
        width:100%;
        height:6.4rem;
        overflow: hidden;
        background: url(http://sh1.hoopchina.com.cn/fis_static/shihuomobile/static/user/bg_912a95a.png) top no-repeat;
        background-size:100% auto;
        .toux{
            width:2.1rem;
            height:2.1rem;
            float:left;
            margin-top: 2.5rem;
            margin-left: 1rem;
            font-size:.7rem;
            color:#fff;
            img{
                width: 100%;
                height:100%;
            }
        }
        .dz{
            width:75%;
            overflow: hidden;
            float:left;
            margin-top: 2.7rem;
            box-sizing: border-box;
            padding-left: 1.1rem;
            span{
                font-size:.75rem;
                color:#fff; 
            }
            p{
                margin-top: .3rem;
                font-size:.6rem;
                color:#fff;
            }
        }
    }
    //底部功能区
    .gnq{
        width: 100%;
        background: white;
        overflow: hidden;
        box-sizing: border-box;
        padding:.3rem .5rem;
        margin-bottom:.5rem;
        .tit{
            font-size:.7rem;
            color:#333;
            background: url(//sh1.hoopchina.com.cn/fis_static/shihuomobile/static/user/border_88b19b4.png) left center repeat-x;
            background-size: .16667rem;
        }
        ul{
            width:100%;
            display: flex;
            li{
                display: block;
                width:25%;
                margin:.4rem 0px;
                text-align: center;
                a{
                    display: inline-block;
                    width:100%;
                }
                img{
                    width:50%;
                }
                p{
                    font-size:.6rem;
                    line-height: 1.2rem;
                    color:#333;
                }
            }
        }
    }
}

</style>
