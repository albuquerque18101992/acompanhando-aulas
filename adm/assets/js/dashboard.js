$(document).ready(function(){
    //Apresnetar e ocultar o menu
   $ ('.sidebar-toggle').on('click',function(){
       $('.sidebar').toggleClass('toggled');
   });
   
   //carregar aberto o submenu
   var active = $('.sidebar .active');
   if(active.length && active.parent('.collapse').length){
       var parent = active.parent('.collapse');
       
       parent.prev('a').attr('aria-expanded', true);
       parent.addClass('show');
   }
});

//Carregar a modal define para "btn-apagar"
$(document).ready(function(){
    $('a[data-confirm]').click(function(ev){
       var href = $(this).attr('href');
       if(!$('confirm-delete').length){
           $('body').append('<div class="modal fade" id="confirm-delete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"><div class="modal-dialog"><div class="modal-content"><div class="modal-header bg-danger text-white">EXCLUÍR ITEM<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div><div class="modal-body">VOCÊ TEM CERTEZA QUE QUER EXCLUÍR O ITEM SELECIONADO?</div><div class="modal-footer"><button type="button" class="btn btn-success" data-dismiss="modal">Cancelar</button><a class="btn btn-danger text-white" id="dataConfimOK">Apagar</a></div></div></div></div>');
       }
       $('#dataConfimOK').attr('href', href);
       $('#confirm-delete').modal({show: true});
       return false;
    });
});