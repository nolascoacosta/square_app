(function(e){function t(t){for(var r,i,u=t[0],l=t[1],c=t[2],s=0,f=[];s<u.length;s++)i=u[s],Object.prototype.hasOwnProperty.call(o,i)&&o[i]&&f.push(o[i][0]),o[i]=0;for(r in l)Object.prototype.hasOwnProperty.call(l,r)&&(e[r]=l[r]);p&&p(t);while(f.length)f.shift()();return a.push.apply(a,c||[]),n()}function n(){for(var e,t=0;t<a.length;t++){for(var n=a[t],r=!0,i=1;i<n.length;i++){var l=n[i];0!==o[l]&&(r=!1)}r&&(a.splice(t--,1),e=u(u.s=n[0]))}return e}var r={},o={2:0},a=[];function i(e){return u.p+"js/"+({}[e]||e)+"."+{1:"350d722e",3:"3a9711c0",4:"d035d8ea",5:"7dbd4817"}[e]+".js"}function u(t){if(r[t])return r[t].exports;var n=r[t]={i:t,l:!1,exports:{}};return e[t].call(n.exports,n,n.exports,u),n.l=!0,n.exports}u.e=function(e){var t=[],n=o[e];if(0!==n)if(n)t.push(n[2]);else{var r=new Promise((function(t,r){n=o[e]=[t,r]}));t.push(n[2]=r);var a,l=document.createElement("script");l.charset="utf-8",l.timeout=120,u.nc&&l.setAttribute("nonce",u.nc),l.src=i(e);var c=new Error;a=function(t){l.onerror=l.onload=null,clearTimeout(s);var n=o[e];if(0!==n){if(n){var r=t&&("load"===t.type?"missing":t.type),a=t&&t.target&&t.target.src;c.message="Loading chunk "+e+" failed.\n("+r+": "+a+")",c.name="ChunkLoadError",c.type=r,c.request=a,n[1](c)}o[e]=void 0}};var s=setTimeout((function(){a({type:"timeout",target:l})}),12e4);l.onerror=l.onload=a,document.head.appendChild(l)}return Promise.all(t)},u.m=e,u.c=r,u.d=function(e,t,n){u.o(e,t)||Object.defineProperty(e,t,{enumerable:!0,get:n})},u.r=function(e){"undefined"!==typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})},u.t=function(e,t){if(1&t&&(e=u(e)),8&t)return e;if(4&t&&"object"===typeof e&&e&&e.__esModule)return e;var n=Object.create(null);if(u.r(n),Object.defineProperty(n,"default",{enumerable:!0,value:e}),2&t&&"string"!=typeof e)for(var r in e)u.d(n,r,function(t){return e[t]}.bind(null,r));return n},u.n=function(e){var t=e&&e.__esModule?function(){return e["default"]}:function(){return e};return u.d(t,"a",t),t},u.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},u.p="/",u.oe=function(e){throw console.error(e),e};var l=window["webpackJsonp"]=window["webpackJsonp"]||[],c=l.push.bind(l);l.push=t,l=l.slice();for(var s=0;s<l.length;s++)t(l[s]);var p=c;a.push([0,0]),n()})({0:function(e,t,n){e.exports=n("2f39")},"0047":function(e,t,n){},"2f39":function(e,t,n){"use strict";n.r(t);n("5319");var r=n("c973"),o=n.n(r),a=(n("7d6e"),n("e54f"),n("985d"),n("0047"),n("2b0e")),i=n("1f91"),u=n("42d2"),l=n("b05d");a["a"].use(l["a"],{config:{},lang:i["a"],iconSet:u["a"]});var c=function(){var e=this,t=e.$createElement,n=e._self._c||t;return n("div",{attrs:{id:"q-app"}},[n("router-view")],1)},s=[],p={name:"App"},f=p,d=n("2877"),h=Object(d["a"])(f,c,s,!1,null,null,null),v=h.exports,b=n("2f62");a["a"].use(b["a"]);var y=function(){const e=new b["a"].Store({modules:{},strict:!1});return e},m=n("8c4f");n("e6cf");const w=[{path:"/",component:()=>Promise.all([n.e(0),n.e(1)]).then(n.bind(null,"713b")),children:[{path:"",component:()=>Promise.all([n.e(0),n.e(4)]).then(n.bind(null,"8b24"))}]},{path:"/saludar",component:()=>Promise.all([n.e(0),n.e(1)]).then(n.bind(null,"713b")),children:[{path:"",component:()=>Promise.all([n.e(0),n.e(5)]).then(n.bind(null,"5e89"))}]},{path:"*",component:()=>Promise.all([n.e(0),n.e(3)]).then(n.bind(null,"e51e"))}];var g=w;a["a"].use(m["a"]);var P=function(){const e=new m["a"]({scrollBehavior:()=>({x:0,y:0}),routes:g,mode:"history",base:"/"});return e},j=function(){return O.apply(this,arguments)};function O(){return O=o()((function*(){const e="function"===typeof y?yield y({Vue:a["a"]}):y,t="function"===typeof P?yield P({Vue:a["a"],store:e}):P;e.$router=t;const n={router:t,store:e,render:e=>e(v),el:"#q-app"};return{app:n,store:e,router:t}})),O.apply(this,arguments)}var x=n("bc3a"),_=n.n(x);a["a"].prototype.$axios=_.a;const S="/";function k(){return E.apply(this,arguments)}function E(){return E=o()((function*(){const{app:e,store:t,router:n}=yield j();let r=!1;const o=e=>{r=!0;const t=Object(e)===e?n.resolve(e).route.fullPath:e;window.location.href=t},i=window.location.href.replace(window.location.origin,""),u=[void 0];for(let c=0;!1===r&&c<u.length;c++)if("function"===typeof u[c])try{yield u[c]({app:e,router:n,store:t,Vue:a["a"],ssrContext:null,redirect:o,urlPath:i,publicPath:S})}catch(l){return l&&l.url?void(window.location.href=l.url):void console.error("[Quasar] boot error:",l)}!0!==r&&new a["a"](e)})),E.apply(this,arguments)}k()}});