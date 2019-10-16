$(function(){    
    $('#cdCpfUsuario').mask('000.000.000-00');
});

function entrar(){
    cdCpfUsuario = $('#cdCpfUsuario').val();
    if (!validarCPF(cdCpfUsuario) && cdCpfUsuario != "") {
        bootbox.alert({
            message: "CPF Inválido!",
            backdrop: true,
            size: 'small'
        });
        $('#cdCpfUsuario').focus();
        return false;
    }
    $('#form').submit();
}