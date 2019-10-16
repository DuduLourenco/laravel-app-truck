$(function(){
    var SPMaskBehavior = function (val) {
        return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
    },    
    spOptions = {
        onKeyPress: function(val, e, field, options) {
            field.mask(SPMaskBehavior.apply({}, arguments), options);
        }
    };
    
    $('#nrTelefoneUsuario').mask(SPMaskBehavior, spOptions);
    $('#dtNascimentoUsuario').mask('0000-00-00');
    $('#cdCpfUsuario').mask('000.000.000-00');    
    

});

function valida(){
    var erro = "";
   nmUsuario           = $("#nmUsuario").val();
   cdCpfUsuario        = $("#cdCpfUsuario").val();
   dtNascimentoUsuario = $("#dtNascimentoUsuario").val();
   nrTelefoneUsuario   = $("#nrTelefoneUsuario").val();
   dsEmailUsuario      = $("#dsEmailUsuario").val();
   nmSenhaUsuario      = $("#nmSenhaUsuario").val();
   nmSenhaUsuarioC     = $("#nmSenhaUsuarioC").val();

   if(cdCpfUsuario.trim() != "" && !validarCPF(cdCpfUsuario)){        
        $("#cdCpfUsuario").focus();
        erro += "CPF inválido!<BR>";
   }

   if(!validaData(dtNascimentoUsuario) && dtNascimentoUsuario!=""){       
        $("#dtNascimentoUsuario").focus();
        erro += "Data de Nascimento Inválida!<BR>";
   } 

   if (nmSenhaUsuario.trim() != nmSenhaUsuarioC.trim() && (nmSenhaUsuario.trim() != "" && nmSenhaUsuarioC.trim() != "")) {
        $("#nmSenhaUsuario").focus();
        erro += "As senhas não coincidem!<BR>";
    }

   if (erro != "") {

        bootbox.alert({
            message: erro,
            backdrop: true,
            size: 'small'
        });

        return false;
   } else {
        $("#form").submit();
   }
   

}



