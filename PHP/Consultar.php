<?php
    namespace Projeto\HTMLPHP\PHP;

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