<template>
    <div class="topnav2">
        <header>
        	<p class="head_p1"><router-link to="/index/home"><img src="http://sh1.hoopchina.com.cn/fis_static/shihuomobile/static/common/widget/header/head_back_50e46d0.png"></router-link></p>
        	<form>
        		<input type="image" name="" src="http://sh1.hoopchina.com.cn/fis_static/shihuomobile/static/homefis/widget/header/search_0b8e800.png">
        		<input type="text" name="" placeholder="识货独家搜最全正品低价装备">
        	</form>
        	<p @click="bol()"><img src="http://sh1.hoopchina.com.cn/fis_static/shihuomobile/static/common/widget/header/head_list_9992b6c.png"></p>
        	<ul v-show="bool1">
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

        <!-- 轮播图 -->
        <div class="banner2">
        	<swiper :options="swiperOption" ref="mySwiper">
			    <!-- slides -->
			    <swiper-slide v-for="aa in banner2Url">
			    	<img :src="aa">
			    </swiper-slide>
			    <!-- Optional controls -->
			    <div class="swiper-pagination"  slot="pagination"></div>
			</swiper>
        </div>

        <!-- tab切换区 -->
        <div class="list2_view">
            <!-- 导航栏 -->
        	<ul class="ul1"> 
        		<li v-for="(tab,index) in tabName2" :class='{redd:counter==index}' @click='changCol(index)'><a href="javascript:void(0)">{{tab}}</a></li>
        	</ul>
        	<ul class="ul2">
        		<li v-for="(tab2,index) in tabLan2" :class='{redw:counter2==index}'  @click='changCol2(index)'>{{tab2}}</li>
        	</ul>
            
            <!-- 数据获取区 -->
            <div class="wrap">
            	<div class="muban" v-for="obj in list2">
            		<a href="javascript:void(0)">
        				<div class="ban_img">
        					<img :src="obj.img">
        				</div>
        				<div class="ban_right">
        					<p class="p1">{{obj.title}}</p>
        					<p class="p2">{{obj.subtitle}}</p>
        					<p class="p3"><span class="sp1" v-if="obj.column_name">{{obj.column_name}}</span><span class="sp2">{{obj.business}}</span></p>
        				</div>
        			</a>
            	</div>
            </div>
        </div>
    </div>
</template>


<script>
import { swiper, swiperSlide } from 'vue-awesome-swiper'
import axios from 'axios'

