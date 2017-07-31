<template>
	<div class="listview">
		<!-- tab切换区 -->
		<div class="list-top">
	    	<ul class="ul1"> 
	    		<li v-for="(tab,index) in tabName" :class='{redd:counter==index}' @click='changCol(index)'><a href="javascript:void(0)">{{tab}}</a></li>
	    	</ul>
	    	<ul class="ul2">
	    		<li v-for="(tab2,index) in tabLan" :class='{redw:counter2==index}' @click='changCol2(index)'>{{tab2}}</li>
	    	</ul>
		</div>

        <!-- 数据区域 -->
        <div class="wrap">
        	<div v-for="obj in list" class="middle">
        		<div v-if="'single1'==obj.show_type" class="moban1">
        			<a href="javascript:void(0)" @click='jump(obj.data)'>
        				<div class="ban_img">
        					<img :src="obj.data.img">
        				</div>
        				<div class="ban1_right">
        					<p class="p1">{{obj.data.title}}</p>
        					<p class="p2">{{obj.data.subtitle}}</p>
        					<p class="p3"><span class="sp1">{{obj.data.column_name}}</span><span>{{obj.data.merchant}}</span></p>
        				</div>
        			</a>
        		</div>
        		<div v-else-if="'multi2'==obj.show_type" class="moban2">
        		    <a href="javascript:void(0)" @click='jump(obj.data)'>
        		    	<h3>{{obj.data.title}}</h3>
            			<div class="santu">
            				<div class="ban_img">
            					<img :src="obj.data.img_attr[0]">
            				</div>
            				<div class="ban_img">
            					<img :src="obj.data.img_attr[1]">
            				</div>
            				<div class="ban_img">
            					<img :src="obj.data.img_attr[2]">
            				</div>
            			</div>
            			<div class="ditu clearfix">
            				<p><img :src="obj.data.avatar"></p>
            				<span>{{obj.data.author_name}}</span>
            			</div>
        		    </a>
        		</div>
        		<div v-else-if="'single3'==obj.show_type" class="moban3">
        			<a href="javascript:void(0)" @click='jump(obj.data)'>
        				<div class="ban_img">
        					<img :src="obj.data.img">
        				</div>
        				<div class="ban3_right">
        					<p class="p1">{{obj.data.title}}</p>
        					<p class="p2">“{{obj.data.intro}}”</p>
        					<p class="p3"><span>{{obj.data.merchant}}</span><span class="sp2">￥{{obj.data.price}}</span></p>
        				</div>
        			</a>
        		</div>
        		<div v-else-if="'single2'==obj.show_type" class="moban4">
        			<a href="javascript:void(0)" @click='jump(obj.data)'>
        				<div class="ban_img">
        					<img :src="obj.data.img">
        				</div>
        				<div class="ban4_right">
        					<p class="p1">{{obj.data.title}}</p>
        					<div class="p2">
        						<p><img :src="obj.data.avatar"></p>
            				    <span>{{obj.data.author_name}}</span>
        					</div>
        					<p class="p3"><span>{{obj.data.column_name}}</span></p>
        				</div>
        			</a>
        		</div>
        	</div>
        </div>
	</div>
</template>

