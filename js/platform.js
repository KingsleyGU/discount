(function(){"use strict";var e={function:!0,object:!0},t=e[typeof window]&&window||this,i=e[typeof exports]&&exports,n=e[typeof module]&&module&&!module.nodeType&&module,r=i&&n&&"object"==typeof global&&global;!r||r.global!==r&&r.window!==r&&r.self!==r||(t=r);var o=Math.pow(2,53)-1,a=/\bOpera/,l=Object.prototype,s=l.hasOwnProperty,b=l.toString;function c(e){return(e=String(e)).charAt(0).toUpperCase()+e.slice(1)}function p(e){return e=x(e),/^(?:webOS|i(?:OS|P))/.test(e)?e:c(e)}function u(e,t){for(var i in e)s.call(e,i)&&t(e[i],i,e)}function d(e){return null==e?c(e):b.call(e).slice(8,-1)}function f(e){return String(e).replace(/([ -])(?!$)/g,"$1?")}function S(e,t){var i=null;return function(e,t){var i=-1,n=e?e.length:0;if("number"==typeof n&&n>-1&&n<=o)for(;++i<n;)t(e[i],i,e);else u(e,t)}(e,function(n,r){i=t(i,n,r,e)}),i}function x(e){return String(e).replace(/^ +| +$/g,"")}var h=function e(i){var n=t,r=i&&"object"==typeof i&&"String"!=d(i);r&&(n=i,i=null);var o=n.navigator||{},l=o.userAgent||"";i||(i=l);var s,c,h,m,g,O=r?!!o.likeChrome:/\bChrome\b/.test(i)&&!/internal|\n/i.test(b.toString()),y=r?"Object":"ScriptBridgingProxyObject",M=r?"Object":"Environment",E=r&&n.java?"JavaPackage":d(n.java),v=r?"Object":"RuntimeObject",P=/\bJava/.test(E)&&n.java,w=P&&d(n.environment)==M,k=P?"a":"α",C=P?"b":"β",W=n.document||{},B=n.operamini||n.opera,A=a.test(A=r&&B?B["[[Class]]"]:d(B))?A:B=null,I=i,R=[],T=null,F=i==l,G=F&&B&&"function"==typeof B.version&&B.version(),$=S([{label:"EdgeHTML",pattern:"(?:Edge|EdgA|EdgiOS)"},"Trident",{label:"WebKit",pattern:"AppleWebKit"},"iCab","Presto","NetFront","Tasman","KHTML","Gecko"],function(e,t){return e||RegExp("\\b"+(t.pattern||f(t))+"\\b","i").exec(i)&&(t.label||t)}),j=function(e){return S(e,function(e,t){return e||RegExp("\\b"+(t.pattern||f(t))+"\\b","i").exec(i)&&(t.label||t)})}(["Adobe AIR","Arora","Avant Browser","Breach","Camino","Electron","Epiphany","Fennec","Flock","Galeon","GreenBrowser","iCab","Iceweasel","K-Meleon","Konqueror","Lunascape","Maxthon",{label:"Microsoft Edge",pattern:"(?:Edge|Edg|EdgA|EdgiOS)"},"Midori","Nook Browser","PaleMoon","PhantomJS","Raven","Rekonq","RockMelt",{label:"Samsung Internet",pattern:"SamsungBrowser"},"SeaMonkey",{label:"Silk",pattern:"(?:Cloud9|Silk-Accelerated)"},"Sleipnir","SlimBrowser",{label:"SRWare Iron",pattern:"Iron"},"Sunrise","Swiftfox","Waterfox","WebPositive","Opera Mini",{label:"Opera Mini",pattern:"OPiOS"},"Opera",{label:"Opera",pattern:"OPR"},"Chrome",{label:"Chrome Mobile",pattern:"(?:CriOS|CrMo)"},{label:"Firefox",pattern:"(?:Firefox|Minefield)"},{label:"Firefox for iOS",pattern:"FxiOS"},{label:"IE",pattern:"IEMobile"},{label:"IE",pattern:"MSIE"},"Safari"]),X=V([{label:"BlackBerry",pattern:"BB10"},"BlackBerry",{label:"Galaxy S",pattern:"GT-I9000"},{label:"Galaxy S2",pattern:"GT-I9100"},{label:"Galaxy S3",pattern:"GT-I9300"},{label:"Galaxy S4",pattern:"GT-I9500"},{label:"Galaxy S5",pattern:"SM-G900"},{label:"Galaxy S6",pattern:"SM-G920"},{label:"Galaxy S6 Edge",pattern:"SM-G925"},{label:"Galaxy S7",pattern:"SM-G930"},{label:"Galaxy S7 Edge",pattern:"SM-G935"},"Google TV","Lumia","iPad","iPod","iPhone","Kindle",{label:"Kindle Fire",pattern:"(?:Cloud9|Silk-Accelerated)"},"Nexus","Nook","PlayBook","PlayStation Vita","PlayStation","TouchPad","Transformer",{label:"Wii U",pattern:"WiiU"},"Wii","Xbox One",{label:"Xbox 360",pattern:"Xbox"},"Xoom"]),N=function(e){return S(e,function(e,t,n){return e||(t[X]||t[/^[a-z]+(?: +[a-z]+\b)*/i.exec(X)]||RegExp("\\b"+f(n)+"(?:\\b|\\w*\\d)","i").exec(i))&&n})}({Apple:{iPad:1,iPhone:1,iPod:1},Archos:{},Amazon:{Kindle:1,"Kindle Fire":1},Asus:{Transformer:1},"Barnes & Noble":{Nook:1},BlackBerry:{PlayBook:1},Google:{"Google TV":1,Nexus:1},HP:{TouchPad:1},HTC:{},LG:{},Microsoft:{Xbox:1,"Xbox One":1},Motorola:{Xoom:1},Nintendo:{"Wii U":1,Wii:1},Nokia:{Lumia:1},Samsung:{"Galaxy S":1,"Galaxy S2":1,"Galaxy S3":1,"Galaxy S4":1},Sony:{PlayStation:1,"PlayStation Vita":1}}),K=function(e){return S(e,function(e,t){var n=t.pattern||f(t);return!e&&(e=RegExp("\\b"+n+"(?:/[\\d.]+|[ \\w.]*)","i").exec(i))&&(e=function(e,t,i){var n={"10.0":"10",6.4:"10 Technical Preview",6.3:"8.1",6.2:"8",6.1:"Server 2008 R2 / 7","6.0":"Server 2008 / Vista",5.2:"Server 2003 / XP 64-bit",5.1:"XP",5.01:"2000 SP1","5.0":"2000","4.0":"NT","4.90":"ME"};return t&&i&&/^Win/i.test(e)&&!/^Windows Phone /i.test(e)&&(n=n[/[\d.]+$/.exec(e)])&&(e="Windows "+n),e=String(e),t&&i&&(e=e.replace(RegExp(t,"i"),i)),e=p(e.replace(/ ce$/i," CE").replace(/\bhpw/i,"web").replace(/\bMacintosh\b/,"Mac OS").replace(/_PowerPC\b/i," OS").replace(/\b(OS X) [^ \d]+/i,"$1").replace(/\bMac (OS X)\b/,"$1").replace(/\/(\d)/," $1").replace(/_/g,".").replace(/(?: BePC|[ .]*fc[ \d.]+)$/i,"").replace(/\bx86\.64\b/gi,"x86_64").replace(/\b(Windows Phone) OS\b/,"$1").replace(/\b(Chrome OS \w+) [\d.]+\b/,"$1").split(" on ")[0])}(e,n,t.label||t)),e})}(["Windows Phone","Android","CentOS",{label:"Chrome OS",pattern:"CrOS"},"Debian","Fedora","FreeBSD","Gentoo","Haiku","Kubuntu","Linux Mint","OpenBSD","Red Hat","SuSE","Ubuntu","Xubuntu","Cygwin","Symbian OS","hpwOS","webOS ","webOS","Tablet OS","Tizen","Linux","Mac OS X","Macintosh","Mac","Windows 98;","Windows "]);function V(e){return S(e,function(e,t){var n=t.pattern||f(t);return!e&&(e=RegExp("\\b"+n+" *\\d+[.\\w_]*","i").exec(i)||RegExp("\\b"+n+" *\\w+-[\\w]*","i").exec(i)||RegExp("\\b"+n+"(?:; *(?:[a-z]+[_-])?[a-z]+\\d+|[^ ();-]*)","i").exec(i))&&((e=String(t.label&&!RegExp(n,"i").test(t.label)?t.label:e).split("/"))[1]&&!/[\d.]+/.test(e[0])&&(e[0]+=" "+e[1]),t=t.label||t,e=p(e[0].replace(RegExp(n,"i"),t).replace(RegExp("; *(?:"+t+"[_-])?","i")," ").replace(RegExp("("+t+")[-_.]?(\\w)","i"),"$1 $2"))),e})}if($&&($=[$]),N&&!X&&(X=V([N])),(s=/\bGoogle TV\b/.exec(X))&&(X=s[0]),/\bSimulator\b/i.test(i)&&(X=(X?X+" ":"")+"Simulator"),"Opera Mini"==j&&/\bOPiOS\b/.test(i)&&R.push("running in Turbo/Uncompressed mode"),"IE"==j&&/\blike iPhone OS\b/.test(i)?(N=(s=e(i.replace(/like iPhone OS/,""))).manufacturer,X=s.product):/^iP/.test(X)?(j||(j="Safari"),K="iOS"+((s=/ OS ([\d_]+)/i.exec(i))?" "+s[1].replace(/_/g,"."):"")):"Konqueror"!=j||/buntu/i.test(K)?N&&"Google"!=N&&(/Chrome/.test(j)&&!/\bMobile Safari\b/i.test(i)||/\bVita\b/.test(X))||/\bAndroid\b/.test(K)&&/^Chrome/.test(j)&&/\bVersion\//i.test(i)?(j="Android Browser",K=/\bAndroid\b/.test(K)?K:"Android"):"Silk"==j?(/\bMobi/i.test(i)||(K="Android",R.unshift("desktop mode")),/Accelerated *= *true/i.test(i)&&R.unshift("accelerated")):"PaleMoon"==j&&(s=/\bFirefox\/([\d.]+)\b/.exec(i))?R.push("identifying as Firefox "+s[1]):"Firefox"==j&&(s=/\b(Mobile|Tablet|TV)\b/i.exec(i))?(K||(K="Firefox OS"),X||(X=s[1])):!j||(s=!/\bMinefield\b/i.test(i)&&/\b(?:Firefox|Safari)\b/.exec(j))?(j&&!X&&/[\/,]|^[^(]+?\)/.test(i.slice(i.indexOf(s+"/")+8))&&(j=null),(s=X||N||K)&&(X||N||/\b(?:Android|Symbian OS|Tablet OS|webOS)\b/.test(K))&&(j=/[a-z]+(?: Hat)?/i.exec(/\bAndroid\b/.test(K)?K:s)+" Browser")):"Electron"==j&&(s=(/\bChrome\/([\d.]+)\b/.exec(i)||0)[1])&&R.push("Chromium "+s):K="Kubuntu",G||(G=S(["(?:Cloud9|CriOS|CrMo|Edge|Edg|EdgA|EdgiOS|FxiOS|IEMobile|Iron|Opera ?Mini|OPiOS|OPR|Raven|SamsungBrowser|Silk(?!/[\\d.]+$))","Version",f(j),"(?:Firefox|Minefield|NetFront)"],function(e,t){return e||(RegExp(t+"(?:-[\\d.]+/|(?: for [\\w-]+)?[ /-])([\\d.]+[^ ();/_-]*)","i").exec(i)||0)[1]||null})),(s=("iCab"==$&&parseFloat(G)>3?"WebKit":/\bOpera\b/.test(j)&&(/\bOPR\b/.test(i)?"Blink":"Presto"))||/\b(?:Midori|Nook|Safari)\b/i.test(i)&&!/^(?:Trident|EdgeHTML)$/.test($)&&"WebKit"||!$&&/\bMSIE\b/i.test(i)&&("Mac OS"==K?"Tasman":"Trident")||"WebKit"==$&&/\bPlayStation\b(?! Vita\b)/i.test(j)&&"NetFront")&&($=[s]),"IE"==j&&(s=(/; *(?:XBLWP|ZuneWP)(\d+)/i.exec(i)||0)[1])?(j+=" Mobile",K="Windows Phone "+(/\+$/.test(s)?s:s+".x"),R.unshift("desktop mode")):/\bWPDesktop\b/i.test(i)?(j="IE Mobile",K="Windows Phone 8.x",R.unshift("desktop mode"),G||(G=(/\brv:([\d.]+)/.exec(i)||0)[1])):"IE"!=j&&"Trident"==$&&(s=/\brv:([\d.]+)/.exec(i))&&(j&&R.push("identifying as "+j+(G?" "+G:"")),j="IE",G=s[1]),F){if(m="global",g=null!=(h=n)?typeof h[m]:"number",/^(?:boolean|number|string|undefined)$/.test(g)||"object"==g&&!h[m])d(s=n.runtime)==y?(j="Adobe AIR",K=s.flash.system.Capabilities.os):d(s=n.phantom)==v?(j="PhantomJS",G=(s=s.version||null)&&s.major+"."+s.minor+"."+s.patch):"number"==typeof W.documentMode&&(s=/\bTrident\/(\d+)/i.exec(i))?(G=[G,W.documentMode],(s=+s[1]+4)!=G[1]&&(R.push("IE "+G[1]+" mode"),$&&($[1]=""),G[1]=s),G="IE"==j?String(G[1].toFixed(1)):G[0]):"number"==typeof W.documentMode&&/^(?:Chrome|Firefox)\b/.test(j)&&(R.push("masking as "+j+" "+G),j="IE",G="11.0",$=["Trident"],K="Windows");else if(P&&(I=(s=P.lang.System).getProperty("os.arch"),K=K||s.getProperty("os.name")+" "+s.getProperty("os.version")),w){try{G=n.require("ringo/engine").version.join("."),j="RingoJS"}catch(e){(s=n.system)&&s.global.system==n.system&&(j="Narwhal",K||(K=s[0].os||null))}j||(j="Rhino")}else"object"==typeof n.process&&!n.process.browser&&(s=n.process)&&("object"==typeof s.versions&&("string"==typeof s.versions.electron?(R.push("Node "+s.versions.node),j="Electron",G=s.versions.electron):"string"==typeof s.versions.nw&&(R.push("Chromium "+G,"Node "+s.versions.node),j="NW.js",G=s.versions.nw)),j||(j="Node.js",I=s.arch,K=s.platform,G=(G=/[\d.]+/.exec(s.version))?G[0]:null));K=K&&p(K)}if(G&&(s=/(?:[ab]|dp|pre|[ab]\d+pre)(?:\d+\+?)?$/i.exec(G)||/(?:alpha|beta)(?: ?\d)?/i.exec(i+";"+(F&&o.appMinorVersion))||/\bMinefield\b/i.test(i)&&"a")&&(T=/b/i.test(s)?"beta":"alpha",G=G.replace(RegExp(s+"\\+?$"),"")+("beta"==T?C:k)+(/\d+\+?/.exec(s)||"")),"Fennec"==j||"Firefox"==j&&/\b(?:Android|Firefox OS)\b/.test(K))j="Firefox Mobile";else if("Maxthon"==j&&G)G=G.replace(/\.[\d.]+/,".x");else if(/\bXbox\b/i.test(X))"Xbox 360"==X&&(K=null),"Xbox 360"==X&&/\bIEMobile\b/.test(i)&&R.unshift("mobile mode");else if(!/^(?:Chrome|IE|Opera)$/.test(j)&&(!j||X||/Browser|Mobi/.test(j))||"Windows CE"!=K&&!/Mobi/i.test(i))if("IE"==j&&F)try{null===n.external&&R.unshift("platform preview")}catch(e){R.unshift("embedded")}else(/\bBlackBerry\b/.test(X)||/\bBB10\b/.test(i))&&(s=(RegExp(X.replace(/ +/g," *")+"/([.\\d]+)","i").exec(i)||0)[1]||G)?(K=((s=[s,/BB10/.test(i)])[1]?(X=null,N="BlackBerry"):"Device Software")+" "+s[0],G=null):this!=u&&"Wii"!=X&&(F&&B||/Opera/.test(j)&&/\b(?:MSIE|Firefox)\b/i.test(i)||"Firefox"==j&&/\bOS X (?:\d+\.){2,}/.test(K)||"IE"==j&&(K&&!/^Win/.test(K)&&G>5.5||/\bWindows XP\b/.test(K)&&G>8||8==G&&!/\bTrident\b/.test(i)))&&!a.test(s=e.call(u,i.replace(a,"")+";"))&&s.name&&(s="ing as "+s.name+((s=s.version)?" "+s:""),a.test(j)?(/\bIE\b/.test(s)&&"Mac OS"==K&&(K=null),s="identify"+s):(s="mask"+s,j=A?p(A.replace(/([a-z])([A-Z])/g,"$1 $2")):"Opera",/\bIE\b/.test(s)&&(K=null),F||(G=null)),$=["Presto"],R.push(s));else j+=" Mobile";(s=(/\bAppleWebKit\/([\d.]+\+?)/i.exec(i)||0)[1])&&(s=[parseFloat(s.replace(/\.(\d)$/,".0$1")),s],"Safari"==j&&"+"==s[1].slice(-1)?(j="WebKit Nightly",T="alpha",G=s[1].slice(0,-1)):G!=s[1]&&G!=(s[2]=(/\bSafari\/([\d.]+\+?)/i.exec(i)||0)[1])||(G=null),s[1]=(/\bChrome\/([\d.]+)/i.exec(i)||0)[1],537.36==s[0]&&537.36==s[2]&&parseFloat(s[1])>=28&&"WebKit"==$&&($=["Blink"]),F&&(O||s[1])?($&&($[1]="like Chrome"),s=s[1]||((s=s[0])<530?1:s<532?2:s<532.05?3:s<533?4:s<534.03?5:s<534.07?6:s<534.1?7:s<534.13?8:s<534.16?9:s<534.24?10:s<534.3?11:s<535.01?12:s<535.02?"13+":s<535.07?15:s<535.11?16:s<535.19?17:s<536.05?18:s<536.1?19:s<537.01?20:s<537.11?"21+":s<537.13?23:s<537.18?24:s<537.24?25:s<537.36?26:"Blink"!=$?"27":"28")):($&&($[1]="like Safari"),s=(s=s[0])<400?1:s<500?2:s<526?3:s<533?4:s<534?"4+":s<535?5:s<537?6:s<538?7:s<601?8:"8"),$&&($[1]+=" "+(s+="number"==typeof s?".x":/[.+]/.test(s)?"":"+")),"Safari"==j&&(!G||parseInt(G)>45)&&(G=s)),"Opera"==j&&(s=/\bzbov|zvav$/.exec(K))?(j+=" ",R.unshift("desktop mode"),"zvav"==s?(j+="Mini",G=null):j+="Mobile",K=K.replace(RegExp(" *"+s+"$"),"")):"Safari"==j&&/\bChrome\b/.exec($&&$[1])&&(R.unshift("desktop mode"),j="Chrome Mobile",G=null,/\bOS X\b/.test(K)?(N="Apple",K="iOS 4.3+"):K=null),G&&0==G.indexOf(s=/[\d.]+$/.exec(K))&&i.indexOf("/"+s+"-")>-1&&(K=x(K.replace(s,""))),$&&!/\b(?:Avant|Nook)\b/.test(j)&&(/Browser|Lunascape|Maxthon/.test(j)||"Safari"!=j&&/^iOS/.test(K)&&/\bSafari\b/.test($[1])||/^(?:Adobe|Arora|Breach|Midori|Opera|Phantom|Rekonq|Rock|Samsung Internet|Sleipnir|Web)/.test(j)&&$[1])&&(s=$[$.length-1])&&R.push(s),R.length&&(R=["("+R.join("; ")+")"]),N&&X&&X.indexOf(N)<0&&R.push("on "+N),X&&R.push((/^on /.test(R[R.length-1])?"":"on ")+X),K&&(s=/ ([\d.+]+)$/.exec(K),c=s&&"/"==K.charAt(K.length-s[0].length-1),K={architecture:32,family:s&&!c?K.replace(s[0],""):K,version:s?s[1]:null,toString:function(){var e=this.version;return this.family+(e&&!c?" "+e:"")+(64==this.architecture?" 64-bit":"")}}),(s=/\b(?:AMD|IA|Win|WOW|x86_|x)64\b/i.exec(I))&&!/\bi686\b/i.test(I)?(K&&(K.architecture=64,K.family=K.family.replace(RegExp(" *"+s),"")),j&&(/\bWOW64\b/i.test(i)||F&&/\w(?:86|32)$/.test(o.cpuClass||o.platform)&&!/\bWin64; x64\b/i.test(i))&&R.unshift("32-bit")):K&&/^OS X/.test(K.family)&&"Chrome"==j&&parseFloat(G)>=39&&(K.architecture=64),i||(i=null);var z={};return z.description=i,z.layout=$&&$[0],z.manufacturer=N,z.name=j,z.prerelease=T,z.product=X,z.ua=i,z.version=j&&G,z.os=K||{architecture:null,family:null,version:null,toString:function(){return"null"}},z.parse=e,z.toString=function(){return this.description||""},z.version&&R.unshift(G),z.name&&R.unshift(j),K&&j&&(K!=String(K).split(" ")[0]||K!=j.split(" ")[0]&&!X)&&R.push(X?"("+K+")":"on "+K),R.length&&(z.description=R.join(" ")),z}();"function"==typeof define&&"object"==typeof define.amd&&define.amd?(t.platform=h,define(function(){return h})):i&&n?u(h,function(e,t){i[t]=e}):t.platform=h}).call(this);