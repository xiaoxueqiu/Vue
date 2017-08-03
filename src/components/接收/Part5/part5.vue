<template>
	<div class="part5">
		<div class="wrap5">
			<div class="w5_nav">
				<div class="w5n_txt">
					<router-link to="/cart">登陆/注册</router-link>
				</div>
				<p>学生认证</p>
			</div>
			<ul class="w5_ul">
				<li>收藏的商品</li>
				<li></li>
				<li>收藏的品牌</li>
				<li></li>
				<li>浏览记录</li>
			</ul>
			<div class="w5_top">
				<div class="w5t1">
					<span>我的订单</span>
					<span>查看全部订单》</span>
				</div>
				<div class="w5t2">
					<dl>
						<dt></dt>
						<dd>待付款</dd>
					</dl>
					<dl>
						<dt></dt>
						<dd>待发货</dd>
					</dl>
					<dl>
						<dt></dt>
						<dd>待收货</dd>
					</dl>
				</div>
			</div>
			<div class="w5_cen1">
				<span>地址管理</span>
				<span>></span>
			</div>
			<div class="w5_cen2">
				<div class="w5c2_top">
					<span>优惠券</span>
					<span>></span>
				</div>
				<div class="w5c2_bottom">
					<span>有货币</span>
					<span>></span>
				</div>
			</div>
			<div class="w5_cen1">
				<span>消息</span>
				<span>></span>
			</div>
			<div class="w5_cen1">
				<span>服务于反馈</span>
				<span>></span>
			</div>

			<div class="w5_foot">
				<img src="../../../static/img/010d2ec23759a251fb3858f28c1c0b34ca.jpeg">
			</div>
		</div>

	</div>
</template>
<script>
export default {
	name: 'part1'
}
</script>
<style lang="scss">
	.wrap5{
		width:100%;
		height:100%;
		font-family: helvetica,Arial,"黑体";
		background-image:url("../../../static/img/01fedff7eef9b9195c6f2bee5bc02555ee.jpg");
		background-repeat:repeat-y;
	}
	.w5_nav{
		height:95px;
		background-image:url("../../../static/img/header-bg.jpg");
		background-size: cover;
		position: relative;
		.w5n_txt{
			color: #fff;
    		border: 0.15rem solid #fff;
    		text-align: center;
    		width:137px;
    		height:46px;
    		line-height:46px;
    		font-size:1.25rem;
    		position:absolute;
    		top:1.54rem;
    		left:6.6rem;
    		a{
    			color: #fff;
    		}
		}
		p{
			background: #d0021b;
			color: #fff;
			width: 4.3rem;
		    height: 1.5rem;
		    line-height: 1.5rem;
		    border-top-left-radius: 1rem;
		    border-bottom-left-radius: 1rem;
		    padding-left:13px;
		    position:absolute;
		    top:8px;
		    right:0px;
		    font-size:0.8rem;
		}
	}
	.w5_ul{
		display: flex;
		justify-content: space-around;
		background:black;
		color:white;
		height:49px;
		line-height:49px;
		font-size:12px;
		padding:0 12px;
		margin-bottom:20px;
		:nth-child(2){
			width:0.1rem;
			height:1.5rem;
			background:white;
			margin-top:0.8rem;
		}
		:nth-child(4){
			width:0.1rem;
			height:1.5rem;
			background:white;
			margin-top:0.8rem;
		}
	}
	.w5_top{
		height:128px;
		border-top: 1px solid #e0e0e0;
    	border-bottom: 1px solid #e0e0e0;
    	background:white;
    	margin-bottom:20px;
		.w5t1{
			width:92%;
			margin:0 auto;
			height:49px;
			line-height:49px;
			:nth-child(1){
				float: left;
				font-size:1rem;
			}
			:nth-child(2){
				float: right;
				color: #e0e0e0;
				font-weight:700;
				font-size:0.95rem;
			}			
		}
		.w5t2{
			height:78px;
			text-align: center;
    		border-top: 1px solid #e0e0e0;
    		display: flex;
    		justify-content: space-around;
    		dl{
    			margin-top:15px;
	     		dt{
	    			width:35px;
	    			height:23px;
	    			border:0.2rem solid #444;
	    			margin-left:4px;
	    		}
	    		dd{
	    			margin-top:4px;
	    		}   			
    		}

		}		
	}
	.w5_cen1{
		height:49px;
		line-height:49px;
		border-top: 1px solid #e0e0e0;
    	border-bottom: 1px solid #e0e0e0;
    	background:white;
    	margin-bottom:20px;	
    	font-size:1rem;	
    	padding:0 18px;
    	:nth-child(1){
    		float: left;
    	}
    	:nth-child(2){
    		float: right;
    		color: #e0e0e0;
    	}    	
	}
	.w5_cen2{
		height:100px;
		border-top: 1px solid #e0e0e0;
    	border-bottom: 1px solid #e0e0e0;
    	background:white;
    	margin-bottom:20px;	
    	font-size:1rem;	
    	padding:0 18px;
    	.w5c2_top{
    		height:49px;
    		line-height:49px;
    		border-bottom:1px solid #e0e0e0;
			:nth-child(1){
	    		float: left;
	    	}
	    	:nth-child(2){
	    		float: right;
	    		color: #e0e0e0;
	    	}
    	}
    	.w5c2_bottom{
    		height:49px;
    		line-height:49px;
			:nth-child(1){
	    		float: left;
	    	}
	    	:nth-child(2){
	    		float: right;
	    		color: #e0e0e0;
	    	}
    	}
	}
	.w5_foot{
		height:113px;
		width:100%;
		margin-bottom:80px;
		img{
			width:100%;
			height:113px;
		}
	}
</style>