<?php

class cartFun{
    public function __construct(){

    }

    public function add($id)
    {
        global $pdo, $session;

        $stmt = $pdo->prepare("SELECT * FROM cart WHERE product_id= :id AND session_id = :sid");
        $stmt->bindValue('id', $id, PDO::PARAM_INT);
        $stmt->bindValue(':sid', $session->getSessionId(),PDO::PARAM_STR);
        $stmt->execute();

        if ($row = $stmt->fetchAll(PDO::FETCH_ASSOC)) {
            //aktualizacja koszyka
            $quantity = $row['0']['quantity'] +1;

            $stmt = $pdo->prepare("UPDATE cart SET quantity = :quantity WHERE session_id = :sid AND product_id = :pid");
            $stmt->bindValue(':quantity',$quantity,PDO::PARAM_INT);
            $stmt->bindValue(':sid', $session->getSessionId(),PDO::PARAM_STR);
            $stmt->bindValue(':pid',$id,PDO::PARAM_INT);
            $stmt->execute();

        } else {
            $stmt = $pdo->prepare("INSERT INTO cart (id, session_id, product_id, quantity) VALUES (null, :sid, :pid, 1)");         //dodawanie do koszyka
            $stmt->bindValue(':sid', $session->getSessionId(), PDO::PARAM_STR);
            $stmt->bindValue(':pid', $id, PDO::PARAM_INT);
            $stmt->execute();
        }
    }

public function remove($id){
        global $pdo, $session;

        $stmt = $pdo->prepare("SELECT * FROM cart WHERE product_id = :id AND session_id = :sid");
    $stmt->bindValue(':id',$id,PDO::PARAM_INT);
        $stmt->bindValue(':sid', $session->getSessionId(),PDO::PARAM_STR);
        $stmt->execute();


        $row=$stmt->fetchAll(PDO::FETCH_ASSOC);


$quantity = $row[0]['quantity'];
$quantity--;
if($quantity==0){
        $stmt = $pdo->prepare("DELETE FROM cart WHERE product_id = :id AND session_id = :sid");
        $stmt->bindValue(':sid', $session->getSessionId(),PDO::PARAM_STR);
        $stmt->bindValue(":id",$id,PDO::PARAM_INT);
        $stmt->execute();
            }else{
    $stmt = $pdo->prepare("UPDATE cart SET quantity = :quantity WHERE product_id= :id AND session_id = :sid");
    $stmt->bindValue(':quantity',$quantity,PDO::PARAM_INT);
    $stmt->bindValue(':id',$id,PDO::PARAM_INT);
    $stmt->bindValue(':sid',$session->getSessionId(),PDO::PARAM_STR);
$stmt->execute();
}
}

    public function getProducts(){
        global $pdo, $session;
        $stmt = $pdo->prepare("SELECT s.id, p.price, s.quantity, p.indeks, p.title, p.id as pid FROM cart s LEFT OUTER JOIN products p ON (s.product_id= p.id) WHERE s.session_id=:sid");
        $stmt->bindValue(':sid', $session->getSessionId(),PDO::PARAM_STR);
        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

public function clearCart(){

        global $pdo, $session;

        $stmt= $pdo->prepare("DELETE from cart WHERE session_id = :sid");
        $stmt->bindValue(':sid',$session->getSessionId(),PDO::PARAM_STR);
        $stmt->execute();

}

}



?>