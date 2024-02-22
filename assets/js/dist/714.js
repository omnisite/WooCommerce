"use strict";(self.webpackChunk=self.webpackChunk||[]).push([[714],{1714:(e,t,r)=>{r.r(t),r.d(t,{default:()=>d});var n=r(1609),a=r.n(n),o=r(1912),c=r(1688),i=r(5591),l=r(7723);const u=function(e){var t=e.handleChange;return a().createElement("span",{id:"showB2BBuckaroo"},a().createElement("p",{className:"form-row form-row-wide validate-required"},(0,l.__)("Fill required fields if bill in on the company:","wc-buckaroo-bpe-gateway")),a().createElement("p",{className:"form-row form-row-wide validate-required"},a().createElement("label",{htmlFor:"buckaroo-afterpay-company-coc-registration"},(0,l.__)("COC (KvK) number:","wc-buckaroo-bpe-gateway"),a().createElement("span",{className:"required"},"*")),a().createElement("input",{id:"buckaroo-afterpay-company-coc-registration",name:"buckaroo-afterpay-company-coc-registration",className:"input-text",type:"text",maxLength:"250",autoComplete:"off",onChange:t})),a().createElement("p",{className:"form-row form-row-wide validate-required"},a().createElement("label",{htmlFor:"buckaroo-afterpay-company-name"},(0,l.__)("Name of the organization:","wc-buckaroo-bpe-gateway"),a().createElement("span",{className:"required"},"*")),a().createElement("input",{id:"buckaroo-afterpay-company-name",name:"buckaroo-afterpay-company-name",className:"input-text",type:"text",maxLength:"250",autoComplete:"off",onChange:t})))};var f=r(404),m=r(6384);function y(e){return y="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(e){return typeof e}:function(e){return e&&"function"==typeof Symbol&&e.constructor===Symbol&&e!==Symbol.prototype?"symbol":typeof e},y(e)}function p(e,t){return function(e){if(Array.isArray(e))return e}(e)||function(e,t){var r=null==e?null:"undefined"!=typeof Symbol&&e[Symbol.iterator]||e["@@iterator"];if(null!=r){var n,a,o,c,i=[],l=!0,u=!1;try{if(o=(r=r.call(e)).next,0===t){if(Object(r)!==r)return;l=!1}else for(;!(l=(n=o.call(r)).done)&&(i.push(n.value),i.length!==t);l=!0);}catch(e){u=!0,a=e}finally{try{if(!l&&null!=r.return&&(c=r.return(),Object(c)!==c))return}finally{if(u)throw a}}return i}}(e,t)||function(e,t){if(e){if("string"==typeof e)return b(e,t);var r=Object.prototype.toString.call(e).slice(8,-1);return"Object"===r&&e.constructor&&(r=e.constructor.name),"Map"===r||"Set"===r?Array.from(e):"Arguments"===r||/^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(r)?b(e,t):void 0}}(e,t)||function(){throw new TypeError("Invalid attempt to destructure non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.")}()}function b(e,t){(null==t||t>e.length)&&(t=e.length);for(var r=0,n=new Array(t);r<t;r++)n[r]=e[r];return n}function s(e,t,r){var n;return n=function(e,t){if("object"!=y(e)||!e)return e;var r=e[Symbol.toPrimitive];if(void 0!==r){var n=r.call(e,"string");if("object"!=y(n))return n;throw new TypeError("@@toPrimitive must return a primitive value.")}return String(e)}(t),(t="symbol"==y(n)?n:String(n))in e?Object.defineProperty(e,t,{value:r,enumerable:!0,configurable:!0,writable:!0}):e[t]=r,e}const d=function(e){var t=e.onStateChange,r=e.methodName,y=e.gateway,b=y.type,d=y.b2b,h=e.billing,v=s(s(s(s(s(s({},"".concat(r,"-phone"),""),"".concat(r,"-birthdate"),""),"".concat(r,"-b2b"),""),"".concat(r,"-company-coc-registration"),""),"".concat(r,"-company-name"),""),"".concat(r,"-accept"),""),g=p((0,m.A)(v,t),3),w=(g[0],g[1]),k=g[2],S=p((0,n.useState)(!1),2),j=S[0],E=S[1];return a().createElement("div",null,a().createElement(f.A,{paymentMethod:r,billingData:h,handlePhoneChange:function(e){k("".concat(r,"-phone"),e)}}),"afterpayacceptgiro"===b&&a().createElement("div",{className:"form-row form-row-wide validate-required"},a().createElement("label",{htmlFor:"buckaroo-afterpay-company-coc-registration"},(0,l.__)("IBAN:","wc-buckaroo-bpe-gateway"),a().createElement("span",{className:"required"},"*")),a().createElement("input",{id:"buckaroo-afterpay-company-coc-registration",name:"buckaroo-afterpay-company-coc-registration",className:"input-text",type:"text",onChange:w})),!j&&a().createElement(o.A,{paymentMethod:r,handleBirthDayChange:function(e){k("".concat(r,"-birthdate"),e)}}),"enable"===d&&"afterpaydigiaccept"===b&&a().createElement("div",null,a().createElement("div",{className:"form-row form-row-wide validate-required"},a().createElement("label",{htmlFor:"buckaroo-afterpay-b2b"},(0,l.__)("Checkout for company","wc-buckaroo-bpe-gateway"),a().createElement("input",{id:"buckaroo-afterpay-b2b",name:"buckaroo-afterpay-b2b",type:"checkbox",onChange:function(e){E(e),k("".concat(r,"-b2b"),e?"ON":"OFF")}}))),j&&a().createElement(u,{handleChange:w})),a().createElement(i.A,{paymentMethod:r,handleTermsChange:function(e){k("".concat(r,"-accept"),e)},billingData:h,b2b:d}),a().createElement(c.A,{paymentMethod:r}))}},6384:(e,t,r)=>{r.d(t,{A:()=>u});var n=r(1609);function a(e){return a="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(e){return typeof e}:function(e){return e&&"function"==typeof Symbol&&e.constructor===Symbol&&e!==Symbol.prototype?"symbol":typeof e},a(e)}function o(e,t){var r=Object.keys(e);if(Object.getOwnPropertySymbols){var n=Object.getOwnPropertySymbols(e);t&&(n=n.filter((function(t){return Object.getOwnPropertyDescriptor(e,t).enumerable}))),r.push.apply(r,n)}return r}function c(e){for(var t=1;t<arguments.length;t++){var r=null!=arguments[t]?arguments[t]:{};t%2?o(Object(r),!0).forEach((function(t){i(e,t,r[t])})):Object.getOwnPropertyDescriptors?Object.defineProperties(e,Object.getOwnPropertyDescriptors(r)):o(Object(r)).forEach((function(t){Object.defineProperty(e,t,Object.getOwnPropertyDescriptor(r,t))}))}return e}function i(e,t,r){var n;return n=function(e,t){if("object"!=a(e)||!e)return e;var r=e[Symbol.toPrimitive];if(void 0!==r){var n=r.call(e,"string");if("object"!=a(n))return n;throw new TypeError("@@toPrimitive must return a primitive value.")}return String(e)}(t),(t="symbol"==a(n)?n:String(n))in e?Object.defineProperty(e,t,{value:r,enumerable:!0,configurable:!0,writable:!0}):e[t]=r,e}function l(e,t){(null==t||t>e.length)&&(t=e.length);for(var r=0,n=new Array(t);r<t;r++)n[r]=e[r];return n}const u=function(e,t){var r,a,o=(r=(0,n.useState)(e),a=2,function(e){if(Array.isArray(e))return e}(r)||function(e,t){var r=null==e?null:"undefined"!=typeof Symbol&&e[Symbol.iterator]||e["@@iterator"];if(null!=r){var n,a,o,c,i=[],l=!0,u=!1;try{if(o=(r=r.call(e)).next,0===t){if(Object(r)!==r)return;l=!1}else for(;!(l=(n=o.call(r)).done)&&(i.push(n.value),i.length!==t);l=!0);}catch(e){u=!0,a=e}finally{try{if(!l&&null!=r.return&&(c=r.return(),Object(c)!==c))return}finally{if(u)throw a}}return i}}(r,a)||function(e,t){if(e){if("string"==typeof e)return l(e,t);var r=Object.prototype.toString.call(e).slice(8,-1);return"Object"===r&&e.constructor&&(r=e.constructor.name),"Map"===r||"Set"===r?Array.from(e):"Arguments"===r||/^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(r)?l(e,t):void 0}}(r,a)||function(){throw new TypeError("Invalid attempt to destructure non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.")}()),u=o[0],f=o[1];return[u,function(e){var r=e.target,n=r.name,a=r.value,o=c(c({},u),{},i({},n,a));f(o),t(o)},function(e,r){var n=c(c({},u),{},i({},e,r));f(n),t(n)}]}},1688:(e,t,r)=>{r.d(t,{A:()=>c});var n=r(1609),a=r.n(n),o=r(7723);const c=function(e){return e.title,a().createElement("div",{style:{display:"block",fontSize:".8rem",clear:"both"}},(0,o.__)("Je moet minimaal 18+ zijn om deze dienst te gebruiken. Als je op tijd betaalt, voorkom je extra kosten en zorg je dat je in de toekomst nogmaals gebruik kunt maken van de diensten van {title}. Door verder te gaan, accepteer je de Algemene Voorwaarden en bevestig je dat je de Privacyverklaring en Cookieverklaring hebt gelezen.","wc-buckaroo-bpe-gateway"))}},1912:(e,t,r)=>{r.d(t,{A:()=>u});var n=r(1609),a=r.n(n),o=r(9386),c=r.n(o),i=(r(596),r(7723));function l(e,t){(null==t||t>e.length)&&(t=e.length);for(var r=0,n=new Array(t);r<t;r++)n[r]=e[r];return n}const u=function(e){var t,r,o=e.paymentMethod,u=e.handleBirthDayChange,f=(t=(0,n.useState)(null),r=2,function(e){if(Array.isArray(e))return e}(t)||function(e,t){var r=null==e?null:"undefined"!=typeof Symbol&&e[Symbol.iterator]||e["@@iterator"];if(null!=r){var n,a,o,c,i=[],l=!0,u=!1;try{if(o=(r=r.call(e)).next,0===t){if(Object(r)!==r)return;l=!1}else for(;!(l=(n=o.call(r)).done)&&(i.push(n.value),i.length!==t);l=!0);}catch(e){u=!0,a=e}finally{try{if(!l&&null!=r.return&&(c=r.return(),Object(c)!==c))return}finally{if(u)throw a}}return i}}(t,r)||function(e,t){if(e){if("string"==typeof e)return l(e,t);var r=Object.prototype.toString.call(e).slice(8,-1);return"Object"===r&&e.constructor&&(r=e.constructor.name),"Map"===r||"Set"===r?Array.from(e):"Arguments"===r||/^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(r)?l(e,t):void 0}}(t,r)||function(){throw new TypeError("Invalid attempt to destructure non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.")}()),m=f[0],y=f[1];return a().createElement("div",{className:"form-row form-row-wide validate-required"},a().createElement("label",{htmlFor:"".concat(o,"-birthdate")},(0,i.__)("Birthdate (format DD-MM-YYYY):","wc-buckaroo-bpe-gateway"),a().createElement("span",{className:"required"},"*")),a().createElement(c(),{id:"".concat(o,"-birthdate"),name:"".concat(o,"-birthdate"),selected:m,onChange:function(e){var t=e.toLocaleDateString("en-GB",{day:"2-digit",month:"2-digit",year:"numeric"}).replace(/\//g,"-");y(e),u(t)},dateFormat:"dd-MM-yyyy",className:"input-text",autoComplete:"off",placeholderText:"DD-MM-YYYY",showYearDropdown:!0,scrollableYearDropdown:!0,yearDropdownItemNumber:100,minDate:new Date(1900,0,1),maxDate:new Date,showMonthDropdown:!0}))}},404:(e,t,r)=>{r.d(t,{A:()=>i});var n=r(1609),a=r.n(n),o=r(7723);function c(e,t){(null==t||t>e.length)&&(t=e.length);for(var r=0,n=new Array(t);r<t;r++)n[r]=e[r];return n}const i=function(e){var t,r,i=e.paymentMethod,l=e.billingData,u=e.handlePhoneChange,f=(t=(0,n.useState)(""),r=2,function(e){if(Array.isArray(e))return e}(t)||function(e,t){var r=null==e?null:"undefined"!=typeof Symbol&&e[Symbol.iterator]||e["@@iterator"];if(null!=r){var n,a,o,c,i=[],l=!0,u=!1;try{if(o=(r=r.call(e)).next,0===t){if(Object(r)!==r)return;l=!1}else for(;!(l=(n=o.call(r)).done)&&(i.push(n.value),i.length!==t);l=!0);}catch(e){u=!0,a=e}finally{try{if(!l&&null!=r.return&&(c=r.return(),Object(c)!==c))return}finally{if(u)throw a}}return i}}(t,r)||function(e,t){if(e){if("string"==typeof e)return c(e,t);var r=Object.prototype.toString.call(e).slice(8,-1);return"Object"===r&&e.constructor&&(r=e.constructor.name),"Map"===r||"Set"===r?Array.from(e):"Arguments"===r||/^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(r)?c(e,t):void 0}}(t,r)||function(){throw new TypeError("Invalid attempt to destructure non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.")}()),m=f[0],y=f[1];return(0,n.useEffect)((function(){l&&l.phone&&(y(l.phone),u(l.phone))}),[l,u]),a().createElement("div",{className:"form-row validate-required"},a().createElement("label",{htmlFor:"".concat(i,"-phone")},(0,o.__)("Phone Number:","wc-buckaroo-bpe-gateway"),a().createElement("span",{className:"required"},"*")),a().createElement("input",{id:"".concat(i,"-phone"),name:"".concat(i,"-phone"),className:"input-text",type:"tel",autoComplete:"off",value:m,onChange:function(e){var t=e.target.value;y(t),u(t)}}))}},5591:(e,t,r)=>{r.d(t,{A:()=>i});var n=r(1609),a=r.n(n),o=r(7723);function c(e,t){(null==t||t>e.length)&&(t=e.length);for(var r=0,n=new Array(t);r<t;r++)n[r]=e[r];return n}const i=function(e){var t,r,i=e.paymentMethod,l=e.b2b,u=e.handleTermsChange,f=e.billingData,m=(t=(0,n.useState)(!1),r=2,function(e){if(Array.isArray(e))return e}(t)||function(e,t){var r=null==e?null:"undefined"!=typeof Symbol&&e[Symbol.iterator]||e["@@iterator"];if(null!=r){var n,a,o,c,i=[],l=!0,u=!1;try{if(o=(r=r.call(e)).next,0===t){if(Object(r)!==r)return;l=!1}else for(;!(l=(n=o.call(r)).done)&&(i.push(n.value),i.length!==t);l=!0);}catch(e){u=!0,a=e}finally{try{if(!l&&null!=r.return&&(c=r.return(),Object(c)!==c))return}finally{if(u)throw a}}return i}}(t,r)||function(e,t){if(e){if("string"==typeof e)return c(e,t);var r=Object.prototype.toString.call(e).slice(8,-1);return"Object"===r&&e.constructor&&(r=e.constructor.name),"Map"===r||"Set"===r?Array.from(e):"Arguments"===r||/^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(r)?c(e,t):void 0}}(t,r)||function(){throw new TypeError("Invalid attempt to destructure non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.")}()),y=m[0],p=m[1],b="buckaroo_afterpaynew"===i?"buckaroo-afterpaynew-accept":"buckaroo_afterpay"===i?"buckaroo-afterpay-accept":i,s=f.country,d=(0,o.__)("Accept Riverty | AfterPay conditions:","wc-buckaroo-bpe-gateway"),h=function(e){var t={DE:"de_de",NL:"nl_nl",BE:"be_nl",AT:"de_at",NO:"no_en",FI:"fi_en",SE:"se_en",CH:"ch_en"}[e]||"nl_en",r=arguments.length>1&&void 0!==arguments[1]&&arguments[1]?"b2b_invoice":"invoice";return"".concat("https://documents.riverty.com/terms_conditions/payment_methods/").concat(r,"/").concat(t,"/")}(s,l);return"buckaroo-billink"===i&&(d=(0,o.__)("Accept terms of use","wc-buckaroo-bpe-gateway"),h="https://www.billink.nl/app/uploads/2021/05/Gebruikersvoorwaarden-Billink_V11052021.pdf"),a().createElement("div",null,a().createElement("a",{href:"".concat(h),target:"_blank"},d),a().createElement("span",{className:"required"},"*"),a().createElement("input",{id:"".concat(b,"-accept"),name:"".concat(b,"-accept"),type:"checkbox",checked:y,onChange:function(){p(!y),u(!y)}}),a().createElement("p",{className:"required",style:{float:"right"}},"* Required"))}}}]);