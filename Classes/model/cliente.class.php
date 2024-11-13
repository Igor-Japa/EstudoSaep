<?php

include './model/conexao.php';

class cliente
{
    public $id;
    public $nome;

    public function criarCliente($id, $nome) 
    {
        try 
        {
            $sql = "Insert into clientes Values (?,?)";
        
            $stmt = Conexao::getConexao()->prepare($sql);
            
            $stmt->bindValue(1,$id);
            $stmt->bindValue(2,$nome);
            
            $stmt->execute();
            
            echo 'Cliente '.$nome.' adicionado';
            return true;
        } 
        catch (Exception $ex) 
        {
            return false; 
        }
    }
    
    public function removeCliente($id) 
    {
        try
        {
            $sql = "delete from clientes where id=?";
                
            $stmt = Conexao::getConexao()->prepare($sql);

            $stmt->bindValue(1,$id);
                
            $stmt->execute();
                
            if($stmt->rowCount()>0)
            {
                return 'Cliente excluido';
            }
            else
            {
                return 'Nenhum cliente excluido';
            }       
        } 
        catch (Exception $ex) 
        {
            return 'Erro ao excluir cliente';
        }
    }
        
    public function getCliente($id) 
    {
        try
        {
            $sql = "Select * from clientes where id=?";
                
            $stmt = Conexao::getConexao()->prepare($sql);

            $stmt->bindValue(1,$id);
                
            $stmt->execute();
                
            if($stmt->rowCount()> 0)
            {
                $result = $stmt->fetch(PDO::FETCH_BOTH);
                return $result;
            }
            return false;
        } 
        catch (Exception $ex) 
        {
            return false;
        }  
    }

    public function mudarCliente($id, $nome) 
    {
        try 
        {
            $sql = "Update clientes SET nome=? WHERE id=?";
        
            $stmt = Conexao::getConexao()->prepare($sql);
            
            $stmt->bindValue(1,$nome);
            $stmt->bindValue(2,$id);
            
            $stmt->execute();
            
            echo "Mudança executada";
            return true;
        } 
        catch (Exception $ex) 
        {
            return false;
        }
    }
}
?>