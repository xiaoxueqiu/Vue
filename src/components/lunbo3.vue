<template>
<div class="lunbo3">
    <div class="hot-tit">热门话题</div>
    <div class="slide-container">
        <swiper :options="swiperOption" ref="mySwiper" class="swiper-wrapper" style="transition-duration: 0ms; transform: translate3d(0px, 0px, 0px);">
            <!-- 这部分放你要渲染的那些内容 --> 
            <swiper-slide v-for="wg in wordImgs" class="swiper-slide" style="width: 224.444px;">
                <a href="">
                    <div class="imgs"><img :src="wg.img"></div>
                    <div class="blackbg"><p>{{wg.title}}</p></div> 
                </a>
            </swiper-slide>
            <!-- 这是轮播的小圆点 -->  
    	    <div class="swiper-pagination" slot="pagination"></div>
        </swiper>
    </div>
</div>
</template>

<script>
import { swiper } from 'vue-awesome-swiper'
export default {
    name: 'lunbo3',
    data () {
        return {
    	    swiperOption: {
                pagination : '.swiper-pagination',
                slidesPerView: 4,
                spaceBetween: 30,
                paginationClickable: true, // 值为真时，当单击指示器时会执行过渡动画到目标slide
                centeredSlides: true, // 若为真，那么活动块会居中，而非默认状态下的居左
                //loop : true//环路 
            },
            // 图片文字滚动条
            wordImgs:[
                {
                    title:'最炫AJ缤纷来袭',
                    img:'http://shihuo.hupucdn.com/column/201707/2813/60c10fd21e39fe0427d1987e8af5aea1.jpg'
                },
                {
                    title:'经典工装靴合集',
                    img:'http://shihuo.hupucdn.com/column/201707/2815/1fdfaa186cb6ef457ddc1134820f8830.png'
                },
                {
                    title:'最美签名鞋',
                    img:'http://shihuo.hupucdn.com/column/201706/0116/80655bd31f49c7b04ad95b6be1b80a8c.jpg'
                }
            ],
        }
    }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style lang="scss">
.lunbo3{
    width: 100%;
    overflow: hidden;
    background: #ccc;
    position: relative;
    /* padding-bottom: .4rem;
    margin-bottom: .2rem;
    border-bottom: 1px #ececec solid; */
    .hot-tit{
        padding: .26667rem;
        text-align: left;
        font-size: 14px;
        color: #222;
    }
    .slide-container{
        width: 100%;
        height: 300px;
        //margin: 20px auto;
       /*  position: relative;
        top:0;
        left:0;
        //padding: 0 .26667rem;
        height: 2.65333rem;
        overflow: hidden; */
        .swiper-wrapper{
            position: relative;
            width: 100%;
            height: 100%;
            z-index: 1;
            display: flex;
            transition-property: transform;
            box-sizing: content-box;
            //margin:0 auto;
            .swiper-pagination{
                display: none;
                position: absolute;
                right:20px;
                bottom:10px;
                z-index: 200;
            }
            .swiper-slide {
                text-align: center;
                font-size: 18px;
                background: #fff;
                
                /* Center slide text vertically */
                display: -webkit-box;
                display: -ms-flexbox;
                display: -webkit-flex;
                display: flex;
                -webkit-box-pack: center;
                -ms-flex-pack: center;
                -webkit-justify-content: center;
                justify-content: center;
                -webkit-box-align: center;
                -ms-flex-align: center;
                -webkit-align-items: center;
                align-items: center;
                a{
                    display: inline-block;
                    height:100%;
                    position: relative;
                }
                .imgs {
                    width: 100%;
                    overflow: hidden;
                    position: relative;
                    img {
                        width: 100%;
                        display: block;
                    }
                }
                .blackbg {
                    position: absolute;
                    width: 100%;
                    height: 100%;
                    left: 0;
                    top: 0;
                    background-color: rgba(0,0,0,.2);
                    p {
                        padding: 0 .26667rem;
                    }
                }
                p {
                    width: 100%;
                    font-size: .34667rem;
                    position: absolute;
                    top: 50%;
                    left: 0;
                    -webkit-transform: translateY(-50%);
                    transform: translateY(-50%);
                    z-index: 10;
                    color: #FFF;
                    word-wrap: break-word;
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
