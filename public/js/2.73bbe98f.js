(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([[2],{7995:function(e,t,a){"use strict";var o=a("a41e"),n=a.n(o);n.a},"99de":function(e,t,a){"use strict";a.r(t);var o=function(){var e=this,t=e.$createElement,a=e._self._c||t;return a("q-layout",{staticClass:"bg-white",attrs:{view:"hHh lpR fFf"}},[a("q-header",{staticClass:"bg-white text-grey-8 q-py-xs",attrs:{bordered:"","height-hint":"58"}},[a("q-toolbar",[null!=e.getToken?a("q-btn",{attrs:{flat:"",dense:"",round:"","aria-label":"Menu",icon:"menu"},on:{click:function(t){e.leftDrawerOpen=!e.leftDrawerOpen}}}):e._e(),e.$q.screen.gt.sm?a("q-toolbar-title",{staticClass:"row items-center no-wrap q-ml-md",attrs:{shrink:""}},[a("img",{attrs:{src:"https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcShcRnd3-7PZnP2D6DNA8piCJ-6aHgLra1Jxg&usqp=CAU",width:"20px"}}),a("span",{staticClass:"q-ml-sm text-weight-bold"},[e._v(" Blogging Platform")])]):e._e(),a("q-space"),"/"===e.$route.path?a("q-input",{staticClass:"q-mt-md",attrs:{dense:"",outlined:"",rounded:"",mask:"date",rules:["date"]},scopedSlots:e._u([{key:"append",fn:function(){return[a("q-icon",{staticClass:"cursor-pointer",attrs:{name:"event"}},[a("q-popup-proxy",{ref:"qDateProxy",attrs:{"transition-show":"scale","transition-hide":"scale"}},[a("q-date",{on:{input:function(){return e.$refs.qDateProxy.hide()}},model:{value:e.date,callback:function(t){e.date=t},expression:"date"}})],1)],1)]},proxy:!0}],null,!1,4214985005),model:{value:e.date,callback:function(t){e.date=t},expression:"date"}}):e._e(),a("q-space"),null==e.getToken?a("div",{staticClass:"q-gutter-sm row items-center no-wrap"},[a("q-btn",{attrs:{outline:"",rounded:"",color:"primary",label:"Register"},on:{click:function(t){e.showRegForm=!e.showRegForm}}}),a("q-btn",{attrs:{outline:"",rounded:"",color:"primary",label:"Login"},on:{click:function(t){e.showLoginForm=!e.showLoginForm}}})],1):a("div",{staticClass:"q-gutter-sm row items-center no-wrap"},[a("q-btn",{attrs:{dense:"",flat:"","no-wrap":""}},[a("q-avatar",{attrs:{rounded:"",size:"40px"}},[a("img",{attrs:{src:"https://cdn.quasar.dev/img/boy-avatar.png"}})]),a("span",{staticClass:"q-subtitle-1 q-pl-md"},[e._v("\n            "+e._s(e.fullName)+"\n          ")]),a("q-icon",{attrs:{name:"arrow_drop_down",size:"16px"}}),a("q-menu",{attrs:{"auto-close":""}},[a("q-list",{attrs:{dense:""}},[a("q-item",{staticClass:"GL__menu-link-signed-in"},[a("q-item-section",[a("div",[e._v("Signed in as "),a("strong",[e._v(" "+e._s(e.fullName))])])])],1),a("q-item",{staticClass:"GL__menu-link",attrs:{to:"/profile",clickable:""}},[a("q-item-section",[e._v("My profile")])],1),a("q-separator"),a("q-item",{staticClass:"GL__menu-link",attrs:{clickable:""}},[a("q-item-section",[e._v("Sign out")])],1)],1)],1)],1)],1)],1)],1),null!=e.getToken?a("q-drawer",{attrs:{"show-if-above":"",bordered:"","content-class":"bg-grey-2",width:280},model:{value:e.leftDrawerOpen,callback:function(t){e.leftDrawerOpen=t},expression:"leftDrawerOpen"}},[a("q-scroll-area",{staticClass:"fit"},[a("q-list",{attrs:{padding:""}},e._l(e.navsLinks,(function(t){return a("q-item",{key:t.lable,attrs:{to:t.to,exact:"",clickable:""}},[a("q-item-section",{attrs:{avatar:""}},[a("q-icon",{attrs:{color:"grey",name:t.icon}})],1),a("q-item-section",[a("q-item-label",[e._v(e._s(t.lable))])],1)],1)})),1)],1)],1):e._e(),a("q-dialog",{model:{value:e.showLoginForm,callback:function(t){e.showLoginForm=t},expression:"showLoginForm"}},[a("login-form")],1),a("q-dialog",{model:{value:e.showRegForm,callback:function(t){e.showRegForm=t},expression:"showRegForm"}},[a("register-form")],1),a("q-page-container",[a("router-view")],1)],1)},n=[],s=(a("e6cf"),a("ded3")),r=a.n(s),i=a("2f62"),l={name:"MyLayout",data(){return{leftDrawerOpen:!1,search:"",date:"2019/02/01",showLoginForm:!1,showRegForm:!1,firstName:"",navsLinks:[{lable:"Home Page",icon:"home",to:"/"},{lable:"My Post",icon:"list",to:"/my-posts"},{lable:"Create Post",icon:"post_add",to:"/post/create"},{lable:"Profile",icon:"person",to:"/profile"}]}},computed:r()(r()({},Object(i["c"])("auth",["getToken","getUserInfo"])),{},{fullName(){return this.getUserInfo.first_name+" "+this.getUserInfo.last_name}}),components:{loginForm:()=>Promise.all([a.e(0),a.e(3)]).then(a.bind(null,"61b1")),registerForm:()=>Promise.all([a.e(0),a.e(4)]).then(a.bind(null,"349f"))}},c=l,m=(a("7995"),a("2877")),u=a("4d5a"),d=a("e359"),p=a("65c6"),g=a("9c40"),f=a("6ac5"),q=a("2c91"),b=a("27f9"),w=a("0016"),h=a("7cbe"),v=a("52ee"),_=a("cb32"),k=a("4e73"),y=a("1c1c"),Q=a("66e5"),x=a("4074"),C=a("eb85"),L=a("9404"),F=a("4983"),P=a("0170"),D=a("24e8"),R=a("09e3"),I=a("eebe"),O=a.n(I),S=Object(m["a"])(c,o,n,!1,null,null,null);t["default"]=S.exports;O()(S,"components",{QLayout:u["a"],QHeader:d["a"],QToolbar:p["a"],QBtn:g["a"],QToolbarTitle:f["a"],QSpace:q["a"],QInput:b["a"],QIcon:w["a"],QPopupProxy:h["a"],QDate:v["a"],QAvatar:_["a"],QMenu:k["a"],QList:y["a"],QItem:Q["a"],QItemSection:x["a"],QSeparator:C["a"],QDrawer:L["a"],QScrollArea:F["a"],QItemLabel:P["a"],QDialog:D["a"],QPageContainer:R["a"]})},a41e:function(e,t,a){}}]);