(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([[7],{c648:function(t,e,a){"use strict";a.r(e);var i=function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("q-page",{attrs:{padding:""}},[a("q-form",[a("div",{staticClass:"row"},[a("div",{staticClass:"col-sm-12 col-md-8  col-lg-8 "},[a("q-input",{staticClass:"q-mb-md q-mr-md",attrs:{outlined:"",label:"Title",rules:[function(e){return t.$v.formData.title.required||"Title is required"},function(e){return t.$v.formData.title.minLength||"Title Length 4"}]},model:{value:t.formData.title,callback:function(e){t.$set(t.formData,"title",e)},expression:"formData.title"}})],1),a("div",{staticClass:"col-sm-4 col-md-4 col-lg-4 "},[a("q-input",{staticClass:"q-mb-md",attrs:{outlined:"",mask:"date",rules:["date"],label:"Publication Date"},scopedSlots:t._u([{key:"append",fn:function(){return[a("q-icon",{staticClass:"cursor-pointer",attrs:{name:"event"}},[a("q-popup-proxy",{ref:"qDateProxy",attrs:{"transition-show":"scale","transition-hide":"scale"}},[a("q-date",{attrs:{"today-btn":""},on:{input:function(){return t.$refs.qDateProxy.hide()}},model:{value:t.formData.publication_date,callback:function(e){t.$set(t.formData,"publication_date",e)},expression:"formData.publication_date"}})],1)],1)]},proxy:!0}]),model:{value:t.formData.publication_date,callback:function(e){t.$set(t.formData,"publication_date",e)},expression:"formData.publication_date"}})],1)]),a("q-editor",{attrs:{label:"",rules:[function(e){return t.$v.formData.description.required||"description is required"},function(e){return t.$v.formData.description.minLength||"Min Length 20"}]},model:{value:t.formData.description,callback:function(e){t.$set(t.formData,"description",e)},expression:"formData.description"}}),a("q-card-actions",{staticClass:"justify-center"},[a("q-btn",{attrs:{color:"primary",label:"Save Post",disable:t.$v.formData.$invalid},on:{click:function(e){return e.preventDefault(),t.submit(e)}}})],1)],1)],1)},o=[],n=a("ded3"),r=a.n(n),s=a("b5ae"),l=a("bd4c"),c=a("2f62"),d={data(){return{formData:{title:"",description:"",publication_date:l["b"].formatDate(Date.now(),"YYYY-MM-DD")}}},methods:r()(r()({},Object(c["b"])("post",["savePost"])),{},{submit(){this.$v.$touch(),this.$v.$invalid?this.$q.notify({position:"right",type:"negative",message:"Invalid Form Data.",timeout:5e3*Math.random()+3e3}):this.$axios.post("/api/v1/posts",this.formData).then(t=>{console.log(t)}).catch(t=>{this.$q.notify({position:"top-right",type:"negative",message:t.response.data.message,timeout:5e3*Math.random()+3e3})})}}),validations:{formData:{title:{required:s["required"],minLength:Object(s["minLength"])(4)},description:{required:s["required"],minLength:Object(s["minLength"])(20)}}},computed:{}},u=d,m=a("2877"),p=a("9989"),f=a("0378"),b=a("27f9"),D=a("0016"),h=a("7cbe"),v=a("52ee"),q=a("d66b"),g=a("4b7e"),$=a("9c40"),y=a("eebe"),x=a.n(y),_=Object(m["a"])(u,i,o,!1,null,null,null);e["default"]=_.exports;x()(_,"components",{QPage:p["a"],QForm:f["a"],QInput:b["a"],QIcon:D["a"],QPopupProxy:h["a"],QDate:v["a"],QEditor:q["a"],QCardActions:g["a"],QBtn:$["a"]})}}]);