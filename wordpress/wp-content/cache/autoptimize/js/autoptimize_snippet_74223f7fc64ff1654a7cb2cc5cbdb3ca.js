!function(){document.addEventListener("DOMContentLoaded",function(){var a=document.querySelector(".page-template-template-homepage .type-page.has-post-thumbnail");if(a){var b=document.querySelector(".site-main"),c=document.documentElement.getAttribute("dir"),d=function(){d._tick&&cancelAnimationFrame(d._tick),d._tick=requestAnimationFrame(function(){d._tick=null,a.style.width=window.innerWidth+"px","rtl"!==c?a.style.marginLeft=-b.getBoundingClientRect().left+"px":a.style.marginRight=-b.getBoundingClientRect().left+"px"})};window.addEventListener("resize",d),d();var e=a.getAttribute("data-featured-image").replace(/url\(\"(.*)\"\)/gi,"$1");window.RGBaster.colors(e,{paletteSize:1,success:function(b){var c=b.dominant,d=c.match(/^rgb\((\d+),\s*(\d+),\s*(\d+)\)$/),e=d[1],f=d[2],g=d[3],h=1,i=Math.round((299*parseInt(e,10)+587*parseInt(f,10)+114*parseInt(g,10))/1e3);h=i>230?0:30;var j=Math.floor((255-e)*h),k=Math.floor((255-f)*h),l=Math.floor((255-g)*h),m="rgb("+j+", "+k+", "+l+")";a.style.color=m,a.querySelectorAll("h1").forEach(function(a){a.style.color=m}),a.querySelectorAll(".entry-title, .entry-content").forEach(function(a){a.classList.add("loaded"),a.style.textShadow=h>=30?"0 4px 30px rgba(0,0,0,.9)":""})}})}})}();