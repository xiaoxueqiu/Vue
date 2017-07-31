<template>
  <div id="app">
    <router-view></router-view>
    <feet></feet>
  </div>
</template>

<script>
import feet from '@/components/feet'
export default {
  name: 'app',
  components:{
    feet,
  }
}
</script>

<style lang="scss">
@charset "UTF-8";
/* 适配开始 */
@media screen and (min-width: 320px) { html{ font-size:42px; }}
@media screen and (min-width: 360px) { html{ font-size:48px; }}
@media screen and (min-width: 375px) { html{ font-size:50px; }}
@media screen and (min-width: 400px) { html{ font-size:54px; }}
@media screen and (min-width: 414px) { html{ font-size:56px; }}
@media screen and (min-width: 440px) { html{ font-size:58px; }}
@media screen and (min-width: 480px) { html{ font-size:64px; }}
@media screen and (min-width: 520px) { html{ font-size:70px; }}
@media screen and (min-width: 560px) { html{ font-size:74px; }}
@media screen and (min-width: 600px) { html{ font-size:80px; }}
@media screen and (min-width: 640px) { html{ font-size:86px; }}
@media screen and (min-width: 680px) { html{ font-size:90px; }}
@media screen and (min-width: 720px) { html{ font-size:96px; }}
@media screen and (min-width: 750px) { html{ font-size:100px; }}
@media screen and (min-width: 768px) { html{ font-size:102px; }}
/* 禁用iPhone中Safari的字号自动调整 */
html {
    font-size:10px;
    -webkit-text-size-adjust: 100%;
    -ms-text-size-adjust: 100%;
    -webkit-appearance:none;
}
html,body{height:100%;}
body,div,ul,li,ol,h1,h2,h3,h4,h5,h6,input,textarea,select,p,dl,dt,dd,a,img,button,form,table,th,tr,td,tbody,article, 
aside, details,figcaption,figure,footer,header,hgroup, menu,nav,section{ -webkit-tap-highlight-color:rgba(0, 0, 0, 0); }
/* 设置HTML5元素为块 */
article, aside, details,figcaption,figure,footer,header,hgroup, menu,nav,section {
display: block;
}
*{ margin:0; padding:0; outline:none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); }
body{ -webkit-tap-highlight-color:rgba(0,0,0,0);font-family:"微软雅黑",Tahoma,Arial,sans-serif;outline:none;background: #f2f2f2;color: #666}
h1,h2,h3,h4,h5,em,i,strong,th{ font-weight:normal; font-style: normal; }
ul,ol,li,a{ list-style: none; text-decoration: none;font-family:-apple-system-font,simhei;color:#444;}
table{ border-spacing: 0; border-collapse: collapse; }
input,textarea{font-family: "微软雅黑";outline:none;border:0;-webkit-appearance:none;-appearance:none;-ms-appearance:none;}
input[type="radio"]{opcity:0;}
::-webkit-input-placeholder{color:#ccc;}

/*链接色*/
a{text-decoration:none;font-family:"微软雅黑",Tahoma,Arial,sans-serif;}
a:hover,
a:active{text-decoration:none;}
*,*:before,*:after{
  margin:0;padding:0;
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
}
select{direction:rtl;background:transparent;border:none;appearance:none;-moz-appearance:none;-webkit-appearance:none;}
select option {direction: ltr;}
textarea{resize:none;}
input{background:transparent;}
.clearfix:after{content:""; display:block; visibility:hidden; height:0; clear:both;}
.clearfix{zoom:1;}
.hide{display:none;}
/**{border-width:1px;}
@media screen and (-webkit-min-device-pixel-ratio: 2) {
    *{ border-width:0.5px !important; }
}
@media screen and (-webkit-min-device-pixel-ratio: 3) {
    * { border-width:0.333333px !important; }
}*/
/*box布局*/
.flex-box{display:-webkit-box !important;-webkit-box-pack:justify;display:-moz-box !important;-moz-box-pack: justify;}
.flex-start{display:-webkit-box !important;-webkit-box-pack:start;display:-moz-box !important;-moz-box-pack: start;}
.flex-end{display:-webkit-box !important;-webkit-box-pack:end;display:-moz-box !important;-moz-box-pack: end;}
/*flex布局*/
.layout-box{display: -webkit-box !important; display: -webkit-flex !important; display: -ms-flexbox !important; display: flex !important; }
.layout-box .box-flex,.box-flex {width: 100%; -webkit-box-flex: 1; -webkit-flex: 1; -ms-flex: 1; flex: 1; }
.center-v { -ms-flex-align: center; -webkit-box-align: center; -webkit-align-items: center; align-items: center; }
.center-h { -ms-flex-pack: center; -webkit-box-pack: center; -webkit-justify-content: center; justify-content: center; }
.justify { -webkit-box-pack: space-between; -webkit-justify-content: space-between; justify-content: space-between; }
/*自动换行--截取字符*/
.cut-txt{ overflow: hidden; text-overflow: ellipsis; white-space: nowrap; }
.cut-p1{ -webkit-line-clamp:1;display:-webkit-box !important; overflow:hidden; text-overflow:ellipsis; word-break:break-all; -webkit-box-orient:vertical;}
.cut-p2{ -webkit-line-clamp:2;display:-webkit-box !important; overflow:hidden; text-overflow:ellipsis; word-break:break-all; -webkit-box-orient:vertical;}
.cut-p3{ -webkit-line-clamp:3;display:-webkit-box !important; overflow:hidden; text-overflow:ellipsis; word-break:break-all; -webkit-box-orient:vertical;}

.flex-container {
    display: -webkit-flex;
    display: flex;
    width: 100%;
    height: 0.88rem;
    flex-direction:row-reverse;
    background-color: #ffffff;
    padding: 0 0.24rem;
    border-bottom: 1px solid #dee0e9;
}
.flex-item {
  display:block;
  min-width: 1.6rem;
    background-color: #ed6c00;
    color: #ffffff;
    border-radius: 0.05rem;
    padding:0 0.18rem;
    height: 0.54rem;
    margin:0.17rem 0 0.24rem 0.17rem;
    font-size: 0.28rem;
    line-height: 0.54rem;
    text-align: center;
}
</style>
