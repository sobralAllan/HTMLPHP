<?php
    namespace Projeto\HTMLPHP\Tela;

    require_once("../DAO/Conexao.php");
    require_once("../DAO/Excluir.php");

    use Projeto\HTMLPHP\DAO\Conexao;
    use Projeto\HTMLPHP\DAO\Excluir;
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST">
        <label>Código: </label>
        <input type="number" name="tCodigo"/><br><br>

        <button>Excluir</button>

        <?php
            if($_POST['tCodigo'] > 0){
                $conexao = new Conexao();
                $exc     = new Excluir();
                echo $exc->deletar($conexao,"pessoa",$_POST['tCodigo']);
                return;
            }
            echo "Informe um código válido!";
        ?>
    </form>
    <a href="ConsultarPessoa.php"><button>Consultar</button></a>
    <a href="CadastrarPessoa.php"><button>Cadastrar</button></a>
    <a href="AtualizarPessoa.php"><button>Atualizar</button></a>
</body>
</html>