<?php
    namespace Projeto\HTMLPHP\DAO;

    require_once('Conexao.php');

    class Excluir{

        public function deletar(
            Conexao $conexao, string $nomeTabela, int $codigo)
        {
            try{
                $conn   = $conexao->conectar();
                $sql    = "delete from $nomeTabela where codigo = '$codigo'";
                $result = mysqli_query($conn,$sql);
                
                mysqli_close($conn);
                if($result){
                    echo "<br><br>Deletado com sucesso!";
                    return;
                }
                echo "Não deu certo!";
            }catch(Except $erro)
            {
                echo $erro;
            }
        }//fim do deletar
    }//fim da classe
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
    <a href="Consultar.php"><button>Consultar</button></a>
    <a href="Inserir.php"><button>Inserir</button></a>
    <a href="Atualizar.php"><button>Atualizar</button></a>
</body>
</html>