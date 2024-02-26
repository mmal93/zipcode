(()=>{"use strict";var e,t,n,a,r,o,i={694:(e,t)=>{Object.defineProperty(t,"__esModule",{value:!0}),t.ButtonsPanel=function(e){return React.createElement("div",null,e.children)}},561:(e,t,n)=>{Object.defineProperty(t,"__esModule",{value:!0}),t.CheckboxControl=void 0;var a=n(610),r=n(537);t.CheckboxControl=function(e){var t,n=function(e,t){if(Array.isArray(e))return e;if(Symbol.iterator in Object(e))return function(e,t){var n=[],a=!0,r=!1,o=void 0;try{for(var i,l=e[Symbol.iterator]();!(a=(i=l.next()).done)&&(n.push(i.value),!t||n.length!==t);a=!0);}catch(e){r=!0,o=e}finally{try{!a&&l.return&&l.return()}finally{if(r)throw o}}return n}(e,t);throw new TypeError("Invalid attempt to destructure non-iterable instance")}((0,a.useState)(e.checked||!1),2),o=n[0],i=n[1];return t=e.unescapedDescription?React.createElement("p",{className:"description",dangerouslySetInnerHTML:{__html:e.description}}):React.createElement("p",{className:"description"},e.description),React.createElement(a.Fragment,null,React.createElement(r.CheckboxControl,{label:e.label,name:e.name,id:e.name,className:e.className,checked:o||!1,onChange:function(t){i(t),e.onChange&&e.onChange(t)}}),t)}},730:(e,t,n)=>{Object.defineProperty(t,"__esModule",{value:!0}),t.DateTimePicker=void 0;var a=n(500),r=n(537);t.DateTimePicker=function(e){var t=e.currentDate,n=e.onChange,o=e.is12Hour,i=e.startOfWeek;return"number"==typeof t&&(t=(0,a.normalizeUnixTimeToMilliseconds)(t)),React.createElement(r.DateTimePicker,{currentDate:t,onChange:n,__nextRemoveHelpButton:!0,is12Hour:o,startOfWeek:i})}},409:(e,t,n)=>{Object.defineProperty(t,"__esModule",{value:!0}),t.FutureActionPanel=void 0;var a=function(e,t){if(Array.isArray(e))return e;if(Symbol.iterator in Object(e))return function(e,t){var n=[],a=!0,r=!1,o=void 0;try{for(var i,l=e[Symbol.iterator]();!(a=(i=l.next()).done)&&(n.push(i.value),!t||n.length!==t);a=!0);}catch(e){r=!0,o=e}finally{try{!a&&l.return&&l.return()}finally{if(r)throw o}}return n}(e,t);throw new TypeError("Invalid attempt to destructure non-iterable instance")},r="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(e){return typeof e}:function(e){return e&&"function"==typeof Symbol&&e.constructor===Symbol&&e!==Symbol.prototype?"symbol":typeof e},o=n(37),i=n(76),l=wp.components,c=l.PanelRow,u=l.CheckboxControl,s=l.SelectControl,m=l.FormTokenField,d=l.Spinner,p=l.BaseControl,f=wp.element,y=f.Fragment,g=f.useEffect,b=wp.htmlEntities.decodeEntities,v=wp.url.addQueryArgs,h=wp.data,E=h.useSelect,x=h.useDispatch,_=wp.apiFetch;t.FutureActionPanel=function(e){var t=E((function(t){return t(e.storeName).getAction()}),[]),n=E((function(t){return t(e.storeName).getDate()}),[]),l=E((function(t){return t(e.storeName).getEnabled()}),[]),f=E((function(t){return t(e.storeName).getTerms()}),[]),h=E((function(t){return t(e.storeName).getTaxonomy()}),[]),S=E((function(t){return t(e.storeName).getTaxonomyName()}),[]),T=E((function(t){return t(e.storeName).getTermsListByName()}),[]),R=E((function(t){return t(e.storeName).getTermsListById()}),[]),C=E((function(t){return t(e.storeName).getIsFetchingTerms()}),[]),N=E((function(t){return t(e.storeName).getCalendarIsVisible()}),[]),P=x(e.storeName),O=P.setAction,k=P.setDate,F=P.setEnabled,w=P.setTerms,A=P.setTaxonomy,j=P.setTermsListByName,D=P.setTermsListById,B=P.setTaxonomyName,I=P.setIsFetchingTerms,M=P.setCalendarIsVisible,L=function(e){T[e]={id:e,count:0,description:"",link:"",name:e,slug:e,taxonomy:h},R[e]=e,j(T),D(R),w([].concat(function(e){if(Array.isArray(e)){for(var t=0,n=Array(e.length);t<e.length;t++)n[t]=e[t];return n}return Array.from(e)}(f),[e]))},H=function(t,n){"function"==typeof e.onChangeData&&e.onChangeData(t,n)},W=function(t){F(t),t&&(O(e.action),k(e.date),w(e.terms),A(e.taxonomy),V()),H("enabled",t)},V=function(){var e={},t={};h&&(I(!0),_({path:v("publishpress-future/v1/terms/"+h)}).then((function(n){n.terms.forEach((function(n){e[b(n.name)]=n,t[n.id]=b(n.name)})),j(e),D(t),B(b(n.taxonomyName)),I(!1)})))},U=function(){return localStorage.getItem("FUTURE_ACTION_CALENDAR_IS_VISIBLE_"+e.context)};g((function(){e.autoEnableAndHideCheckbox?F(!0):F(e.enabled),O(e.action),k(e.date),w(e.terms),A(e.taxonomy),null===U()?M(e.calendarIsVisible):M("1"===U()),e.enabled&&(e.isCleanNewPost&&W(!0),V())}),[]),g((function(){var t;t=N,localStorage.setItem("FUTURE_ACTION_CALENDAR_IS_VISIBLE_"+e.context,t?"1":"0")}),[N]);var Q=[];f&&f.length>0&&R&&(Q=(0,o.compact)(function(e){return"object"!==(void 0===e?"undefined":r(e))||null===e?{}:e.map((function(e){return R[e]}))}(f)),"string"==typeof Q&&(Q=[]));var q=[];"object"===(void 0===T?"undefined":r(T))&&null!==T&&(q=Object.keys(T));var z,G=N?"future-action-panel":"future-action-panel hidden-calendar",Y=N?"future-action-panel-content":"future-action-panel-content hidden-calendar",J=N?"future-action-date-panel":"future-action-date-panel hidden-calendar";z="inherited"===e.timeFormat?!e.is12Hour:"24h"===e.timeFormat;var K=e.actionsSelectOptions;e.taxonomy||(K=e.actionsSelectOptions.filter((function(e){return-1===["category","category-add","category-remove","category-remove-all"].indexOf(e.value)})));var X=function(e,t,n){var r=e.split("{"),o=[];o.push(r.shift());var i=!0,l=!1,c=void 0;try{for(var u,s=r[Symbol.iterator]();!(i=(u=s.next()).done);i=!0){var m=u.value.split("}"),d=a(m,2),p=d[0],f=d[1];o.push(React.createElement("a",{href:t,target:"_blank",key:t},p)),o.push(f)}}catch(e){l=!0,c=e}finally{try{!i&&s.return&&s.return()}finally{if(l)throw c}}return o}(e.strings.timezoneSettingsHelp,"/wp-admin/options-general.php#timezone_string"),Z=String(t).includes("category")&&"category-remove-all"!==t;return React.createElement("div",{className:G},e.autoEnableAndHideCheckbox&&React.createElement("input",{type:"hidden",name:"future_action_enabled",value:1}),!e.autoEnableAndHideCheckbox&&React.createElement(c,null,React.createElement(u,{label:e.strings.enablePostExpiration,checked:l||!1,onChange:W})),l&&React.createElement(y,null,React.createElement(c,{className:Y+" future-action-full-width"},React.createElement(s,{label:e.strings.action,value:t,options:K,onChange:function(e){O(e),H("action",e)}})),Z&&(C&&React.createElement(c,null,React.createElement(p,{label:S},e.strings.loading+" ("+S+")",React.createElement(d,null)))||!h&&React.createElement(c,null,React.createElement(p,{label:S,className:"future-action-warning"},React.createElement("div",null,React.createElement("i",{className:"dashicons dashicons-warning"})," ",e.strings.noTaxonomyFound)))||0===q.length&&React.createElement(c,null,React.createElement(p,{label:S,className:"future-action-warning"},React.createElement("div",null,React.createElement("i",{className:"dashicons dashicons-warning"})," ",e.strings.noTermsFound)))||React.createElement(c,{className:"future-action-full-width"},React.createElement(p,null,React.createElement(m,{label:S,value:Q,suggestions:q,onChange:function(e){e=function(e){return"object"!==(void 0===e?"undefined":r(e))||null===e?{}:e.map((function(e){return T[e]?T[e].id:(L(e),e)}))}(e),w(e),H("terms",e)},maxSuggestions:1e3,__experimentalExpandOnFocus:!0,__experimentalAutoSelectFirstMatch:!0})))),React.createElement(c,{className:J},React.createElement(i.ToggleCalendarDatePicker,{currentDate:n,onChangeDate:function(e){k(e),H("date",e)},onToggleCalendar:function(){return M(!N)},is12Hour:!z,startOfWeek:e.startOfWeek,isExpanded:N,strings:e.strings})),React.createElement(c,null,React.createElement("div",{className:"future-action-help-text"},React.createElement("hr",null),React.createElement("span",{className:"dashicons dashicons-info"})," ",X))))}},738:(e,t,n)=>{Object.defineProperty(t,"__esModule",{value:!0}),t.FutureActionPanelBlockEditor=void 0;var a=function(e,t){if(Array.isArray(e))return e;if(Symbol.iterator in Object(e))return function(e,t){var n=[],a=!0,r=!1,o=void 0;try{for(var i,l=e[Symbol.iterator]();!(a=(i=l.next()).done)&&(n.push(i.value),!t||n.length!==t);a=!0);}catch(e){r=!0,o=e}finally{try{!a&&l.return&&l.return()}finally{if(r)throw o}}return n}(e,t);throw new TypeError("Invalid attempt to destructure non-iterable instance")},r=n(352);t.FutureActionPanelBlockEditor=function(e){var t=wp.editPost.PluginDocumentSettingPanel,n=wp.data,o=n.useDispatch,i=n.select,l=o("core/editor").editPost,c=i("core/editor").getEditedPostAttribute("publishpress_future_action");return React.createElement(t,{name:"publishpress-future-action-panel",title:e.strings.panelTitle,icon:"calendar",initialOpen:e.postTypeDefaultConfig.autoEnable,className:"post-expirator-panel"},React.createElement("div",{id:"publishpress-future-block-editor"},React.createElement(r.FutureActionPanel,{context:"block-editor",postType:e.postType,isCleanNewPost:e.isCleanNewPost,actionsSelectOptions:e.actionsSelectOptions,enabled:c.enabled,calendarIsVisible:!0,action:c.action,date:c.date,terms:c.terms,taxonomy:c.taxonomy,taxonomyName:e.taxonomyName,onChangeData:function(t,n){var r=i(e.storeName),o={enabled:r.getEnabled()};o.enabled&&(o.action=r.getAction(),o.date=r.getDate(),o.terms=r.getTerms(),o.taxonomy=r.getTaxonomy()),function(e){var t={publishpress_future_action:{}},n=!0,r=!1,o=void 0;try{for(var i,c=Object.entries(e)[Symbol.iterator]();!(n=(i=c.next()).done);n=!0){var u=i.value,s=a(u,2),m=s[0],d=s[1];t.publishpress_future_action[m]=d}}catch(e){r=!0,o=e}finally{try{!n&&c.return&&c.return()}finally{if(r)throw o}}l(t)}(o)},is12Hour:e.is12Hour,timeFormat:e.timeFormat,startOfWeek:e.startOfWeek,storeName:e.storeName,strings:e.strings})))}},27:(e,t,n)=>{Object.defineProperty(t,"__esModule",{value:!0}),t.FutureActionPanelBulkEdit=void 0;var a="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(e){return typeof e}:function(e){return e&&"function"==typeof Symbol&&e.constructor===Symbol&&e!==Symbol.prototype?"symbol":typeof e},r=n(352),o=n(37);t.FutureActionPanelBulkEdit=function(e){var t=wp.data,n=t.useSelect,i=t.useDispatch,l=t.select,c=n((function(t){return t(e.storeName).getDate()}),[]),u=n((function(t){return t(e.storeName).getEnabled()}),[]),s=n((function(t){return t(e.storeName).getAction()}),[]),m=n((function(t){return t(e.storeName).getTerms()}),[]),d=n((function(t){return t(e.storeName).getTaxonomy()}),[]),p=n((function(t){return t(e.storeName).getChangeAction()}),[]),f=i(e.storeName).setChangeAction,y=m;"object"===(void 0===m?"undefined":a(m))&&(y=m.join(","));var g=[{value:"no-change",label:e.strings.noChange},{value:"change-add",label:e.strings.changeAdd},{value:"add-only",label:e.strings.addOnly},{value:"change-only",label:e.strings.changeOnly},{value:"remove-only",label:e.strings.removeOnly}];return React.createElement("div",{className:"post-expirator-panel"},React.createElement(r.SelectControl,{label:e.strings.futureActionUpdate,name:"future_action_bulk_change_action",value:p,options:g,onChange:function(e){f(e)}}),["change-add","add-only","change-only"].includes(p)&&React.createElement(r.FutureActionPanel,{context:"bulk-edit",autoEnableAndHideCheckbox:!0,postType:e.postType,isCleanNewPost:e.isNewPost,actionsSelectOptions:e.actionsSelectOptions,enabled:!0,calendarIsVisible:!1,action:s,date:c,terms:m,taxonomy:d,taxonomyName:e.taxonomyName,onChangeData:function(t,n){(0,o.getElementByName)("future_action_bulk_enabled").value=l(e.storeName).getEnabled()?1:0,(0,o.getElementByName)("future_action_bulk_action").value=l(e.storeName).getAction(),(0,o.getElementByName)("future_action_bulk_date").value=l(e.storeName).getDate(),(0,o.getElementByName)("future_action_bulk_terms").value=l(e.storeName).getTerms().join(","),(0,o.getElementByName)("future_action_bulk_taxonomy").value=l(e.storeName).getTaxonomy()},is12Hour:e.is12Hour,timeFormat:e.timeFormat,startOfWeek:e.startOfWeek,storeName:e.storeName,strings:e.strings}),React.createElement("input",{type:"hidden",name:"future_action_bulk_enabled",value:u?1:0}),React.createElement("input",{type:"hidden",name:"future_action_bulk_action",value:s}),React.createElement("input",{type:"hidden",name:"future_action_bulk_date",value:c}),React.createElement("input",{type:"hidden",name:"future_action_bulk_terms",value:y}),React.createElement("input",{type:"hidden",name:"future_action_bulk_taxonomy",value:d}),React.createElement("input",{type:"hidden",name:"future_action_bulk_view",value:"bulk-edit"}),React.createElement("input",{type:"hidden",name:"_future_action_nonce",value:e.nonce}))}},21:(e,t,n)=>{Object.defineProperty(t,"__esModule",{value:!0}),t.FutureActionPanelClassicEditor=void 0;var a=n(352),r=n(284);t.FutureActionPanelClassicEditor=function(e){(new Date).getTimezoneOffset();var t=function(e){return document.getElementsByName(e)[0]},n=function(e){var n=t(e);return n?n.value:""},o={enabled:"1"===n("future_action_enabled"),action:n("future_action_action"),date:n("future_action_date"),terms:function(e){var n=t("future_action_terms");if(!n)return[];var a=n.value.split(",");return 1===a.length&&""===a[0]&&(a=[]),a.map((function(e){return parseInt(e)}))}(),taxonomy:n("future_action_taxonomy")};return React.createElement("div",{className:"post-expirator-panel"},React.createElement(a.FutureActionPanel,{context:"classic-editor",postType:e.postType,isCleanNewPost:e.isNewPost,actionsSelectOptions:e.actionsSelectOptions,enabled:o.enabled,calendarIsVisible:!0,action:o.action,date:o.date,terms:o.terms,taxonomy:o.taxonomy,taxonomyName:e.taxonomyName,onChangeData:function(n,a){var o=(0,r.select)(e.storeName);t("future_action_enabled").value=o.getEnabled()?1:0,t("future_action_action").value=o.getAction(),t("future_action_date").value=o.getDate(),t("future_action_terms").value=o.getTerms().join(","),t("future_action_taxonomy").value=o.getTaxonomy()},is12Hour:e.is12Hour,timeFormat:e.timeFormat,startOfWeek:e.startOfWeek,storeName:e.storeName,strings:e.strings}))}},990:(e,t,n)=>{Object.defineProperty(t,"__esModule",{value:!0}),t.FutureActionPanelQuickEdit=void 0;var a="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(e){return typeof e}:function(e){return e&&"function"==typeof Symbol&&e.constructor===Symbol&&e!==Symbol.prototype?"symbol":typeof e},r=n(352),o=n(284);t.FutureActionPanelQuickEdit=function(e){var t=(0,o.useSelect)((function(t){return t(e.storeName).getDate()}),[]),n=(0,o.useSelect)((function(t){return t(e.storeName).getEnabled()}),[]),i=(0,o.useSelect)((function(t){return t(e.storeName).getAction()}),[]),l=(0,o.useSelect)((function(t){return t(e.storeName).getTerms()}),[]),c=(0,o.useSelect)((function(t){return t(e.storeName).getTaxonomy()}),[]),u=l;return"object"===(void 0===l?"undefined":a(l))&&(u=l.join(",")),React.createElement("div",{className:"post-expirator-panel"},React.createElement(r.FutureActionPanel,{context:"quick-edit",postType:e.postType,isCleanNewPost:e.isNewPost,actionsSelectOptions:e.actionsSelectOptions,enabled:n,calendarIsVisible:!1,action:i,date:t,terms:l,taxonomy:c,taxonomyName:e.taxonomyName,onChangeData:function(e,t){},is12Hour:e.is12Hour,timeFormat:e.timeFormat,startOfWeek:e.startOfWeek,storeName:e.storeName,strings:e.strings}),React.createElement("input",{type:"hidden",name:"future_action_enabled",value:n?1:0}),React.createElement("input",{type:"hidden",name:"future_action_action",value:i||""}),React.createElement("input",{type:"hidden",name:"future_action_date",value:t||""}),React.createElement("input",{type:"hidden",name:"future_action_terms",value:u||""}),React.createElement("input",{type:"hidden",name:"future_action_taxonomy",value:c||""}),React.createElement("input",{type:"hidden",name:"future_action_view",value:"quick-edit"}),React.createElement("input",{type:"hidden",name:"_future_action_nonce",value:e.nonce}))}},549:(e,t,n)=>{Object.defineProperty(t,"__esModule",{value:!0}),t.NonceControl=void 0;var a=n(610);t.NonceControl=function(e){return e.name||(e.name="_wpnonce"),e.referrer||(e.referrer=!0),React.createElement(a.Fragment,null,React.createElement("input",{type:"hidden",name:e.name,id:e.name,value:e.nonce}),e.referrer&&React.createElement("input",{type:"hidden",name:"_wp_http_referer",value:e.referrer}))}},406:(e,t,n)=>{Object.defineProperty(t,"__esModule",{value:!0}),t.PostTypeSettingsPanel=void 0;var a=function(e,t){if(Array.isArray(e))return e;if(Symbol.iterator in Object(e))return function(e,t){var n=[],a=!0,r=!1,o=void 0;try{for(var i,l=e[Symbol.iterator]();!(a=(i=l.next()).done)&&(n.push(i.value),!t||n.length!==t);a=!0);}catch(e){r=!0,o=e}finally{try{!a&&l.return&&l.return()}finally{if(r)throw o}}return n}(e,t);throw new TypeError("Invalid attempt to destructure non-iterable instance")},r=n(352),o=n(610),i=n(368),l=n(882),c=n(998);t.PostTypeSettingsPanel=function(e){var t=(0,o.useState)(e.settings.taxonomy),n=a(t,2),u=n[0],s=n[1],m=(0,o.useState)([]),d=a(m,2),p=d[0],f=d[1],y=(0,o.useState)(!1),g=a(y,2),b=g[0],v=g[1],h=(0,o.useState)([]),E=a(h,2),x=E[0],_=E[1],S=(0,o.useState)(e.settings.howToExpire),T=a(S,2),R=T[0],C=T[1],N=(0,o.useState)(e.settings.active),P=a(N,2),O=P[0],k=P[1],F=(0,o.useState)(e.settings.defaultExpireOffset),w=a(F,2),A=w[0],j=w[1],D=(0,o.useState)(e.settings.emailNotification),B=a(D,2),I=B[0],M=B[1],L=(0,o.useState)(e.settings.autoEnabled),H=a(L,2),W=H[0],V=H[1];(0,o.useEffect)((function(){u&&e.taxonomiesList&&(v(!0),(0,c.apiFetch)({path:(0,i.addQueryArgs)("publishpress-future/v1/terms/"+u)}).then((function(t){var n=[],a=null,r=void 0;t.terms.forEach((function(t){r={value:t.id,label:t.name},n.push(r),u===e.settings.taxonomy&&e.settings.terms.includes(t.id)&&(null===a&&(a=[]),a.push(r.label))})),f(n),_(a),v(!1)})))}),[u]);var U=p.map((function(e){return e.label})),Q=[React.createElement(r.SettingRow,{label:e.text.fieldActive,key:"expirationdate_activemeta-"+e.postType},React.createElement(r.CheckboxControl,{name:"expirationdate_activemeta-"+e.postType,checked:O||!1,label:e.text.fieldActiveLabel,onChange:function(e){k(e)}}))];return O&&(Q.push(React.createElement(r.SettingRow,{label:e.text.fieldAutoEnable,key:"expirationdate_autoenable-"+e.postType},React.createElement(r.CheckboxControl,{name:"expirationdate_autoenable-"+e.postType,checked:W||!1,label:e.text.fieldAutoEnableLabel,onChange:function(e){V(e)}}))),Q.push(React.createElement(r.SettingRow,{label:e.text.fieldTaxonomy,key:"expirationdate_taxonomy-"+e.postType},React.createElement(r.SelectControl,{name:"expirationdate_taxonomy-"+e.postType,options:e.taxonomiesList,selected:u,noItemFoundMessage:e.text.noItemsfound,description:e.text.fieldTaxonomyDescription,data:e.postType,onChange:function(e){s(e)}}))),0===e.taxonomiesList.length&&(e.expireTypeList[e.postType]=e.expireTypeList[e.postType].filter((function(e){return-1===["category","category-add","category-remove"].indexOf(e.value)}))),Q.push(React.createElement(r.SettingRow,{label:e.text.fieldHowToExpire,key:"expirationdate_expiretype-"+e.postType},React.createElement(r.SelectControl,{name:"expirationdate_expiretype-"+e.postType,className:"pe-howtoexpire",options:e.expireTypeList[e.postType],description:e.text.fieldHowToExpireDescription,selected:R,onChange:function(e){C(e)}}),e.taxonomiesList.length>0&&["category","category-add","category-remove"].indexOf(R)>-1&&React.createElement(r.TokensControl,{label:e.text.fieldTerm,name:"expirationdate_terms-"+e.postType,options:U,value:x,isLoading:b,onChange:function(e){_(e)},description:e.text.fieldTermDescription,maxSuggestions:1e3,expandOnFocus:!0,autoSelectFirstMatch:!0}))),Q.push(React.createElement(r.SettingRow,{label:e.text.fieldDefaultDateTimeOffset,key:"expired-custom-date-"+e.postType},React.createElement(r.TextControl,{name:"expired-custom-date-"+e.postType,value:A,placeholder:e.settings.globalDefaultExpireOffset,description:e.text.fieldDefaultDateTimeOffsetDescription,unescapedDescription:!0,onChange:function(e){j(e)}}))),Q.push(React.createElement(r.SettingRow,{label:e.text.fieldWhoToNotify,key:"expirationdate_emailnotification-"+e.postType},React.createElement(r.TextControl,{name:"expirationdate_emailnotification-"+e.postType,className:"large-text",value:I,description:e.text.fieldWhoToNotifyDescription,onChange:function(e){M(e)}})))),Q=(0,l.applyFilters)("expirationdate_settings_posttype",Q,e,O,o.useState),React.createElement(r.SettingsFieldset,{legend:e.legend},React.createElement(r.SettingsTable,{bodyChildren:Q}))}},438:(e,t,n)=>{Object.defineProperty(t,"__esModule",{value:!0}),t.PostTypesSettingsPanels=void 0;var a=function(e,t){if(Array.isArray(e))return e;if(Symbol.iterator in Object(e))return function(e,t){var n=[],a=!0,r=!1,o=void 0;try{for(var i,l=e[Symbol.iterator]();!(a=(i=l.next()).done)&&(n.push(i.value),!t||n.length!==t);a=!0);}catch(e){r=!0,o=e}finally{try{!a&&l.return&&l.return()}finally{if(r)throw o}}return n}(e,t);throw new TypeError("Invalid attempt to destructure non-iterable instance")},r=n(352);t.PostTypesSettingsPanels=function(e){var t=[],n=!0,o=!1,i=void 0;try{for(var l,c=Object.entries(e.settings)[Symbol.iterator]();!(n=(l=c.next()).done);n=!0){var u=l.value,s=a(u,2),m=s[0],d=s[1];t.push(React.createElement(r.PostTypeSettingsPanel,{legend:d.label,text:e.text,postType:m,settings:d,expireTypeList:e.expireTypeList,taxonomiesList:e.taxonomiesList[m],key:m+"-panel"}))}}catch(e){o=!0,i=e}finally{try{!n&&c.return&&c.return()}finally{if(o)throw i}}return t}},182:(e,t,n)=>{Object.defineProperty(t,"__esModule",{value:!0}),t.SelectControl=void 0;var a=n(610),r=n(537);t.SelectControl=function(e){return React.createElement(a.Fragment,null,0===e.options.length&&React.createElement("div",null,e.noItemFoundMessage),e.options.length>0&&React.createElement(r.SelectControl,{label:e.label,name:e.name,id:e.name,className:e.className,value:e.selected,onChange:function(t){e.onChange(t)},"data-data":e.data,options:e.options}),e.children,React.createElement("p",{className:"description"},e.description))}},97:(e,t,n)=>{Object.defineProperty(t,"__esModule",{value:!0}),t.SettingRow=void 0,n(610),t.SettingRow=function(e){return React.createElement("tr",{valign:"top"},React.createElement("th",{scope:"row"},React.createElement("label",{htmlFor:""},e.label)),React.createElement("td",null,e.children))}},248:(e,t)=>{Object.defineProperty(t,"__esModule",{value:!0}),t.SettingsFieldset=function(e){return React.createElement("fieldset",null,React.createElement("legend",null,e.legend),e.children)}},65:(e,t)=>{Object.defineProperty(t,"__esModule",{value:!0}),t.SettingsForm=function(e){return React.createElement("form",{method:"post"},e.children)}},56:(e,t,n)=>{Object.defineProperty(t,"__esModule",{value:!0}),t.SettingsSection=void 0;var a=n(610);t.SettingsSection=function(e){return React.createElement(a.Fragment,null,React.createElement("h2",null,e.title),React.createElement("p",null,e.description),e.children)}},54:(e,t)=>{Object.defineProperty(t,"__esModule",{value:!0}),t.SettingsTable=function(e){return React.createElement("table",{className:"form-table"},React.createElement("tbody",null,e.bodyChildren))}},774:(e,t)=>{Object.defineProperty(t,"__esModule",{value:!0}),t.SubmitButton=function(e){return React.createElement("input",{type:"submit",name:e.name,value:e.text,className:"button-primary"})}},236:(e,t,n)=>{Object.defineProperty(t,"__esModule",{value:!0}),t.TextControl=void 0;var a=n(610),r=n(537);t.TextControl=function(e){var t;return t=e.unescapedDescription?React.createElement("p",{className:"description",dangerouslySetInnerHTML:{__html:e.description}}):React.createElement("p",{className:"description"},e.description),React.createElement(a.Fragment,null,React.createElement(r.TextControl,{type:"text",label:e.label,name:e.name,id:e.name,className:e.className,value:e.value,placeholder:e.placeholder,onChange:function(t){e.onChange&&e.onChange(t)}}),t)}},28:(e,t,n)=>{Object.defineProperty(t,"__esModule",{value:!0}),t.ToggleArrowButton=void 0;var a=n(537);t.ToggleArrowButton=function(e){var t=e.iconExpanded?e.iconExpanded:"arrow-up-alt2",n=e.iconCollapsed?e.iconCollapsed:"arrow-down-alt2",r=e.isExpanded?t:n,o=e.isExpanded?e.titleExpanded:e.titleCollapsed;return React.createElement(a.Button,{isSmall:!0,title:o,icon:r,onClick:function(){e.onClick&&e.onClick()},className:e.className})}},76:(e,t,n)=>{Object.defineProperty(t,"__esModule",{value:!0}),t.ToggleCalendarDatePicker=void 0;var a=n(28),r=n(730),o=n(610);t.ToggleCalendarDatePicker=function(e){var t=e.isExpanded,n=e.strings,i=e.onToggleCalendar,l=e.currentDate,c=e.onChangeDate,u=e.is12Hour,s=e.startOfWeek;return(0,o.useEffect)((function(){var e=document.querySelector(".future-action-calendar-toggle");if(e){var t=e.nextElementSibling;if(t){var n=t.querySelector(".components-datetime__time");if(n){var a=n.nextSibling;a&&t.insertBefore(e,a)}}}})),React.createElement(o.Fragment,null,React.createElement(a.ToggleArrowButton,{className:"future-action-calendar-toggle",isExpanded:t,iconExpanded:"arrow-up-alt2",iconCollapsed:"calendar",titleExpanded:n.hideCalendar,titleCollapsed:n.showCalendar,onClick:i}),React.createElement(r.DateTimePicker,{currentDate:l,onChange:c,__nextRemoveHelpButton:!0,is12Hour:u,startOfWeek:s}))}},303:(e,t,n)=>{Object.defineProperty(t,"__esModule",{value:!0}),t.TokensControl=void 0;var a="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(e){return typeof e}:function(e){return e&&"function"==typeof Symbol&&e.constructor===Symbol&&e!==Symbol.prototype?"symbol":typeof e},r=n(610),o=n(537);t.TokensControl=function(e){var t=function(e,t){if(Array.isArray(e))return e;if(Symbol.iterator in Object(e))return function(e,t){var n=[],a=!0,r=!1,o=void 0;try{for(var i,l=e[Symbol.iterator]();!(a=(i=l.next()).done)&&(n.push(i.value),!t||n.length!==t);a=!0);}catch(e){r=!0,o=e}finally{try{!a&&l.return&&l.return()}finally{if(r)throw o}}return n}(e,t);throw new TypeError("Invalid attempt to destructure non-iterable instance")}((0,r.useState)(""),2),n=t[0],i=t[1];(0,r.useEffect)((function(){e.value&&i(e.value.join(","))}),[e.value]);var l=void 0;e.description&&(l=e.unescapedDescription?React.createElement("p",{className:"description",dangerouslySetInnerHTML:{__html:e.description}}):React.createElement("p",{className:"description"},e.description));var c=e.value?e.value:[];return React.createElement(r.Fragment,null,React.createElement(o.FormTokenField,{label:e.label,value:c,suggestions:e.options,onChange:function(t){e.onChange&&e.onChange(t),"object"===(void 0===t?"undefined":a(t))?i(t.join(",")):i("")},maxSuggestions:e.maxSuggestions,className:"publishpres-future-token-field",__experimentalExpandOnFocus:e.expandOnFocus,__experimentalAutoSelectFirstMatch:e.autoSelectFirstMatch}),React.createElement("input",{type:"hidden",name:e.name,value:n}),l)}},366:(e,t)=>{Object.defineProperty(t,"__esModule",{value:!0}),t.TrueFalseControl=function(e){var t=wp.element.Fragment,n=function(t){e.onChange&&e.onChange(t.target.value===e.trueValue&&jQuery(t.target).is(":checked"))};return React.createElement(t,null,React.createElement("input",{type:"radio",name:e.name,id:e.name+"-true",value:e.trueValue,defaultChecked:e.selected,onChange:n}),React.createElement("label",{htmlFor:e.name+"-true"},e.trueLabel),"  ",React.createElement("input",{type:"radio",name:e.name,defaultChecked:!e.selected,id:e.name+"-false",value:e.falseValue,onChange:n}),React.createElement("label",{htmlFor:e.name+"-false"},e.falseLabel),React.createElement("p",{className:"description"},e.description))}},352:(e,t,n)=>{Object.defineProperty(t,"__esModule",{value:!0});var a=n(694);Object.defineProperty(t,"ButtonsPanel",{enumerable:!0,get:function(){return a.ButtonsPanel}});var r=n(409);Object.defineProperty(t,"FutureActionPanel",{enumerable:!0,get:function(){return r.FutureActionPanel}});var o=n(738);Object.defineProperty(t,"FutureActionPanelBlockEditor",{enumerable:!0,get:function(){return o.FutureActionPanelBlockEditor}});var i=n(21);Object.defineProperty(t,"FutureActionPanelClassicEditor",{enumerable:!0,get:function(){return i.FutureActionPanelClassicEditor}});var l=n(990);Object.defineProperty(t,"FutureActionPanelQuickEdit",{enumerable:!0,get:function(){return l.FutureActionPanelQuickEdit}});var c=n(27);Object.defineProperty(t,"FutureActionPanelBulkEdit",{enumerable:!0,get:function(){return c.FutureActionPanelBulkEdit}});var u=n(406);Object.defineProperty(t,"PostTypeSettingsPanel",{enumerable:!0,get:function(){return u.PostTypeSettingsPanel}});var s=n(438);Object.defineProperty(t,"PostTypesSettingsPanels",{enumerable:!0,get:function(){return s.PostTypesSettingsPanels}});var m=n(97);Object.defineProperty(t,"SettingRow",{enumerable:!0,get:function(){return m.SettingRow}});var d=n(248);Object.defineProperty(t,"SettingsFieldset",{enumerable:!0,get:function(){return d.SettingsFieldset}});var p=n(65);Object.defineProperty(t,"SettingsForm",{enumerable:!0,get:function(){return p.SettingsForm}});var f=n(56);Object.defineProperty(t,"SettingsSection",{enumerable:!0,get:function(){return f.SettingsSection}});var y=n(54);Object.defineProperty(t,"SettingsTable",{enumerable:!0,get:function(){return y.SettingsTable}});var g=n(774);Object.defineProperty(t,"SubmitButton",{enumerable:!0,get:function(){return g.SubmitButton}});var b=n(561);Object.defineProperty(t,"CheckboxControl",{enumerable:!0,get:function(){return b.CheckboxControl}});var v=n(182);Object.defineProperty(t,"SelectControl",{enumerable:!0,get:function(){return v.SelectControl}});var h=n(236);Object.defineProperty(t,"TextControl",{enumerable:!0,get:function(){return h.TextControl}});var E=n(303);Object.defineProperty(t,"TokensControl",{enumerable:!0,get:function(){return E.TokensControl}});var x=n(549);Object.defineProperty(t,"NonceControl",{enumerable:!0,get:function(){return x.NonceControl}});var _=n(366);Object.defineProperty(t,"TrueFalseControl",{enumerable:!0,get:function(){return _.TrueFalseControl}})},500:(e,t)=>{Object.defineProperty(t,"__esModule",{value:!0});var n=t.getCurrentTimeInSeconds=function(){return o((new Date).getTime())},a=(t.getCurrentTimeAsTimestamp=function(){return a(n())},t.formatUnixTimeToTimestamp=function(e){var t=new Date(o(e));return t.getFullYear()+"-"+("0"+(t.getMonth()+1)).slice(-2)+"-"+("0"+t.getDate()).slice(-2)+" "+("0"+t.getHours()).slice(-2)+":"+("0"+t.getMinutes()).slice(-2)+":"+("0"+t.getSeconds()).slice(-2)}),r=(t.formatTimestampToUnixTime=function(e){var t=new Date(e);return o(t.getTime())},t.timeIsInSeconds=function(e){return parseInt(e).toString().length<=10}),o=t.normalizeUnixTimeToSeconds=function(e){return e=parseInt(e),r()?e:e/1e3};t.normalizeUnixTimeToMilliseconds=function(e){return e=parseInt(e),r()?1e3*e:e}},37:(e,t)=>{Object.defineProperty(t,"__esModule",{value:!0});var n="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(e){return typeof e}:function(e){return e&&"function"==typeof Symbol&&e.constructor===Symbol&&e!==Symbol.prototype?"symbol":typeof e},a=(t.compact=function(e){return e?(Array.isArray(e)||"object"!==(void 0===e?"undefined":n(e))||(e=Object.values(e)),e.filter((function(e){return null!=e&&""!==e}))):[]},t.debugLogFactory=function(e){return function(t){for(var n=arguments.length,a=Array(n>1?n-1:0),r=1;r<n;r++)a[r-1]=arguments[r];var o;console&&e.isDebugEnabled&&(o=console).debug.apply(o,["[Future]",t].concat(a))}},t.isGutenbergEnabled=function(){return document.body.classList.contains("block-editor-page")},t.getElementByName=function(e){return document.getElementsByName(e)[0]},t.getFieldByName=function(e,t){return document.querySelector("#the-list tr#post-"+t+" .column-expirationdate input#future_action_"+e+"-"+t)});t.getFieldValueByName=function(e,t){var n=a(e,t);return n?n.value:null},t.getFieldValueByNameAsArrayOfInt=function(e,t){var n=a(e,t);return n&&n.value?("number"==typeof n.value&&(n.value=n.value.toString()),n.value.split(",").map((function(e){return parseInt(e)}))):[]},t.getFieldValueByNameAsBool=function(e,t){var n=a(e,t);return!!n&&("1"===n.value||"true"===n.value)},t.getActionSettingsFromColumnData=function(e){var t=document.querySelector("#post-expire-column-"+e);return{enabled:"1"===t.dataset.actionEnabled,action:t.dataset.actionType,date:t.dataset.actionDate,dateUnix:t.dataset.actionDateUnix,taxonomy:t.dataset.actionTaxonomy,terms:t.dataset.actionTerms}},t.isNumber=function(e){return!isNaN(e)}},533:e=>{e.exports=ReactDOM},890:e=>{e.exports=publishpressFutureSettingsConfig},998:e=>{e.exports=wp},537:e=>{e.exports=wp.components},284:e=>{e.exports=wp.data},610:e=>{e.exports=wp.element},882:e=>{e.exports=wp.hooks},368:e=>{e.exports=wp.url}},l={};function c(e){var t=l[e];if(void 0!==t)return t.exports;var n=l[e]={exports:{}};return i[e](n,n.exports,c),n.exports}e=c(352),t=c(610),n=c(890),a=c(533),r=document.getElementById("publishpress-future-settings-post-types"),o=React.createElement((function(a){return React.createElement(t.StrictMode,null,React.createElement(e.SettingsForm,null,React.createElement(e.NonceControl,{name:"_postExpiratorMenuDefaults_nonce",nonce:n.nonce,referrer:n.referrer}),React.createElement(e.SettingsSection,{title:n.text.settingsSectionTitle,description:n.text.settingsSectionDescription},React.createElement(e.PostTypesSettingsPanels,{settings:n.settings,text:n.text,expireTypeList:n.expireTypeList,taxonomiesList:n.taxonomiesList})),React.createElement(e.ButtonsPanel,null,React.createElement(e.SubmitButton,{name:"expirationdateSaveDefaults",text:n.text.saveChanges}))))}),null),t.createRoot?(0,t.createRoot)(r).render(o):(0,a.render)(o,r)})();
//# sourceMappingURL=settings-post-types.js.map