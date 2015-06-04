
linkSubmit = function(values,frmTarget,frmAction,frmMethod,listName,action){

   frm = document.createElement('form');
   frm.id = 'linkSubmitForm';
   frm.target = frmTarget ;
   frm.action = frmAction;
   frm.method = frmMethod;

   var vl = values.length;
   var ct = 0;


   var ob = document.getElementById('pageID');
   if(!isNull(ob)){
      values[vl+ct]='pageID';
      values[vl+ct+1]= ob.options[ob.selectedIndex].value ;
      ct=ct+2;
   }

   var ob = document.getElementById('setPerPage');
   if(!isNull(ob)){
      values[vl+ct]='setPerPage';
      values[vl+ct+1]=ob.options[ob.selectedIndex].value ;
      ct=ct+2;
   }


   var ob = document.getElementById('find_txt');
   if(!isNull(ob) && !isNull(ob.value) ){
      values[vl+ct]='find_txt';
      values[vl+ct+1]=ob.value ;
      ct=ct+2;
   }

   values[vl+ct]='listName';
   values[vl+ct+1]=listName;

   values[vl+ct+2]='action';
   values[vl+ct+3]=action ;

   for (c=0 ; c < values.length ; c=c+2){
      var nf = document.createElement('input');
      nf.setAttribute('name', values[c]);
      nf.setAttribute('id', values[c]);
      nf.setAttribute('type', 'hidden');
      nf.setAttribute('value', values[c+1] );
      frm.appendChild(nf);
   }
   document.body.appendChild(frm);
   frm.submit();
}


function isNull(val) {
   return (val == null);
}



appendHiddenToForm = function(frm,values){

   if(frm=='MM_list' ){
      newfrm = document.createElement('form');
      newfrm.target = '' ;
      newfrm.action = '';
      newfrm.method = 'POST';

      var newField1 = document.createElement('input');
      newField1.setAttribute('name', 'action');
      newField1.setAttribute('id', 'action');
      newField1.setAttribute('type', 'hidden');
      newField1.setAttribute('value', 'MM_list' );
      newfrm.appendChild(newField1);

      document.body.appendChild(newfrm);
      newfrm.submit();
      return true;
   }

   if(frm=='MM_new' || frm=='MM_list' ){
      newfrm = document.createElement('form');
      newfrm.target = '' ;
      newfrm.action = '';
      newfrm.method = 'POST';

      var newField1 = document.createElement('input');
      newField1.setAttribute('name', 'action');
      newField1.setAttribute('id', 'action');
      newField1.setAttribute('type', 'hidden');
      newField1.setAttribute('value', 'MM_new' );
      newfrm.appendChild(newField1);

      document.body.appendChild(newfrm);
      newfrm.submit();
      return true;
   }

   switch(values[1])
   {
      case 'MM_delete':
      conf=false;
      if(confirm('Confirma Exclusão?')){
         conf=true
         for (c=0 ; c < values.length ; c++){
            var newField1 = document.createElement('input');
            newField1.setAttribute('name', values[c]);
            newField1.setAttribute('id', values[c]);
            newField1.setAttribute('type', 'hidden');
            newField1.setAttribute('value', values[c+1] );
            frm.appendChild(newField1);
         }
         frm.submit();
      }
      else{
         conf=false;
         return true;
      }
      break;

      case 'MM_insert':
      case 'MM_update':
      for (c=0 ; c < values.length ; c++){
         var newField1 = document.createElement('input');
         newField1.setAttribute('name', values[c]);
         newField1.setAttribute('id', values[c]);
         newField1.setAttribute('type', 'hidden');
         newField1.setAttribute('value', values[c+1] );
         frm.appendChild(newField1);
      }
      return false;
      break;

      default:
      throw new Exception('Erro em submit.');
   }

}






function changeTrStyle(tr,defaultClass,newClass){
   if(tr.className == defaultClass){
      tr.className=newClass;
   }
   else{
      tr.className=defaultClass;
   }
}