export default {
    name: 'topnav2',
    data () {
        return {
            bool1:false,
            counter:0,
            counter2:0,
            // 轮播图配置
            swiperOption:{
            	pagination : '.swiper-pagination',
                autoplay: 3000,            
                paginationClickable: true,
                autoplayDisableOnInteraction: false,
                loop:true
            },
            // 轮播图路径
            banner2Url:[
                'http://shihuo.hupucdn.com/appHome/201705/2316/f31663cd60dc352677eab03d2bdce155.jpg?imageView2/2/w/750/h/268/interlace/1%7cimageMogr2/format/jpg',
                'http://shihuo.hupucdn.com/appHome/201704/1310/15c1c0f39c41a90098b8eeb0863f68d7.jpg?imageView2/2/w/750/h/268/interlace/1%7cimageMogr2/format/jpg',
                'http://shihuo.hupucdn.com/appHome/201705/1515/2ef47caf5ee1e7fcbd61188c16d11c7b.jpg?imageView2/2/w/750/h/268/interlace/1%7cimageMogr2/format/jpg',
                'http://shihuo.hupucdn.com/appHome/201705/1923/a19557e5b2a870a3b4f7c3283a2d2fc9.jpg?imageView2/2/w/750/h/268/interlace/1%7cimageMogr2/format/jpg',
                'http://shihuo.hupucdn.com/appHome/201705/2410/137a591ba98127e8dda60d3174bfcc60.jpg?imageView2/2/w/750/h/268/interlace/1%7cimageMogr2/format/jpg'
            ],
            // 导航栏数据
            tabName2:['推荐','国内','海淘'],
            tabLan2:['全部','运动鞋服','休闲鞋服','运动装备','电脑数码','家居生活','食品营养','箱包手袋','饰品手表','办公设备','图书音像','其他分类'],
            // json文件的路径
            data2Arr:[['../../static/json/privilege_tj1.json','../../static/json/privilege_tj_ydxf1.json','../../static/json/privilege_tj_xxxf1.json','../../static/json/privilege_tj_ydzb1.json','../../static/json/privilege_tj_dnsm1.json','../../static/json/privilege_tj_jjsh1.json','../../static/json/privilege_tj_spyy1.json','../../static/json/privilege_tj_xbsd1.json','../../static/json/privilege_tj_spsb1.json','../../static/json/privilege_tj_bgsb1.json','../../static/json/privilege_tj_tsyy1.json','../../static/json/privilege_tj_qtfl1.json'],['../../static/json/privilege_gn1.json','../../static/json/privilege_gn_ydxf1.json','../../static/json/privilege_gn_xxxf1.json','../../static/json/privilege_gn_ydzb1.json','../../static/json/privilege_gn_dnsm1.json','../../static/json/privilege_gn_jjsh1.json','../../static/json/privilege_gn_spyy1.json','../../static/json/privilege_gn_xbsd1.json','../../static/json/privilege_gn_spsb1.json','../../static/json/privilege_gn_bgsb1.json','../../static/json/privilege_gn_tsyy1.json','../../static/json/privilege_gn_qtfl1.json'],['../../static/json/privilege_ht1.json','../../static/json/privilege_ht_ydxf1.json','../../static/json/privilege_ht_xxxf1.json','../../static/json/privilege_ht_ydzb1.json','../../static/json/privilege_ht_dnsm1.json','../../static/json/privilege_ht_jjsh1.json','../../static/json/privilege_ht_spyy1.json','../../static/json/privilege_ht_xbsd1.json','../../static/json/privilege_ht_spsb1.json','../../static/json/privilege_ht_bgsb1.json','../../static/json/privilege_ht_tsyy1.json','../../static/json/privilege_ht_qtfl1.json']],
            // 存放数据的容器
            list2:[]
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
    	// 上部导航栏点击事件
    	changCol(i){
            let _this = this;
            _this.counter = i;
            _this.counter2 = 0;
            axios.get(_this.data2Arr[i][_this.counter2])
            .then((response)=>{       
                let list2 = response.data.data;
                _this.list2 = list2;
            })
    	},
    	// 下部导航栏点击事件
    	changCol2(i){
            let _this = this;
            _this.counter2 = i;
            axios.get(_this.data2Arr[_this.counter][i])
            .then((response)=>{       
               let list2 = response.data.data;
               _this.list2 = list2;
            })
    	},
    	// 获取数据
    	fetchData(){
            let _this = this;                       
            axios.get('./../../static/json/privilege_tj1.json')
            .then((response)=>{       
               let list2 = response.data.data;
               _this.list2 = list2;
            })
        }
    }
    
}
</script>


<style scoped>
    .topnav2{
    	width:100%;
    	padding-bottom: 5rem;
    }
    /*头部区域*/
    header{
    	width:100%;
    	height:4.8rem;
    	background: #f7f7f7;
    	display: flex;
    	justify-content: space-around;
    	align-items: center;
    	position: relative;
    }
    header p{
    	width:4rem;
    	height:4rem;
    }
    header p img{
    	width:100%;
    }
    header form{
    	width:78%;
    	height:3.2rem;
    	background: #e8e8e8;
        border-radius: 4px;
        display: flex;
        align-items: center;
    }
    header form input[type="image"]{
    	width:1.8rem;
    	margin-left:0.6rem;
    }
    header form input[type="text"]{
    	width:80%;
    	height:2.8rem;
    	text-indent:1rem;
    	font-size:1.5rem;
    	color:#333;
    	border: none;
    	outline:medium;
    	background: #e8e8e8;
    }
    header form input::-webkit-input-placeholder{
    	color:#666;
    }
    header ul{
    	width:36%;
    	background: rgba(0,0,0,0.7);
        position: absolute;
        top:4.4rem;
        right:1rem;
        z-index:9;
        border-radius: 4px;
    }
    header ul li{
    	width:100%;
        height:3.6rem;
        border-top:1px solid grey;
    }
    header ul li a{
    	display: block;
    	width:100%;
    	height:100%;
    	display:flex;
    	justify-content: center;
    	align-items: center;
    }
    header ul li p{
    	width:1.8rem;
    	height:1.8rem;
    	margin-right: 1rem;
    }
    header ul li p img{
    	width:100%;
    }
    header ul li span{
    	color:white;
    	font-size:1.2rem;
    }

    /*轮播图*/
    .banner2, .banner2 .swiper-container {
    	width:100%;
    	height:11.6rem;
    }
    .banner2 img{
    	width:100%;
    	height:100%;
    }
    .banner2 .swiper-pagination{
    	text-align:right;
    }

    /*tab切换区*/
    .list2_view{
    	width:100%;
    	background: white;
    	overflow: hidden;
    }
    .list2_view .ul1{
    	width:84%;
    	margin:0 auto;
    	padding-bottom: 0.4rem;
    	display: flex;
    	justify-content: space-around;
    }
    .list2_view .ul1 li{
    	width:20%;
    	line-height:3rem;
    	position: relative;
    	text-align: center;
    	font-size:1.4rem;
    	font-weight: 600;
    	box-sizing: border-box;
    }
    .list2_view .ul1 li a{
    	color:#333;
    }
    .list2_view .ul1 .redd a{
    	color:#dd1712;
    }
    .list2_view .ul1 .redd::after{
    	content: "";
    	width:1.6rem;
    	height:0.2rem;
    	display: block;
        position: absolute;
    	background: #dd1712;
    	left:34%;
    	bottom:0.4rem;
    }
    .list2_view .ul2{
    	width:100%;
    	box-sizing: border-box;
    	padding:0 3%;
    	white-space:nowrap;
    	overflow: auto;
        padding-bottom: 1.8rem;
        font-size:1.2rem;
    }
    .list2_view .ul2 li{
    	display: inline-block;
    	margin:0 1.5%;
    	width: 20%;
    	height:2.2rem;
    	line-height: 2.4rem;
    	text-align:center;
    	color:#666;
    	background: #e3e3e3;
    }
    .list2_view .ul2 .redw{
    	background: #dd1712;
    	color:white;
    }

    /*数据获取区*/
    .wrap{
    	width:100%;
    	overflow: hidden;
    }
    .wrap .muban{
    	width:94%;
    	margin:0px auto;
    	padding:1rem;
    	overflow: hidden;
    	border-bottom:1px solid #e6e6e6;
    	font-size:1.2rem;
    }
    .wrap .muban .ban_img{
    	width:9.4rem;
    	height:9.4rem;
    }
    .wrap .muban .ban_img img{
    	width:9.4rem;
    	height:9.4rem;
    }
    .wrap .muban a{
    	display: block;
    	width:100%;
    	display:flex;
    }
    .wrap .muban .ban_right{
    	margin-left: 1rem;
    	display: flex;
        -webkit-box-orient: vertical;
        flex-direction: column;
        -webkit-box-pack: justify;
        justify-content: space-between;
    }
    .wrap .muban .ban_right .p1{
    	font-size:1.3rem;
    	/*font-weight: 600;*/
    	color:#666;
    }
    .wrap .muban .ban_right .p2{
    	font-size:1.3rem;
    	color:red;
    }
    .wrap .muban .ban_right .p3{
    	overflow: hidden;
    }
    .wrap .muban .ban_right .p3 span{
        display:inline-block;
        font-size:1.2rem;
        color:#999;
    }
    .wrap .muban .ban_right .p3 .sp1{
        float:left;
    	font-size:1rem;
    	padding:0 0.6rem;
    	border:1px solid #ccc;
    	border-radius: 4px;
    }
    .wrap .muban .ban_right .p3 .sp2{
        float:right;
    }
</style>