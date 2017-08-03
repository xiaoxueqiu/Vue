<template>
	<div class="aaa">
		<div class="a_nav">
			<div class="a_nav_l">
				<span></span>
				<span>搜索酒店、景点门票</span>
			</div>
			<div class="a_nav_r"></div>
		</div>
		<div class="a_top">
			<dl>
				<dt class="anr_dt1"></dt>
				<dd>机+酒</dd>
			</dl>
			<dl>
				<dt class="anr_dt2"></dt>
				<dd>酒店</dd>
			</dl>
			<dl>
				<dt class="anr_dt3"></dt>
				<dd>门票</dd>
			</dl>
			<dl>
				<dt class="anr_dt4"></dt>
				<dd>精选</dd>
			</dl>
		</div>
		<div class="a_center">
			<div class="acen_nav">
				<p>热门排行</p>
				<p></p>
			</div>
			<div class="acen_top">
				<p>酒店</p>
				<p>更多></p>
			</div>
			
			<div class="acen_cen">
				<div class="acen_cen_one" v-for="x in dls">
					<img :src="x.img">
					<p>{{x.txt}}</p>
				</div>
			</div>


			<div class="acen_top">
				<p>目的地</p>
				<p>更多></p>
			</div>
			
			<div class="acen_cen">
				<div class="acen_cen_one" v-for="x in dlss">
					<img :src="x.img">
					<p>{{x.txt}}</p>
				</div>
			</div>


			<div class="acen_top">
				<p>旅游达人</p>
				<p>更多></p>
			</div>
			
			<div class="acen_cen" id="acen_cen">
				<div class="acen_cen_one" v-for="x in dlsss">
					<img :src="x.img">
					<span>{{x.txt}}</span>
				</div>
			</div>
			<div class="acen_cen2">
				<p>sophia</p>
				<p>Ricky</p>
				<p>AO???梦梦???Men</p>
			</div>
		</div>
	</div>
</template>
<script>
export default{
	name:"aaa",
	data:function(){
		return{
			dls:[
				{
					img:require("../../../static/img/a5.jpg"),
					txt:"诺唯真游轮【喜悦号】"
				},{
					img:require("../../../static/img/a7.jpg"),
					txt:"上海往返马尔代夫可可波杜希蒂岛度假村双人机+酒"
				},{
					img:require("../../../static/img/a6.jpg"),
					txt:"上海往返海口机+酒4天3晚自由行"
				}
			],
			dlss:[
				{
					img:require("../../../static/img/a3.jpg"),
					txt:"诺唯真游轮【喜悦号】"
				},{
					img:require("../../../static/img/a4.jpg"),
					txt:"上海往返马尔代夫可可波杜希蒂岛度假村双人机+酒"
				},{
					img:require("../../../static/img/a2.jpg"),
					txt:"上海往返海口机+酒4天3晚自由行"
				}
			],
			dlsss:[
				{
					img:require("../../../static/img/a8.jpg")
				},{
					img:require("../../../static/img/a1.jpg")
				},{
					img:require("../../../static/img/a8.jpg")
				}
			]
		}
	}
}
</script>
<style lang="scss">
	*{
		margin:0;
		padding:0
	}
	.aaa{
		width:100%;
		height:100%;
	}
	.a_nav{
		height:50px;
		padding:0 10px;
		border-bottom:1px solid #ccc;
	}
	.a_nav_l{
		width:89%;
		height:32px;
		border:1px solid #444;
		float: left;
		border-radius:20px;
		margin-top:0.45rem;
		position: relative;
		:nth-child(1){
			display:inline-block;
			width:23px;
			height:23px;
			background:url("../../../static/img/a11.png") no-repeat;
			background-size:15px;
			background-position:0px 7px;
			margin-left:85px;
		}
		:nth-child(2){
			font-size:13px;
			position:relative;
			top:-3px;
		}
	}
	.a_nav_r{
		width:10%;
		height:40px;
		float: left;
		background:url("../../../static/img/a10.png") no-repeat;
		background-size:32px;
		margin-left:1%;
		margin-top:0.47rem;
	}
	.a_top{
		height:130px;
		display: flex;
		justify-content:space-between;
		padding:0 5px;
		dl{
			width:20%;
			margin-top:20px;
			dt{
				display: block;
			    width: 60px;
			    height: 60px;
			    margin: 0 auto;
			    border-radius: 50%;
			    border: 1px solid #666;
			    
			}
			dd{
				text-align:center;
				margin-top:5px;
				font-size:16px;
			}
		}
		.anr_dt1{
			background:url("../../../static/img/a13.png") 3px 3px;
			background-size:180%;
		}
		.anr_dt2{
			background:url("../../../static/img/a13.png") -46px 3px;
			background-size:180%;
		}
		.anr_dt3{
			background:url("../../../static/img/a13.png") 3px 105px;
			background-size:180%;
		}
		.anr_dt4{
			background:url("../../../static/img/a13.png") -48px 107px;
			background-size:180%;
		}

	}
	.a_center{
		height:100%;
		margin-bottom:80px;
		.acen_nav{
			height:45px;
			line-height:40px;
			border-bottom:1px solid #eee;
			position:relative;
			margin-bottom:20px;
			:nth-child(1){
				height:48px;
				width:90px;
				font-size:16px;
				text-align:center;
			}
			:nth-child(2){
				height:2px;
				width:25px;
				background:#4e4e4e;;
				position:absolute;
				top:43px;
				left:11px;
			}
		}
	}
	.acen_top{
		height:25px;
		position:relative;
		margin-bottom:10px;
		:nth-child(1){
			position:absolute;
			left:10px;
		}
		:nth-child(2){
			position:absolute;
			right:10px;
		}
	}
	.acen_cen{
		height:100%;
		padding:0 10px;
		display: flex;
		justify-content:space-between;
		margin-bottom:20px;
		.acen_cen_one{
			width:32%;
			margin-right:2%;
			overflow:hidden;
			position:relative;
			img{
				width:160px;
				height:160px;
			}
			p{
				position: absolute;
			    z-index: 2;
			    left: 5px;
			    right: 10px;
			    bottom: 0;
			    line-height: 30px;
			    overflow: hidden;
			    font-size: 14px;
			    text-overflow: ellipsis;
			    white-space: nowrap;
			    text-align: center;
			    color: #fff;
			}
		}
		:nth-child(3){
			margin-right:0px;
		}
	}
	#acen_cen{
		.acen_cen_one{
			width:100px;
			height:100px;
			border-radius:50%;
			position:relative;	
		}
	}
	.acen_cen2{
		height:100%;
		padding:0 10px;
		display: flex;
		justify-content:space-between;
		margin-bottom:20px;
		position:relative;
		p{
			font-size:12px;
		}
		:nth-child(1){
			position:relative;
			left:29px;
		}
		:nth-child(2){
			position:relative;
			left:40px;
		}
		:nth-child(3){
			position:relative;
			left:0px;
		}

	}
</style>
