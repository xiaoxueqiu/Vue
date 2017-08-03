<template>
	<div class="part3">
		<div class="wrap3">
			<div class="w3_nav">
				<p>最新</p>
				<p>人气</p>
				<p>搭配</p>
				<p>潮品</p>
				<p>视频</p>
			</div>
			<div class="w3_lun">
				<swiper :options="swiperOption"  ref="mySwiper">  
		            <!-- 这部分放你要渲染的那些内容   -->
		
			            <div class="swiper-slide" v-for="d in obj"><img :src="d.img"></div>
		            <!-- 这是轮播的小圆点   -->
		            <div class="swiper-pagination" slot="pagination"></div>  
		        </swiper> 
			</div>
			<div class="w3_p">
				<div class="w3_img">
					<img src="../../../static/img/023bc5e4848afc828742fcba55387668f0.jpg">
				</div>
				<span>GY.Apreen</span>
			</div>
			
			<div class="w3_cen">
				<div class="cen_t" v-for="e in obj1" v-on:click="getBuy(e)">
					<router-link to="/home/buy">
					<img :src="e.img" class="cen_img">
					<p class="cen_p1">{{e.txt1}}</p>
					<p class="cen_p2">{{e.txt2}}</p>
					<div class="cen_p3">
						<span>06月13日 12:10</span>
						<span>阅读量：1790142</span>
						<span>点赞：594229</span>
					</div>
					</router-link>
				</div>
			</div>
			
		</div>

	</div>
</template>
<script>
import { bus } from '../../js/bus.js'
import { swiper, swiperSlide } from 'vue-awesome-swiper'
export default {
	name: 'part1',
	components: {  
	    swiper,  
	    swiperSlide  
	},
	data() {  
		return {  
			obj:[],
			obj1:[],
		    swiperOption: {  
		    //是一个组件自有属性，如果notNextTick设置为true，组件则不会通过NextTick来实例化swiper，也就意味着你可以在第一时间获取到swiper对象，假如你需要刚加载遍使用获取swiper对象来做什么事，那么这个属性一定要是true
		    notNextTick: true,
		    autoplay:2000,  
		    pagination: '.swiper-pagination',  
		    slidesPerView: 'auto',  
		    centeredSlides: true,  
		    paginationClickable: true,  
		    spaceBetween: 30,  
		        onSlideChangeEnd: swiper => {  
		            //这个位置放swiper的回调方法  
		            this.page = swiper.realIndex+1;  
		            this.index = swiper.realIndex;  
		        }  
		    } 
		}  
	},
	methods:{
        //定义这个sweiper对象  
        computed: {  
            swiper() {  
              return this.$refs.mySwiper.swiper;  
            }  
        },
        getBuy:function(e){
        	bus.$emit('getBuy',e);
        	// console.log(1);
        },
        /*set:function(x){
		   this.num++;
		   if(typeof x.number=='undefined'){
		     x.number = 0
		  }
		  x.number++
		    var cartObject={
		      id:x.id,
		      img:x.img,
		      pice:x.pice,
		      numb:x.number
		    }
		    this.cartArray.forEach((n,index)=>n.id==x.id&&this.cartArray.splice(index,1))  
		    this.cartArray.push(cartObject);  
		    this.obj = {
		      data:this.cartArray
		    }
		    var s=window.localStorage;
		    s.setItem("person", JSON.stringify(this.obj));
		}*/
    },
	mounted () {  
   		this.$http.get('../../../static/data/home.json').then(function(res){
   			this.obj = res.body.lunbo2;
   			// console.log(this.obj);
   		});
   		this.$http.get('../../../static/data/home.json').then(function(res){
   			this.obj1 = res.body.fen;
   			// console.log(this.obj1);
   		})
    	
        //这边就可以使用swiper这个对象去使用swiper官网中的那些方法  
        // this.swiper.slideTo(0, 0, true); 
    }     	
}
</script>

<style lang="scss">
	.wrap3{
		width:100%;
		height:100%;
		font-family: 'Avenir', Helvetica, Arial, sans-serif;
	}
	.w3_nav{
		display: flex;
		justify-content: space-around;
		height:45px;
		line-height:45px;
		color:#ccc;
		font-size: 0.9rem;
		:nth-child(1){
			color:black;
		}
	}
	.w3_lun{
		height:176px;
		width:100%;
		.swiper-slide img{
			width:100%;
		}
	}
	.w3_p{
		height:53px;
		position: relative;
		span{
			position: absolute;
			top:15px;
			left:65px;
		}
	}
	.w3_img{
		width:28px;
		height:28px;
		border-radius:50%;
		overflow: hidden;
		position: absolute;
		top:10px;
		left:20px;
		img{
			width:28px;
			height:28px;
		}
	}
	.w3_cen{
		width:100%;
		height:100%;
		margin-bottom:100px;
		background:#e1e1e1;
	}
	.cen_t{
		width:100%;
		height:100%;
		padding-bottom:8px;
		margin-bottom:20px;
		background:white;
		.cen_img{
			height:205px;
			width:100%;
		}
		.cen_p1{
			color: #000;
    		font-size: 20px;
    		font-weight: 700;
    		padding:10px 10px 5px 10px;
		}
		.cen_p2{
			line-height: 1.15rem;
    		font-size: 14px;
    		color: #444;
    		padding:10px 10px 5px 10px;
		}
		.cen_p3{
			height:22px;
			font-size:12px;
			color:#b0b0b0;
			padding:5px 10px;
			span{
				margin-right:10px;
			}
		}
	}
</style>