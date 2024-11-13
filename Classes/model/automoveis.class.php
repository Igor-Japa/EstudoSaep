<?php

class automovel
{
    public $id;
    public $modelo;
    public $preco;
    public $alocacao_id;

    public function criarAutomovel($id, $modelo, $preco, $alocacao_id) 
    {
        try 
        {
            $sql = "Insert into automoveis Values (?, ?, ?, ?)";
        
            $stmt = Conexao::getConexao()->prepare($sql);
            
            $stmt->bindValue(1, $id);
            $stmt->bindValue(2, $modelo);
            $stmt->bindValue(3, $preco);
            $stmt->bindValue(4, $alocacao_id);

            $stmt->execute();
            
            echo 'Automovel '.$modelo.' criado';
            return true;
        } 
        catch (Exception $ex) 
        {
            return false; 
        }
    }
    
    public function removeAutomovel($id) 
    {
        try
        {
            $sql = "delete from automoveis where id=?";
                
            $stmt = Conexao::getConexao()->prepare($sql);
            $stmt->bindValue(1,$id);
                
            $stmt->execute();
                
            if($stmt->rowCount()>0)
            {
                return 'Automovel excluido';                 
            }
            else
            {
                return 'Nenhum automovel excluido';
            }       
        } 
        catch (Exception $ex) 
        {
            return 'Erro ao excluir automovel';
        }
    }
        
    public function getAutomovel($id) 
    {
        try
        {
            $sql = "Select * from automoveis where id=?";
                
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

    public function mudarAutomovel($id, $modelo, $preco) 
    {
        try 
        {
            $sql = "Update automoveis SET modelo=? preco=? WHERE id=?";
        
            $stmt = Conexao::getConexao()->prepare($sql);
            
            $stmt->bindValue(1,$modelo);
            $stmt->bindValue(2,$preco);
            $stmt->bindValue(3,$id);
            
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