<script>
import axios from 'axios'
export default {
    name: 'listview',
    data(){
    	return{
    		counter:0,
        	counter2:0,
    		tabName:["推荐","篮球","跑步","健身","潮流"],
            tabLan:["全部","单品推荐","原创精选","用户晒物"],
            dataArr:[['../../static/json/home_tj1.json','../../static/json/home_tj_dp1.json','../../static/json/home_tj_yc1.json','../../static/json/home_tj_yh1.json'],['../../static/json/home_lq1.json','../../static/json/home_lq_dp1.json','../../static/json/home_lq_yc1.json','../../static/json/home_lq_yh1.json'],['../../static/json/home_pb1.json','../../static/json/home_pb_dp1.json','../../static/json/home_pb_yc1.json','../../static/json/home_pb_yh1.json'],['../../static/json/home_js1.json','../../static/json/home_js_dp1.json','../../static/json/home_js_yc1.json','../../static/json/home_js_yh1.json'],['../../static/json/home_cl1.json','../../static/json/home_cl_dp1.json','../../static/json/home_cl_yc1.json','../../static/json/home_cl_yh1.json']],
            list:[],
    	}
    },
    watch:{
        '$route':'fetchData'
    },
    created () {
         this.fetchData();  
    },
    methods:{
    	// 点击切换颜色
    	changCol(i){
    		let _this = this;
            _this.counter = i;
            _this.counter2 = 0;
            axios.get(_this.dataArr[i][_this.counter2])
            .then((response)=>{       
               let list = response.data.data;
               _this.list = list;
            })
    	},
    	changCol2(i){
    		let _this = this;
            _this.counter2 = i;
            axios.get(_this.dataArr[_this.counter][i])
            .then((response)=>{       
               let list = response.data.data;
               _this.list = list;
            })
    	},
    	// 获取数据
    	fetchData(){
    		let _this = this;                           
            axios.get('../../static/json/home_tj1.json')
            .then((response)=>{       
               let list = response.data.data;
               _this.list = list;
            })
        },
        /*// 跳转页面
        jump(obj) {
        	let _this = this;
            _this.$root.shuju = obj;
            _this.$router.push('../detail');
        }*/
    }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style lang="scss">
	/*tab切换区*/
    .listview{
    	width:100%;
    	background: white;
    	overflow: hidden;
    	margin-top: 0.3rem;
    	/*导航栏*/
    	.list-top{
    		background-color: #FFF;
		    border-bottom: 1px solid #eee;
		    width: 100%;
		    overflow: hidden;
	    	.ul1{
		    	width:100%;
		    	padding-bottom: 0.2rem;
		    	display: flex;
		    	justify-content: space-between;
		    	li{
			    	width:20%;
			    	line-height:1.5rem;
			    	position: relative;
			    	text-align: center;
			    	font-size:.4rem;
			    	font-weight: 600;
			    	box-sizing: border-box;
			    	a{
				    	color:#333;
				    }
				    .redd{
				    	color:#dd1712;
					    &:after{
					    	content: "";
					    	width:1.6rem;
					    	height:0.2rem;
					    	display: block;
					        position: absolute;
					    	background: #dd1712;
					    	left:34%;
					    	bottom:0.4rem;
					    }
					}
			    }
		    }
		    /*筛选栏*/
		    .ul2{
		        width:94%;
		        margin:0 auto .5rem;
		        display: flex;
		        justify-content: space-around;
		        font-size:1.2rem;
		        li{
			    	width: 20%;
			    	height:1.2rem;
			    	line-height: 1.2rem;
			    	text-align:center;
			    	font-size:.4rem;
			    	color:#666;
			    	background: #e3e3e3;
			    }
			    .redw{
			    	background: #dd1712;
			    	color:#fff;
			    }
		    }
    		
    	}
	    /*数据区域*/
	    .wrap{
	    	background: #fff;
		    width: 100%;
		    //border:1px solid #000;
		    overflow: hidden;
		    margin-top:.5rem;
		    padding-left:.3rem;
	    	.middle{
		    	overflow: hidden;
		    	border-bottom:1px solid #e6e6e6;
		    	font-size:.6rem;
		    	.moban1{
			    	.ban_img{
				    	width:4.7rem;
				    	height:4.7rem;
				    	float:left;
				    	img{
					    	width:4.7rem;
					    	height:4.7rem;
					    }
				    }
				    .p1{
				    	font-size:.7rem;
				    	font-weight: 500;
				    	color:#555;
				    }
				    .p2{
				    	font-size:.5rem;
				    	color:#dd1712;
				    	margin-top:.1rem;
				    }
				    .p3 {
					    span{
					        display:inline-block;
					        font-size:.5rem;
					        color:#a4a4a4;
					    }
					    .sp1{
					    	font-size:.5rem;
					    	margin-right:0.3rem;
					    	padding:0.05rem 0.2rem;
					    	border:1px solid #ccc;
					    	border-radius: .2rem;
					    	color:#999;
					    }
				    }
		    	}
			    .moban2{
			    	h3{
				    	font-size:.77rem;
				    	white-space: nowrap;
				    	overflow: hidden;
				    	text-overflow: ellipsis;
				    	font-weight:400;
				    	color:#333;
				    }
				    .santu{
				    	margin-top: 0.8rem;
				    	display: flex;
				    	height: 5rem;
					    width: 100%;
					    overflow: hidden;
					    -webkit-box-pack: justify;
				    	justify-content: space-between;
				    	.ban_img{
				    		width: 30%;
						    height: 5rem;
						    overflow: hidden;
						    position: relative;
						    img{
						    	height: 100%;
							    position: absolute;
							    left: 50%;
							    top: 0;
							    display: block;
							    transform: translate(-50%,0);
							    -ms-transform: translate(-50%,0);
							    -moz-transform: translate(-50%,0);
							    -webkit-transform: translate(-50%,0);
							    -o-transform: translate(-50%,0);
						    }
				    	}
				    }
				    .ditu{
				    	display: flex;
				    	align-items: center;
				    	margin-top: 0.8rem;
				    	font-size: .5rem;
				    	color:#999;
				    	p{
					    	width:.8rem;
					    	height:.8rem;
					    	border-radius: .35rem;
						    overflow: hidden;
						    text-align: center;
						    vertical-align: middle;
					    	margin-right: .5rem;
					    	img{
						    	width:100%;
						    	height:100%;
						    }
					    }
				    }
			    }
			    .moban3{
					.ban_img{
				    	width:4.7rem;
				    	height:4.7rem;
				    	float:left;
				    	img{
					    	width:4.7rem;
					    	height:4.7rem;
					    }
				    }
				    .sp2{
				    	color:#dd1712;
				    }
			    }
			    .moban4{
					.ban_img{
				    	width:4.7rem;
				    	height:4.7rem;
				    	float:left;
				    	img{
					    	width:4.7rem;
					    	height:4.7rem;
					    }
				    }
				    .p1{
				    	font-size:.7rem;
				    	font-weight: 500;
				    	color:#555;
				    }
				    .p2{
				    	font-size:.5rem;
				    	color:#666;
				    	margin-top:.1rem;
				    	p{
				    		width:.8rem;
					    	height:.8rem;
					    	border-radius: .35rem;
						    overflow: hidden;
						    text-align: center;
						    vertical-align: middle;
					    	margin-right: .5rem;
					    	float: left;
					    	img{
					    		width:100%;
					    	}
				    	}
				    }
				    .p3 {
				    	width:100%;
				    	font-size:.5rem;
					    color:#a4a4a4;
					    span{
					        display:inline-block;
					        color: #999;
						    font-size: .5rem;
						    border: 1px solid #a8a8a8;
						    border-radius: .25rem;
						    padding: 0 .13333rem;
						    max-width: 3rem;
						    overflow: hidden;
						    vertical-align: middle;
						    text-overflow: ellipsis;
						    white-space: nowrap;
						    margin-right: .13333rem;
					    }
				    }
			    }
		    }
	    }
    }
    .moban1,.moban2,.moban3,.moban4{
    	width:100%;
    	margin:0px auto;
    	overflow: hidden;
    	padding:.3rem .3rem .3rem 0;
    }
    .moban1 a,.moban3 a,.moban4 a{
    	display: inline-flex;
    }
    .ban1_right,.ban3_right,.ban4_right{
    	margin-left: .5rem;
    	display: flex;
        -webkit-box-orient: vertical;
        flex-direction: column;
        -webkit-box-pack: justify;
        justify-content: space-between;
    }
    .ban3_right .p1,.ban4_right .p1{
    	font-size:.7rem;
    	font-weight: 400;
    	color:#555;
    }
</style>