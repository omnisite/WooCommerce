"use strict";(self.webpackChunk=self.webpackChunk||[]).push([[308],{9308:(e,t,r)=>{r.r(t),r.d(t,{default:()=>c});var n=r(9196),a=r.n(n),o=r(5493),i=r(1208);function l(e){return l="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(e){return typeof e}:function(e){return e&&"function"==typeof Symbol&&e.constructor===Symbol&&e!==Symbol.prototype?"symbol":typeof e},l(e)}const c=function(e){var t=e.onStateChange,r=e.methodName,n=e.billing;return a().createElement("div",null,"NL"===n.country&&a().createElement(o.Z,{paymentMethod:r,handleChange:function(e){t(function(e,t,r){var n;return n=function(e,t){if("object"!=l(e)||!e)return e;var r=e[Symbol.toPrimitive];if(void 0!==r){var n=r.call(e,"string");if("object"!=l(n))return n;throw new TypeError("@@toPrimitive must return a primitive value.")}return String(e)}(t),(t="symbol"==l(n)?n:String(n))in e?Object.defineProperty(e,t,{value:r,enumerable:!0,configurable:!0,writable:!0}):e[t]=r,e}({},"".concat(r,"-birthdate"),e))}}),a().createElement(i.Z,{paymentMethod:r}))}},1208:(e,t,r)=>{r.d(t,{Z:()=>i});var n=r(9196),a=r.n(n),o=r(5736);const i=function(e){return e.title,a().createElement("div",{style:{display:"block",fontSize:".8rem",clear:"both"}},(0,o.__)("Je moet minimaal 18+ zijn om deze dienst te gebruiken. Als je op tijd betaalt, voorkom je extra kosten en zorg je dat je in de toekomst nogmaals gebruik kunt maken van de diensten van {title}. Door verder te gaan, accepteer je de Algemene Voorwaarden en bevestig je dat je de Privacyverklaring en Cookieverklaring hebt gelezen.","wc-buckaroo-bpe-gateway"))}},5493:(e,t,r)=>{r.d(t,{Z:()=>u});var n=r(9196),a=r.n(n),o=r(9198),i=r.n(o),l=(r(9339),r(5736));function c(e,t){(null==t||t>e.length)&&(t=e.length);for(var r=0,n=new Array(t);r<t;r++)n[r]=e[r];return n}const u=function(e){var t,r,o=e.paymentMethod,u=e.handleBirthDayChange,m=(t=(0,n.useState)(null),r=2,function(e){if(Array.isArray(e))return e}(t)||function(e,t){var r=null==e?null:"undefined"!=typeof Symbol&&e[Symbol.iterator]||e["@@iterator"];if(null!=r){var n,a,o,i,l=[],c=!0,u=!1;try{if(o=(r=r.call(e)).next,0===t){if(Object(r)!==r)return;c=!1}else for(;!(c=(n=o.call(r)).done)&&(l.push(n.value),l.length!==t);c=!0);}catch(e){u=!0,a=e}finally{try{if(!c&&null!=r.return&&(i=r.return(),Object(i)!==i))return}finally{if(u)throw a}}return l}}(t,r)||function(e,t){if(e){if("string"==typeof e)return c(e,t);var r=Object.prototype.toString.call(e).slice(8,-1);return"Object"===r&&e.constructor&&(r=e.constructor.name),"Map"===r||"Set"===r?Array.from(e):"Arguments"===r||/^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(r)?c(e,t):void 0}}(t,r)||function(){throw new TypeError("Invalid attempt to destructure non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.")}()),d=m[0],f=m[1];return a().createElement("div",{className:"form-row form-row-wide validate-required"},a().createElement("label",{htmlFor:"".concat(o,"-birthdate")},(0,l.__)("Birthdate (format DD-MM-YYYY):","wc-buckaroo-bpe-gateway"),a().createElement("span",{className:"required"},"*")),a().createElement(i(),{id:"".concat(o,"-birthdate"),name:"".concat(o,"-birthdate"),selected:d,onChange:function(e){var t=e.toLocaleDateString("en-GB",{day:"2-digit",month:"2-digit",year:"numeric"}).replace(/\//g,"-");f(e),u(t)},dateFormat:"dd-MM-yyyy",className:"input-text",autoComplete:"off",placeholderText:"DD-MM-YYYY",showYearDropdown:!0,scrollableYearDropdown:!0,yearDropdownItemNumber:100,minDate:new Date(1900,0,1),maxDate:new Date,showMonthDropdown:!0}))}}}]);