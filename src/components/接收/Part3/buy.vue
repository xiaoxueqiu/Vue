<template>
	<div class="buy">
		<div class="wrap_buy">
			<div class="buy_nav">
				商品详情
			</div>
			<div class="buy_img">
				<img :src="list.img" alt="">
				<div class="buy_txt">{{list.txt1}}</div>
			</div>
			<div class="buy_pri">
				<span>&yen;{{list.price}}</span>
			</div>
			<div class="buy_foot" @click="set(list)">
				加入购物车
			</div>
			
		</div>
	</div>
</template>

<script>
import {bus} from "../../js/bus.js"
export default {
	name: 'buy',
	data(){
		return{
			list:[],
			cartArray:[],
			obj:{},
			num:0

		}
	},
	created(){
		bus.$on('getBuy',(data)=>{
			console.log(data)
			// this.list =  JSON.parse(localStorage.getItem('person')).data
			this.list = data
		})
	},
	methods:{
	   set:function(x){
		   this.num++;
		 //   if(typeof x.number=='undefined'){
		 //     x.number = 0
	  // }
	  // x.number++
	    var cartObject={
	
	      img:x.img,
	      pice:x.price,
	      text:x.txt1,
	      number:1
	    }
	     this.cartArray.forEach((n,index)=>n.img==x.img&this.cartArray.splice(index,1))  
	    this.cartArray.push(cartObject);  
	    /*this.obj = {
	      data:this.cartArray
	    }*/



	    this.obj = JSON.parse(localStorage.getItem('person'))
	        if(!this.obj) {
	            this.obj = {
	        		data:this.cartArray
	            }
	        }else{
	            this.obj.data.forEach((n,index)=>
	            n.id==x.id&&this.obj.data.splice(index,1)) 
	            this.obj.data.push(cartObject)
	            console.log(cartObject)
	    	}


	    var s=window.localStorage;
	    s.setItem("person", JSON.stringify(this.obj));
	    }
	}
}
</script>
<style lang="scss">
.wrap_buy{
	width:100%;
	height:100%;
	font-family: helvetica,Arial,"黑体";
}
.buy_nav{
	height:50px;
	line-height:50px;
	background:#323232;
	color:white;
	text-align:center;
	font-size:22px;
}
.buy_img{
	width:100%;
	height:100%;
	position:relative;
	img{
		display:block;
		width:80%;
		margin:0px auto;
		padding-top:30px;
		margin-bottom:155px;
	}
}
.buy_txt{
	background-color: #515150;
	height:50px;
	line-height:50px;
	padding-left:20px;
	color:white;
	font-size:16px;
	position:absolute;
	bottom:10px;
}
.buy_pri{
	height:50px;
	line-height:50px;
	padding-left:20px;
	font-size:20px;
	color:red;
}
.buy_foot{
	font-size:20px;
	width:120px;
	height:40px;
	line-height:40px;
	background:red;
	text-align:center;
}
</style>