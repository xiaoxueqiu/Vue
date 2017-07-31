<template>
    <div class="topnav">
        <form id="searchBox" method="get" class="searchBox" style="background: rgba(221, 23, 18, 0);">
            <div class="search_box">
                <div class="search">
                    <input type="text" class="input focus" name="keywords" value="" placeholder="搜索商品，品牌" id="searchVal">
                    <input type="reset" class="sh_searchClear" title="重置搜索词" style="display: none;">
                </div>
                <a class="me"><img src="//sh1.hoopchina.com.cn/fis_static/shihuomobile/static/homefis/widget/header/me_670cb9f.png" alt=""></a>
                <a href="javascript:void(0);" class="cancel">取消</a>
            </div>
        </form>
    </div>
</template>

<script>
export default {
    name: 'topnav'
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style lang="scss">
.topnav{
    width: 100%;
    overflow: hidden;
    position: absolute;
    top: 0;
    z-index: 10;
    border: 0;
    background: -webkit-linear-gradient(top,rgba(0,0,0,.4),transparent);
    .searchBox {
        width: 100%;
        background: rgba(221, 23, 18, 0);
        .search_box {
            width: 100%;
            overflow: hidden;
            height: 100%;
            .search {
                width: 85%;
                float: left;
                padding-left: .3rem;
                position: relative;
                .input {
                    width: 100%;
                    border-radius: .2rem;
                    height: 1.4rem;
                    margin: .2rem 0;
                    border: 0;
                    padding-left: .9rem;
                    color: #666;
                    font-size: .5rem;
                    background: #fff url(//sh1.hoopchina.com.cn/fis_static/shihuomobile/static/homefis/widget/header/search_c57b24b.png) .2rem center no-repeat;
                    background-size: .6rem;
                    overflow: hidden;
                }
                input[type=reset] {
                    background: url(//sh1.hoopchina.com.cn/fis_static/shihuomobile/static/homefis/widget/header/reset_5e495f9.png) no-repeat;
                    background-size: .4rem;
                    position: absolute;
                    right: .3rem;
                    top: 35%;
                    height: .4rem;
                    width: .4rem;
                    border: 0;
                    color: transparent;
                    display: none;
                    z-index: 1;
                    outline: 0;
                }
            }
            .me {
                display: block;
                float: right;
                width: 15%;
                padding: 0 .2rem;
                padding-top: .2rem;
                text-align: center;
                img{
                    width:1.3rem;
                }
            }
            .cancel{
                display:none;
            }
        }
    }
}

</style>
