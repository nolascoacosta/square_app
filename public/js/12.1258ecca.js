(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([[12],{b74e:function(e,t,s){"use strict";s.r(t);var n=function(){var e=this,t=e.$createElement,s=e._self._c||t;return s("q-page",{attrs:{padding:""}},[s("single-posts",{attrs:{post:e.post,linesNumber:25}})],1)},a=[],o=(s("e6cf"),{created(){this.$axios.get("/api/v1/show/"+this.$route.params.id).then(e=>{this.post=e.data.data}).catch(e=>console.log(e))},data(){return{post:{}}},components:{singlePosts:()=>Promise.all([s.e(0),s.e(6)]).then(s.bind(null,"b537"))}}),i=o,l=s("2877"),p=s("9989"),r=s("eebe"),c=s.n(r),u=Object(l["a"])(i,n,a,!1,null,null,null);t["default"]=u.exports;c()(u,"components",{QPage:p["a"]})}}]);