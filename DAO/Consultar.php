<?php
    namespace Projeto\HTMLPHP\DAO;

    require_once('Conexao.php');

    class Consultar{

        public function consultarIndividual(
            Conexao $conexao, 
            string $nomeDaTabela,
            int $codigo)
        {
            try{
                $conn   = $conexao->conectar();
                $sql    = "select * from $nomeDaTabela where codigo = '$codigo'";
                $result = mysqli_query($conn,$sql);
                
                while($dados = mysqli_fetch_Array($result)){
                    if($dados["codigo"] == $codigo){
                        echo "\nCódigo: ".$dados["codigo"]."\nNome: ".$dados["nome"]."\nTelefone: ".$dados["telefone"];
                        return;//Encerrar a operacao
                    }//fim do if
                }//fim do while
                echo "Código digitado não foi encontrado!";
            }
            catch(Except $erro)
            {
                echo $erro;
            } 
        }//fim do método


        public function consultarTudo(Conexao $conexao, string $nomeDaTabela){
            try{
                $conn   = $conexao->conectar();
                $sql    = "select * from $nomeDaTabela";
                $result = mysqli_query($conn,$sql);
                
                while($dados = mysqli_fetch_Array($result)){
                    echo "<br>Código: ".$dados["codigo"]."<br>Nome: ".$dados["nome"]."<br>Telefone: ".$dados["telefone"];
                }//fim do while
            }
            catch(Except $erro)
            {
                echo $erro;
            } 
        }//fim do método

    }//fim do consultar
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
    <a href="Inserir.php"><button>Inserir</button></a>
    <a href="Atualizar.php"><button>Atualizar</button></a>
    <a href="Excluir.php"><button>Excluir</button></a>
</body>
</html>