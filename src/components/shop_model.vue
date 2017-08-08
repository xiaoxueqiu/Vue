<template>
    <div class="shop_model">
        <header>
        	<p class="head_p1" @click="backout()"><img src="http://sh1.hoopchina.com.cn/fis_static/shihuomobile/static/common/widget/header/head_back_50e46d0.png"></p>
        	<form>
        		<input type="image" name="" src="http://sh1.hoopchina.com.cn/fis_static/shihuomobile/static/homefis/widget/header/search_0b8e800.png">
        		<input type="text" name="" placeholder="搜索最好的运动装备" v-model="name">
        	</form>
        	<p @click="bol()"><img src="http://sh1.hoopchina.com.cn/fis_static/shihuomobile/static/common/widget/header/head_list_9992b6c.png"></p>
        	<ul v-show="bool1">
        		<li>
        		    <router-link to="index/home">
        		        <p><img src="http://sh1.hoopchina.com.cn/fis_static/shihuomobile/static/common/widget/header/homepage-icon_cc50250.png"></p>
        		        <span>首页</span>
        		    </router-link>
        		</li>
        		<li>
        		    <router-link to="index/more">
        		        <p><img src="http://sh1.hoopchina.com.cn/fis_static/shihuomobile/static/common/widget/header/user-center-icon_46c20aa.png"></p>
        		        <span>我的</span>
        		    </router-link>
        		</li>
        	</ul>
        </header> 
        <h1 v-model="name">{{name}}</h1>    
    </div>
</template>

<script>
export default {
    name: 'shop_model',
    data () {
        return {
            name:"",
            bool1:false
        }
    },
    methods:{
    	// 头部点击事件
    	bol(){
    		this.bool1 = this.bool1?false:true;
    	},
    	backout(){
    		//console.log(12)
    		this.$router.back()
    	}
    } ,
    mounted(){
        console.log(this.$router)
        this.name = this.$router.history.current.query.id1;
    }
}
</script>

<style lang="scss">
    .shop_model{
    	width:100%;
        /*头部区域*/
        header{
        	width:100%;
        	height:2.4rem;
        	background: #f7f7f7;
        	display: flex;
        	justify-content: space-around;
        	align-items: center;
        	position: relative;
            p{
            	width:2rem;
            	height:2rem;
                img{
                    width:100%;
                }
            }
            form{
            	width:78%;
            	height:1.6rem;
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
                	width:80%;
                	height:1.4rem;
                	text-indent:1rem;
                	font-size:.75rem;
                	color:#333;
                	border: none;
                	outline:medium;
                	background: #e8e8e8;
                    &::-webkit-input-placeholder{
                    	color:#666;
                    }
                }
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
    }

    

</style>