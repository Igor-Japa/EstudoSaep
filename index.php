
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        
        include './model/Conexao.php';
        include './model/produto.php';
        //include './model/usuario.php';
        
        //$u = new usuario();
        //echo $u->validaUsuario('a@a', 'a');
        //print_r($u->recebeUsuario('a@a'));
        //print_r($u->recebeUsuarioPorCampo('nome','a'));
        //print_r($u->recebeUsuarios());
        
       
        
        $p = new produto;
        print_r($p->recebeProdutos());
        
        echo 'aqui';
        
        //var_dump(Conexao::getConexao());
        
        
        
        
        
        ?>
    </body>
</html>
