(function(y,j){typeof exports=="object"&&typeof module<"u"?j(exports,require("react")):typeof define=="function"&&define.amd?define(["exports","react"],j):(y=typeof globalThis<"u"?globalThis:y||self,j(y["mary-ui"]={},y.React))})(this,function(y,j){"use strict";var H={exports:{}},D={};/**
 * @license React
 * react-jsx-runtime.production.min.js
 *
 * Copyright (c) Facebook, Inc. and its affiliates.
 *
 * This source code is licensed under the MIT license found in the
 * LICENSE file in the root directory of this source tree.
 */var re;function Ce(){if(re)return D;re=1;var g=j,p=Symbol.for("react.element"),x=Symbol.for("react.fragment"),b=Object.prototype.hasOwnProperty,k=g.__SECRET_INTERNALS_DO_NOT_USE_OR_YOU_WILL_BE_FIRED.ReactCurrentOwner,C={key:!0,ref:!0,__self:!0,__source:!0};function V(w,f,O){var h,R={},T=null,L=null;O!==void 0&&(T=""+O),f.key!==void 0&&(T=""+f.key),f.ref!==void 0&&(L=f.ref);for(h in f)b.call(f,h)&&!C.hasOwnProperty(h)&&(R[h]=f[h]);if(w&&w.defaultProps)for(h in f=w.defaultProps,f)R[h]===void 0&&(R[h]=f[h]);return{$$typeof:p,type:w,key:T,ref:L,props:R,_owner:k.current}}return D.Fragment=x,D.jsx=V,D.jsxs=V,D}var I={};/**
 * @license React
 * react-jsx-runtime.development.js
 *
 * Copyright (c) Facebook, Inc. and its affiliates.
 *
 * This source code is licensed under the MIT license found in the
 * LICENSE file in the root directory of this source tree.
 */var te;function Oe(){return te||(te=1,process.env.NODE_ENV!=="production"&&function(){var g=j,p=Symbol.for("react.element"),x=Symbol.for("react.portal"),b=Symbol.for("react.fragment"),k=Symbol.for("react.strict_mode"),C=Symbol.for("react.profiler"),V=Symbol.for("react.provider"),w=Symbol.for("react.context"),f=Symbol.for("react.forward_ref"),O=Symbol.for("react.suspense"),h=Symbol.for("react.suspense_list"),R=Symbol.for("react.memo"),T=Symbol.for("react.lazy"),L=Symbol.for("react.offscreen"),ae=Symbol.iterator,Fe="@@iterator";function Ae(e){if(e===null||typeof e!="object")return null;var r=ae&&e[ae]||e[Fe];return typeof r=="function"?r:null}var P=g.__SECRET_INTERNALS_DO_NOT_USE_OR_YOU_WILL_BE_FIRED;function d(e){{for(var r=arguments.length,t=new Array(r>1?r-1:0),n=1;n<r;n++)t[n-1]=arguments[n];De("error",e,t)}}function De(e,r,t){{var n=P.ReactDebugCurrentFrame,s=n.getStackAddendum();s!==""&&(r+="%s",t=t.concat([s]));var u=t.map(function(i){return String(i)});u.unshift("Warning: "+r),Function.prototype.apply.call(console[e],console,u)}}var Ie=!1,Ve=!1,We=!1,Ne=!1,Ye=!1,oe;oe=Symbol.for("react.module.reference");function Le(e){return!!(typeof e=="string"||typeof e=="function"||e===b||e===C||Ye||e===k||e===O||e===h||Ne||e===L||Ie||Ve||We||typeof e=="object"&&e!==null&&(e.$$typeof===T||e.$$typeof===R||e.$$typeof===V||e.$$typeof===w||e.$$typeof===f||e.$$typeof===oe||e.getModuleId!==void 0))}function Me(e,r,t){var n=e.displayName;if(n)return n;var s=r.displayName||r.name||"";return s!==""?t+"("+s+")":t}function ie(e){return e.displayName||"Context"}function E(e){if(e==null)return null;if(typeof e.tag=="number"&&d("Received an unexpected object in getComponentNameFromType(). This is likely a bug in React. Please file an issue."),typeof e=="function")return e.displayName||e.name||null;if(typeof e=="string")return e;switch(e){case b:return"Fragment";case x:return"Portal";case C:return"Profiler";case k:return"StrictMode";case O:return"Suspense";case h:return"SuspenseList"}if(typeof e=="object")switch(e.$$typeof){case w:var r=e;return ie(r)+".Consumer";case V:var t=e;return ie(t._context)+".Provider";case f:return Me(e,e.render,"ForwardRef");case R:var n=e.displayName||null;return n!==null?n:E(e.type)||"Memo";case T:{var s=e,u=s._payload,i=s._init;try{return E(i(u))}catch{return null}}}return null}var S=Object.assign,W=0,se,ue,le,ce,fe,de,ve;function pe(){}pe.__reactDisabledLog=!0;function $e(){{if(W===0){se=console.log,ue=console.info,le=console.warn,ce=console.error,fe=console.group,de=console.groupCollapsed,ve=console.groupEnd;var e={configurable:!0,enumerable:!0,value:pe,writable:!0};Object.defineProperties(console,{info:e,log:e,warn:e,error:e,group:e,groupCollapsed:e,groupEnd:e})}W++}}function Ue(){{if(W--,W===0){var e={configurable:!0,enumerable:!0,writable:!0};Object.defineProperties(console,{log:S({},e,{value:se}),info:S({},e,{value:ue}),warn:S({},e,{value:le}),error:S({},e,{value:ce}),group:S({},e,{value:fe}),groupCollapsed:S({},e,{value:de}),groupEnd:S({},e,{value:ve})})}W<0&&d("disabledDepth fell below zero. This is a bug in React. Please file an issue.")}}var J=P.ReactCurrentDispatcher,G;function M(e,r,t){{if(G===void 0)try{throw Error()}catch(s){var n=s.stack.trim().match(/\n( *(at )?)/);G=n&&n[1]||""}return`
`+G+e}}var q=!1,$;{var ze=typeof WeakMap=="function"?WeakMap:Map;$=new ze}function he(e,r){if(!e||q)return"";{var t=$.get(e);if(t!==void 0)return t}var n;q=!0;var s=Error.prepareStackTrace;Error.prepareStackTrace=void 0;var u;u=J.current,J.current=null,$e();try{if(r){var i=function(){throw Error()};if(Object.defineProperty(i.prototype,"props",{set:function(){throw Error()}}),typeof Reflect=="object"&&Reflect.construct){try{Reflect.construct(i,[])}catch(_){n=_}Reflect.construct(e,[],i)}else{try{i.call()}catch(_){n=_}e.call(i.prototype)}}else{try{throw Error()}catch(_){n=_}e()}}catch(_){if(_&&n&&typeof _.stack=="string"){for(var o=_.stack.split(`
`),v=n.stack.split(`
`),l=o.length-1,c=v.length-1;l>=1&&c>=0&&o[l]!==v[c];)c--;for(;l>=1&&c>=0;l--,c--)if(o[l]!==v[c]){if(l!==1||c!==1)do if(l--,c--,c<0||o[l]!==v[c]){var m=`
`+o[l].replace(" at new "," at ");return e.displayName&&m.includes("<anonymous>")&&(m=m.replace("<anonymous>",e.displayName)),typeof e=="function"&&$.set(e,m),m}while(l>=1&&c>=0);break}}}finally{q=!1,J.current=u,Ue(),Error.prepareStackTrace=s}var A=e?e.displayName||e.name:"",ke=A?M(A):"";return typeof e=="function"&&$.set(e,ke),ke}function Be(e,r,t){return he(e,!1)}function He(e){var r=e.prototype;return!!(r&&r.isReactComponent)}function U(e,r,t){if(e==null)return"";if(typeof e=="function")return he(e,He(e));if(typeof e=="string")return M(e);switch(e){case O:return M("Suspense");case h:return M("SuspenseList")}if(typeof e=="object")switch(e.$$typeof){case f:return Be(e.render);case R:return U(e.type,r,t);case T:{var n=e,s=n._payload,u=n._init;try{return U(u(s),r,t)}catch{}}}return""}var z=Object.prototype.hasOwnProperty,me={},ge=P.ReactDebugCurrentFrame;function B(e){if(e){var r=e._owner,t=U(e.type,e._source,r?r.type:null);ge.setExtraStackFrame(t)}else ge.setExtraStackFrame(null)}function Je(e,r,t,n,s){{var u=Function.call.bind(z);for(var i in e)if(u(e,i)){var o=void 0;try{if(typeof e[i]!="function"){var v=Error((n||"React class")+": "+t+" type `"+i+"` is invalid; it must be a function, usually from the `prop-types` package, but received `"+typeof e[i]+"`.This often happens because of typos such as `PropTypes.function` instead of `PropTypes.func`.");throw v.name="Invariant Violation",v}o=e[i](r,i,n,t,null,"SECRET_DO_NOT_PASS_THIS_OR_YOU_WILL_BE_FIRED")}catch(l){o=l}o&&!(o instanceof Error)&&(B(s),d("%s: type specification of %s `%s` is invalid; the type checker function must return `null` or an `Error` but returned a %s. You may have forgotten to pass an argument to the type checker creator (arrayOf, instanceOf, objectOf, oneOf, oneOfType, and shape all require an argument).",n||"React class",t,i,typeof o),B(null)),o instanceof Error&&!(o.message in me)&&(me[o.message]=!0,B(s),d("Failed %s type: %s",t,o.message),B(null))}}}var Ge=Array.isArray;function K(e){return Ge(e)}function qe(e){{var r=typeof Symbol=="function"&&Symbol.toStringTag,t=r&&e[Symbol.toStringTag]||e.constructor.name||"Object";return t}}function Ke(e){try{return be(e),!1}catch{return!0}}function be(e){return""+e}function ye(e){if(Ke(e))return d("The provided key is an unsupported type %s. This value must be coerced to a string before before using it here.",qe(e)),be(e)}var N=P.ReactCurrentOwner,Xe={key:!0,ref:!0,__self:!0,__source:!0},Re,Ee,X;X={};function Ze(e){if(z.call(e,"ref")){var r=Object.getOwnPropertyDescriptor(e,"ref").get;if(r&&r.isReactWarning)return!1}return e.ref!==void 0}function Qe(e){if(z.call(e,"key")){var r=Object.getOwnPropertyDescriptor(e,"key").get;if(r&&r.isReactWarning)return!1}return e.key!==void 0}function er(e,r){if(typeof e.ref=="string"&&N.current&&r&&N.current.stateNode!==r){var t=E(N.current.type);X[t]||(d('Component "%s" contains the string ref "%s". Support for string refs will be removed in a future major release. This case cannot be automatically converted to an arrow function. We ask you to manually fix this case by using useRef() or createRef() instead. Learn more about using refs safely here: https://reactjs.org/link/strict-mode-string-ref',E(N.current.type),e.ref),X[t]=!0)}}function rr(e,r){{var t=function(){Re||(Re=!0,d("%s: `key` is not a prop. Trying to access it will result in `undefined` being returned. If you need to access the same value within the child component, you should pass it as a different prop. (https://reactjs.org/link/special-props)",r))};t.isReactWarning=!0,Object.defineProperty(e,"key",{get:t,configurable:!0})}}function tr(e,r){{var t=function(){Ee||(Ee=!0,d("%s: `ref` is not a prop. Trying to access it will result in `undefined` being returned. If you need to access the same value within the child component, you should pass it as a different prop. (https://reactjs.org/link/special-props)",r))};t.isReactWarning=!0,Object.defineProperty(e,"ref",{get:t,configurable:!0})}}var nr=function(e,r,t,n,s,u,i){var o={$$typeof:p,type:e,key:r,ref:t,props:i,_owner:u};return o._store={},Object.defineProperty(o._store,"validated",{configurable:!1,enumerable:!1,writable:!0,value:!1}),Object.defineProperty(o,"_self",{configurable:!1,enumerable:!1,writable:!1,value:n}),Object.defineProperty(o,"_source",{configurable:!1,enumerable:!1,writable:!1,value:s}),Object.freeze&&(Object.freeze(o.props),Object.freeze(o)),o};function ar(e,r,t,n,s){{var u,i={},o=null,v=null;t!==void 0&&(ye(t),o=""+t),Qe(r)&&(ye(r.key),o=""+r.key),Ze(r)&&(v=r.ref,er(r,s));for(u in r)z.call(r,u)&&!Xe.hasOwnProperty(u)&&(i[u]=r[u]);if(e&&e.defaultProps){var l=e.defaultProps;for(u in l)i[u]===void 0&&(i[u]=l[u])}if(o||v){var c=typeof e=="function"?e.displayName||e.name||"Unknown":e;o&&rr(i,c),v&&tr(i,c)}return nr(e,o,v,s,n,N.current,i)}}var Z=P.ReactCurrentOwner,_e=P.ReactDebugCurrentFrame;function F(e){if(e){var r=e._owner,t=U(e.type,e._source,r?r.type:null);_e.setExtraStackFrame(t)}else _e.setExtraStackFrame(null)}var Q;Q=!1;function ee(e){return typeof e=="object"&&e!==null&&e.$$typeof===p}function je(){{if(Z.current){var e=E(Z.current.type);if(e)return`

Check the render method of \``+e+"`."}return""}}function or(e){{if(e!==void 0){var r=e.fileName.replace(/^.*[\\\/]/,""),t=e.lineNumber;return`

Check your code at `+r+":"+t+"."}return""}}var xe={};function ir(e){{var r=je();if(!r){var t=typeof e=="string"?e:e.displayName||e.name;t&&(r=`

Check the top-level render call using <`+t+">.")}return r}}function we(e,r){{if(!e._store||e._store.validated||e.key!=null)return;e._store.validated=!0;var t=ir(r);if(xe[t])return;xe[t]=!0;var n="";e&&e._owner&&e._owner!==Z.current&&(n=" It was passed a child from "+E(e._owner.type)+"."),F(e),d('Each child in a list should have a unique "key" prop.%s%s See https://reactjs.org/link/warning-keys for more information.',t,n),F(null)}}function Te(e,r){{if(typeof e!="object")return;if(K(e))for(var t=0;t<e.length;t++){var n=e[t];ee(n)&&we(n,r)}else if(ee(e))e._store&&(e._store.validated=!0);else if(e){var s=Ae(e);if(typeof s=="function"&&s!==e.entries)for(var u=s.call(e),i;!(i=u.next()).done;)ee(i.value)&&we(i.value,r)}}}function sr(e){{var r=e.type;if(r==null||typeof r=="string")return;var t;if(typeof r=="function")t=r.propTypes;else if(typeof r=="object"&&(r.$$typeof===f||r.$$typeof===R))t=r.propTypes;else return;if(t){var n=E(r);Je(t,e.props,"prop",n,e)}else if(r.PropTypes!==void 0&&!Q){Q=!0;var s=E(r);d("Component %s declared `PropTypes` instead of `propTypes`. Did you misspell the property assignment?",s||"Unknown")}typeof r.getDefaultProps=="function"&&!r.getDefaultProps.isReactClassApproved&&d("getDefaultProps is only used on classic React.createClass definitions. Use a static property named `defaultProps` instead.")}}function ur(e){{for(var r=Object.keys(e.props),t=0;t<r.length;t++){var n=r[t];if(n!=="children"&&n!=="key"){F(e),d("Invalid prop `%s` supplied to `React.Fragment`. React.Fragment can only have `key` and `children` props.",n),F(null);break}}e.ref!==null&&(F(e),d("Invalid attribute `ref` supplied to `React.Fragment`."),F(null))}}function Se(e,r,t,n,s,u){{var i=Le(e);if(!i){var o="";(e===void 0||typeof e=="object"&&e!==null&&Object.keys(e).length===0)&&(o+=" You likely forgot to export your component from the file it's defined in, or you might have mixed up default and named imports.");var v=or(s);v?o+=v:o+=je();var l;e===null?l="null":K(e)?l="array":e!==void 0&&e.$$typeof===p?(l="<"+(E(e.type)||"Unknown")+" />",o=" Did you accidentally export a JSX literal instead of a component?"):l=typeof e,d("React.jsx: type is invalid -- expected a string (for built-in components) or a class/function (for composite components) but got: %s.%s",l,o)}var c=ar(e,r,t,s,u);if(c==null)return c;if(i){var m=r.children;if(m!==void 0)if(n)if(K(m)){for(var A=0;A<m.length;A++)Te(m[A],e);Object.freeze&&Object.freeze(m)}else d("React.jsx: Static children should always be an array. You are likely explicitly calling React.jsxs or React.jsxDEV. Use the Babel transform instead.");else Te(m,e)}return e===b?ur(c):sr(c),c}}function lr(e,r,t){return Se(e,r,t,!0)}function cr(e,r,t){return Se(e,r,t,!1)}var fr=cr,dr=lr;I.Fragment=b,I.jsx=fr,I.jsxs=dr}()),I}process.env.NODE_ENV==="production"?H.exports=Ce():H.exports=Oe();var a=H.exports;const vr="",Y=({primary:g=!1,size:p="medium",backgroundColor:x,label:b,...k})=>{const C=g?"storybook-button--primary":"storybook-button--secondary";return a.jsx("button",{type:"button",className:["storybook-button",`storybook-button--${p}`,C].join(" "),style:{backgroundColor:x},...k,children:b})},pr="",ne=({user:g,onLogin:p,onLogout:x,onCreateAccount:b})=>a.jsx("header",{children:a.jsxs("div",{className:"storybook-header",children:[a.jsxs("div",{children:[a.jsx("svg",{width:"32",height:"32",viewBox:"0 0 32 32",xmlns:"http://www.w3.org/2000/svg",children:a.jsxs("g",{fill:"none",fillRule:"evenodd",children:[a.jsx("path",{d:"M10 0h12a10 10 0 0110 10v12a10 10 0 01-10 10H10A10 10 0 010 22V10A10 10 0 0110 0z",fill:"#FFF"}),a.jsx("path",{d:"M5.3 10.6l10.4 6v11.1l-10.4-6v-11zm11.4-6.2l9.7 5.5-9.7 5.6V4.4z",fill:"#555AB9"}),a.jsx("path",{d:"M27.2 10.6v11.2l-10.5 6V16.5l10.5-6zM15.7 4.4v11L6 10l9.7-5.5z",fill:"#91BAF8"})]})}),a.jsx("h1",{children:"Acme"})]}),a.jsx("div",{children:g?a.jsxs(a.Fragment,{children:[a.jsxs("span",{className:"welcome",children:["Welcome, ",a.jsx("b",{children:g.name}),"!"]}),a.jsx(Y,{size:"small",onClick:x,label:"Log out"})]}):a.jsxs(a.Fragment,{children:[a.jsx(Y,{size:"small",onClick:p,label:"Log in"}),a.jsx(Y,{primary:!0,size:"small",onClick:b,label:"Sign up"})]})})]})}),hr="",Pe=()=>{const[g,p]=j.useState();return a.jsxs("article",{children:[a.jsx(ne,{user:g,onLogin:()=>p({name:"Jane Doe"}),onLogout:()=>p(void 0),onCreateAccount:()=>p({name:"Jane Doe"})}),a.jsxs("section",{className:"storybook-page",children:[a.jsx("h2",{children:"Pages in Storybook"}),a.jsxs("p",{children:["We recommend building UIs with a"," ",a.jsx("a",{href:"https://componentdriven.org",target:"_blank",rel:"noopener noreferrer",children:a.jsx("strong",{children:"component-driven"})})," ","process starting with atomic components and ending with pages."]}),a.jsx("p",{children:"Render pages with mock data. This makes it easy to build and review page states without needing to navigate to them in your app. Here are some handy patterns for managing page data in Storybook:"}),a.jsxs("ul",{children:[a.jsx("li",{children:'Use a higher-level connected component. Storybook helps you compose such data from the "args" of child component stories'}),a.jsx("li",{children:"Assemble data in the page component from your services. You can mock these services out using Storybook."})]}),a.jsxs("p",{children:["Get a guided tutorial on component-driven development at"," ",a.jsx("a",{href:"https://storybook.js.org/tutorials/",target:"_blank",rel:"noopener noreferrer",children:"Storybook tutorials"}),". Read more in the"," ",a.jsx("a",{href:"https://storybook.js.org/docs",target:"_blank",rel:"noopener noreferrer",children:"docs"}),"."]}),a.jsxs("div",{className:"tip-wrapper",children:[a.jsx("span",{className:"tip",children:"Tip"})," Adjust the width of the canvas with the"," ",a.jsx("svg",{width:"10",height:"10",viewBox:"0 0 12 12",xmlns:"http://www.w3.org/2000/svg",children:a.jsx("g",{fill:"none",fillRule:"evenodd",children:a.jsx("path",{d:"M1.5 5.2h4.8c.3 0 .5.2.5.4v5.1c-.1.2-.3.3-.4.3H1.4a.5.5 0 01-.5-.4V5.7c0-.3.2-.5.5-.5zm0-2.1h6.9c.3 0 .5.2.5.4v7a.5.5 0 01-1 0V4H1.5a.5.5 0 010-1zm0-2.1h9c.3 0 .5.2.5.4v9.1a.5.5 0 01-1 0V2H1.5a.5.5 0 010-1zm4.3 5.2H2V10h3.8V6.2z",id:"a",fill:"#999"})})}),"Viewports addon in the toolbar"]})]})]})};y.Button=Y,y.Header=ne,y.Page=Pe,Object.defineProperty(y,Symbol.toStringTag,{value:"Module"})});
//# sourceMappingURL=index.umd.js.map