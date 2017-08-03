<template>
    <div class="shopcar">
        <header>
            <p class="head_p1"><router-link to="/index/more"><img src="http://sh1.hoopchina.com.cn/fis_static/shihuomobile/static/common/widget/header/head_back_50e46d0.png"></router-link></p>
            <h2>购物车</h2>
            <p @click="bol()"><img src="http://sh1.hoopchina.com.cn/fis_static/shihuomobile/static/common/widget/header/head_list_9992b6c.png"></p>
            <ul v-show="bool">
                <li>
                    <router-link to="/index/home">
                        <p><img src="http://sh1.hoopchina.com.cn/fis_static/shihuomobile/static/common/widget/header/homepage-icon_cc50250.png"></p>
                        <span>首页</span>
                    </router-link>
                </li>
                <li>
                    <router-link to="/index/more">
                        <p><img src="http://sh1.hoopchina.com.cn/fis_static/shihuomobile/static/common/widget/header/user-center-icon_46c20aa.png"></p>
                        <span>我的</span>
                    </router-link>
                </li>
            </ul>
        </header>

        <div class="conunter" v-if="!arr.length">
            <div>
                <p><img src="http://s.maiyaole.com/images/wap/empty.png" class="img1"></p>
                <p>这里还有孤单一个我...</p>
                <p><router-link to="/home"><button class="btn">去首页逛逛</button></router-link></p>
            </div>   
        </div>
        <div class="conunter1" v-else>
            <div class="zhong">
                <p class="zhong_p">
                    <img src="http://s.maiyaole.com/images/wap/detail/icon_select02.png">
                    <span>识货网</span>
                </p>
                <!-- 物品栏 -->
                <div class="res" v-for='(obj,index) in arr'>
                    <p><img src="http://s.maiyaole.com/images/wap/detail/icon_select03.png" class="img2"></p>
                    <p class="res_p"><img :src="obj.img" class="dimg"></p>
                    <!-- 右侧offside -->
                    <div class="offside">
                        <p class="offside_p">{{obj.title}}</p>
                        <p class="offside_p1">￥{{obj.price}}</p>
                        <div class="key">
                            <p class="key_p">
                                <button class="sp1" @click="jian(obj,index)">-</button>
                                <input type="text" name="" class="sp2" placeholder="1" :value='obj.count'>
                                <button class="sp1" @click="jia(obj)">+</button>
                            </p>
                            <p @click="dele(index)">
                                <img src="http://s.maiyaole.com/images/wap/detail/icon_delect.png" class="img3">
                            </p>
                        </div>
                    </div>
                </div>
                <!-- 活动说明 -->
                <div class="activity">
                    <p>活动商品已购满件，可以享受满赠优惠最多可领取2件赠品</p>
                    <p>[赠品]碧生源常润茶2袋*2</p>
                </div>
                <!-- 结算 -->
                <div class="balabce">
                    <div>
                        <p class="balabce_p">优惠</p>
                        <p class="balabce_p1">￥0.00</p>
                    </div>
                    <div>
                        <p class="balabce_p">商品金额</p>
                        <p class="balabce_p1">￥{{total()}}</p>
                    </div>
                </div>
                <!-- 详情 -->
                <div class="detail">
                    <p>
                        <span>优惠：</span>
                        <span>￥0.00</span>
                    </p>
                    <p>
                        <span>商品金额：</span>
                        <span>￥{{total()}}</span>
                    </p>
                    <p id="detail_p">
                        <span>应付金额：</span>
                        <span class="sp3">￥{{total()}}</span>
                    </p>
                </div>
            </div>

            <div class="footer">
                <p>应付金额：<span class="sp3">￥{{total()}}</span></p>
                <p>不含运费</p>
                <p><button class="btn1">去结算</button></p>
            </div>
        </div>
        
    </div>
</template>

