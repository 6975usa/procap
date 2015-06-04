
<script type="text/javascript">
//<![CDATA[
   appendHiddenToForm = function(frm,values){
      for (c=0 ; c < values.length ; c++){
         var newField1 = document.createElement('input');
         newField1.setAttribute('name', values[c]);
         newField1.setAttribute('id', values[c]);
         newField1.setAttribute('type', 'hidden');
         newField1.setAttribute('value', values[c+1] );
         frm.appendChild(newField1);
      }

      frm.onsubmit=null;

      if(values[1]=='delete'){
         if(!confirm('##deleteMessage##')){
            return false; exit;
         }
      }
      if(validate_##formName##(frm)){
         frm.submit();
      }
   }
//]]>
</script>

