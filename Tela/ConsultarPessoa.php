<?php
    namespace Projeto\HTMLPHP\Tela;

    require_once("../DAO/Conexao.php");
    require_once("../DAO/Consultar.php");

    use Projeto\HTMLPHP\DAO\Conexao;
    use Projeto\HTMLPHP\DAO\Consultar;
?>


<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultar</title>
</head>
<body>
    <form method="POST">
        <label>Código: </label>
        <input type="number" name="tCodigo" /><br><br>

        <button>Consultar</button>
        <textArea style="width:200px;height:300px">
            <?php
                if($_POST['tCodigo'] != ""){
                    $conexao = new Conexao();
                    $consul  = new Consultar();
                    echo $consul->consultarIndividual($conexao, "pessoa",$_POST['tCodigo']);
                    return;
                }//fim do if
                echo "Erro, Preencha os campos!";
            ?>
        </textArea>
    </form>
    <a href="CadastrarPessoa.php"><button>Cadastrar</button></a>
    <a href="AtualizarPessoa.php"><button>Atualizar</button></a>
    <a href="ExcluirPessoa.php"><button>Excluir</button></a>
</body>
</html>