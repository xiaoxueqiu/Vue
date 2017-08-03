<template>
  <div class="login">
    <img src="../../assets/login_banner.jpg" alt="" class="login-bj">
    <h2>用户登录</h2>
    <div class="login-user">
        
        <div class="denglu">
            用户名： <input type="text" placeholder="请输入用户名" class="user2"><br>
            密&nbsp;&nbsp;&nbsp;码： <input type="password" placeholder="请输入密码" class="pass2" ><br>
            <router-link to="/zhuce"><span>没有账号？点击注册</span></router-link>
            
            <input type="button" value="登录" class="btn2" @click="login()">
        </div>
    </div>
  </div>
</template>

<script>

export default {
    methods: {
        login() {
            var username = document.querySelector('.user2').value;
            var password = document.querySelector('.pass2').value;
            this.$http.get('http://localhost/login.php?username=' + username + '&password=' + password).then(function (res) {
                console.log(JSON.parse(res.bodyText).errmsg);
                res = JSON.parse(res.bodyText).errmsg;
                if (res == "ok") {
                    localStorage.setItem('username',document.querySelector('.user2').value);
                    this.$router.push({
                        path: '/mine'
                    });
                } else {
                    alert("账户信息有误");
                    console.log(username);
                }
            });
            
        }
    }
}
</script>

<style lang="scss">
.login{
    width: 100%;
    background: #fff;
    h2{
        text-align: center;
        line-height: 0.8rem;
    }
    .login-bj{
        width: 100%;
    }
    .login-user{
        width: 100%;
        .denglu{
            width: 75%;
            text-align: center;
            margin: 0 auto;
            // background: red;
            input{
                border:none;
            }
            .user2{
                width: 70%;
                height: 0.65rem;
                margin-top: 0.45rem;
                border-bottom: 1px solid #e2e2e2;
                background-color: rgba(255,255,255,0);
            }
            .pass2{
                width: 70%;
                height: 0.65rem;
                margin-top: 0.45rem;
                border-bottom: 1px solid #e2e2e2;
                background-color: rgba(255,255,255,0);
            }
            .btn2{
                width: 100%;
                font-size: 0.34rem;
                margin-top: 0.57rem;
                height: 0.88rem;
                background: rgb(243,53,69);
                border-radius:0.1rem;
                color: #fff;
            }
            span{
                font-size: 0.3rem;
                color: skyblue;
                display: inline-block;
                margin-top: 10px;
            }
        }
    }
}
</style>
