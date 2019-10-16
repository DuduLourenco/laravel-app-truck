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
        $("#cdCpfUsuario").css("color", "red");
        $("#cdCpfUsuario").focus();
        erro += "CPF inválido\n";
   }else{
        $("#cdCpfUsuario").css("color", "green");
   }

   if (nmSenhaUsuario.trim() != nmSenhaUsuarioC.trim() && (nmSenhaUsuario.trim() != "" && nmSenhaUsuarioC.trim() != "")) {
        $("#nmSenhaUsuario").focus();
        $("#nmSenhaUsuario").css("color", "red");
        $("#nmSenhaUsuarioC").css("color", "red");
        erro += "As senhas não coincidem\n";
   } else {
        $("#nmSenhaUsuario").css("color", "green");
        $("#nmSenhaUsuarioC").css("color", "green");    
   }

   if(!validaData(dtNascimentoUsuario) && dtNascimentoUsuario!=""){
        $("#dtNascimentoUsuario").css("color", "red");
        $("#dtNascimentoUsuario").focus();
        erro += "Data de Nascimento Inválida\n";
   } else {
        $("#dtNascimentoUsuario").css("color", "green");
   }

   if (erro != "") {
        bootbox.alert(erro);
        return false;
   } else {
        $("#form").submit();
   }
   

}



