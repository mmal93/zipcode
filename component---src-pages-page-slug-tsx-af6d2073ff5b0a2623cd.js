"use strict";(self.webpackChunkzipcode=self.webpackChunkzipcode||[]).push([[6920],{7848:function(e,t,a){a.d(t,{V:function(){return r}});var l=a(7294),n=a(48);const r=e=>{let{block:t,mapToBlock:a}=e;const{name:c,attributes:o,innerBlocks:s,innerHTML:m}=t;if(!c)return null;a&&(r.MapToBlock=a);let i=r.MapToBlock?r.MapToBlock(c):null;if(i||(i=(0,n.y)(c)),!i)return null;if(c.includes("acf/")){const{data:e}=o;return l.createElement(i,{blockName:c,attributes:e})}return l.createElement(i,{blockName:c,attributes:o,innerBlocks:s,innerHTML:m})};t.Z=e=>{let{blocks:t,mapToBlock:a}=e;return l.createElement(l.Fragment,null,t&&t.filter((e=>!!e.name)).map(((e,t)=>l.createElement(r,{key:t,order:""+t,block:e,mapToBlock:a}))))}},2287:function(e,t,a){a.r(t),a.d(t,{default:function(){return g}});var l=a(7294),n=a(85),r=a(4842),c=a(7848),o=a(48),s=a(3511);const m=e=>{let{order:t,block:a,mapToBlock:n}=e;const{name:r,attributes:c}=a;if(!r)return null;n&&(m.MapToBlock=n);let s=m.MapToBlock?m.MapToBlock(r):null;if(s||(s=(0,o.y)(r)),!s)return null;if(r.includes("acf/"))switch(r){case"acf/banner-text-has-animation":return l.createElement("section",{className:"about-banner-top about-section  bg-black"},l.createElement(s,{order:t,blockName:r,attributes:c.data}));case"acf/our-team":case"acf/box-image":return l.createElement("section",{className:"about-our-teams about-section"},l.createElement(s,{order:t,blockName:r,attributes:c.data}));case"acf/text-center-with-link":return l.createElement("section",{className:"about-banner-cta about-section"},l.createElement(s,{blockName:r,attributes:c.data}));default:return l.createElement(s,{blockName:r,attributes:c.data})}return l.createElement(s,{blockName:r,attributes:c})};var i=e=>{let{blocks:t,mapToBlock:a}=e;return(0,l.useEffect)((()=>{setTimeout(s.XM,1e3)}),[]),l.createElement("div",{className:"about-page"},t.filter((e=>!!e.name)).map(((e,n)=>l.createElement("div",{key:n,className:(e.name.includes("marquee")?"initial-height":"")+" "+(n!==t.length-1?"overlay-animation":"end-overlay-animation")},l.createElement(m,{order:""+n,block:e,mapToBlock:a})))))};const u=e=>{let{block:t,mapToBlock:a}=e;const{name:n,attributes:r}=t;if(!n)return null;a&&(u.MapToBlock=a);let c=u.MapToBlock?u.MapToBlock(n):null;if(c||(c=(0,o.y)(n)),!c)return null;if(n.includes("acf/"))switch(n){case"acf/our-team":case"acf/box-image":return l.createElement("section",{className:"career-perks careers-section "},l.createElement(c,{blockName:n,attributes:r.data}));case"acf/text-center-with-link":return l.createElement("section",{className:"about-banner-cta about-section"},l.createElement(c,{blockName:n,attributes:r.data}));default:return l.createElement(c,{blockName:n,attributes:r.data})}return l.createElement(c,{blockName:n,attributes:r})};var p=e=>{let{blocks:t,mapToBlock:a}=e;return(0,l.useEffect)((()=>{setTimeout(s.XM,1e3)}),[]),l.createElement(l.Fragment,null,t.filter((e=>!!e.name)).map(((e,n)=>l.createElement("div",{key:n,className:(e.name.includes("marquee")?"initial-height":"")+" "+(n!==t.length-1?"overlay-animation":"end-overlay-animation")},l.createElement(u,{key:n,order:""+n,block:e,mapToBlock:a})))))};const k=e=>{let{block:t,mapToBlock:a}=e;const{name:n,attributes:r}=t;if(!n)return null;a&&(k.MapToBlock=a);let c=k.MapToBlock?k.MapToBlock(n):null;if(c||(c=(0,o.y)(n)),!c)return null;switch(n){case"acf/banner-with-image-right":return l.createElement("div",{className:"phi-banner overlay-animation"},l.createElement(c,{blockName:n,attributes:r.data}));case"acf/number-text-image-repeater":return l.createElement(c,{blockName:n,attributes:r.data});default:return l.createElement(c,{blockName:n,attributes:r})}};var b=e=>{let{blocks:t,mapToBlock:a}=e;return(0,l.useEffect)((()=>{setTimeout(s.XM,1e3)}),[]),l.createElement(l.Fragment,null,t.filter((e=>!!e.name)).map(((e,t)=>l.createElement(k,{key:t,order:""+t,block:e,mapToBlock:a}))))},d=a(6869),E=a(4217);var f=e=>{const{background:t,content:a}=e;console.log(a),a.map(((e,t)=>{console.log(e)}));const{0:n,1:r}=(0,l.useState)(!1),c=async()=>{var e;r(!1),null===(e=document.querySelector("html"))||void 0===e||e.classList.remove("active-overlay");Array.from(document.querySelectorAll(".projects-popup-item")).forEach((e=>{null==e||e.classList.remove("active-popup")}));Array.from(document.querySelectorAll(".projects-popup")).forEach((e=>{null==e||e.classList.remove("active-popup")}))};return l.createElement(l.Fragment,null,a&&l.createElement("div",{className:"projects-popup-main"},a.map(((e,a)=>l.createElement("div",{className:"projects-popup projects-popup-"+a,id:"projects-popup-"+a},l.createElement("div",{className:"poup-overlay",onClick:()=>c()}),l.createElement("div",{className:"projects-popup-container",style:{backgroundImage:"url("+t+")"}},l.createElement("div",{className:"container"},l.createElement("button",{className:"projects-popup-close",onClick:()=>c()},l.createElement("svg",{xmlns:"http://www.w3.org/2000/svg",width:"32",height:"29",viewBox:"0 0 32 29",fill:"none"},l.createElement("line",{y1:"-1.06719",x2:"39.2529",y2:"-1.06719",transform:"matrix(0.724999 0.688749 -0.724999 0.688749 1.54163 1.86035)",stroke:"#C4F000",strokeWidth:"2.13437"}),l.createElement("line",{y1:"-1.06719",x2:"39.2529",y2:"-1.06719",transform:"matrix(0.724999 -0.688749 0.724999 0.688749 1.54163 28.8958)",stroke:"#C4F000",strokeWidth:"2.13437"}))),l.createElement("div",{className:"popup-heading"},(e.small_text||e.popup_description)&&l.createElement("div",{className:"heading"},l.createElement("h4",{dangerouslySetInnerHTML:{__html:e.line.reduce(((e,t)=>e+t.text+" "),"")}}),l.createElement("div",{className:"subheading"},e.popup_description)),l.createElement("div",{className:"popup-galleries"},l.createElement(d.tq,{modules:[E.W_],spaceBetween:20,slidesPerView:"auto",breakpoints:{0:{slidesPerView:1,spaceBetween:100},1199:{slidesPerView:1,spaceBetween:100},1200:{slidesPerView:"auto",spaceBetween:18}},navigation:!0},e.popup_slider.map(((t,a)=>l.createElement(d.o5,null,t.image.src&&l.createElement("div",{className:"item-gallery",key:a},l.createElement("img",{loading:"lazy",srcSet:""+t.image.src,className:"img",alt:e.small_text})),t.text&&l.createElement("div",{className:"popup-content visible-mobile",dangerouslySetInnerHTML:{__html:t.text}}))))))),l.createElement("div",{className:"popup-content visible-desktop"},e.popup_slider.map(((e,t)=>e.text&&l.createElement("div",{className:"column",key:t,dangerouslySetInnerHTML:{__html:e.text}})))))))))))};function g(e){let{data:{wpPage:t,pageDetail:a}}=e;const o=a.nodes[0],s=o.blocks;if(!s||0===s.length)return l.createElement(l.Fragment,null,l.createElement(n.ZP,{post:t}),l.createElement(r.Z,null,l.createElement("div",{className:"container"},l.createElement("div",{className:"page-content",dangerouslySetInnerHTML:o.content}))));switch(t.slug){case"about":return l.createElement(l.Fragment,null,l.createElement(n.ZP,{post:t}),l.createElement(r.Z,null,l.createElement(i,{blocks:o.blocks})));case"careers":return l.createElement(l.Fragment,null,l.createElement(n.ZP,{post:t}),l.createElement(r.Z,null,l.createElement(p,{blocks:o.blocks})));case"philosophy":return l.createElement(l.Fragment,null,l.createElement(n.ZP,{post:t}),l.createElement(r.Z,null,l.createElement(b,{blocks:o.blocks})));case"projects":return l.createElement(l.Fragment,null,l.createElement(n.ZP,{post:t}),s&&s.length>0&&s.filter((e=>"acf/projects-banner"===e.name)).map(((e,t)=>l.createElement(f,{key:t,background:"https://wordpress-897316-4088707.cloudwaysapps.com/headless/wp-content/uploads/2024/02/projects-popup-bkg-1-1.jpg",content:e.attributes.data.content}))),l.createElement(r.Z,null,l.createElement(c.Z,{blocks:o.blocks})));default:return l.createElement(l.Fragment,null,l.createElement(n.ZP,{post:t}),l.createElement(r.Z,null,l.createElement("div",{className:"container"},l.createElement(c.Z,{blocks:o.blocks}))))}}}}]);
//# sourceMappingURL=component---src-pages-page-slug-tsx-af6d2073ff5b0a2623cd.js.map