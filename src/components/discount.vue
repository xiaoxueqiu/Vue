<template>
    <div class="discount">
        <topnav2></topnav2>
        <lunbo2></lunbo2>
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
import topnav2 from './topnav2'
import lunbo2 from './lunbo2'
import axios from 'axios'
export default {
    name: 'discount',
    components:{
        topnav2,
        lunbo2,   
    },
    data () {
        return {
            counter:0,
            counter2:0,
            // 导航栏数据
            tabName2:['推荐','国内','海淘','白菜价'],
            tabLan2:['全部','运动鞋服','休闲鞋服','运动装备','电脑数码','家居生活','食品营养','箱包手袋','饰品手表','办公设备','图书音像','其他分类'],
            // json文件的路径
            data2Arr:[['../../static/json/privilege_tj1.json','../../static/json/privilege_tj_ydxf1.json','../../static/json/privilege_tj_xxxf1.json','../../static/json/privilege_tj_ydzb1.json','../../static/json/privilege_tj_dnsm1.json','../../static/json/privilege_tj_jjsh1.json','../../static/json/privilege_tj_spyy1.json','../../static/json/privilege_tj_xbsd1.json','../../static/json/privilege_tj_spsb1.json','../../static/json/privilege_tj_bgsb1.json','../../static/json/privilege_tj_tsyy1.json','../../static/json/privilege_tj_qtfl1.json'],['../../static/json/privilege_gn1.json','../../static/json/privilege_gn_ydxf1.json','../../static/json/privilege_gn_xxxf1.json','../../static/json/privilege_gn_ydzb1.json','../../static/json/privilege_gn_dnsm1.json','../../static/json/privilege_gn_jjsh1.json','../../static/json/privilege_gn_spyy1.json','../../static/json/privilege_gn_xbsd1.json','../../static/json/privilege_gn_spsb1.json','../../static/json/privilege_gn_bgsb1.json','../../static/json/privilege_gn_tsyy1.json','../../static/json/privilege_gn_qtfl1.json'],['../../static/json/privilege_ht1.json','../../static/json/privilege_ht_ydxf1.json','../../static/json/privilege_ht_xxxf1.json','../../static/json/privilege_ht_ydzb1.json','../../static/json/privilege_ht_dnsm1.json','../../static/json/privilege_ht_jjsh1.json','../../static/json/privilege_ht_spyy1.json','../../static/json/privilege_ht_xbsd1.json','../../static/json/privilege_ht_spsb1.json','../../static/json/privilege_ht_bgsb1.json','../../static/json/privilege_ht_tsyy1.json','../../static/json/privilege_ht_qtfl1.json'],['../../static/json/privilege_bcj1.json','../../static/json/privilege_ht_ydxf1.json','../../static/json/privilege_ht_xxxf1.json','../../static/json/privilege_ht_ydzb1.json','../../static/json/privilege_ht_dnsm1.json','../../static/json/privilege_ht_jjsh1.json','../../static/json/privilege_ht_spyy1.json','../../static/json/privilege_ht_xbsd1.json','../../static/json/privilege_ht_spsb1.json','../../static/json/privilege_ht_bgsb1.json','../../static/json/privilege_ht_tsyy1.json','../../static/json/privilege_ht_qtfl1.json']],
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
            axios.get('../../static/json/privilege_tj1.json')
            .then((response)=>{       
               let list2 = response.data.data;
               _this.list2 = list2;
            })
        }
    }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style lang="scss">
.discount{
    margin-bottom: 70px;
    width: 100%;
    background-color: #ccc;
    /*tab切换区*/
    .list2_view{
        width:100%;
        background: white;
        overflow: hidden;
        .ul1{
            width:100%;
            margin:0 auto;
            padding-bottom: 0.2rem;
            display: flex;
            justify-content: space-around;
            li{
                width:20%;
                line-height:1.5rem;
                position: relative;
                text-align: center;
                font-size:.7rem;
                font-weight: 600;
                box-sizing: border-box;
                a{
                    color:#333;
                }
            }
            .redd{
                a{
                   color:#dd1712; 
                }
                &::after{
                    content: "";
                    width:.8rem;
                    height:0.1rem;
                    display: block;
                    position: absolute;
                    background: #dd1712;
                    left:34%;
                    bottom:0.2rem;
                }
            }
        }
        .ul2{
            width:100%;
            box-sizing: border-box;
            padding:0 3%;
            white-space:nowrap;
            overflow: auto;
            padding-bottom: .9rem;
            font-size:.6rem;
            li{
                display: inline-block;
                margin:0 1.5%;
                width: 20%;
                height:1.1rem;
                line-height: 1.2rem;
                text-align:center;
                color:#666;
                background: #e3e3e3;
            }
            .redw{
                background: #dd1712;
                color:#fff;
            }
        }
        /*数据获取区*/
        .wrap{
            width:100%;
            overflow: hidden;
            .muban{
                width:94%;
                margin:0 auto;
                padding:.5rem;
                overflow: hidden;
                border-bottom:1px solid #e6e6e6;
                font-size:.6rem;
                .ban_img{
                    width:4.7rem;
                    height:4.7rem;
                    img{
                        width:4.7rem;
                        height:4.7rem;
                    }
                }
                a{
                    display: block;
                    width:100%;
                    display:flex;
                }
                .ban_right{
                    margin-left: .5rem;
                    display: flex;
                    -webkit-box-orient: vertical;
                    flex-direction: column;
                    -webkit-box-pack: justify;
                    justify-content: space-between;
                    .p1{
                        font-size:.65rem;
                        /*font-weight: 600;*/
                        color:#666;
                    }
                    .p2{
                        font-size:.65rem;
                        color:red;
                    }
                    .p3{
                        overflow: hidden;
                        span{
                            display:inline-block;
                            font-size:.6rem;
                            color:#999;
                        }
                        .sp1{
                            float:left;
                            font-size:.5rem;
                            padding:0 0.3rem;
                            border:1px solid #ccc;
                            border-radius: 4px;
                        }
                        .sp2{
                            float:right;
                        }
                    }
                }
            }
        }
        
    }
} 
</style>
