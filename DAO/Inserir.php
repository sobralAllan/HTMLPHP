<?php 
    namespace Projeto\HTMLPHP\DAO;

    require_once('Conexao.php');

    class Inserir{
        
        public function cadastrar(
            Conexao $conexao, 
            string $nomeDaTabela, 
            string $nome, 
            string $telefone)
        {
            try{
                $conn = $conexao->conectar();//Abrindo a conexão com o banco
                $sql  = "insert into $nomeDaTabela (codigo, nome, telefone) 
                values ('','$nome','$telefone')";//Escrevi o script
                $result = mysqli_query($conn,$sql);//Executa a ação do script no banco

                mysqli_close($conn);//fechando a conexão com sucesso!
                
                if($result){
                    return "<br><br>Inserido com sucesso!";
                }
                return "<br><br>Não Inserido!";
            }catch(Except $erro){
                echo $erro;
            }
        }//fim do cadastrar
    }//fim da classe
?>

