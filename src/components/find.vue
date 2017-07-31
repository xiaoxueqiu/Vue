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
        <!-- 上部四个li -->
        <div class="three_dl">
            <a href="javascript:void(0)">
                <dl>
                    <dt>清单活动</dt>
                    <dd>晒出你的跑步装备</dd>
                    <p><img src="http://shihuo.hupucdn.com/appShiwuHome/201702/1718/2f4bd3cdc1ca8de2dcdc8ef7979c8e9b.jpg?imageView2/0/w/150/h/150/interlace/1"></p>
                </dl>
            </a>
            
        </div>


    </div>
</template>

<script>
import { swiper } from 'vue-awesome-swiper'
export default {
    name: 'find',
    data () {
        return{
            // 轮播图路径
            banner3Url:['http://shihuo.hupucdn.com/appHome/201707/0715/20e477f7221c0c8fe1d86e640447b4ca.jpg?imageView2/2/w/750/h/268/interlace/1','http://shihuo.hupucdn.com/appHome/201707/2810/f85a86e48b3b4102e997724a9799f7ff.jpg?imageView2/2/w/750/h/268/interlace/1','http://shihuo.hupucdn.com/appHome/201707/2823/9191a4433d751fac8f9a555a8a348106.jpg?imageView2/2/w/750/h/268/interlace/1','http://shihuo.hupucdn.com/appHome/201707/2214/44683ee9c5db21cc4867f21b2d10beb4.jpg?imageView2/2/w/750/h/268/interlace/1','http://shihuo.hupucdn.com/appHome/201707/1513/8cee428ce9990508b3fc2783886e1987.jpg?imageView2/2/w/750/h/268/interlace/1'],
            swiperOption: {
                autoplay: 3000,
                pagination : '.swiper-pagination',
                loop : true//环路 
            },
        }
    },
    components:{
        swiper
    }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style lang="scss">
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
}

</style>
