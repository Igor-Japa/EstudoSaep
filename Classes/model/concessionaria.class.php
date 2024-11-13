<?php

class concessionaria
{
    public $id;
    public $concessionaria;

    public function criarConcessionaria($id, $concessionaria) 
    {
        try 
        {
            $sql = "Insert into concessionarias Values (?,?)";
        
            $stmt = Conexao::getConexao()->prepare($sql);
            
            $stmt->bindValue(1,$id);
            $stmt->bindValue(2,$concessionaria);
            
            $stmt->execute();
            
            echo 'Concessionaria '.$concessionaria.' criada';
            return true;
        } 
        catch (Exception $ex) 
        {
            
            return false;
            
        }
    }
    
    public function removeConcessionaria($id) 
    {
        try
        {
            $sql = "delete from concessionarias where id=?";
                
            $stmt = Conexao::getConexao()->prepare($sql);
            $stmt->bindValue(1,$id);
                
            $stmt->execute();
                
            if($stmt->rowCount()>0)
            {
                return 'concessionaria excluida';                 
            }
            else
            {
                return 'Nenhuma concessionaria excluida';
            }       
        } 
        catch (Exception $ex) 
        {
            return 'Erro ao excluir concessionaria';
        }
            
    }
        
    public function getConcessionaria($id) 
    {
        try
        {
            $sql = "Select * from concessionarias where id=?";
                
            $stmt = Conexao::getConexao()->prepare($sql);
            $stmt->bindValue(1, $id);
                
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

    public function mudarConcessionaria($id, $concessionaria) 
    {
        try 
        {
            $sql = "Update concessionarias SET concessionaria=? WHERE id=?";
            $stmt = Conexao::getConexao()->prepare($sql);
            
            $stmt->bindValue(1, $concessionaria);
            $stmt->bindValue(2, $id);

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