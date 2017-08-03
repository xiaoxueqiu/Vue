<template>
	<div class="bbb">
		<div class="b_nav">
			<div class="b_nav_l">
				<span></span>
				<span>搜索酒店、景点门票</span>
			</div>
			<div class="b_nav_r"></div>
		</div>
		<div class="b_top">
			<div class="bt_top">
				<p>精选晒图</p>
				<p>更多></p>
			</div>
			<div class="bt_lun">
				<div class="swiper-container">
					<swiper :options="swiperOption"  ref="mySwiper">  
						<div class="swiper-slide" v-for="d in obj"><img :src="d.img" class="lun_img"></div>
		        	</swiper> 
				</div>
			</div>
		</div>
		<div class="b_foot">
			<div class="bt_cen" v-for = "f in obj1">
				<p>{{f.txt}}</p>
				<img :src="f.img">
				<span>{{f.txt1}}</span><br>
				<span>{{f.txt2}}</span>
			</div>

			<div class="bt_cen" v-for = "f in obj2">
				<p>{{f.txt}}</p>
				<img :src="f.img">
				<span>{{f.txt1}}</span><br>
			</div>
		</div>


	</div>
</template>
<script>
import { swiper, swiperSlide } from 'vue-awesome-swiper'
export default{
	name:"bbb",
	components: {  
	    swiper,  
	    swiperSlide  
	},
	data(){
		return{
			swiperOption: {  
			    //是一个组件自有属性，如果notNextTick设置为true，组件则不会通过NextTick来实例化swiper，也就意味着你可以在第一时间获取到swiper对象，假如你需要刚加载遍使用获取swiper对象来做什么事，那么这个属性一定要是true
			    autoplay:2000,  
		        pagination: '.swiper-pagination',
		        effect: 'coverflow',
		        grabCursor: true,
		        centeredSlides: true,
		        slidesPerView: 'auto', 
		        coverflow: {
		            rotate: 36,
		            stretch: 0,
		            depth: 100,
		            modifier: 1.3,
		            slideShadows : true
		        },
			    onSlideChangeEnd: swiper => {  
			            //这个位置放swiper的回调方法  
			            this.page = swiper.realIndex+1;  
			            this.index = swiper.realIndex;  
			    }  
			},
			obj:[
				{
					img:require("../../../static/img/b1.jpg"),
				},
				{
					img:require("../../../static/img/b2.jpg"),
				},
				{
					img:require("../../../static/img/b3.jpg"),
				},
				{
					img:require("../../../static/img/b4.jpg"),
				},
				{
					img:require("../../../static/img/b5.jpg"),
				},
				{
					img:require("../../../static/img/b6.jpg"),
				},
				{
					img:require("../../../static/img/b7.jpg"),
				},
				{
					img:require("../../../static/img/b8.jpg"),
				},
				{
					img:require("../../../static/img/b9.jpg"),
				},
				{
					img:require("../../../static/img/b10.jpg"),
				}
			],
			obj1:[
				{
					txt:"好玩推荐",
					img:require("../../../static/img/bb1.jpg"),
					txt1:"澳门新濠影汇酒店Studio City Hotel",
					txt2:"双早明星经典房连住2晚 还赠送夜神飞驰门票和8字摩天轮门票 "
				}
			],
			obj2:[
				{
					txt:"投票帮",
					img:require("../../../static/img/bb2.jpg"),
					txt1:"什么游玩主题你最爱？什么旅游玩法你最嗨？"
				}
			]
		}
	},
	methods:{
		computed: {  
            swiper() {  
              return this.$refs.mySwiper.swiper;  
            }  
        }
	}
}
</script>
<style lang="scss">
	*{
		margin:0;
		padding:0
	}
	.bbb{
		width:100%;
		height:100%;
	}
	.b_nav{
		height:50px;
		padding:0 10px;
		border-bottom:1px solid #ccc;
		margin-bottom:12px;
	}
	.b_nav_l{
		width:89%;
		height:32px;
		border:1px solid #444;
		float: left;
		border-radius:20px;
		margin-top:0.45rem;
		position: relative;
		:nth-child(1){
			display:inline-block;
			width:23px;
			height:23px;
			background:url("../../../static/img/a11.png") no-repeat;
			background-size:15px;
			background-position:0px 7px;
			margin-left:85px;
		}
		:nth-child(2){
			font-size:13px;
			position:relative;
			top:-3px;
		}
	}
	.b_nav_r{
		width:10%;
		height:40px;
		float: left;
		background:url("../../../static/img/a10.png") no-repeat;
		background-size:32px;
		margin-left:1%;
		margin-top:0.47rem;
	}
	.b_top{
		height:100%;
		.bt_top{
			height:25px;
			position:relative;
			margin-bottom:10px;
			:nth-child(1){
				position:absolute;
				left:10px;
			}
			:nth-child(2){
				position:absolute;
				right:10px;
			}
		}
	}
	.bt_lun{
		height:220px;
		border-bottom:3px solid #eee;
	}
	.lun_img{
		width:100%;
		height:184px;
		box-sizing:border-box;
	}
    .swiper-container {
        width: 100%;
    }
    .swiper-slide {
        background-position: center;
        background-size: cover;
        width: 84%;
        height: 200px;
        border:1px solid #ccc;
		padding:7px;
		border-radius:4px;
		box-sizing:border-box;
    }
    .bt_cen{
    	padding:10px 10px;
    	p{
    		margin-bottom:10px;
    	}
    	img{
    		width:100%;
    		height:170px;
    		border-radius:5px;
    	}
    	span{
    		font-size:12px;
    	}
    }
    .b_foot{
    	height:100%;
    	margin-bottom:90px;
    }
</style>
