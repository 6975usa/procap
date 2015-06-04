function defineDivSize(){
   var f = document.getElementById('listDiv');
   tam = f.offsetHeight;

   var ob = document.getElementsByTagName('html');
   var formDiv = document.getElementById('formDiv')
   if(!isNull(formDiv)){
      divTam = formDiv.offsetHeight;
   }else{
      divTam=0;
   }

   var maxTam = window.screen.height - 420 ;
   var minTam = 200;

   if(tam < minTam ){
      tam = minTam ;
   }

   if(tam > maxTam){
      tam = maxTam;
   }
   var tb = document.getElementById('listTbody');
   tb.style.height=tam+'px';
}


function centerFormDiv(){
   dv = document.getElementById('formDiv');
   if(isNull(dv)){
      return false;
   }

   totalW = window.screen.width;
   totalH = window.screen.height;

   var w = (totalW - dv.offsetWidth) / 2;
   var h = (totalH - dv.offsetHeight) / 2;

   //alert(w + ' - ' + h);

   //dv.style.left = w ;
   //dv.style.top = h ;

}

