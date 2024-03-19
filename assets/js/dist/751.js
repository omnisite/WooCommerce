"use strict";(self.webpackChunk=self.webpackChunk||[]).push([[751],{8751:(e,t,r)=>{r.r(t),r.d(t,{default:()=>l});var n=r(1609),o=r.n(n),a=r(7723),c=r(6384);function i(e){return i="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(e){return typeof e}:function(e){return e&&"function"==typeof Symbol&&e.constructor===Symbol&&e!==Symbol.prototype?"symbol":typeof e},i(e)}function u(e,t,r){var n;return n=function(e,t){if("object"!=i(e)||!e)return e;var r=e[Symbol.toPrimitive];if(void 0!==r){var n=r.call(e,"string");if("object"!=i(n))return n;throw new TypeError("@@toPrimitive must return a primitive value.")}return String(e)}(t),(t="symbol"==i(n)?n:String(n))in e?Object.defineProperty(e,t,{value:r,enumerable:!0,configurable:!0,writable:!0}):e[t]=r,e}const l=function(e){var t=e.onStateChange,r=e.methodName,n=e.billing,i=u(u(u({},"".concat(r,"-accountname"),"".concat(n.first_name," ").concat(n.last_name)),"".concat(r,"-iban"),""),"".concat(r,"-bic"),""),l=(0,c.A)(i,t),b=l.formState,m=l.handleChange;return o().createElement("div",null,o().createElement("div",{className:"form-row form-row-wide validate-required"},o().createElement("label",{htmlFor:"buckaroo-sepadirectdebit-accountname"},o().createElement("span",{className:"required"},"*"),(0,a.__)("Bank account holder:","wc-buckaroo-bpe-gateway")),o().createElement("input",{id:"buckaroo-sepadirectdebit-accountname",name:"buckaroo-sepadirectdebit-accountname",className:"input-text",type:"text",maxLength:"250",autoComplete:"off",value:b["".concat(r,"-accountname")],onChange:m})),o().createElement("div",{className:"form-row form-row-wide validate-required"},o().createElement("label",{htmlFor:"buckaroo-sepadirectdebit-iban"},(0,a.__)("IBAN:","wc-buckaroo-bpe-gateway"),o().createElement("span",{className:"required"},"*")),o().createElement("input",{id:"buckaroo-sepadirectdebit-iban",name:"buckaroo-sepadirectdebit-iban",className:"input-text",type:"text",maxLength:"25",autoComplete:"off",value:b["".concat(r,"-iban")],onChange:m})),o().createElement("div",{className:"form-row form-row-wide"},o().createElement("label",{htmlFor:"buckaroo-sepadirectdebit-bic"},(0,a.__)("BIC:","wc-buckaroo-bpe-gateway")),o().createElement("input",{id:"buckaroo-sepadirectdebit-bic",name:"buckaroo-sepadirectdebit-bic",className:"input-text",type:"text",maxLength:"11",autoComplete:"off",value:b["".concat(r,"-bic")],onChange:m})),o().createElement("div",{className:"required",style:{float:"right"}},"*",(0,a.__)("Required","wc-buckaroo-bpe-gateway")),o().createElement("br",null))}},6384:(e,t,r)=>{r.d(t,{A:()=>l});var n=r(1609);function o(e){return o="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(e){return typeof e}:function(e){return e&&"function"==typeof Symbol&&e.constructor===Symbol&&e!==Symbol.prototype?"symbol":typeof e},o(e)}function a(e,t){var r=Object.keys(e);if(Object.getOwnPropertySymbols){var n=Object.getOwnPropertySymbols(e);t&&(n=n.filter((function(t){return Object.getOwnPropertyDescriptor(e,t).enumerable}))),r.push.apply(r,n)}return r}function c(e){for(var t=1;t<arguments.length;t++){var r=null!=arguments[t]?arguments[t]:{};t%2?a(Object(r),!0).forEach((function(t){i(e,t,r[t])})):Object.getOwnPropertyDescriptors?Object.defineProperties(e,Object.getOwnPropertyDescriptors(r)):a(Object(r)).forEach((function(t){Object.defineProperty(e,t,Object.getOwnPropertyDescriptor(r,t))}))}return e}function i(e,t,r){var n;return n=function(e,t){if("object"!=o(e)||!e)return e;var r=e[Symbol.toPrimitive];if(void 0!==r){var n=r.call(e,"string");if("object"!=o(n))return n;throw new TypeError("@@toPrimitive must return a primitive value.")}return String(e)}(t),(t="symbol"==o(n)?n:String(n))in e?Object.defineProperty(e,t,{value:r,enumerable:!0,configurable:!0,writable:!0}):e[t]=r,e}function u(e,t){(null==t||t>e.length)&&(t=e.length);for(var r=0,n=new Array(t);r<t;r++)n[r]=e[r];return n}const l=function(e,t){var r,o,a=(r=(0,n.useState)(e),o=2,function(e){if(Array.isArray(e))return e}(r)||function(e,t){var r=null==e?null:"undefined"!=typeof Symbol&&e[Symbol.iterator]||e["@@iterator"];if(null!=r){var n,o,a,c,i=[],u=!0,l=!1;try{if(a=(r=r.call(e)).next,0===t){if(Object(r)!==r)return;u=!1}else for(;!(u=(n=a.call(r)).done)&&(i.push(n.value),i.length!==t);u=!0);}catch(e){l=!0,o=e}finally{try{if(!u&&null!=r.return&&(c=r.return(),Object(c)!==c))return}finally{if(l)throw o}}return i}}(r,o)||function(e,t){if(e){if("string"==typeof e)return u(e,t);var r=Object.prototype.toString.call(e).slice(8,-1);return"Object"===r&&e.constructor&&(r=e.constructor.name),"Map"===r||"Set"===r?Array.from(e):"Arguments"===r||/^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(r)?u(e,t):void 0}}(r,o)||function(){throw new TypeError("Invalid attempt to destructure non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.")}()),l=a[0],b=a[1];return{formState:l,handleChange:function(e){var r=e.target,n=r.name,o=r.value,a=c(c({},l),{},i({},n,o));b(a),t(a)},updateFormState:function(e,r){var n=c(c({},l),{},i({},e,r));b(n),t(n)}}}}}]);