/*! For license information please see blocks.js.LICENSE.txt */
(()=>{var e,t={8924:(e,t,r)=>{var n={"./buckaroo_afterpay":[4344,565,344],"./buckaroo_afterpay.js":[4344,565,344],"./buckaroo_afterpaynew":[7985,565,985],"./buckaroo_afterpaynew.js":[7985,565,985],"./buckaroo_billink":[50,565,50],"./buckaroo_billink.js":[50,565,50],"./buckaroo_creditcard":[6506,506],"./buckaroo_creditcard.js":[6506,506],"./buckaroo_ideal":[8320,320],"./buckaroo_ideal.js":[8320,320],"./buckaroo_in3":[9308,565,308],"./buckaroo_in3.js":[9308,565,308],"./buckaroo_klarnakp":[5924,924],"./buckaroo_klarnakp.js":[5924,924],"./buckaroo_klarnapay":[8027,27],"./buckaroo_klarnapay.js":[8027,27],"./buckaroo_klarnapii":[7560,560],"./buckaroo_klarnapii.js":[7560,560],"./buckaroo_paybybank":[3802,802],"./buckaroo_paybybank.js":[3802,802],"./buckaroo_payperemail":[8566,566],"./buckaroo_payperemail.js":[8566,566],"./buckaroo_sepadirectdebit":[2762,762],"./buckaroo_sepadirectdebit.js":[2762,762],"./buckaroo_separate_credit_card":[7172,172],"./buckaroo_separate_credit_card.js":[7172,172],"./default_payment":[228],"./default_payment.js":[228]};function o(e){if(!r.o(n,e))return Promise.resolve().then((()=>{var t=new Error("Cannot find module '"+e+"'");throw t.code="MODULE_NOT_FOUND",t}));var t=n[e],o=t[0];return Promise.all(t.slice(1).map(r.e)).then((()=>r(o)))}o.keys=()=>Object.keys(n),o.id=8924,e.exports=o},228:(e,t,r)=>{"use strict";r.r(t),r.d(t,{default:()=>n});const n=function(){}},9196:e=>{"use strict";e.exports=window.React},1850:e=>{"use strict";e.exports=window.ReactDOM},5736:e=>{"use strict";e.exports=window.wp.i18n}},r={};function n(e){var o=r[e];if(void 0!==o)return o.exports;var a=r[e]={id:e,exports:{}};return t[e].call(a.exports,a,a.exports,n),a.exports}n.m=t,n.n=e=>{var t=e&&e.__esModule?()=>e.default:()=>e;return n.d(t,{a:t}),t},n.d=(e,t)=>{for(var r in t)n.o(t,r)&&!n.o(e,r)&&Object.defineProperty(e,r,{enumerable:!0,get:t[r]})},n.f={},n.e=e=>Promise.all(Object.keys(n.f).reduce(((t,r)=>(n.f[r](e,t),t)),[])),n.u=e=>e+".js",n.miniCssF=e=>{},n.g=function(){if("object"==typeof globalThis)return globalThis;try{return this||new Function("return this")()}catch(e){if("object"==typeof window)return window}}(),n.o=(e,t)=>Object.prototype.hasOwnProperty.call(e,t),e={},n.l=(t,r,o,a)=>{if(e[t])e[t].push(r);else{var c,i;if(void 0!==o)for(var u=document.getElementsByTagName("script"),s=0;s<u.length;s++){var l=u[s];if(l.getAttribute("src")==t){c=l;break}}c||(i=!0,(c=document.createElement("script")).charset="utf-8",c.timeout=120,n.nc&&c.setAttribute("nonce",n.nc),c.src=t),e[t]=[r];var d=(r,n)=>{c.onerror=c.onload=null,clearTimeout(p);var o=e[t];if(delete e[t],c.parentNode&&c.parentNode.removeChild(c),o&&o.forEach((e=>e(n))),r)return r(n)},p=setTimeout(d.bind(null,void 0,{type:"timeout",target:c}),12e4);c.onerror=d.bind(null,c.onerror),c.onload=d.bind(null,c.onload),i&&document.head.appendChild(c)}},n.r=e=>{"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})},(()=>{var e;n.g.importScripts&&(e=n.g.location+"");var t=n.g.document;if(!e&&t&&(t.currentScript&&(e=t.currentScript.src),!e)){var r=t.getElementsByTagName("script");if(r.length)for(var o=r.length-1;o>-1&&!e;)e=r[o--].src}if(!e)throw new Error("Automatic publicPath is not supported in this browser");e=e.replace(/#.*$/,"").replace(/\?.*$/,"").replace(/\/[^\/]+$/,"/"),n.p=e})(),(()=>{var e={346:0};n.f.j=(t,r)=>{var o=n.o(e,t)?e[t]:void 0;if(0!==o)if(o)r.push(o[2]);else{var a=new Promise(((r,n)=>o=e[t]=[r,n]));r.push(o[2]=a);var c=n.p+n.u(t),i=new Error;n.l(c,(r=>{if(n.o(e,t)&&(0!==(o=e[t])&&(e[t]=void 0),o)){var a=r&&("load"===r.type?"missing":r.type),c=r&&r.target&&r.target.src;i.message="Loading chunk "+t+" failed.\n("+a+": "+c+")",i.name="ChunkLoadError",i.type=a,i.request=c,o[1](i)}}),"chunk-"+t,t)}};var t=(t,r)=>{var o,a,[c,i,u]=r,s=0;if(c.some((t=>0!==e[t]))){for(o in i)n.o(i,o)&&(n.m[o]=i[o]);u&&u(n)}for(t&&t(r);s<c.length;s++)a=c[s],n.o(e,a)&&e[a]&&e[a][0](),e[a]=0},r=self.webpackChunk=self.webpackChunk||[];r.forEach(t.bind(null,0)),r.push=t.bind(null,r.push.bind(r))})(),n.nc=void 0,(()=>{"use strict";var e=n(9196),t=n.n(e),r=n(228),o=function(e){var t=e.image_path,r=e.title;return React.createElement("div",{className:"buckaroo_method_block"},r,React.createElement("img",{src:t,alt:"Payment Method ".concat(r),style:{float:"right"}}))};function a(e){return a="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(e){return typeof e}:function(e){return e&&"function"==typeof Symbol&&e.constructor===Symbol&&e!==Symbol.prototype?"symbol":typeof e},a(e)}function c(){c=function(){return t};var e,t={},r=Object.prototype,n=r.hasOwnProperty,o=Object.defineProperty||function(e,t,r){e[t]=r.value},i="function"==typeof Symbol?Symbol:{},u=i.iterator||"@@iterator",s=i.asyncIterator||"@@asyncIterator",l=i.toStringTag||"@@toStringTag";function d(e,t,r){return Object.defineProperty(e,t,{value:r,enumerable:!0,configurable:!0,writable:!0}),e[t]}try{d({},"")}catch(e){d=function(e,t,r){return e[t]=r}}function p(e,t,r,n){var a=t&&t.prototype instanceof g?t:g,c=Object.create(a.prototype),i=new P(n||[]);return o(c,"_invoke",{value:C(e,r,i)}),c}function f(e,t,r){try{return{type:"normal",arg:e.call(t,r)}}catch(e){return{type:"throw",arg:e}}}t.wrap=p;var h="suspendedStart",y="suspendedYield",m="executing",b="completed",v={};function g(){}function k(){}function _(){}var w={};d(w,u,(function(){return this}));var S=Object.getPrototypeOf,E=S&&S(S(N([])));E&&E!==r&&n.call(E,u)&&(w=E);var j=_.prototype=g.prototype=Object.create(w);function O(e){["next","throw","return"].forEach((function(t){d(e,t,(function(e){return this._invoke(t,e)}))}))}function x(e,t){function r(o,c,i,u){var s=f(e[o],e,c);if("throw"!==s.type){var l=s.arg,d=l.value;return d&&"object"==a(d)&&n.call(d,"__await")?t.resolve(d.__await).then((function(e){r("next",e,i,u)}),(function(e){r("throw",e,i,u)})):t.resolve(d).then((function(e){l.value=e,i(l)}),(function(e){return r("throw",e,i,u)}))}u(s.arg)}var c;o(this,"_invoke",{value:function(e,n){function o(){return new t((function(t,o){r(e,n,t,o)}))}return c=c?c.then(o,o):o()}})}function C(t,r,n){var o=h;return function(a,c){if(o===m)throw new Error("Generator is already running");if(o===b){if("throw"===a)throw c;return{value:e,done:!0}}for(n.method=a,n.arg=c;;){var i=n.delegate;if(i){var u=I(i,n);if(u){if(u===v)continue;return u}}if("next"===n.method)n.sent=n._sent=n.arg;else if("throw"===n.method){if(o===h)throw o=b,n.arg;n.dispatchException(n.arg)}else"return"===n.method&&n.abrupt("return",n.arg);o=m;var s=f(t,r,n);if("normal"===s.type){if(o=n.done?b:y,s.arg===v)continue;return{value:s.arg,done:n.done}}"throw"===s.type&&(o=b,n.method="throw",n.arg=s.arg)}}}function I(t,r){var n=r.method,o=t.iterator[n];if(o===e)return r.delegate=null,"throw"===n&&t.iterator.return&&(r.method="return",r.arg=e,I(t,r),"throw"===r.method)||"return"!==n&&(r.method="throw",r.arg=new TypeError("The iterator does not provide a '"+n+"' method")),v;var a=f(o,t.iterator,r.arg);if("throw"===a.type)return r.method="throw",r.arg=a.arg,r.delegate=null,v;var c=a.arg;return c?c.done?(r[t.resultName]=c.value,r.next=t.nextLoc,"return"!==r.method&&(r.method="next",r.arg=e),r.delegate=null,v):c:(r.method="throw",r.arg=new TypeError("iterator result is not an object"),r.delegate=null,v)}function M(e){var t={tryLoc:e[0]};1 in e&&(t.catchLoc=e[1]),2 in e&&(t.finallyLoc=e[2],t.afterLoc=e[3]),this.tryEntries.push(t)}function L(e){var t=e.completion||{};t.type="normal",delete t.arg,e.completion=t}function P(e){this.tryEntries=[{tryLoc:"root"}],e.forEach(M,this),this.reset(!0)}function N(t){if(t||""===t){var r=t[u];if(r)return r.call(t);if("function"==typeof t.next)return t;if(!isNaN(t.length)){var o=-1,c=function r(){for(;++o<t.length;)if(n.call(t,o))return r.value=t[o],r.done=!1,r;return r.value=e,r.done=!0,r};return c.next=c}}throw new TypeError(a(t)+" is not iterable")}return k.prototype=_,o(j,"constructor",{value:_,configurable:!0}),o(_,"constructor",{value:k,configurable:!0}),k.displayName=d(_,l,"GeneratorFunction"),t.isGeneratorFunction=function(e){var t="function"==typeof e&&e.constructor;return!!t&&(t===k||"GeneratorFunction"===(t.displayName||t.name))},t.mark=function(e){return Object.setPrototypeOf?Object.setPrototypeOf(e,_):(e.__proto__=_,d(e,l,"GeneratorFunction")),e.prototype=Object.create(j),e},t.awrap=function(e){return{__await:e}},O(x.prototype),d(x.prototype,s,(function(){return this})),t.AsyncIterator=x,t.async=function(e,r,n,o,a){void 0===a&&(a=Promise);var c=new x(p(e,r,n,o),a);return t.isGeneratorFunction(r)?c:c.next().then((function(e){return e.done?e.value:c.next()}))},O(j),d(j,l,"Generator"),d(j,u,(function(){return this})),d(j,"toString",(function(){return"[object Generator]"})),t.keys=function(e){var t=Object(e),r=[];for(var n in t)r.push(n);return r.reverse(),function e(){for(;r.length;){var n=r.pop();if(n in t)return e.value=n,e.done=!1,e}return e.done=!0,e}},t.values=N,P.prototype={constructor:P,reset:function(t){if(this.prev=0,this.next=0,this.sent=this._sent=e,this.done=!1,this.delegate=null,this.method="next",this.arg=e,this.tryEntries.forEach(L),!t)for(var r in this)"t"===r.charAt(0)&&n.call(this,r)&&!isNaN(+r.slice(1))&&(this[r]=e)},stop:function(){this.done=!0;var e=this.tryEntries[0].completion;if("throw"===e.type)throw e.arg;return this.rval},dispatchException:function(t){if(this.done)throw t;var r=this;function o(n,o){return i.type="throw",i.arg=t,r.next=n,o&&(r.method="next",r.arg=e),!!o}for(var a=this.tryEntries.length-1;a>=0;--a){var c=this.tryEntries[a],i=c.completion;if("root"===c.tryLoc)return o("end");if(c.tryLoc<=this.prev){var u=n.call(c,"catchLoc"),s=n.call(c,"finallyLoc");if(u&&s){if(this.prev<c.catchLoc)return o(c.catchLoc,!0);if(this.prev<c.finallyLoc)return o(c.finallyLoc)}else if(u){if(this.prev<c.catchLoc)return o(c.catchLoc,!0)}else{if(!s)throw new Error("try statement without catch or finally");if(this.prev<c.finallyLoc)return o(c.finallyLoc)}}}},abrupt:function(e,t){for(var r=this.tryEntries.length-1;r>=0;--r){var o=this.tryEntries[r];if(o.tryLoc<=this.prev&&n.call(o,"finallyLoc")&&this.prev<o.finallyLoc){var a=o;break}}a&&("break"===e||"continue"===e)&&a.tryLoc<=t&&t<=a.finallyLoc&&(a=null);var c=a?a.completion:{};return c.type=e,c.arg=t,a?(this.method="next",this.next=a.finallyLoc,v):this.complete(c)},complete:function(e,t){if("throw"===e.type)throw e.arg;return"break"===e.type||"continue"===e.type?this.next=e.arg:"return"===e.type?(this.rval=this.arg=e.arg,this.method="return",this.next="end"):"normal"===e.type&&t&&(this.next=t),v},finish:function(e){for(var t=this.tryEntries.length-1;t>=0;--t){var r=this.tryEntries[t];if(r.finallyLoc===e)return this.complete(r.completion,r.afterLoc),L(r),v}},catch:function(e){for(var t=this.tryEntries.length-1;t>=0;--t){var r=this.tryEntries[t];if(r.tryLoc===e){var n=r.completion;if("throw"===n.type){var o=n.arg;L(r)}return o}}throw new Error("illegal catch attempt")},delegateYield:function(t,r,n){return this.delegate={iterator:N(t),resultName:r,nextLoc:n},"next"===this.method&&(this.arg=e),v}},t}function i(e,t,r,n,o,a,c){try{var i=e[a](c),u=i.value}catch(e){return void r(e)}i.done?t(u):Promise.resolve(u).then(n,o)}function u(e,t){var r=Object.keys(e);if(Object.getOwnPropertySymbols){var n=Object.getOwnPropertySymbols(e);t&&(n=n.filter((function(t){return Object.getOwnPropertyDescriptor(e,t).enumerable}))),r.push.apply(r,n)}return r}function s(e){for(var t=1;t<arguments.length;t++){var r=null!=arguments[t]?arguments[t]:{};t%2?u(Object(r),!0).forEach((function(t){l(e,t,r[t])})):Object.getOwnPropertyDescriptors?Object.defineProperties(e,Object.getOwnPropertyDescriptors(r)):u(Object(r)).forEach((function(t){Object.defineProperty(e,t,Object.getOwnPropertyDescriptor(r,t))}))}return e}function l(e,t,r){var n;return n=function(e,t){if("object"!=a(e)||!e)return e;var r=e[Symbol.toPrimitive];if(void 0!==r){var n=r.call(e,"string");if("object"!=a(n))return n;throw new TypeError("@@toPrimitive must return a primitive value.")}return String(e)}(t),(t="symbol"==a(n)?n:String(n))in e?Object.defineProperty(e,t,{value:r,enumerable:!0,configurable:!0,writable:!0}):e[t]=r,e}function d(e,t){return function(e){if(Array.isArray(e))return e}(e)||function(e,t){var r=null==e?null:"undefined"!=typeof Symbol&&e[Symbol.iterator]||e["@@iterator"];if(null!=r){var n,o,a,c,i=[],u=!0,s=!1;try{if(a=(r=r.call(e)).next,0===t){if(Object(r)!==r)return;u=!1}else for(;!(u=(n=a.call(r)).done)&&(i.push(n.value),i.length!==t);u=!0);}catch(e){s=!0,o=e}finally{try{if(!u&&null!=r.return&&(c=r.return(),Object(c)!==c))return}finally{if(s)throw o}}return i}}(e,t)||function(e,t){if(e){if("string"==typeof e)return p(e,t);var r=Object.prototype.toString.call(e).slice(8,-1);return"Object"===r&&e.constructor&&(r=e.constructor.name),"Map"===r||"Set"===r?Array.from(e):"Arguments"===r||/^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(r)?p(e,t):void 0}}(e,t)||function(){throw new TypeError("Invalid attempt to destructure non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.")}()}function p(e,t){(null==t||t>e.length)&&(t=e.length);for(var r=0,n=new Array(t);r<t;r++)n[r]=e[r];return n}var f,h,y,m,b=["buckaroo_afterpay","buckaroo_afterpaynew","buckaroo_billink","buckaroo_creditcard","buckaroo_ideal","buckaroo_in3","buckaroo_klarnakp","buckaroo_klarnapay","buckaroo_klarnapii","buckaroo_paybybank","buckaroo_payperemail","buckaroo_sepadirectdebit"],v=["buckaroo_creditcard_amex","buckaroo_creditcard_cartebancaire","buckaroo_creditcard_cartebleuevisa","buckaroo_creditcard_dankort","buckaroo_creditcard_maestro","buckaroo_creditcard_mastercard","buckaroo_creditcard_nexi","buckaroo_creditcard_postepay","buckaroo_creditcard_visa","buckaroo_creditcard_visaelectron","buckaroo_creditcard_vpay"],g=function(o){var a=o.billing,u=o.gateway,p=o.eventRegistration,f=o.emitResponse,h=d((0,e.useState)(""),2),y=h[0],m=h[1],g=d((0,e.useState)(""),2),k=g[0],_=g[1],w=d((0,e.useState)(""),2),S=w[0],E=w[1],j=d((0,e.useState)(""),2),O=j[0],x=j[1],C=d((0,e.useState)(null),2),I=C[0],M=C[1],L=d((0,e.useState)(""),2),P=L[0],N=L[1],D=d((0,e.useState)(""),2),T=D[0],A=D[1],F=d((0,e.useState)(""),2),B=F[0],G=F[1],R=d((0,e.useState)(""),2),U=R[0],$=R[1],Y=d((0,e.useState)(""),2),q=Y[0],V=Y[1],z=d((0,e.useState)(""),2),H=z[0],J=z[1],K=d((0,e.useState)(""),2),Q=K[0],W=K[1],X=d((0,e.useState)(""),2),Z=X[0],ee=X[1],te=d((0,e.useState)(""),2),re=te[0],ne=te[1],oe=d((0,e.useState)(""),2),ae=oe[0],ce=oe[1],ie=d((0,e.useState)(""),2),ue=ie[0],se=ie[1],le=d((0,e.useState)(""),2),de=le[0],pe=le[1],fe=d((0,e.useState)(""),2),he=fe[0],ye=fe[1],me=d((0,e.useState)(null),2),be=me[0],ve=me[1],ge=d((0,e.useState)(""),2),ke=ge[0],_e=ge[1],we=d((0,e.useState)(""),2),Se=we[0],Ee=we[1],je=d((0,e.useState)(""),2),Oe=je[0],xe=je[1],Ce=d((0,e.useState)(""),2),Ie=Ce[0],Me=Ce[1],Le=d((0,e.useState)(""),2),Pe=Le[0],Ne=Le[1],De=d((0,e.useState)(""),2),Te=De[0],Ae=De[1],Fe=u.paymentMethodId.replace(/_/g,"-");if((0,e.useEffect)((function(){var e=p.onCheckoutFail((function(e){return m(e.processingResponse.paymentDetails.errorMessage),{type:f.responseTypes.FAIL,errorMessage:"Error",message:"Error occurred, please try again"}}));return function(){return e()}}),[p,f]),(0,e.useEffect)((function(){var e=p.onPaymentSetup((function(){var e,t={type:f.responseTypes.SUCCESS,meta:{}};return t.meta.paymentMethodData=s(s(l(l(l(l(l({isblocks:"1"},"billing_country",a.billingAddress.country),"".concat(Fe,"-company-coc-registration"),ke),"".concat(Fe,"-company-name"),Pe),"".concat(Fe,"-issuer"),k),"".concat(Fe,"-birthdate"),S),null!==I&&l({},"".concat(Fe,"-accept"),I)),{},(l(l(l(l(l(l(l(l(l(l(e={},"".concat(Fe,"-gender"),O),"".concat(Fe,"-iban"),T),"".concat(Fe,"-accountname"),P),"".concat(Fe,"-bic"),B),"".concat(Fe,"-identification-number"),Ie),"".concat(Fe,"-phone"),H),"".concat(Fe,"-firstname"),q),"".concat(Fe,"-lastname"),U),"".concat(Fe,"-email"),de),"".concat(Fe,"-company-coc-registration"),Se),l(e,"".concat(Fe,"-b2b"),Te?"ON":"OFF"))),"".concat(Fe).includes("buckaroo-creditcard")&&(t.meta.paymentMethodData["".concat(u.paymentMethodId,"-creditcard-issuer")]=he,t.meta.paymentMethodData["".concat(u.paymentMethodId,"-cardname")]=Q,t.meta.paymentMethodData["".concat(u.paymentMethodId,"-cardnumber")]=Z,t.meta.paymentMethodData["".concat(u.paymentMethodId,"-cardmonth")]=re,t.meta.paymentMethodData["".concat(u.paymentMethodId,"-cardyear")]=ae,t.meta.paymentMethodData["".concat(u.paymentMethodId,"-cardcvc")]=ue,t.meta.paymentMethodData["".concat(u.paymentMethodId,"-encrypted-data")]=Oe),t}));return function(){return e()}}),[p,f,k,O,S,u.paymentMethodId]),(0,e.useEffect)((function(){var e=function(){var e,t=(e=c().mark((function e(t){var o,a,i;return c().wrap((function(e){for(;;)switch(e.prev=e.next){case 0:if(e.prev=0,o=r.default,!b.includes(t)){e.next=9;break}return e.next=5,n(8924)("./".concat(t));case 5:a=e.sent,o=a.default,e.next=14;break;case 9:if(!v.includes(t)){e.next=14;break}return e.next=12,n.e(172).then(n.bind(n,7172));case 12:i=e.sent,o=i.default;case 14:ve((function(){return o})),e.next=21;break;case 17:e.prev=17,e.t0=e.catch(0),console.error("Error importing payment method module for ".concat(t,":"),e.t0),m("Error loading payment component for ".concat(t));case 21:case"end":return e.stop()}}),e,null,[[0,17]])})),function(){var t=this,r=arguments;return new Promise((function(n,o){var a=e.apply(t,r);function c(e){i(a,n,o,c,u,"next",e)}function u(e){i(a,n,o,c,u,"throw",e)}c(void 0)}))});return function(e){return t.apply(this,arguments)}}();e(u.paymentMethodId)}),[u.paymentMethodId]),!be)return t().createElement("div",null,"Loading...");var Be={paymentInfo:{paymentName:u.paymentMethodId,idealIssuers:u.idealIssuers,payByBankIssuers:u.payByBankIssuers,payByBankSelectedIssuer:u.payByBankSelectedIssuer},billingData:a.billingAddress,displayMode:u.displayMode,buckarooImagesUrl:u.buckarooImagesUrl,genders:u.genders,creditCardIssuers:u.creditCardIssuers,creditCardIsSecure:u.creditCardIsSecure,creditCardMethod:u.creditCardMethod,b2b:u.b2b,type:u.type,customer_type:u.customer_type},Ge={onSelectCc:ye,onSelectIssuer:_,onSelectGender:x,onBirthdateChange:E,onCheckboxChange:M,onAccountName:N,onIbanChange:A,onBicChange:G,onFirstNameChange:V,onPhoneNumberChange:J,onLastNameChange:$,onCardNameChange:W,onCardNumberChange:ee,onCardMonthChange:ne,onCardYearChange:ce,onCardCVCChange:se,onEmailChange:pe,onCocInput:_e,onCocRegistrationChange:Ee,onEncryptedDataChange:xe,onIdentificationNumber:Me,onCompanyInput:Ne,onAdditionalCheckboxChange:Ae};return t().createElement("div",{className:"container"},t().createElement("span",{className:"description"},u.description),t().createElement("span",{className:"descriptionError"},y),t().createElement(be,{config:Be,callbacks:Ge}))};h=(f=window).wc,y=f.buckaroo_gateways,m=h.wcBlocksRegistry.registerPaymentMethod,y.forEach((function(e){m(function(e,r){return{name:e.paymentMethodId,label:t().createElement(o,{image_path:e.image_path,title:(n=e.title,(new DOMParser).parseFromString(n,"text/html").documentElement.textContent)}),paymentMethodId:e.paymentMethodId,edit:t().createElement("div",null),canMakePayment:function(){return!0},ariaLabel:e.title,content:t().createElement(r,{gateway:e})};var n}(e,g))}))})()})();