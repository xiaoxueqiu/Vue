<template>
	<div class="cart">
		<div class="wrap6">
			<div class="w6_header">
				<router-link to="/home/part5" class="w6H_left">
					<img src="../../../static/img/go-back.png" alt="">
				</router-link>
				<div class="w6H_cen">
					<img src="../../../static/img/yoho-family.png">
				</div>
				<router-link to="/deng" class="w6H_bo">注册</router-link>
			</div>
			<div class="w6_center">
				<div class="select-container">
				    <span class="select-title">国家和地区</span>
				    <select id="country-select">
				            <option value="+61">澳大利亚</option>
				            <option value="+82">韩国</option>
				            <option value="+1">加拿大</option>
				            <option value="+60">马来西亚</option>
				            <option value="+1">美国</option>
				            <option value="+81">日本</option>
				            <option value="+65">新加坡</option>
				            <option value="+44">英国</option>
				            <option value="+86" selected="">中国</option>
				            <option value="+853">中国澳门</option>
				            <option value="+886">中国台湾</option>
				            <option value="+852">中国香港</option>
				    </select>
				    <div class="arrow-right"></div>
				</div>
				<div class="input-container">
				    <span class="area-code">+86</span>
				    <input class="phone-num" type="text" id="username" placeholder="手机号">
				</div>
				<div class="input-container">
				    <input class="phone-num" type="text" id="password" placeholder="输入密码">
				</div>
				<div class="btn-next" @click="login()">登陆</div>
				<p class="op-container">
				    <span class="internat">账号密码登录</span>
				    <span class="forget-pwd">忘记密码</span>
				</p>
				<div class="third-login">
				    <div class="tp-link">
				        <span class="qq"></span>
				        <span class="wechat"></span>
				        <span class="weibo"></span>
				    </div>
				</div>
				<div class="login-tip">
				    <div class="info-icon"></div>
				    Yoho!Family账号可登录Yoho!Buy有货
				</div>
			</div>
		</div>
	</div>
</template>
<script>
export default {
	name: 'cart',
		methods:{
			login:function(){
				var username = document.getElementById("username").value
				var password = document.getElementById("password").value
				this.$http.get("http://localhost/lesson4/login.php?username="+username+"&password="+password)
				.then(function(res){
					var res = JSON.parse(res.bodyText).errmsg
					console.log(res)
					if(res=="ok"){
						this.$router.push({
							path:"/home/part3"
						})
						localStorage.setItem("ming",document.getElementById("username").value)
					}else{
						alert("账户不存在或密码不正确")
					}
				})
			}
		}
}
</script>
<style lang="scss">
	.wrap6{
		width:100%;
		height:100%;
		font-family: MicroSoft YaHei,SimSun,sans-serif;
		background:#444;
		color:white;
		padding:20px 20px;
	}
	.w6_header{
		height:40px;
		position: relative;
		display: flex;
		justify-content:space-between;
		margin-bottom:20px;
	}
	.w6H_left{
		height:30px;
		width:30px;
		img{
			height:30px;
			width:30px;
			margin-top:5px;
		}
	}
	.w6H_cen{
		width:68px;
		height:40px;
		img{
			width:68px;
			height:40px;
		}
	}
	.w6H_bo{
	    display: block;
	    background: transparent;
	    border: 1px solid #fff;
	    width: auto;
	    height: 30px;
	    line-height: 30px;
	    border-radius: 30px;
	    padding-left: 15px;
	    padding-right: 15px;
	    position:relative;
	    top:5px;
	    color:white;
	}
	.w6_center{
		width:100%;
		height:540px;
	}
	.select-container{
		color: #fff;
		margin-bottom: 10px;
		position: relative;
	    width: 100%;
	    height: 52px;
	    font-size: 20px;
	    background-color: #575757;
	    border: 1px solid #606060;
	    border-radius: 5px;
	    text-align: left;
	}
	.select-title{
		line-height: 2.5;
    	margin-left: 15px;
	}
	#country-select{
		font-size:20px;
		width: 140px;
		box-sizing: border-box;
		position: absolute;
	    height: 50px;
	    padding-right: 40px;
	    right: 0;
	    color: #fff;
	    background-color: #575757;
	    border: 0;
	    border-radius: 5px;
	    appearance: none;
	    direction: rtl;
	}
	.arrow-right{
	    position: absolute;
	    width: 13px;
	    height: 20px;
	    right: 15px;
	    top: 16px;
	    background: url("../../../static/img/arrow-right.png") no-repeat;
	    background-size: 100% 100%;
	}
	.input-container{
		position: relative;
	    width: 100%;
	    height: 52px;
	    font-size: 20px;
	    background-color: #575757;
	    border: 1px solid #606060;
	    border-radius: 5px;
	    text-align: left;
	    margin-bottom:10px;
	    .area-code{
	    	position: absolute;
		    left: 15px;
		    line-height: 2.5;
	    }
	    .phone-num{
	    	width: 100%;
		    border-radius: 5px;
		    color: #fff;
		    font-size:20px;
		    border: none;
		    line-height: 26px;
		    padding: 12px 0;
		    padding-left: 75px;
		    background-color: transparent;
		    outline: none;
	    }
	}
	.btn-next{
		background-color: #a2a2a2;
		margin-bottom:20px;
		display: block;
	    font-size: 20px;
	    line-height: 2.5;
	    outline: none;
	    width: 100%;
	    border-radius: 5px;
	    color: #fff;
	    border: none;
	    text-align:center;
	}
	.op-container{
		position: relative;
	    width: 100%;
	    margin: 20px 0;
	    height: 1rem;
	    text-align: center;
	    font-size: 16px;
	    .internat{
	    	float: left;
    		text-align: left;
	    }
	    .forget-pwd{
	    	float: right;
    		text-align: right;
	    }
	}
	.third-login{
		height:88px;
		.tp-link{
			text-align: center;
   			padding: 20px 0;
   			span{
				display: inline-block;
			    width: 44px;
			    height: 44px;
			    margin: 0 7px;
			    border-radius: 50%;
			    background-color: #333;
			    background-repeat: no-repeat;
			    background-size: 100% 100%;
   			}
   			:nth-child(1){
   				background-image: url("../../../static/img/qq.png");
   				background-repeat: no-repeat;
    			background-size: 100% 100%;
   			}
   			:nth-child(2){
   				background-image: url("../../../static/img/wechat.png");
   				background-repeat: no-repeat;
    			background-size: 100% 100%;
   			}
   			:nth-child(3){
   				background-image: url("../../../static/img/weibo.png");
   				background-repeat: no-repeat;
    			background-size: 100% 100%;
   			}
		}
	}
	.login-tip{
		font-size: 14px;
	    position: relative;
	    color: #d8d8d8;
	    margin: 15px 0;
	    text-align:center;
	    .info-icon{
	    	display: inline-block;
		    height: 12px;
		    width: 12px;
		    background-image: url("../../../static/img/info.png");
		    background-size: 100% 100%;
	    }
	}
</style>