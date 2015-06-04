function goHotSite(url) {
   window.location.href = "https://www.comprafacil.com.br:443/hotsite/" + url;
}


var bannerArray = new Array();
function goBannerLink(bd, id){
   for(i=0; i < bannerArray.length; i++){
      var t = new String(bannerArray[i]);
      var it = t.split("|")
      if(it.length > 0) {
         if(it[0] == bd){
            if(it[1] == id){
               if (it.length == 4 && it[3] == 'destaque_home') {
                  _ATMLC.FTK(it[2],1, true);
                  break;
               } else {
                  window.location.href = it[2];
                  break;
               }
            }
         }
      }
   }
}
function rejeitaTecla(e9){
   var digitado;
   if (e9.keyCode) digitado = e9.keyCode;
   else if (e9.which) digitado = e9.which;
   if (digitado == 13) {
      e9.returnValue = false;
      if (document.all) {
         e9.keyCode = 0;
      } else {
         e9.preventDefault();
         e9.stopPropagation();
      }
      return false;
   }
   return true;
}
var f1x = true;
function submitEvent(c2, t3, e9, id) {
   var dig;
   if (e9.keyCode) dig = e9.keyCode;
   else if (e9.which) dig = e9.which;
   if (dig != 9 && dig != 16) {
      var rx = rejeitaTecla(e9);
      if (!rx||(t3!=null && c2.value.length==parseInt(t3))) {
         if (f1x) {
            f1x = false;
            window.setTimeout("f1x = true;", 500);
            document.getElementById(id).click();
         }
      }
      return rx;
   }
}


var browser = navigator.userAgent.toLowerCase();
var ie6 = browser.indexOf("msie 6") != -1;
if(ie6) {
   document.write('<link rel="stylesheet" href="https://www.comprafacil.com.br:443/css/ie6.css" type="text/css" />');
}


var campoCEP;
function setCampoCEP(field) {
   campoCEP = field;
}

function buscaCEP(campo) {
   setCampoCEP(campo);
   var hor = (screen.width - 450) / 2;
   var ver = (screen.height - 400) / 2;
   var acertos = 'width=450, height=400,left='+hor+', top='+ver+', screenx='+hor+', screeny='+ver+', status=1, scrollbars=1, resizable=0, menubar=0';
   var cepagina = window.open('/bbrasil/pages/comum/cep.jsf;jsessionid=MOAcXlMUbSIkHTJdAFigNA**.aplweb07_prd','CEP',acertos);
   cepagina.creator = self;
   cepagina.focus();
}

function recebeCep(cep) {
   document.getElementById(campoCEP).value = cep;
   setCampoCEP("");
}




function abrir(URL) {
   var width = 538; var height = 466; var left = 99; var top = 99;
   window.open(URL,'Verisign', 'width='+width+', height='+height+', top='+top+', left='+left+', scrollbars=no, status=no, toolbar=no, location=no, directories=no, menubar=no, resizable=no, fullscreen=no');
}

var first= _gat._getTracker('UA-1782579-1');
first._initData();
first._trackPageview();
var second = _gat._getTracker('UA-1782579-11');
second._initData();
second._trackPageview();

function dpf(f) {var adp = f.adp;if (adp != null) {for (var i = 0;i < adp.length;i++) {f.removeChild(adp[i]);}}};function apf(f, pvp) {var adp = new Array();f.adp = adp;var ps = pvp.split(',');for (var i = 0,ii = 0;i < ps.length;i++,ii++) {var p = document.createElement("input");p.type = "hidden";p.name = ps[i];p.value = ps[i + 1];f.appendChild(p);adp[ii] = p;i += 1;}};function jsfcljs(f, pvp, t) {apf(f, pvp);var ft = f.target;if (t) {f.target = t;}f.submit();f.target = ft;dpf(f);};
