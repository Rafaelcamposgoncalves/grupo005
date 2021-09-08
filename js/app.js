$(document).ready(function(){

    $('.btnaction').click(function(){

            $('#btn-analise').val($(this).attr("data-id"));
            $('#analise-body').html($('#data'+$(this).attr("data-id")).html() + ' ' + $('#nome'+$(this).attr("data-id")).html() + "<br /><br />" +$('#sugestao'+$(this).attr("data-id")).html());

    });
    
    
    $('.btnexcluir').click(function(){

        $('#excluir-body').html('Tem certeja de deseja excluir a sugestão de:<br /><br />' +  $('#data'+$(this).attr("data-id")).html() + ' ' + $('#nome'+$(this).attr("data-id")).html());
        $('#btn-excluir').val($(this).attr("data-id"));
        

    }); 



    if($('#sres').val() == 'true'){
        $('#sugestaomsg').modal('show');
    }
    

});

