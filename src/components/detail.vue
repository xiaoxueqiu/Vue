<template>
    <div class="detail">
        <header>
        	<p class="head_p1"><router-link to="/home"><img src="http://sh1.hoopchina.com.cn/fis_static/shihuomobile/static/common/widget/header/head_back_50e46d0.png"></router-link></p>
            <h2>{{content.title}}</h2>
        	<p @click="bol()"><img src="http://sh1.hoopchina.com.cn/fis_static/shihuomobile/static/common/widget/header/head_list_9992b6c.png"></p>
        	<ul v-show="bool">
        		<li>
        		    <router-link to="/home">
        		        <p><img src="http://sh1.hoopchina.com.cn/fis_static/shihuomobile/static/common/widget/header/homepage-icon_cc50250.png"></p>
        		        <span>首页</span>
        		    </router-link>
        		</li>
        		<li>
        		    <router-link to="/more">
        		        <p><img src="http://sh1.hoopchina.com.cn/fis_static/shihuomobile/static/common/widget/header/user-center-icon_46c20aa.png"></p>
        		        <span>我的</span>
        		    </router-link>
        		</li>
        	</ul>
        </header>

        <!-- 图片展示区 -->
        <div class="bigtu">
        	<div v-if="content.img_full_screen" class="img_much">
        		<img v-for="fullimg in content.img_full_screen" :src="fullimg">
        	</div>
        	<div else class="img_uniq">
        		<img :src="content.img">
        	</div>
        </div>

        <!-- 商品信息区域 -->
        <div class="xinxi">
            <h3>相关商品信息</h3>
        	<p class="p1">
        	    <span class="sp1">商品名(标题)：</span>
        	    <span class="sp2">{{content.title}}</span>
        	</p>
        	<p v-if="content.subtitle">
        	    <span class="sp1">副标题：</span>
        	    <span class="sp2">{{content.subtitle}}</span>
        	</p>
        	<p v-if="content.column_name">
        	    <span class="sp1">专栏：</span>
        	    <span class="sp2">{{content.column_name}}</span>
        	</p>
        	<p v-if="content.intro">
        	    <span class="sp1">商品介绍：</span>
        	    <span class="sp2">{{content.intro}}</span>
        	</p>
        	<p v-if="content.merchant">
        	    <span class="sp1">来自：</span>
        	    <span class="sp2">{{content.merchant}}</span>
        	</p>
        </div>

        <!-- 购买商品 -->
        <div class="buy" v-if="content.price">
        	<p class="jia">单价：<span>￥{{content.price}}</span></p>
        	<div>
        		<button @click="cut">-</button>
        		<input type="number" name="" v-model.lazy="count" placeholder="请输入商品数量" @change="inp">
        		<button @click="add">+</button>
        	</div>
        	<p class="zjia">总价格：<span>￥{{content.price * count}}</span><button @click="tj(content)">添加到购物车</button></p>
        </div>
    </div>
</template>

<script>
export default {
    name: 'detail',
    data () {
        return {
        	bool:false,
        	count:1,
            content:null
        }
    },
    created(){
        this.content = this.$root.shuju;
    },
    methods:{
    	// 头部点击事件
    	bol(){
    		this.bool = this.bool?false:true;
    	},
    	// 添加商品
    	add(){
    		this.count++;
    	},
    	// 删除商品
    	cut(){
    		if(this.count<=1){
    			alert("商品个数不能为0");
    			return;
    		}
    		this.count--;
    	},
    	// 输入框事件
    	inp(){
    		if(this.count<1){
    			alert("商品个数不能为0");
    			this.count=1;
    		}else{
    			this.count = parseInt(this.count);
    		}
    	},
        tj(obj){
            for( var i =0; i < this.$root.shopArr.length;i++) {
                if(obj.title == this.$root.shopArr[i].title) {
                     this.$root.shopArr[i].count+=this.count;
                     alert("已添加到购物车，请注意查看");
                     return;
                } 
            }
            this.$set(obj,'count',this.count);
            this.$root.shopArr.push(obj);
            alert("已添加到购物车，请注意查看");
        }
    }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
    .detail{
    	width:100%;
    }
    /*头部区域*/
    header{
    	width:100%;
    	height:4.8rem;
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
    }
    header p{
    	width:4rem;
    	height:4rem;
    }
    header p img{
    	width:100%;
    }
    header h2{
    	width:50%;
    	line-height:4.8rem;
    	text-align:center;
    	font-size:1.9rem;
    	color:#333;
    	white-space: nowrap;
    	overflow: hidden;
    	text-overflow: ellipsis;
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
    	width:2.4rem;
    	color:white;
    	font-size:1.2rem;
    }

    /*图片展示区*/
    .bigtu{
    	width:100%;
    	margin-top: 4.9rem;
    	overflow: hidden;
    }
    ,.bigtu .img_much{
        width:100%;
    }
    .bigtu .img_uniq img,.bigtu .img_much img{
    	width:100%;
    }
    
    /*商品信息区域*/
    .xinxi{
    	width:100%;
        overflow: hidden;
        padding:1rem 3%;
        box-sizing: border-box;
        font-size:1.2rem;
    }
    .xinxi h3{
    	width:100%;
    	line-height: 3.2rem;
    	font-size: 1.8rem;
    	color:#dd1712;
    	text-align:center;
    }
    .xinxi p{
    	padding-bottom: 0.6rem;
    	border-bottom:1px dashed #f3f3f3;
    }
    .xinxi .sp1{
    	display: block;
    	font-weight:bold;
    	font-size:1.5rem;
    	color:purple;
    }
    .xinxi .sp2{
    	display: block;
    	font-size:1.4rem;
    	color:#444;
    	text-indent: 2em;
    }
    .xinxi .p1 .sp2{
    	color:darkcyan;
    	font-size:1.5rem;
    	font-size:bold;
    }

    /*购买商品*/
    .buy{
    	width:100%;
        padding:0 3%;
        box-sizing: border-box;
        font-size:1.2rem;
    }
    .buy .jia{
        font-size:1.4rem;
        color:blue;
        line-height: 2.8rem;
        margin-bottom: 0.5rem;
    }
    .buy .jia span{
    	font-size:1.6rem;
        color:#dd1712;
        font-weight:bold;
    }
    .buy div{
    	width:100%;
    	height:2rem;
    	display: flex;
    	justify-content: space-between;
    	margin-bottom: 0.5rem;
    }
    .buy div button{
    	width:10%;
    }
    .buy div input{
    	width: 80%;
    	text-indent: 1rem;
    }
    .buy .zjia{
    	width:100%;
        overflow: hidden;
    	padding:1.4rem 0;
    }
    .buy .zjia span{
    	font-size:1.6rem;
    	color:#dd1712;
    }
    .buy .zjia button{
    	width:40%;
    	float:right;
    }
</style>