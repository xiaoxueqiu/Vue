<template>
	<div class="part4">
		<div class="wrap4">
			<div class="wrap4_nav">
				<span>＜</span>
				<span>购物车</span>
			</div>
			<div class="w4_cen">
				<!-- <div class="w4_top"> -->
					<!-- #请您先<span>登陆</span>可以同步电脑和手机中的商品 -->
				<!-- </div> -->
				<div class="w4_bottom">
					<div class="w4b_img">
						<img src="../../../static/img/0126acdfd5558ca5be890abc9f6d928312.png" alt="">
					</div>	
					<p class="w4b_p2">随便逛逛</p>
				</div>

				<div class="get" v-for="x in list">
					<img :src="x.img" class="geting">
					<div class="qian">&yen;{{x.pice}}</div>
					<div class="wenzi">{{x.text}}</div>
					
					<div class="jia" @click.stop.prevent="chang(x,-1)">-</div>
					<input class="shu" type="text" v-model="x.number">
					<div class="jian" @click.stop.prevent="chang(x,1)">+</div>
					<div id="rig">
				      总价：{{x.pice*x.number}}
				    </div>
				    <div class="remo" @click="del(x)">删除</div>
				</div>
			</div>
			<!-- 拿数据 -->
		</div>

	</div>
</template>
<script>
export default {
	name: 'part1',
	data () {
	    return {
	     tolmo:0,
	     list:[],
	     obj:{}
	    }
	},
	 mounted:function(){

	 	this.list =  JSON.parse(localStorage.getItem('person')).data;
	 	console.log(this.list)
	 },
	methods:{

	   //数量加减
		chang:function(x,way){

		    if(way>0){
		      x.number++;
		    }
		    else{
		      x.number--;
		      if(x.number<=1){
		     x.number =1
		      }
		    }
		     this.cal();
		  },
		   //单选
		  dow:function(x){
		    document.onselectstart=function(){return false;}

		if(typeof x.it=='undefined'){
		 x.it = true
		  }else{
		    x.it=!x.it;
		  }
		   this.cal();
		},
		//全选反选
		al:function(flag){
			this.list.forEach(function(x,index){
				if(typeof x.it=='undefined'){
					x.it = true
		   		}else{
		    		x.it=!x.it;
		    	}
		  	x.it = flag;
			})
			this.cal();
		},
		    //球球全选
		//  qr:function(){
		//  this.list.forEach(function(x,index){
		// if(typeof x.it=='undefined'){
		// x.it = true
		//   }else{
		//     x.it=!x.it;
		//   }
		//   x.it = !x.it
		// })
		// this.cal();

		//     },
		// 总金额
		cal:function(){
		    this.tolmo=0;
		    var _this = this;
		  
		    this.list.forEach(function(x,index){
		    	if(x.it){
		    		_this.tolmo += x.pice*x.number;
		    	}
		    })

		},
		 //删除
		del:function(x){
			var index = this.list.indexOf(x);
			this.list.splice(index,1);
		    this.cal();
		    this.obj = {
		      data:this.list
		    }
		    var s=window.localStorage;
		    s.setItem("person", JSON.stringify(this.obj));
		 	// localStorage.clear();
		},
	}
}
</script>
<style lang="scss">
	.wrap4{
		width:100%;
		height:100%;
		font-family: 'Avenir', Helvetica, Arial, sans-serif;
	}
	.wrap4_nav{
		background-color: #000;
		height:50px;
		line-height:50px;
		color:white;
		:nth-child(1){
			display:inline-block;
			width:60px;
			height:50px;
			font-size: 20px;
			text-align: center;
		}
		:nth-child(2){
			display:inline-block;
			width:247px;
			height:50px;
			font-size: 20px;
			font-weight: 400;	
			text-align: center;
		}
	}
	.w4_cen{
		width:100%;
		height:100%;
		background:#eee;

	}
	.w4b_img{
		text-align:center;
		padding-top:40px;
		img{
			width:84px;
		}
	}
	.w4b_p1{
		text-align:center;
		margin-top:28px;
		font-size: 0.6rem;
		color: #444;
	}
	.w4b_p2{
		text-align:center;
		margin:0 auto;
		width:97px;
		height:25px;
		line-height:25px;
		background: #444;
		border-radius:4px;
		color:white;
		font-size: 0.6rem;
		margin-top:10px;
		margin-bottom:30px;
	}
	.get{
		margin-top:40px;
		position: relative;
		padding:0 20px;
	}
	.geting{
		width:120px;
		height:120px;
	}
	.qian{
		font-size:20px;
		width:80px;
		background:red;
		color:white;
		position:absolute;
		top:20px;
		left:180px;
	}
	.wenzi{
		position:absolute;
		top:70px;
		left:180px;		
	}
	.jia{
		font-size:2rem;
		color:red;
		position:relative;
		top:-3px;
	}
	.shu{
		width:50px;
		font-size:20px;
		position:absolute;
		top:133px;
		left:50px;
		text-align:center;
	}
	.jian{
		font-size:2rem;
		color:red;
		position:absolute;
		top:126px;
		left:115px;
	}
	#rig{
		position:absolute;
		top:135px;
		left:255px;
		font-size:18px;
	}
	.remo{
		font-size:18px;
		width:50px;
		margin-top:20px;
		margin-bottom:50px;
		text-align:center;
		color:red;
		border:1px solid gray;
	}
</style>