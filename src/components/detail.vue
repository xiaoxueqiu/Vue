<template>
    <div class="detail">
        <header>
        	<p class="head_p1"><router-link to="/home"><img src="http://sh1.hoopchina.com.cn/fis_static/shihuomobile/static/common/widget/header/head_back_50e46d0.png"></router-link></p>
            <h2>商品详情</h2>
        	<p @click="bol()"><img src="http://sh1.hoopchina.com.cn/fis_static/shihuomobile/static/common/widget/header/head_list_9992b6c.png"></p>
        	<ul v-show="bool">
        		<li>
        		    <router-link to="index/home">
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
                console.log(this.$root.shopArr[0].title)
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
<style lang="scss">
    .detail{
    	width:100%;
        /*头部区域*/
        header{
        	width:100%;
        	height:2.4rem;
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
            p{
            	width:2rem;
            	height:2rem;
                img{
                	width:100%;
                }
            }
            h2{
            	width:50%;
            	line-height:2.4rem;
            	text-align:center;
            	font-size:.95rem;
            	color:#333;
            	white-space: nowrap;
            	overflow: hidden;
            	text-overflow: ellipsis;
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
                    	width:1.2rem;
                    	color:#fff;
                    	font-size:.6rem;
                    }
                }
            }
        }
        /*图片展示区*/
        .bigtu{
        	width:100%;
        	margin-top: 2.45rem;
        	overflow: hidden;
            .img_much{
                width:100%;
                img{
                    width:100%;
                }
            }
            .img_uniq{
                img{
                    width:100%;
                }
            }
        }
        /*商品信息区域*/
        .xinxi{
        	width:100%;
            overflow: hidden;
            padding:.5rem 3%;
            box-sizing: border-box;
            font-size:.6rem;
            p{
            	padding-bottom: .3rem;
            	border-bottom:1px dashed #f3f3f3;
            }
            .sp1{
            	display: block;
            	font-weight:bold;
            	font-size:.6rem;
            	color:purple;
            }
            .sp2{
            	display: block;
            	font-size:.75rem;
            	color:#444;
            	text-indent: 1em;
            }
            .p1{
               .sp2{
                    color:darkcyan;
                    font-size:.75rem;
                    font-size:bold;
                } 
            }
        }
        /*购买商品*/
        .buy{
        	width:100%;
            padding:0 3%;
            box-sizing: border-box;
            font-size:.6rem;
            .jia{
                font-size:.7rem;
                color:blue;
                line-height: 1.4rem;
                margin-bottom: .25rem;
                span{
                	font-size:.8rem;
                    color:#dd1712;
                    font-weight:bold;
                }
            }
            div{
            	width:100%;
            	height:1rem;
            	display: flex;
            	justify-content: space-between;
            	margin-bottom: .25rem;
                button{
                	width:10%;
                }
                input{
                	width: 80%;
                	text-indent: .5rem;
                }
            }
            .zjia{
            	width:100%;
                overflow: hidden;
            	padding:.7rem 0;
                span{
                	font-size:.8rem;
                	color:#dd1712;
                }
                button{
                	width:40%;
                	float:right;
                }
            }
        }
    }
</style>