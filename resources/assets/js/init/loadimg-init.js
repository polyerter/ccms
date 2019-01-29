"use strict";
jQuery(document).ready(function(){
    jQuery('#upload').loadImg({
        "text"			: "Загрузите картинку ...",
        "fileExt"		: ["png","jpg"],
        "fileSize_min"	: 0,
        "fileSize_max"	: 2
    });
});