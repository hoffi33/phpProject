<?php

class cartFun{
    public function __construct(){

    }

    public function add($id){
        global $pdo, $session;

        $stmt = $pdo->prepare("INSERT INTO cart (id, session_id, product_id, quantity) VALUES (null, :sid, :pid, 1)");         //dodawanie do koszyka
        $stmt->bindValue(':sid',$session->getSessionId(),PDO::PARAM_STR);
        $stmt->bindValue(':pid',$id,PDO::PARAM_INT);
        $stmt->execute();
    }

public function remove($id){

        global $pdo, $session;
        $stmt = $pdo->prepare("DELETE FROM cart WHERE id = :id");
        $stmt->bindValue(":id",$id,PDO::PARAM_INT);
        $stmt->execute();

}
    public function getProducts(){
        global $pdo, $session;
        $stmt = $pdo->prepare("SELECT s.id, p.price, s.quantity, p.indeks, p.title FROM cart s LEFT OUTER JOIN products p ON (s.product_id= p.id) WHERE s.session_id=:sid");
        $stmt->bindValue(':sid', $session->getSessionId(),PDO::PARAM_STR);
        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }



}



?>