(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([[3],{"61b1":function(t,a,e){"use strict";e.r(a);var i=function(){var t=this,a=t.$createElement,e=t._self._c||a;return e("q-card",{staticStyle:{width:"500px","max-width":"80vw"}},[e("q-card-section",[e("div",{staticClass:"text-h6 text-center"},[t._v("Login Form")])]),e("q-card-section",{staticClass:"q-pt-none"},[e("q-form",[e("q-input",{staticClass:"q-mb-md",attrs:{outlined:"",rules:[function(a){return t.$v.formData.email.required||"Email is required"},function(a){return t.$v.formData.email.email||"Invalid email format"}],label:"Email",type:"email"},model:{value:t.formData.email,callback:function(a){t.$set(t.formData,"email","string"===typeof a?a.trim():a)},expression:"formData.email"}}),e("q-input",{staticClass:"q-mb-md",attrs:{outlined:"",label:"Password",type:"password",rules:[function(a){return t.$v.formData.password.required||"Password is required"},function(a){return t.$v.formData.password.minLength||"Min Length 4"}]},model:{value:t.formData.password,callback:function(a){t.$set(t.formData,"password",a)},expression:"formData.password"}})],1)],1),e("q-card-actions",{attrs:{align:"right"}},[e("q-btn",{attrs:{color:"primary",label:"Login",disable:t.$v.formData.$invalid},on:{click:function(a){return a.preventDefault(),t.submit(a)}}})],1)],1)},r=[],s=e("ded3"),o=e.n(s),n=e("b5ae"),l=e("2f62"),m={data(){return{formData:{password:"123456789",email:"buck.luettgen@example.org"}}},methods:o()(o()({},Object(l["b"])("auth",["loginUser"])),{},{submit(){this.$v.$touch(),this.$v.$invalid?(this.$q.notify({position:"right",type:"negative",message:"Invalid Form Data.",timeout:5e3*Math.random()+3e3}),console.log("ERROR")):this.$axios.post("/api/v1/login",this.formData).then(t=>{this.loginUser(t.data),this.$router.push({name:"profile"}).catch(t=>{})}).catch(t=>{this.$q.notify({position:"top-right",type:"negative",message:t.response.data.errors[0].message,timeout:5e3*Math.random()+3e3})})}}),validations:{formData:{email:{required:n["required"],email:n["email"]},password:{required:n["required"],minLength:Object(n["minLength"])(4)}}}},d=m,u=e("2877"),c=e("f09f"),p=e("a370"),f=e("0378"),h=e("27f9"),v=e("4b7e"),b=e("9c40"),g=e("eebe"),q=e.n(g),w=Object(u["a"])(d,i,r,!1,null,null,null);a["default"]=w.exports;q()(w,"components",{QCard:c["a"],QCardSection:p["a"],QForm:f["a"],QInput:h["a"],QCardActions:v["a"],QBtn:b["a"]})}}]);