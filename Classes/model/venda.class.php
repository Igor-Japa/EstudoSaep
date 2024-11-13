<?php

class venda
{
    public $automovel_id;
    public $cliente_id;
    public $concessionaria_id;

    public function criarVenda($automovel_id, $cliente_id, $concessionaria_id) 
    {
        try 
        {
            $sql = "Insert into venda (fk_automoveis_id, fk_clientes_id, fk_concessionarias_id) values (?,?,?)";
            $stmt = Conexao::getConexao()->prepare($sql);
            $stmt->bindValue(1, $automovel_id);
            $stmt->bindValue(2, $cliente_id);
            $stmt->bindValue(3, $concessionaria_id);
            $stmt->execute();
            
            return true;
        } 
        catch (Exception $ex) 
        {
            return false;
        }
    }
    
    public function removeVenda($automovel_id, $cliente_id, $concessionaria_id) 
    {
        try
        {
            $sql = "delete from venda where fk_automoveis_id=? and fk_clientes_id=? and fk_concessionarias_id=?";
                
            $stmt = Conexao::getConexao()->prepare($sql);
            $stmt->bindValue(1,$automovel_id);
            $stmt->bindValue(2,$cliente_id);
            $stmt->bindValue(3,$concessionaria_id);
                
            $stmt->execute();
                
            if($stmt->rowCount()>0)
            {
                return 'Venda Excluida';                 
            }
            else
            {
                return 'Nenhuma venda excluida';
            }       
        } 
        catch (Exception $ex) 
        {
            return 'Erro ao excluir venda';
        }   
    }
        
    public function getVenda($automovel_id, $cliente_id, $concessionaria_id) 
    {
        try
        {
            $sql = "Select * from venda where fk_automoveis_id=? and fk_clientes_id=? and fk_concessionarias_id=?";
                
            $stmt = Conexao::getConexao()->prepare($sql);
            $stmt->bindValue(1,$automovel_id);
            $stmt->bindValue(2,$cliente_id);
            $stmt->bindValue(3,$concessionaria_id);
                
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

    public function mudarVenda($automovel_BDD, $cliente_BDD, $concessionaria_BDD, $automovel_id, $cliente_id, $concessionaria_id) 
    {
        try 
        {
            $sql = "Update venda SET fk_automoveis_id=? and fk_clientes_id=? and fk_concessionarias_id=? WHERE fk_automoveis_id=? and fk_clientes_id=? and fk_concessionarias_id=?";
        
            $stmt = Conexao::getConexao()->prepare($sql);
            $stmt->bindValue(1,$automovel_BDD);
            $stmt->bindValue(2,$cliente_BDD);
            $stmt->bindValue(3,$concessionaria_BDD);
            $stmt->bindValue(4,$automovel_id);
            $stmt->bindValue(5,$cliente_id);
            $stmt->bindValue(6,$concessionaria_id);
            
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