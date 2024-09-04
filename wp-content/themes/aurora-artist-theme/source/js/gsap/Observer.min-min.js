/*!
 * Observer 3.12.5
 * https://gsap.com
 * 
 * @license Copyright 2024, GreenSock. All rights reserved.
 * Subject to the terms at https://gsap.com/standard-license or for Club GSAP members, the agreement issued with that membership.
 * @author: Jack Doyle, jack@greensock.com
 */
!function(e,t){"object"==typeof exports&&"undefined"!=typeof module?t(exports):"function"==typeof define&&define.amd?define(["exports"],t):t((e=e||self).window=e.window||{})}(this,(function(e){"use strict";function t(e,t){for(var n=0;n<t.length;n++){var r=t[n];r.enumerable=r.enumerable||!1,r.configurable=!0,"value"in r&&(r.writable=!0),Object.defineProperty(e,r.key,r)}}function n(){return r||"undefined"!=typeof window&&(r=window.gsap)&&r.registerPlugin&&r}var r,o,i,s,a,c,l,u,f,d,g,p,h,v=1,y=[];function x(t,n){return~e._proxies.indexOf(t)&&e._proxies[e._proxies.indexOf(t)+1][n]}function _(e){return!!~d.indexOf(e)}function m(e,t,n,r,o){return e.addEventListener(t,n,{passive:!1!==r,capture:!!o})}function b(e,t,n,r){return e.removeEventListener(t,n,!!r)}function w(){return g&&g.isPressed||e._scrollers.cache++}function M(t,n){function r(o){if(o||0===o){v&&(i.history.scrollRestoration="manual");var s=g&&g.isPressed;o=r.v=Math.round(o)||(g&&g.iOS?1:0),t(o),r.cacheID=e._scrollers.cache,s&&S("ss",o)}else(n||e._scrollers.cache!==r.cacheID||S("ref"))&&(r.cacheID=e._scrollers.cache,r.v=t());return r.v+r.offset}return r.offset=0,t&&r}function P(e,t){return(t&&t._ctx&&t._ctx.selector||r.utils.toArray)(e)[0]||("string"==typeof e&&!1!==r.config().nullTargetWarn?console.warn("Element not found:",e):null)}function Y(t,n){var o=n.s,i=n.sc;_(t)&&(t=s.scrollingElement||a);var c=e._scrollers.indexOf(t),l=i===H.sc?1:2;~c||(c=e._scrollers.push(t)-1),e._scrollers[c+l]||m(t,"scroll",w);var u=e._scrollers[c+l],f=u||(e._scrollers[c+l]=M(x(t,o),!0)||(_(t)?i:M((function(e){return arguments.length?t[o]=e:t[o]}))));return f.target=t,u||(f.smooth="smooth"===r.getProperty(t,"scrollBehavior")),f}function X(e,t,n){function r(e,t){var r=k();t||c<r-s?(i=o,o=e,a=s,s=r):n?o+=e:o=i+(e-i)/(r-a)*(s-a)}var o=e,i=e,s=k(),a=s,c=t||50,l=Math.max(500,3*c);return{update:r,reset:function(){i=o=n?0:o,a=s=0},getVelocity:function(e){var t=a,c=i,u=k();return!e&&0!==e||e===o||r(e),s===a||l<u-a?0:(o+(n?c:-c))/((n?u:s)-t)*1e3}}}function D(e,t){return t&&!e._gsapAllow&&e.preventDefault(),e.changedTouches?e.changedTouches[0]:e}function O(e){var t=Math.max.apply(Math,e),n=Math.min.apply(Math,e);return Math.abs(t)>=Math.abs(n)?t:n}function E(){(f=r.core.globals().ScrollTrigger)&&f.core&&function(){var t=f.core,n=t.bridge||{},r=t._scrollers,o=t._proxies;r.push.apply(r,e._scrollers),o.push.apply(o,e._proxies),e._scrollers=r,e._proxies=o,S=function(e,t){return n[e](t)}}()}function T(e){return r=e||n(),!o&&r&&"undefined"!=typeof document&&document.body&&(i=window,a=(s=document).documentElement,c=s.body,d=[i,s,a,c],r.utils.clamp,h=r.core.context||function(){},u="onpointerenter"in c?"pointer":"mouse",l=L.isTouch=i.matchMedia&&i.matchMedia("(hover: none), (pointer: coarse)").matches?1:"ontouchstart"in i||0<navigator.maxTouchPoints||0<navigator.msMaxTouchPoints?2:0,p=L.eventTypes=("ontouchstart"in a?"touchstart,touchmove,touchcancel,touchend":"onpointerdown"in a?"pointerdown,pointermove,pointercancel,pointerup":"mousedown,mousemove,mouseup,mouseup").split(","),setTimeout((function(){return v=0}),500),E(),o=1),o}e._scrollers=[],e._proxies=[];var k=Date.now,S=function(e,t){return t},C="scrollLeft",A="scrollTop",G={s:C,p:"left",p2:"Left",os:"right",os2:"Right",d:"width",d2:"Width",a:"x",sc:M((function(e){return arguments.length?i.scrollTo(e,H.sc()):i.pageXOffset||s[C]||a[C]||c[C]||0}))},H={s:A,p:"top",p2:"Top",os:"bottom",os2:"Bottom",d:"height",d2:"Height",a:"y",op:G,sc:M((function(e){return arguments.length?i.scrollTo(G.sc(),e):i.pageYOffset||s[A]||a[A]||c[A]||0}))};G.op=H,e._scrollers.cache=0;var L=(R.prototype.init=function(e){o||T(r)||console.warn("Please gsap.registerPlugin(Observer)"),f||E();var t=e.tolerance,n=e.dragMinimum,d=e.type,v=e.target,x=e.lineHeight,M=e.debounce,S=e.preventDefault,C=e.onStop,A=e.onStopDelay,L=e.ignore,R=e.wheelSpeed,V=e.event,F=e.onDragStart,I=e.onDragEnd,j=e.onDrag,B=e.onPress,N=e.onRelease,W=e.onRight,q=e.onLeft,z=e.onUp,U=e.onDown,J=e.onChangeX,K=e.onChangeY,Q=e.onChange,Z=e.onToggleX,ee=e.onToggleY,te=e.onHover,ne=e.onHoverEnd,re=e.onMove,oe=e.ignoreCheck,ie=e.isNormalizer,se=e.onGestureStart,ae=e.onGestureEnd,ce=e.onWheel,le=e.onEnable,ue=e.onDisable,fe=e.onClick,de=e.scrollSpeed,ge=e.capture,pe=e.allowClicks,he=e.lockAxis,$=e.onLockAxis;function ve(){return Ke=k()}function ye(e,t){return(Le.event=e)&&L&&~L.indexOf(e.target)||t&&We&&"touch"!==e.pointerType||oe&&oe(e,t)}function xe(){var e=Le.deltaX=O(Ue),n=Le.deltaY=O(Je),r=Math.abs(e)>=t,o=Math.abs(n)>=t;Q&&(r||o)&&Q(Le,e,n,Ue,Je),r&&(W&&0<Le.deltaX&&W(Le),q&&Le.deltaX<0&&q(Le),J&&J(Le),Z&&Le.deltaX<0!=Re<0&&Z(Le),Re=Le.deltaX,Ue[0]=Ue[1]=Ue[2]=0),o&&(U&&0<Le.deltaY&&U(Le),z&&Le.deltaY<0&&z(Le),K&&K(Le),ee&&Le.deltaY<0!=Ve<0&&ee(Le),Ve=Le.deltaY,Je[0]=Je[1]=Je[2]=0),(Ce||Se)&&(re&&re(Le),Se&&(j(Le),Se=!1),Ce=!1),Ge&&!(Ge=!1)&&$&&$(Le),Ae&&(ce(Le),Ae=!1),Te=0}function _e(e,t,n){Ue[n]+=e,Je[n]+=t,Le._vx.update(e),Le._vy.update(t),M?Te=Te||requestAnimationFrame(xe):xe()}function me(e,t){he&&!He&&(Le.axis=He=Math.abs(e)>Math.abs(t)?"x":"y",Ge=!0),"y"!==He&&(Ue[2]+=e,Le._vx.update(e,!0)),"x"!==He&&(Je[2]+=t,Le._vy.update(t,!0)),M?Te=Te||requestAnimationFrame(xe):xe()}function be(e){if(!ye(e,1)){var t=(e=D(e,S)).clientX,r=e.clientY,o=t-Le.x,i=r-Le.y,s=Le.isDragging;Le.x=t,Le.y=r,(s||Math.abs(Le.startX-t)>=n||Math.abs(Le.startY-r)>=n)&&(j&&(Se=!0),s||(Le.isDragging=!0),me(o,i),s||F&&F(Le))}}function we(e){return e.touches&&1<e.touches.length&&(Le.isGesturing=!0)&&se(e,Le.isDragging)}function Me(){return(Le.isGesturing=!1)||ae(Le)}function Pe(e){if(!ye(e)){var t=Ie(),n=je();_e((t-Be)*de,(n-Ne)*de,1),Be=t,Ne=n,C&&ke.restart(!0)}}function Ye(e){if(!ye(e)){e=D(e,S),ce&&(Ae=!0);var t=(1===e.deltaMode?x:2===e.deltaMode?i.innerHeight:1)*R;_e(e.deltaX*t,e.deltaY*t,0),C&&!ie&&ke.restart(!0)}}function Xe(e){if(!ye(e)){var t=e.clientX,n=e.clientY,r=t-Le.x,o=n-Le.y;Le.x=t,Le.y=n,Ce=!0,C&&ke.restart(!0),(r||o)&&me(r,o)}}function De(e){Le.event=e,te(Le)}function Oe(e){Le.event=e,ne(Le)}function Ee(e){return ye(e)||D(e,S)&&fe(Le)}this.target=v=P(v)||a,this.vars=e,L=L&&r.utils.toArray(L),t=t||1e-9,n=n||0,R=R||1,de=de||1,d=d||"wheel,touch,pointer",M=!1!==M,x=x||parseFloat(i.getComputedStyle(c).lineHeight)||22;var Te,ke,Se,Ce,Ae,Ge,He,Le=this,Re=0,Ve=0,Fe=e.passive||!S,Ie=Y(v,G),je=Y(v,H),Be=Ie(),Ne=je(),We=~d.indexOf("touch")&&!~d.indexOf("pointer")&&"pointerdown"===p[0],qe=_(v),ze=v.ownerDocument||s,Ue=[0,0,0],Je=[0,0,0],Ke=0,Qe=Le.onPress=function(e){ye(e,1)||e&&e.button||(Le.axis=He=null,ke.pause(),Le.isPressed=!0,e=D(e),Re=Ve=0,Le.startX=Le.x=e.clientX,Le.startY=Le.y=e.clientY,Le._vx.reset(),Le._vy.reset(),m(ie?v:ze,p[1],be,Fe,!0),Le.deltaX=Le.deltaY=0,B&&B(Le))},Ze=Le.onRelease=function(e){if(!ye(e,1)){b(ie?v:ze,p[1],be,!0);var t=!isNaN(Le.y-Le.startY),n=Le.isDragging,o=n&&(3<Math.abs(Le.x-Le.startX)||3<Math.abs(Le.y-Le.startY)),s=D(e);!o&&t&&(Le._vx.reset(),Le._vy.reset(),S&&pe&&r.delayedCall(.08,(function(){if(300<k()-Ke&&!e.defaultPrevented)if(e.target.click)e.target.click();else if(ze.createEvent){var t=ze.createEvent("MouseEvents");t.initMouseEvent("click",!0,!0,i,1,s.screenX,s.screenY,s.clientX,s.clientY,!1,!1,!1,!1,0,null),e.target.dispatchEvent(t)}}))),Le.isDragging=Le.isGesturing=Le.isPressed=!1,C&&n&&!ie&&ke.restart(!0),I&&n&&I(Le),N&&N(Le,o)}};ke=Le._dc=r.delayedCall(A||.25,(function(){Le._vx.reset(),Le._vy.reset(),ke.pause(),C&&C(Le)})).pause(),Le.deltaX=Le.deltaY=0,Le._vx=X(0,50,!0),Le._vy=X(0,50,!0),Le.scrollX=Ie,Le.scrollY=je,Le.isDragging=Le.isGesturing=Le.isPressed=!1,h(this),Le.enable=function(e){return Le.isEnabled||(m(qe?ze:v,"scroll",w),0<=d.indexOf("scroll")&&m(qe?ze:v,"scroll",Pe,Fe,ge),0<=d.indexOf("wheel")&&m(v,"wheel",Ye,Fe,ge),(0<=d.indexOf("touch")&&l||0<=d.indexOf("pointer"))&&(m(v,p[0],Qe,Fe,ge),m(ze,p[2],Ze),m(ze,p[3],Ze),pe&&m(v,"click",ve,!0,!0),fe&&m(v,"click",Ee),se&&m(ze,"gesturestart",we),ae&&m(ze,"gestureend",Me),te&&m(v,u+"enter",De),ne&&m(v,u+"leave",Oe),re&&m(v,u+"move",Xe)),Le.isEnabled=!0,e&&e.type&&Qe(e),le&&le(Le)),Le},Le.disable=function(){Le.isEnabled&&(y.filter((function(e){return e!==Le&&_(e.target)})).length||b(qe?ze:v,"scroll",w),Le.isPressed&&(Le._vx.reset(),Le._vy.reset(),b(ie?v:ze,p[1],be,!0)),b(qe?ze:v,"scroll",Pe,ge),b(v,"wheel",Ye,ge),b(v,p[0],Qe,ge),b(ze,p[2],Ze),b(ze,p[3],Ze),b(v,"click",ve,!0),b(v,"click",Ee),b(ze,"gesturestart",we),b(ze,"gestureend",Me),b(v,u+"enter",De),b(v,u+"leave",Oe),b(v,u+"move",Xe),Le.isEnabled=Le.isPressed=Le.isDragging=!1,ue&&ue(Le))},Le.kill=Le.revert=function(){Le.disable();var e=y.indexOf(Le);0<=e&&y.splice(e,1),g===Le&&(g=0)},y.push(Le),ie&&_(v)&&(g=Le),Le.enable(V)},function(e,n,r){n&&t(e.prototype,n),r&&t(e,r)}(R,[{key:"velocityX",get:function(){return this._vx.getVelocity()}},{key:"velocityY",get:function(){return this._vy.getVelocity()}}]),R);function R(e){this.init(e)}L.version="3.12.5",L.create=function(e){return new L(e)},L.register=T,L.getAll=function(){return y.slice()},L.getById=function(e){return y.filter((function(t){return t.vars.id===e}))[0]},n()&&r.registerPlugin(L),e.Observer=L,e._getProxyProp=x,e._getScrollFunc=Y,e._getTarget=P,e._getVelocityProp=X,e._horizontal=G,e._isViewport=_,e._vertical=H,e.default=L,"undefined"==typeof window||window!==e?Object.defineProperty(e,"__esModule",{value:!0}):delete e.default}));