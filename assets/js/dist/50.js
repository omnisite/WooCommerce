"use strict";(self.webpackChunk=self.webpackChunk||[]).push([[50],{50:(e,t,r)=>{r.r(t),r.d(t,{default:()=>y});var n=r(9196),a=r.n(n),o=r(5493),c=r(8446),i=r(1208),l=r(1818),u=r(1488);function f(e){return f="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(e){return typeof e}:function(e){return e&&"function"==typeof Symbol&&e.constructor===Symbol&&e!==Symbol.prototype?"symbol":typeof e},f(e)}function m(e,t,r){var n;return n=function(e,t){if("object"!=f(e)||!e)return e;var r=e[Symbol.toPrimitive];if(void 0!==r){var n=r.call(e,"string");if("object"!=f(n))return n;throw new TypeError("@@toPrimitive must return a primitive value.")}return String(e)}(t),(t="symbol"==f(n)?n:String(n))in e?Object.defineProperty(e,t,{value:r,enumerable:!0,configurable:!0,writable:!0}):e[t]=r,e}const y=function(e){var t=e.onStateChange,r=e.methodName,n=e.gateway,f=n.genders,y=n.b2b,b=e.billing,s=m(m(m({},"".concat(r,"-gender"),""),"".concat(r,"-birthdate"),""),"".concat(r,"-b2b"),""),d=(0,u.Z)(s,t),p=d.handleChange,h=d.updateFormState;return a().createElement("div",{id:"buckaroo_billink_b2c"},a().createElement(c.Z,{paymentMethod:r,genders:f,handleChange:p}),a().createElement(o.Z,{paymentMethod:r,handleBirthDayChange:function(e){h("".concat(r,"-birthdate"),e)}}),a().createElement(l.Z,{paymentMethod:r,handleTermsChange:function(e){h("".concat(r,"-accept"),e)},billingData:b,b2b:y}),a().createElement(i.Z,{paymentMethod:r}))}},1488:(e,t,r)=>{r.d(t,{Z:()=>u});var n=r(9196);function a(e){return a="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(e){return typeof e}:function(e){return e&&"function"==typeof Symbol&&e.constructor===Symbol&&e!==Symbol.prototype?"symbol":typeof e},a(e)}function o(e,t){var r=Object.keys(e);if(Object.getOwnPropertySymbols){var n=Object.getOwnPropertySymbols(e);t&&(n=n.filter((function(t){return Object.getOwnPropertyDescriptor(e,t).enumerable}))),r.push.apply(r,n)}return r}function c(e){for(var t=1;t<arguments.length;t++){var r=null!=arguments[t]?arguments[t]:{};t%2?o(Object(r),!0).forEach((function(t){i(e,t,r[t])})):Object.getOwnPropertyDescriptors?Object.defineProperties(e,Object.getOwnPropertyDescriptors(r)):o(Object(r)).forEach((function(t){Object.defineProperty(e,t,Object.getOwnPropertyDescriptor(r,t))}))}return e}function i(e,t,r){var n;return n=function(e,t){if("object"!=a(e)||!e)return e;var r=e[Symbol.toPrimitive];if(void 0!==r){var n=r.call(e,"string");if("object"!=a(n))return n;throw new TypeError("@@toPrimitive must return a primitive value.")}return String(e)}(t),(t="symbol"==a(n)?n:String(n))in e?Object.defineProperty(e,t,{value:r,enumerable:!0,configurable:!0,writable:!0}):e[t]=r,e}function l(e,t){(null==t||t>e.length)&&(t=e.length);for(var r=0,n=new Array(t);r<t;r++)n[r]=e[r];return n}const u=function(e,t){var r,a,o=(r=(0,n.useState)(e),a=2,function(e){if(Array.isArray(e))return e}(r)||function(e,t){var r=null==e?null:"undefined"!=typeof Symbol&&e[Symbol.iterator]||e["@@iterator"];if(null!=r){var n,a,o,c,i=[],l=!0,u=!1;try{if(o=(r=r.call(e)).next,0===t){if(Object(r)!==r)return;l=!1}else for(;!(l=(n=o.call(r)).done)&&(i.push(n.value),i.length!==t);l=!0);}catch(e){u=!0,a=e}finally{try{if(!l&&null!=r.return&&(c=r.return(),Object(c)!==c))return}finally{if(u)throw a}}return i}}(r,a)||function(e,t){if(e){if("string"==typeof e)return l(e,t);var r=Object.prototype.toString.call(e).slice(8,-1);return"Object"===r&&e.constructor&&(r=e.constructor.name),"Map"===r||"Set"===r?Array.from(e):"Arguments"===r||/^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(r)?l(e,t):void 0}}(r,a)||function(){throw new TypeError("Invalid attempt to destructure non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.")}()),u=o[0],f=o[1];return{formState:u,handleChange:function(e){var r=e.target,n=r.name,a=r.value,o=c(c({},u),{},i({},n,a));f(o),t(o)},updateFormState:function(e,r){var n=c(c({},u),{},i({},e,r));f(n),t(n)}}}},1208:(e,t,r)=>{r.d(t,{Z:()=>c});var n=r(9196),a=r.n(n),o=r(5736);const c=function(e){return e.title,a().createElement("div",{style:{display:"block",fontSize:".8rem",clear:"both"}},(0,o.__)("Je moet minimaal 18+ zijn om deze dienst te gebruiken. Als je op tijd betaalt, voorkom je extra kosten en zorg je dat je in de toekomst nogmaals gebruik kunt maken van de diensten van {title}. Door verder te gaan, accepteer je de Algemene Voorwaarden en bevestig je dat je de Privacyverklaring en Cookieverklaring hebt gelezen.","wc-buckaroo-bpe-gateway"))}},8446:(e,t,r)=>{r.d(t,{Z:()=>i});var n=r(9196),a=r.n(n),o=r(5736);function c(e,t){(null==t||t>e.length)&&(t=e.length);for(var r=0,n=new Array(t);r<t;r++)n[r]=e[r];return n}const i=function(e){var t,r=e.paymentMethod,n=e.genders,i=e.handleChange;return t=Object.entries(n[r]).map((function(e){var t,r,n=(r=2,function(e){if(Array.isArray(e))return e}(t=e)||function(e,t){var r=null==e?null:"undefined"!=typeof Symbol&&e[Symbol.iterator]||e["@@iterator"];if(null!=r){var n,a,o,c,i=[],l=!0,u=!1;try{if(o=(r=r.call(e)).next,0===t){if(Object(r)!==r)return;l=!1}else for(;!(l=(n=o.call(r)).done)&&(i.push(n.value),i.length!==t);l=!0);}catch(e){u=!0,a=e}finally{try{if(!l&&null!=r.return&&(c=r.return(),Object(c)!==c))return}finally{if(u)throw a}}return i}}(t,r)||function(e,t){if(e){if("string"==typeof e)return c(e,t);var r=Object.prototype.toString.call(e).slice(8,-1);return"Object"===r&&e.constructor&&(r=e.constructor.name),"Map"===r||"Set"===r?Array.from(e):"Arguments"===r||/^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(r)?c(e,t):void 0}}(t,r)||function(){throw new TypeError("Invalid attempt to destructure non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.")}()),i=n[0],l=n[1];return a().createElement("option",{value:l},function(e){var t,r={male:(0,o.__)("He/him","wc-buckaroo-bpe-gateway"),female:(0,o.__)("She/her","wc-buckaroo-bpe-gateway"),they:(0,o.__)("They/them","wc-buckaroo-bpe-gateway"),unknown:(0,o.__)("I prefer not to say","wc-buckaroo-bpe-gateway")};return r[e]?r[e]:(t=e).charAt(0).toUpperCase()+t.slice(1)}(i))})),a().createElement("div",{className:"payment_box payment_method_".concat(r)},a().createElement("div",{className:"form-row form-row-wide"},a().createElement("label",{htmlFor:"".concat(r,"-gender")},(0,o.__)("Gender:","wc-buckaroo-bpe-gateway"),a().createElement("span",{className:"required"},"*")),a().createElement("select",{className:"buckaroo-custom-select",name:"".concat(r,"-gender"),id:"".concat(r,"-gender"),onChange:i},a().createElement("option",null,(0,o.__)("Select your Gender","wc-buckaroo-bpe-gateway")),t)))}},5493:(e,t,r)=>{r.d(t,{Z:()=>u});var n=r(9196),a=r.n(n),o=r(9198),c=r.n(o),i=(r(9339),r(5736));function l(e,t){(null==t||t>e.length)&&(t=e.length);for(var r=0,n=new Array(t);r<t;r++)n[r]=e[r];return n}const u=function(e){var t,r,o=e.paymentMethod,u=e.handleBirthDayChange,f=(t=(0,n.useState)(null),r=2,function(e){if(Array.isArray(e))return e}(t)||function(e,t){var r=null==e?null:"undefined"!=typeof Symbol&&e[Symbol.iterator]||e["@@iterator"];if(null!=r){var n,a,o,c,i=[],l=!0,u=!1;try{if(o=(r=r.call(e)).next,0===t){if(Object(r)!==r)return;l=!1}else for(;!(l=(n=o.call(r)).done)&&(i.push(n.value),i.length!==t);l=!0);}catch(e){u=!0,a=e}finally{try{if(!l&&null!=r.return&&(c=r.return(),Object(c)!==c))return}finally{if(u)throw a}}return i}}(t,r)||function(e,t){if(e){if("string"==typeof e)return l(e,t);var r=Object.prototype.toString.call(e).slice(8,-1);return"Object"===r&&e.constructor&&(r=e.constructor.name),"Map"===r||"Set"===r?Array.from(e):"Arguments"===r||/^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(r)?l(e,t):void 0}}(t,r)||function(){throw new TypeError("Invalid attempt to destructure non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.")}()),m=f[0],y=f[1];return a().createElement("div",{className:"form-row form-row-wide validate-required"},a().createElement("label",{htmlFor:"".concat(o,"-birthdate")},(0,i.__)("Birthdate (format DD-MM-YYYY):","wc-buckaroo-bpe-gateway"),a().createElement("span",{className:"required"},"*")),a().createElement(c(),{id:"".concat(o,"-birthdate"),name:"".concat(o,"-birthdate"),selected:m,onChange:function(e){var t=e.toLocaleDateString("en-GB",{day:"2-digit",month:"2-digit",year:"numeric"}).replace(/\//g,"-");y(e),u(t)},dateFormat:"dd-MM-yyyy",className:"input-text",autoComplete:"off",placeholderText:"DD-MM-YYYY",showYearDropdown:!0,scrollableYearDropdown:!0,yearDropdownItemNumber:100,minDate:new Date(1900,0,1),maxDate:new Date,showMonthDropdown:!0}))}},1818:(e,t,r)=>{r.d(t,{Z:()=>i});var n=r(9196),a=r.n(n),o=r(5736);function c(e,t){(null==t||t>e.length)&&(t=e.length);for(var r=0,n=new Array(t);r<t;r++)n[r]=e[r];return n}const i=function(e){var t,r,i=e.paymentMethod,l=e.b2b,u=e.handleTermsChange,f=e.billingData,m=(t=(0,n.useState)(!1),r=2,function(e){if(Array.isArray(e))return e}(t)||function(e,t){var r=null==e?null:"undefined"!=typeof Symbol&&e[Symbol.iterator]||e["@@iterator"];if(null!=r){var n,a,o,c,i=[],l=!0,u=!1;try{if(o=(r=r.call(e)).next,0===t){if(Object(r)!==r)return;l=!1}else for(;!(l=(n=o.call(r)).done)&&(i.push(n.value),i.length!==t);l=!0);}catch(e){u=!0,a=e}finally{try{if(!l&&null!=r.return&&(c=r.return(),Object(c)!==c))return}finally{if(u)throw a}}return i}}(t,r)||function(e,t){if(e){if("string"==typeof e)return c(e,t);var r=Object.prototype.toString.call(e).slice(8,-1);return"Object"===r&&e.constructor&&(r=e.constructor.name),"Map"===r||"Set"===r?Array.from(e):"Arguments"===r||/^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(r)?c(e,t):void 0}}(t,r)||function(){throw new TypeError("Invalid attempt to destructure non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.")}()),y=m[0],b=m[1],s="buckaroo_afterpaynew"===i?"buckaroo-afterpaynew-accept":"buckaroo_afterpay"===i?"buckaroo-afterpay-accept":i,d=f.country,p=(0,o.__)("Accept Riverty | AfterPay conditions:","wc-buckaroo-bpe-gateway"),h=function(e){var t={DE:"de_de",NL:"nl_nl",BE:"be_nl",AT:"de_at",NO:"no_en",FI:"fi_en",SE:"se_en",CH:"ch_en"}[e]||"nl_en",r=arguments.length>1&&void 0!==arguments[1]&&arguments[1]?"b2b_invoice":"invoice";return"".concat("https://documents.riverty.com/terms_conditions/payment_methods/").concat(r,"/").concat(t,"/")}(d,l);return"buckaroo-billink"===i&&(p=(0,o.__)("Accept terms of use","wc-buckaroo-bpe-gateway"),h="https://www.billink.nl/app/uploads/2021/05/Gebruikersvoorwaarden-Billink_V11052021.pdf"),a().createElement("div",null,a().createElement("a",{href:"".concat(h),target:"_blank"},p),a().createElement("span",{className:"required"},"*"),a().createElement("input",{id:"".concat(s,"-accept"),name:"".concat(s,"-accept"),type:"checkbox",checked:y,onChange:function(){b(!y),u(!y)}}),a().createElement("p",{className:"required",style:{float:"right"}},"* Required"))}}}]);