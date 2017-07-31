<template>
  <div class="lunbo">
    <swiper :options="swiperOption" ref="mySwiper">
        <!-- 这部分放你要渲染的那些内容 --> 
        <swiper-slide><img src="http://shihuo.hupucdn.com/appHome/201707/2417/b8619d7e765456b200a465ce8fad91ed.jpg?imageView2/2/w/750/h/380/interlace/1"></swiper-slide>
        <swiper-slide><img src="http://shihuo.hupucdn.com/appHome/201707/2715/d81528b020a6d2130a973b1a38fdcb7c.jpg?imageView2/2/w/750/h/380/interlace/1"></swiper-slide>
        <swiper-slide><img src="http://shihuo.hupucdn.com/appHome/201707/2609/625bcee17bc059a2110337b4fd892461.jpg?imageView2/2/w/750/h/380/interlace/1"></swiper-slide>
        <swiper-slide><img src="http://shihuo.hupucdn.com/appHome/201707/2510/2a7996bce2d7beb6042a9cc968ec59c5.jpg?imageView2/2/w/750/h/380/interlace/1"></swiper-slide>
	    <swiper-slide><img src="http://shihuo.hupucdn.com/appHome/201707/2117/7fd52a0ae623578f307a4eee37353e01.jpg?imageView2/2/w/750/h/380/interlace/1"></swiper-slide>
        <!-- 这是轮播的小圆点 -->  
	    <div class="swiper-pagination" slot="pagination"></div>
    </swiper>
    <div></div>  
  </div>
</template>

<script>
import { swiper } from 'vue-awesome-swiper'
export default {
    name: 'lunbo',
    data () {
        return {
    	   swiperOption: {
                autoplay: 3000,
                pagination : '.swiper-pagination',
                loop : true//环路 
            }
        }
    },
    components:{
    	swiper
    }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
.lunbo{
	width: 100%;
    position: relative;
    top:0;
}
.lunbo img{
	width: 100%;
}
.swiper-pagination{
    position: absolute;
    right:20px;
    bottom:10px;
    z-index: 200;
}

</style>



<!--  	var swiper = new Swiper('.swiper1', {
        pagination: '.swiper-pagination',
        paginationClickable: true,  // 值为真时，当单击指示器时会执行过渡动画到目标slide
        centeredSlides: true,  // 若为真，那么活动块会居中，而非默认状态下的居左
        autoplay: 2500,  // 过渡延迟时间
        loop:true,  //看起来是衔接的，用于无限循环切换
        autoplayDisableOnInteraction: false,
        // 当设置为false时，用户操作之后（swipes,arrow以及pagination 点击）
        // autoplay不会被禁掉，用户操作之后每次都会重新启动autoplay。
        observer:true,
        observerParents:true
    }); -->
