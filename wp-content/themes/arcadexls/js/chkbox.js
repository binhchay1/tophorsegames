/* 
 * Picker v3.0.11 - 2014-02-26 
 * A jQuery plugin for replacing default checkboxes and radios. Part of the formstone library. 
 * http://formstone.it/picker/ 
 * 
 * Copyright 2014 Ben Plum; MIT Licensed 
 */ 

!function(a){"use strict";function b(b){b=a.extend({},k,b);for(var d=a(this),e=0,f=d.length;f>e;e++)c(d.eq(e),b);return d}function c(b,c){if(!b.data("picker")){c=a.extend({},c,b.data("picker-options"));var f=b.closest("label"),j=f.length?f.eq(0):a("label[for="+b.attr("id")+"]"),k=b.attr("type"),l="picker-"+("radio"===k?"radio":"checkbox"),m=b.attr("name"),n='<div class="picker-handle"><div class="picker-flag" /></div>';c.toggle&&(l+=" picker-toggle",n='<span class="picker-toggle-label on">'+c.labels.on+'</span><span class="picker-toggle-label off">'+c.labels.off+"</span>"+n),b.addClass("picker-element"),j.wrap('<div class="picker '+l+" "+c.customClass+'" />').before(n).addClass("mt_label");var o=j.parents(".picker"),p=o.find(".picker-handle"),q=o.find(".picker-toggle-label");b.is(":checked")&&o.addClass("checked"),b.is(":disabled")&&o.addClass("disabled");var r=a.extend({},c,{$picker:o,$input:b,$handle:p,$label:j,$labels:q,group:m,isRadio:"radio"===k,isCheckbox:"checkbox"===k});r.$input.on("focus.picker",r,h).on("blur.picker",r,i).on("change.picker",r,e).on("click.picker",r,d).on("deselect.picker",r,g).data("picker",r),r.$picker.on("click.picker",r,d)}}function d(b){b.stopPropagation();var c=b.data;a(b.target).is(c.$input)||(b.preventDefault(),c.$input.trigger("click"))}function e(a){var b=a.data;if(!b.$input.is(":disabled")){var c=b.$input.is(":checked");b.isCheckbox?c?f(a,!0):g(a,!0):(c||j&&!c)&&f(a)}}function f(b){var c=b.data;"undefined"!=typeof c.group&&c.isRadio&&a('input[name="'+c.group+'"]').not(c.$input).trigger("deselect"),c.$picker.addClass("checked")}function g(a){var b=a.data;b.$picker.removeClass("checked")}function h(a){a.data.$picker.addClass("focus")}function i(a){a.data.$picker.removeClass("focus")}var j=document.all&&document.querySelector&&!document.addEventListener,k={customClass:"",toggle:!1,labels:{on:"ON",off:"OFF"}},l={defaults:function(b){return k=a.extend(k,b||{}),a(this)},destroy:function(){return a(this).each(function(b,c){var d=a(c).data("picker");d&&(d.$picker.off(".picker"),d.$handle.remove(),d.$labels.remove(),d.$input.off(".picker").removeClass("picker-element").data("picker",null),d.$label.removeClass("mt_label").unwrap())})},disable:function(){return a(this).each(function(b,c){var d=a(c).data("picker");d&&(d.$input.prop("disabled",!0),d.$picker.addClass("disabled"))})},enable:function(){return a(this).each(function(b,c){var d=a(c).data("picker");d&&(d.$input.prop("disabled",!1),d.$picker.removeClass("disabled"))})},update:function(){return a(this).each(function(b,c){var d=a(c).data("picker");d&&!d.$input.is(":disabled")&&(d.$input.is(":checked")?f({data:d},!0):g({data:d},!0))})}};a.fn.picker=function(a){return l[a]?l[a].apply(this,Array.prototype.slice.call(arguments,1)):"object"!=typeof a&&a?this:b.apply(this,arguments)},a.picker=function(a){"defaults"===a&&l.defaults.apply(this,Array.prototype.slice.call(arguments,1))}}(jQuery);
jQuery(document).ready(function($){
	$("input[type=radio], input[type=checkbox]").picker();
	$(".yes input[type=radio],.no input[type=radio],#send-notice,.thread-options input").picker("destroy");
});