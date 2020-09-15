$(document).ready(function () {
//Apresnetar e ocultar o menu
    $('.sidebar-toggle').on('click', function () {
        $('.sidebar').toggleClass('toggled');
    });
    //carregar aberto o submenu
    var active = $('.sidebar .active');
    if (active.length && active.parent('.collapse').length) {
        var parent = active.parent('.collapse');
        parent.prev('a').attr('aria-expanded', true);
        parent.addClass('show');
    }
});
//Carregar a modal define para "btn-apagar"
$(document).ready(function () {
    $('a[data-confirm]').click(function (ev) {
        var href = $(this).attr('href');
        if (!$('confirm-delete').length) {
            $('body').append('<div class="modal fade" id="confirm-delete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"><div class="modal-dialog"><div class="modal-content"><div class="modal-header bg-danger text-white">EXCLUÍR ITEM<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div><div class="modal-body">VOCÊ TEM CERTEZA QUE QUER EXCLUÍR O ITEM SELECIONADO?</div><div class="modal-footer"><button type="button" class="btn btn-success" data-dismiss="modal">Cancelar</button><a class="btn btn-danger text-white" id="dataConfimOK">Apagar</a></div></div></div></div>');
        }
        $('#dataConfimOK').attr('href', href);
        $('#confirm-delete').modal({show: true});
        return false;
    });
});
//Apresentar o tooltip do bootstrap na pagina de cadastro de novas paginas .
$(function () {
    $('[data-toggle="tooltip"]').tooltip();
});
//Adicionando mais input para colocar numeros de telefones no formulario de cadastro de unidade.
var cont = 1;
$('#addTelefone').click(function () {
    cont++;
    $('#telefone').append('<div class="form-group" id="campoTelefones' + cont + '"> <label>Telefones: </label> <div class="input-group mb-6"> <input type="text" name="titulo[]" class="form-control" placeholder="Informe aqui o telefone"> <div class="input-group-append"> <button type="button" id="' + cont + '" class="btn btn-outline-secondary btn-apagar"> - </button> </div> </div> </div> ');
});
//Botão para remover inputs de telefones que foram adicionados "extras".

$('form').on('click', '.btn-apagar', function () {
    var button_id_telefones = $(this).attr("id");
    $('#campoTelefones' + button_id_telefones + '').remove();
});



//Adicionando mais input para colocar emails no formulario de cadastro de unidade.
var contEmail = 1;
$('#addEmail').click(function () {
    contEmail++;
    $('#email').append('<div class="form-group" id="campoEmails' + contEmail + '"> <label>Emails: </label> <div class="input-group mb-6"> <input type="text" name="titulo[]" class="form-control" placeholder="Informe aqui o email"> <div class="input-group-append"> <button type="button" id="' + contEmail + '" class="btn btn-outline-secondary btn-deletar"> - </button> </div> </div> </div>');
});

//Botão para remover inputs de emials que foram adicionados "extras".

$('form').on('click', '.btn-deletar', function () {
    var button_id_emails = $(this).attr("id");
    $('#campoEmails' + button_id_emails + '').remove();
});