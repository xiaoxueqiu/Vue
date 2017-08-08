<template>
<div class="login">
    <div class="login-wrap">
        <header class="common-header">
            <router-link to="/index/more"><span>后退</span></router-link>
            <img src="https://passport.hupu.com/m/2/images/shihuo.png" alt="">
        </header>
    <!-- 登录 -->
        <div class="home-wrapper" v-show="showLogin">
            <form action="" class="index-form" id="J_loginForm">
                <p class="error-icon" v-show="showTishi">{{tishi}}</p>
                <div class="input-box name-ipt">
                    <label class="text-label text-label-user" for="login-username"></label>
                    <input type="text" placeholder="请输入用户名" id="login-username" class="user2" v-model="username">
                </div>
                <div class="input-box pwd-ipt">
                    <label class="text-label text-label-pwd" for="login-pwd"></label>
                    <input type="password" placeholder="请输入密码" id="login-pwd" class="pass2" v-model="password">
                </div>
                <div class="form-item-btn ">
                    <input type="submit" value="登录" class="login-btn" v-on:click="login">
                </div>
                <span v-on:click="ToRegister">没有账号？马上注册</span>
            </form>
        </div>
    <!-- 注册 -->
        <div class="regis-wrapper" v-show="showRegister">
            <form action="" class="index-form" id="J_loginForm">
                <p class="error-icon" v-show="showTishi">{{tishi}}</p>
                <div class="input-box name-ipt">
                    <label class="text-label text-label-user" for="login-username"></label>
                    <input type="text" placeholder="请输入用户名" id="login-username" class="user1" v-model="username">
                </div>
                <div class="input-box pwd-ipt">
                    <label class="text-label text-label-pwd" for="login-pwd"></label>
                    <input type="password" placeholder="请输入密码" id="login-pwd" class="pass1" v-model="password">
                </div>
                <div class="form-item-btn ">
                    <input type="submit" value="注册" class="login-btn" v-on:click="register">
                </div>
                <span v-on:click="ToLogin">已有账号？马上登录</span>
            </form>
        </div>
    </div>
</div>
</template>

<script>
import axios from 'axios'
export default {
    name:"login",
    data(){
        return{
            showLogin: true,
            showRegister: false,
            showTishi: false,
            tishi: '',
            username: '',
            password: '',
            newUsername: '',
            newPassword: '',
            id2:''
        }
    },
    methods: {
        // 登录
        login() {
            var username = document.querySelector('.user2').value;
            console.log(username)
            var password = document.querySelector('.pass2').value;
            axios.get('http://localhost/shihuo/login.php?username=' + username + '&password=' + password).then(function (res) {
                // console.log(JSON.parse(res.bodyText).errmsg);
                res = res.data.errmsg;
                if (res == "ok") {
                    this.tishi = "登录成功"
                    this.showTishi = true
                    localStorage.setItem('username',JSON.stringify(document.querySelector('.user2').value));
                    console.log(localStorage)
                    setTimeout(function(){
                      this.$router.push({path:'/index/more',query:{id2:username}})
                    }.bind(this),2000);
                } else{
                    this.tishi = "账户信息有误"
                    this.showTishi = true
                }
            }.bind(this));  
        },
        // 注册
        register() {
            var username = document.querySelector('.user1').value;
            var password = document.querySelector('.pass1').value;
            //获取后台路径
            axios.get('http://localhost/shihuo/regist.php?username=' + username + '&password=' + password).then(function (res) {
                console.log(res.data.errmsg);
                //连接
                res = res.data.errmsg;
                if (res == "ok") {
                    //注册成功一秒后跳到登录页面
                    setTimeout(function(){
                        this.showRegister = false,
                        this.showLogin = true
                    }.bind(this),1000);
                    this.username = "";
                    this.password = ""
                }
            }.bind(this))
        },
        //点击 没有账号？马上注册
        ToRegister(){
            this.showRegister = true,
            this.showLogin = false
        },
        //点击 已有账号？马上登录
        ToLogin(){
            this.showRegister = false,
            this.showLogin = true
        }
    }
}
</script>

<style lang="scss">
    .login-wrap{
        position: relative;
        width: 100%;
    }
    .common-header {
        height: 40px;
        background-color: #f4f4f4;
        text-align: center;
        position: relative;
        font: 16px/40px 'microsoft yahei';
        color: #000;
        border-top: 1px solid #e1e1e1;
        border-bottom: 1px solid #e1e1e1;
        a {
            position: absolute;
            left: 0;
            top: 0;
            width: 40px;
            height: 40px;
            text-align: center;
            font-size: 100%;
            vertical-align: baseline;
            background: transparent;
            text-decoration: none;
            span {
                display: inline-block;
                width: 14px;
                height: 14px;
                margin-top: 12px;
                border-left: 1px solid #ca0000;
                border-top: 1px solid #ca0000;
                text-indent: -999em;
                overflow: hidden;
                overtransform: rotate(-45deg);
                -moz-transform: rotate(-45deg);
                -webkit-transform: rotate(-45deg);
            }
        }
        img {
            display: block;
            width: 83px;
            margin: 8px auto 0;
        }
    }
    .home-wrapper, .regis-wrapper{
        text-align:center;
        margin: 0 auto;
        padding: 25px 0 0;
        form {
            padding: 0 20px;
            .error-icon {
                color:red;
            }
            .input-box {
                position: relative;
                overflow: hidden;
                display: -moz-box;
                display: -webkit-box;
                display: box;
                width: 100%;
                height: 32px;
                background: #fff;
                margin-bottom: 15px;
                .text-label-user {
                    background: url(https://passport.hupu.com/m/2/images/user.png) 2px 10px no-repeat;
                    background-size: 13px 15px;
                }
                .text-label-pwd {
                    background: url(https://passport.hupu.com/m/2/images/lock.png) 2px 10px no-repeat;
                    background-size: 13px 16px;
                }
                .text-label {
                    display: block;
                    padding-left: 24px;
                }
            }
            .text-label {
                display: block;
                padding-left: 24px;
            }
            input[type="text"], input[type="password"]{
                border: 0;
                border-bottom: 1px solid #e1e1e1;
                display: block;
                -moz-box-flex: 1;
                -webkit-box-flex: 1;
                box-flex: 1;
                -webkit-appearance: none;
                -webkit-border-radius: 0;
                -webkit-tap-highlight-color: rgba(255, 0, 0, 0);
                -moz-tap-highlight-color: rgba(255, 0, 0, 0);
                line-height: 32px;
                font-size: 15px;
                height: 32px;
                color: #222;
            }
            .form-item-btn {
                text-align: center;
                .reg-btn{
                    display: inline-block;
                    margin-right: 20px;
                    color: #999;
                    border: 1px solid #b7b7b7;
                    height: 32px;
                    line-height: 32px;
                    vertical-align: middle;
                    background-color: #fff;
                }
                .login-btn {
                    background-color: #d8544c;
                }
                input{
                    text-align: center;
                    width: 75px;
                    font-size: 16px;
                    height: 34px;
                    line-height: 30px;
                    border: 0;
                    border-radius: 17px;
                    color: #fff;
                    background-color: #d8544c;
                }
            }
            span{
                font-size:.7rem;
            }
        }
    }
    .name-ipt input, .pwd-ipt input {
        padding-right: 20px;
    }
    .pwd-ipt{
        margin-bottom: 25px;
    }

</style>