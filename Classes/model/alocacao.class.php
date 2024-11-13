<?php

class alocacao
{
    public $id;
    public $area;
    public $automovel;
    public $concessionaria;
    public $quantidade;

    public function criarAlocacao($id, $area, $automovel, $concessionaria, $quantidade) 
    {
        try 
        {
            $sql = "Insert into lista Values (?,?,?,?,?)";
        
            $stmt = Conexao::getConexao()->prepare($sql);
            
            $stmt->bindValue(1,'0');
            $stmt->bindValue(2,$area);
            $stmt->bindValue(3,$automovel);
            $stmt->bindValue(4,$concessionaria);
            $stmt->bindValue(5,$quantidade);
            
            $stmt->execute();
            
            return true;
        } 
        catch (Exception $ex) 
        {
            
            return false;
            
        }
    }
    
    public function removeAlocacao($id) 
    {
        try
        {
            $sql = "delete from alocacao where id=?";
                
            $stmt = Conexao::getConexao()->prepare($sql);
            $stmt->bindValue(1,$id);
                
            $stmt->execute();
                
            if($stmt->rowCount()>0)
            {
                return 'Alocacao Excluida';                 
            }
            else
            {
                return 'Nenhuma alocacao excluida';
            }       
        } 
        catch (Exception $ex) 
        {
            return 'Erro ao excluir alocacao';
        }
            
    }
        
    public function getAlocacao($id) 
    {
        try
        {
            $sql = "Select * from alocacao where id=?";
                
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

    public function mudarAlocacao($id, $area, $automovel, $concessionaria, $quantidade) 
    {
        try 
        {
            $sql = "Update alocacao SET area=? automovel=? concessionaria=? quantidade=? WHERE id=?";
        
            $stmt = Conexao::getConexao()->prepare($sql);
            
            $stmt->bindValue(1,$area);
            $stmt->bindValue(2,$automovel);
            $stmt->bindValue(3,$concessionaria);
            $stmt->bindValue(4,$quantidade);
            $stmt->bindValue(5,$id);
            
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