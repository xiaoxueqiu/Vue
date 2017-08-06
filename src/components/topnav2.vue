<template>
    <div class="topnav2">
        <header>
        	<p class="head_p1" v-show="reset"><router-link to="/home"><img src="http://sh1.hoopchina.com.cn/fis_static/shihuomobile/static/common/widget/header/head_back_50e46d0.png"></router-link></p>
        	<form ref="ss">
        		<input type="image" name="" src="http://sh1.hoopchina.com.cn/fis_static/shihuomobile/static/homefis/widget/header/search_0b8e800.png">
                <transition name="fade">
        		     <input type="text" name="" placeholder="搜索最好的运动装备" v-on:focus="focu" v-show="text" v-model="bang">
                </transition>
        	</form>
        	<p @click="bol()" v-show="opens"><img src="http://sh1.hoopchina.com.cn/fis_static/shihuomobile/static/common/widget/header/head_list_9992b6c.png"></p>
            <span class="cancel" v-show="close" @click="quxiao()">取消</span>
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
        <div class="search_page" id="search-page" v-show="page">
            <div class="inner" id="searchWrapper">
                <dl>
                    <dt>热门搜索</dt>
                    <dd class="sear_hot">
                        <span v-for="(hot_ss,index) in hotArr" @click="dian(hot_ss,index)">{{hot_ss}}</span>
                    </dd>
                    <dt class="his" v-show="his">历史搜索</dt>
                    <dd class="sear_record clearfix">
                        <span id="history" class="his" v-show="his" v-for="(x,index) in hisArr">{{x}}</span>
                    </dd>
                    <dd>
                        <p class="clear_history his">
                            <a href="javascript:void(0);" id="clear_history" v-show="his" @click="qc()">清空历史记录</a>
                        </p>
                    </dd>
                </dl>
            </div>
            <div class="inner" id="searchRelate" style="display:none;">
                <ul></ul>
            </div>
        </div>    
    </div>
</template>

<script>
export default {
    name: 'topnav2',
    data () {
        return {
            id1:"",
            bang:"",
            bool1:false,
            his:false,
            opens:true,
            text:true,
            close:false,
            reset:true,
            page:false,
            hisArr:[],
            hotArr:["欧文","篮球鞋","Air Jordan","boost","三叶草","阿迪达斯","T恤","vans","安德玛","耐克"],
        }
    },
    methods:{
    	// 头部点击事件
    	bol(){
    		this.bool1 = this.bool1?false:true;
    	},
        //聚焦
        focu(){
            console.log(111)
            this.close=true
            this.reset=false
            this.page=true
            this.opens=false
            this.$refs.ss.style.width= '82%'
        },
        //点击热门搜索的每一项
        dian(hot_ss,index){
            //console.log(index)
            this.his = true;
            this.bang = hot_ss;
            //把绑定的内容添加到数组里
            this.hisArr.push(hot_ss);
            console.log(this.bang)
            this.$router.push({path:'../shop_model',query:{id1:this.bang}});
        },
        //点击清除历史记录
        qc(){
           this.his = false; 
           this.hisArr = [];
        },
        ///点击取消
        quxiao(){
            this.close=false
            this.reset=true
            this.page=false
            this.opens=true
        },
    } ,
    mounted(){
        console.log(this.$router)
        // 跨页传值
        this.name = this.$router.history.current.query.id1;
    }
}
</script>

<style lang="scss">
    .topnav2{
    	width:100%;
        /*头部区域*/
        header{
        	width:100%;
        	height:2rem;
        	background: #f7f7f7;
        	display: flex;
        	justify-content: space-around;
        	align-items: center;
        	position: relative;
            z-index: 5;
            p{
            	width:2rem;
            	height:2rem;
                img{
                    width:100%;
                }
            }
            form{
            	width:70%;
            	height:1.4rem;
            	background: #e8e8e8;
                border-radius: 4px;
                display: flex;
                align-items: center;
                input[type="image"]{
                	width:.9rem;
                	margin-left:0.3rem;
                    &::-webkit-input-placeholder{
                        color:#666;
                    }
                }
                input[type="text"]{
                	width:70%;
                	height:1rem;
                	text-indent:1rem;
                	font-size:.6rem;
                	color:#333;
                	border: none;
                	outline:medium;
                	background: #e8e8e8;
                    &::-webkit-input-placeholder{
                    	color:#666;
                    }
                }
                /* 定义动画 */
                .fade-enter-active,.fade-leave-active {
                    transition: all 1s ease;
                }
                /* 定义宽高动画 */
                .fade-enter-active{
                    opacity:1;
                    width:300px;
                    height:300px;
                }
                .fade-leave-active{
                    opacity:0;
                    width:100px;
                    height:100px;
                }
                /* 重要：定义初始状态 */
                .fade-enter{
                    opacity:0;
                    width:100px;
                    height:100px;
                }
            }
            .cancel{
                font-size:.7rem;
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
                        color:white;
                        font-size:.6rem;
                    }
                }
            }
        }
        .search_page {
    background: #fff;
    position: fixed;
    top: 0;
    width: 100%;
    height: 100%;
    padding-top: 2.4rem;
    overflow-y: scroll;
    z-index: 2;
    #searchWrapper {
        width: 100%;
        background: #fff;
        position: absolute;
        z-index: 81;
        left: 0;
        top: 2rem;
    }
    #searchRelate {
        background: #fff;
        overflow: hidden;
        position: absolute;
        z-index: 82;
        left: 0;
        top: 1.26667rem;
        width: 100%;
        height: 100%;
    }
    dl {
        background: #fff;
        padding: .5rem;
        padding-right: 0;
        padding-bottom: 0;
        dt {
            font-size: .6rem;
            color: #999;
            margin-bottom: .5rem;
        }
        .sear_hot {
            margin-bottom: .13333rem;
            span {
                font-size: .55rem;
                display: inline-block;
                margin-right: .22rem;
                margin-bottom: .2rem;
                border: 1px solid #aeaeae;
                color: #444;
                padding: .2rem;
                border-radius: 3px;
            }
        }
        .his {
            margin-bottom: 0;
        }
    }
    .sear_record{
        border-bottom: 1px solid #e6e6e6;
        border-top: 1px solid #e6e6e6;
        padding-top:.3rem;
        clear: both;
        span{
            border: 1px solid #aeaeae;
            border-radius: 3px;
            display:inline-block;
            padding: .2rem;
            text-align:center;
            float: left;
            margin-right:.3rem;
            margin-bottom:.3rem;
            font-size: .55rem;
            color: #444;
        }
    }
    .clear_history {
        margin: .4rem auto;
        text-align: center;
    }
}
    }

    

</style>