"use strict";(self.webpackChunk=self.webpackChunk||[]).push([[560],{7560:(e,t,r)=>{r.r(t),r.d(t,{default:()=>i});var n=r(9196),a=r.n(n),o=r(8446),l=r(1208);function c(e,t){(null==t||t>e.length)&&(t=e.length);for(var r=0,n=new Array(t);r<t;r++)n[r]=e[r];return n}const i=function(e){e.paymentName;var t,r,i=e.genders,u=e.onSelectGender,m=(t=(0,n.useState)(null),r=2,function(e){if(Array.isArray(e))return e}(t)||function(e,t){var r=null==e?null:"undefined"!=typeof Symbol&&e[Symbol.iterator]||e["@@iterator"];if(null!=r){var n,a,o,l,c=[],i=!0,u=!1;try{if(o=(r=r.call(e)).next,0===t){if(Object(r)!==r)return;i=!1}else for(;!(i=(n=o.call(r)).done)&&(c.push(n.value),c.length!==t);i=!0);}catch(e){u=!0,a=e}finally{try{if(!i&&null!=r.return&&(l=r.return(),Object(l)!==l))return}finally{if(u)throw a}}return c}}(t,r)||function(e,t){if(e){if("string"==typeof e)return c(e,t);var r=Object.prototype.toString.call(e).slice(8,-1);return"Object"===r&&e.constructor&&(r=e.constructor.name),"Map"===r||"Set"===r?Array.from(e):"Arguments"===r||/^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(r)?c(e,t):void 0}}(t,r)||function(){throw new TypeError("Invalid attempt to destructure non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.")}()),s=(m[0],m[1]);return a().createElement("div",{id:"buckaroo_klarnapay"},a().createElement(o.Z,{paymentMethod:"buckaroo-klarnapii",genders:i,onSelectGender:function(e){s(e),u(e)}}),a().createElement(l.Z,null))}},1208:(e,t,r)=>{r.d(t,{Z:()=>o});var n=r(9196),a=r.n(n);const o=function(e){var t=e.title;return a().createElement("div",{style:{display:"block",fontSize:".8rem",clear:"both"}},"Je moet minimaal 18+ zijn om deze dienst te gebruiken. Als je op tijd betaalt, voorkom je extra kosten en zorg je dat je in de toekomst nogmaals gebruik kunt maken van de diensten van ",t,". Door verder te gaan, accepteer je de Algemene Voorwaarden en bevestig je dat je de Privacyverklaring en Cookieverklaring hebt gelezen.")}},8446:(e,t,r)=>{r.d(t,{Z:()=>l});var n=r(9196),a=r.n(n);function o(e,t){(null==t||t>e.length)&&(t=e.length);for(var r=0,n=new Array(t);r<t;r++)n[r]=e[r];return n}const l=function(e){var t,r=e.paymentMethod,n=e.genders,l=e.onSelectGender;return t=Object.entries(n[r]).map((function(e){var t,r,n=(r=2,function(e){if(Array.isArray(e))return e}(t=e)||function(e,t){var r=null==e?null:"undefined"!=typeof Symbol&&e[Symbol.iterator]||e["@@iterator"];if(null!=r){var n,a,o,l,c=[],i=!0,u=!1;try{if(o=(r=r.call(e)).next,0===t){if(Object(r)!==r)return;i=!1}else for(;!(i=(n=o.call(r)).done)&&(c.push(n.value),c.length!==t);i=!0);}catch(e){u=!0,a=e}finally{try{if(!i&&null!=r.return&&(l=r.return(),Object(l)!==l))return}finally{if(u)throw a}}return c}}(t,r)||function(e,t){if(e){if("string"==typeof e)return o(e,t);var r=Object.prototype.toString.call(e).slice(8,-1);return"Object"===r&&e.constructor&&(r=e.constructor.name),"Map"===r||"Set"===r?Array.from(e):"Arguments"===r||/^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(r)?o(e,t):void 0}}(t,r)||function(){throw new TypeError("Invalid attempt to destructure non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.")}()),l=n[0],c=n[1];return a().createElement("option",{value:c},function(e){return{male:"He/him",female:"She/her",they:"They/them",unknown:"I prefer not to say"}[e]||e}(l))})),a().createElement("div",{className:"payment_box payment_method_".concat(r)},a().createElement("div",{className:"form-row form-row-wide"},a().createElement("label",{htmlFor:"".concat(r,"-gender")},"Gender: ",a().createElement("span",{className:"required"},"*")),a().createElement("select",{className:"buckaroo-custom-select",name:"buckaroo-".concat(r),id:"buckaroo-".concat(r),onChange:function(e){return l(e.target.value)}},a().createElement("option",null,"Select your Gender"),t)))}}}]);