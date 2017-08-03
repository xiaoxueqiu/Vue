<template>
    <div class="zhu">
        <img src="../../assets/login_banner.jpg" alt="" class="login-bj">
        <h2>用户注册</h2>
        <div class="zhuce">
            用户名： <input type="text" placeholder="请输入用户名" class="user1"><br>
            密&nbsp;&nbsp;&nbsp;码： <input type="password" placeholder="请输入密码" class="pass1"><br>
            <router-link to="/login"><span>已有账号，点击登录</span></router-link>
            <input type="button" value="注册" class="btn1" @click="regist()">
        </div>
    </div>
</template>

<script>
export default {
  methods: {
        regist() {
            var username = document.querySelector('.user1').value;
            var password = document.querySelector('.pass1').value;
            this.$http.get('http://localhost/regist.php?username=' + username + '&password=' + password).then(function (res) {
                console.log(JSON.parse(res.bodyText).errmsg);
                res = JSON.parse(res.bodyText).errmsg;
                if (res == "ok") {
                    this.$router.push({
                        path: '/login'
                    });
                }
            })
        }
    }
}
</script>

<style lang="scss">

.zhu {
    width: 100%;
    background: #fff;
    h2{
        text-align: center;
        line-height: 0.8rem;
    }
    .login-bj {
        width: 100%;
    }
    .zhuce {
        width: 75%;
        text-align: center;
        margin: 0 auto; // background: red;
        input {
            border: none;
        }
        .user1 {
            width: 70%;
            height: 0.65rem;
            margin-top: 0.45rem;
            border-bottom: 1px solid #e2e2e2;
            background-color: rgba(255, 255, 255, 0);
        }
        .pass1 {
            width: 70%;
            height: 0.65rem;
            margin-top: 0.45rem;
            border-bottom: 1px solid #e2e2e2;
            background-color: rgba(255, 255, 255, 0);
        }
        .btn1 {
            width: 100%;
            font-size: 0.34rem;
            margin-top: 0.57rem;
            height: 0.88rem;
            background: rgb(243, 53, 69);
            border-radius: 0.1rem;
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

        


</style>
