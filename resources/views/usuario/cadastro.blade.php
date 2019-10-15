<html>
    <head>

    </head>
    <body>
        <div class="container-fluid">           
                <div class="flex-wrap">                
                    <form id="formCadastro" method="POST">
                        <div class="form-group">
                            <input id="usuarioNome" class="form-control" placeholder="Nome do Usuário">
                        </div>
                        <div class="form-group">
                            <input id="usuarioSenha" class="form-control" placeholder="Senha do Usuário">
                        </div>                    
                        <button type="submit" class="btn btn-primary btn-block">Confirmar</button>
                        <small id="usuarioNovo" class="text-muted">
                            <a href="#">Novo Usuário</a>
                        </small>
                    </form>                        
                </div>
        </div>
        
        @extends('imports')
    </body>
</html>


