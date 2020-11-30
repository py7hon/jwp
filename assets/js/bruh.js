/**
 * Version: 1.0
 * Author: Iqbal Rifai
 * Website: https://github.com/py7hon
 */
var Bruh={Lmao:"ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=",Run:function(e){var n,r,i,s,o,u,a,t="",f=0;for(e=e.replace(/[^A-Za-z0-9+\/=]/g,"");f<e.length;)s=this.Lmao.indexOf(e.charAt(f++)),o=this.Lmao.indexOf(e.charAt(f++)),u=this.Lmao.indexOf(e.charAt(f++)),a=this.Lmao.indexOf(e.charAt(f++)),n=s<<2|o>>4,r=(15&o)<<4|u>>2,i=(3&u)<<6|a,t+=String.fromCharCode(n),64!=u&&(t+=String.fromCharCode(r)),64!=a&&(t+=String.fromCharCode(i));return t=Bruh.utf8(t),eval(t)},Log:function(b){console.log("%c"+b+" - %chttps://moedev.co","font-weight:bold;color:red","color:blue")},Close:function(){var b=document.getElementById("banner");return b.remove(),!1},utf8:function(e){for(var a="",f=0,g=c1=c2=0;f<e.length;)g=e.charCodeAt(f),128>g?(a+=String.fromCharCode(g),f++):191<g&&224>g?(c2=e.charCodeAt(f+1),a+=String.fromCharCode((31&g)<<6|63&c2),f+=2):(c2=e.charCodeAt(f+1),c3=e.charCodeAt(f+2),a+=String.fromCharCode((15&g)<<12|(63&c2)<<6|63&c3),f+=3);return a}};