<script>
export default {
    name: 'shopcar',
    data () {
        return {
            bool:false,
            arr:[]
        }
    },
    // 钩子函数，承接
    created(){
        this.arr = this.$root.shopArr;
    },
    methods:{
        // 头部点击事件
        bol(){
            this.bool = this.bool?false:true;
        },
        jia(a){
            a.count++;
        },
        jian(b,i){
            // console.log(obj,index);  
            if(b.count <= 1){
                if (confirm("你确定移除该商品？")) { 
                  this.arr.splice(i,1);
                } else {
                  return;
                }              
            } else {
                b.count --;
            }
        },
        dele(i){
            if (confirm("你确定移除该商品？")) { 
                this.arr.splice(i,1);
            } else {
                return;
            } 
        },
        total(){
            let a = 0;
            for (let i = 0; i <this.arr.length; i++) {
                a += this.arr[i]['price'] * this.arr[i]['count'];
            }
            return a;
        }
    }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style lang="scss">
    .shopcar{
        width:100%;
         /*头部区域*/
        header{
            width:100%;
            height:2.4rem;
            background: #f7f7f7;
            border-bottom: 1px solid #e5e5e5;
            display: flex;
            justify-content: space-around;
            align-items: center;
            position: relative;
            position:fixed;
            z-index:10;
            left:0;
            top:0;
            p{
                width:2rem;
                height:2rem;
                img{
                    width:100%;
                }
            }
            h2{
                width:50%;
                line-height:2.4rem;
                text-align:center;
                font-size:.95rem;
                color:#333;
                white-space: nowrap;
                overflow: hidden;
                text-overflow: ellipsis;
            }
            ul{
                width:36%;
                background: rgba(0,0,0,0.7);
                position: absolute;
                top:2.2rem;
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
                        width:1.2rem;
                        color:white;
                        font-size:.6rem;
                    }
                }
            }
        }
        .conunter{
            position: fixed;
            top: 2.4rem;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: #efefef;
            z-index: 8;
            box-sizing: border-box;
            padding-top: 3rem;
            color: #b9b9b9;
            div{
                width:50%;
                margin: 0 auto;
                text-align:center;
            }
            .img1{
                width: 60%;
            }
            .btn{
                margin-top: 5px;
                width: 142px;
                height: 46px;
                background-color: #0099f1;
                border: 1px solid #0099f1;
                border-radius: 2px;
                font-size: 16px;
                color: white;
            }
        }
        .conunter1{
            width: 100%;
            height: 100%;
            margin-top:2.4rem;
            padding-top: 10px;
            padding-bottom: 3rem;
            background-color: #efefef; 
            box-sizing: border-box;
            color: #b9b9b9;
            .zhong{
                width: 96%;
                border-top: 2px solid #42b3f4;
                margin: auto;
            }
            .zhong_p{
                line-height: 39px;
                background-color: white;
                text-align: left;
                box-sizing: border-box;
                padding-left: 10px;
                color: black;
                img{
                    width: 5%;
                }
            }
            .res{
                background-color: #eaf9ff;
                display: flex;
                align-items: center;
                padding:20px 0;
                p{
                    line-height: .9rem;
                }
            }
            .res_p{
                width: 20%;
                margin:0 10px 0 15px;
            }
            .dimg{
                width: 90%;
            }
            .img2{
                width: 50%;
            }
            .key{
                width: 107%;
                height: 30px;
                line-height: 30px;
                display: flex;
                align-items: center;
                justify-content: space-between;
                box-sizing: border-box;
            }
            .key_p{
                text-align: left;
                background-color: white;
                display: flex;
                justify-content: space-between;
            }
            .sp1{
                display: inline-block;
                width: 2.5rem;
                height: 1.45rem;
                font-size: 22px;
                background-color: #eeeeee;
                border: 1px solid #eeeeee;
            }
            .sp2{
                display: inline-block;
                width: 70px;
                height: 28px;
                background-color: white;
                font-size: 16px;
                outline: none;
                border: 0;
                text-align:center;
            }
            .offside_p{
                text-align: left;
                width: 164px;
                font-size: 13px;
                color: black;
            }
            .offside_p1{
                text-align: left;
                font-size:.7rem;
                color: #e7453d;
            }
            .img3{
                width: 60%;
            }
            .activity{
                background-color: #fff6bd;
                padding: 10px 0;
                p {
                    line-height: 1rem;
                    font-size:.65rem;
                }
            }
            .balabce{
                width: 100%;
                background-color: #f8f8f8;
                margin-top: 20px;
                padding: 10px 15px 10px 0px;
                display: flex;
                justify-content: flex-end;
                box-sizing: border-box;
                div{
                    margin: 0 5px;
                    font-size: 14px;
                }
            }
            .balabce_p{
                color: black;   
            }
            .balabce_p1{
                color: #ec6159;
            }
            .detail{
                width: 100%;
                background-color: white;
                border-top: 2px solid #0099f1;
                margin-top: 10px;
                p {
                    line-height: 1.5rem;
                    display: flex;
                    justify-content: space-between;
                    padding: 0 10px;
                    color: black;
                    font-size: 14px;
                }
            }
            #detail_p{
                font-size: 16px;
            }
            .sp3{
                color: #ea463d;
                font-weight: bold;
            }
            .footer {
                width: 100%;
                height: 2.5rem;
                position: fixed;
                left: 0;
                bottom: 0;
                z-index: 9;
                border: 1px solid #dfdfdf;    
                padding-bottom: 10px;      
                box-sizing: border-box;
                display: flex;
                justify-content: space-around;
                line-height: 2.5rem;
                background-color: #ccc;
                font-size:.7rem;
                color:#333;
            }
            .btn1{
                width: 5rem;
                height: 1.5rem;
                color: white;
                background-color: #e72419;
                border: 1px solid #e72419;
            }
        }
    }


</style>