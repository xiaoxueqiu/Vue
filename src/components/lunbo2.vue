<template>
<div class="lunbo2">
    <swiper :options="swiperOption" ref="mySwiper">
        <!-- 这部分放你要渲染的那些内容 --> 
        <swiper-slide><a href="//www.shihuo.cn/haitao/youhui/275953.html#qk=banner&amp;order=5">
                <img src="http://shihuo.hupucdn.com/appHome/201707/3116/bbb8aa43db37ee06fc2bfb654721faff.jpg?imageView2/2/w/750/h/268/interlace/1%7cimageMogr2/format/jpg">
        </a></swiper-slide>
        <swiper-slide><a href="//www.shihuo.cn/youhui/285670.html#qk=banner&amp;order=1">
                <img src="http://shihuo.hupucdn.com/appHome/201707/2715/90159ee63a0e25f556bd74e606b8a060.jpg?imageView2/2/w/750/h/268/interlace/1%7cimageMogr2/format/jpg">
        </a></swiper-slide>
        <swiper-slide><a href="http://t.haitaodashi.cn/app/292.html#qk=banner&amp;order=2">
                <img src="http://shihuo.hupucdn.com/appHome/201707/2516/841d13f21b42deb12ab1ac08661d87aa.jpg?imageView2/2/w/750/h/268/interlace/1%7cimageMogr2/format/jpg">
        </a></swiper-slide>
        <swiper-slide><a href="http://t.haitaodashi.cn/291.html#qk=banner&amp;order=3">
                <img src="http://shihuo.hupucdn.com/appHome/201707/1910/16d423ccc9641a898c86681a9b92d85e.jpg?imageView2/2/w/750/h/268/interlace/1%7cimageMogr2/format/jpg">
        </a></swiper-slide>
	    <swiper-slide><a href="https://www.amazon.cn/gp/promotion/landingpage/A1CHU2Z50HSGAK/ref=as_li_ss_tl?ie=UTF8&amp;camp=536&amp;creative=3132&amp;linkCode=ur2&amp;pf_rd_i=2029189051&amp;pf_rd_m=A1AJ19PSB66TGU&amp;pf_rd_p=302455332&amp;pf_rd_r=0NMA328EY0SXSWZGA9QW&amp;pf_rd_s=tcg-slide-1&amp;pf_rd_t=101&amp;tag=hupushihuomob-23#qk=banner&amp;order=4">
                <img src="http://shihuo.hupucdn.com/appHome/201707/2814/ef73aef0524f7439b629c5bc1f33c257.jpg?imageView2/2/w/750/h/268/interlace/1%7cimageMogr2/format/jpg">
        </a></swiper-slide>
        <!-- 这是轮播的小圆点 -->  
	    <div class="swiper-pagination" slot="pagination"></div>
    </swiper>
    <div class="tag-list-area">
        <div class="list">
            <a href="//m.shihuo.cn/youhui/cabbage">
                <div class="name">
                    <p>全网白菜</p>
                    <div class="tips">复古眼镜架9.9</div>
                </div>
                <div class="imgs">
                    <img src="http://shihuo.hupucdn.com/appHome/201707/3110/2e1bf31aea07a923002dddee4396697e.jpg">
                </div>
            </a>
        </div>
        <div class="list">
            <a href="//m.shihuo.cn/youhui/quanList">
                <div class="name">
                    <p>优惠券</p>
                    <div class="tips">男装299-80券</div>
                </div>
                <div class="imgs">
                    <img src="http://shihuo.hupucdn.com/appHome/201706/0215/6c9fc76a65bda79c9c298ca19f016820.jpg">
                </div>
            </a>
        </div>
    </div> 
</div>
</template>

<script>
import { swiper } from 'vue-awesome-swiper'
export default {
    name: 'lunbo2',
    data () {
        return {
    	   swiperOption: {
                pagination : '.swiper-pagination',
                autoplay: 3000,            
                paginationClickable: true,
                autoplayDisableOnInteraction: false,
                loop:true
            }
        }
    },
    components:{
    	swiper,
    }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style lang="scss">
/*轮播图*/
$width:100%;
.lunbo2{
    width:$width;
    .swiper-container{
        width:$width; 
        img{
            width:$width;
            //height:100%;
        }
    }
    .swiper-pagination{
        text-align:right;
    }
    .tag-list-area {
        margin-top: -5px;
        overflow: hidden;
        width:$width;
        .list {
            background-color: #fff;
            //height: 1.86667rem;
            width: 50%;
            float: left;
            //line-height: 1.7rem;
            &:first-of-type{
                border-right:1px solid #f0f0f0;
            }
            a {
                display: block;
                //height: 1.86667rem;
            }
            .name {
                width: 5rem;
                padding: .5rem 0 0 .7rem;
                float: left;
                p{
                    font-size: 14px;
                    font-weight: 700;   
                }
                .tips {
                    font-size: 12px;
                    color: #666;
                }
            }
            .imgs {
                text-align: right;
                padding: .13333rem;
                img {
                    width: 2.6rem;
                    height: 2.6rem;
                }
            }
        }
    }
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
