!function(){"use strict";var e=window.wp.blocks,t=window.wp.element,i=window.wp.blockEditor,r=window.wp.components,a=window.wp.compose,n=window.wp.data,s=window.wp.i18n,c=window.bp.blockData,l=(0,a.compose)([(0,n.withSelect)(((e,t)=>{const{url:i}=t.attributes,{getEmbedPreview:r,isRequestingEmbedPreview:a}=e("core");return{preview:!!i&&r(i),fetching:!!i&&a(i)}}))])((({attributes:e,setAttributes:a,isSelected:n,preview:l,fetching:o})=>{const d=(0,i.useBlockProps)(),{url:p,caption:m}=e,u=(0,s.__)("BuddyPress Activity URL","buddypress"),[b,y]=(0,t.useState)(p),[w,v]=(0,t.useState)(!p),E=(0,t.createElement)(i.BlockControls,null,(0,t.createElement)(r.ToolbarGroup,null,(0,t.createElement)(r.ToolbarButton,{icon:"edit",title:(0,s.__)("Edit URL","buddypress"),onClick:e=>{e&&e.preventDefault(),v(!0)}})));return w?(0,t.createElement)("div",{...d},(0,t.createElement)(r.Placeholder,{icon:"buddicons-activity",label:u,className:"wp-block-embed",instructions:(0,s.__)("Paste the link to the activity content you want to display on your site.","buddypress")},(0,t.createElement)("form",{onSubmit:e=>{e&&e.preventDefault(),v(!1),a({url:b})}},(0,t.createElement)("input",{type:"url",value:b||"",className:"components-placeholder__input","aria-label":u,placeholder:(0,s.__)("Enter URL to embed here…","buddypress"),onChange:e=>y(e.target.value)}),(0,t.createElement)(r.Button,{variant:"primary",type:"submit"},(0,s.__)("Embed","buddypress"))),(0,t.createElement)("div",{className:"components-placeholder__learn-more"},(0,t.createElement)(r.ExternalLink,{href:(0,s.__)("https://codex.buddypress.org/activity-embeds/","buddypress")},(0,s.__)("Learn more about activity embeds","buddypress"))))):o?(0,t.createElement)("div",{className:"wp-block-embed is-loading"},(0,t.createElement)(r.Spinner,null),(0,t.createElement)("p",null,(0,s.__)("Embedding…","buddypress"))):l&&l.x_buddypress&&"activity"===l.x_buddypress?(0,t.createElement)("div",{...d},!w&&E,(0,t.createElement)("figure",{className:"wp-block-embed is-type-bp-activity"},(0,t.createElement)("div",{className:"wp-block-embed__wrapper"},(0,t.createElement)(r.Disabled,null,(0,t.createElement)(r.SandBox,{html:l&&l.html?l.html:"",scripts:[c.embedScriptURL]}))),(!i.RichText.isEmpty(m)||n)&&(0,t.createElement)(i.RichText,{tagName:"figcaption",placeholder:(0,s.__)("Write caption…","buddypress"),value:m,onChange:e=>a({caption:e}),inlineToolbar:!0}))):(0,t.createElement)("div",{...d},E,(0,t.createElement)(r.Placeholder,{icon:"buddicons-activity",label:u},(0,t.createElement)("p",{className:"components-placeholder__error"},(0,s.__)("The URL you provided is not a permalink to a public BuddyPress Activity. Please use another URL.","buddypress"))))})),o=JSON.parse('{"$schema":"https://schemas.wp.org/trunk/block.json","apiVersion":2,"name":"bp/embed-activity","title":"Embed an activity","category":"embed","icon":"buddicons-activity","description":"Add a block that displays the activity content pulled from this or other community sites.","keywords":["BuddyPress","activity","community"],"textdomain":"buddypress","attributes":{"url":{"type":"string"},"caption":{"type":"string","source":"html","selector":"figcaption"}},"supports":{"align":true},"editorScript":"file:index.js","style":"file:index.css"}');(0,e.registerBlockType)(o,{icon:{background:"#fff",foreground:"#d84800",src:"buddicons-activity"},edit:l,save:({attributes:e})=>{const r=i.useBlockProps.save({className:"wp-block-embed is-type-bp-activity"}),{url:a,caption:n}=e;return a?(0,t.createElement)("figure",{...r},(0,t.createElement)("div",{className:"wp-block-embed__wrapper"},`\n${a}\n`),!i.RichText.isEmpty(n)&&(0,t.createElement)(i.RichText.Content,{tagName:"figcaption",value:n})):null}})}();