<?php
class session{
    private $id;
    private $ip;
    private $browser_info;
    private $time;
    private $user;
    private $salt;






    public function __construct()
    {
        global $pdo,$request;

        if(!isset($_COOKIE['shopCookie'])){             //czy cookie istnieje
            $_COOKIE['shopCookie'] = '';
        }else{
            if(strlen($_COOKIE['shopCookie']) != 40){               //sprawdzanie dlugosci cookie - czy nie zostalo zduplikowane z innej strony
                $this->newSession();
            }
        }

//sekcja przypisywania danych z sesji
        $stmt = $pdo->prepare('SELECT session_id, updated_at, salt_token, user_id, uniq_info, ip, browser_info FROM session WHERE session_id= :sid AND uniq_info= :info AND updated_at > :updated
 AND ip = :ip AND browser_info = :browser_info');
        $stmt->bindValue(':sid', $_COOKIE['shopCookie'], PDO::PARAM_STR);
        $stmt->bindValue(':updated', time() - 3600, PDO::PARAM_INT);         //sprawdzenie czy sesja nie wygasla
$stmt->bindValue(':info', $request->getInfo(), PDO::PARAM_STR);                 //porownanie
$stmt->bindValue(':ip', $request->getIp(),PDO::PARAM_STR);
$stmt->bindValue(':browser_info',$request->getBrowser(),PDO::PARAM_STR);
$stmt->execute();


if($session = $stmt -> fetch(PDO::FETCH_ASSOC)){            //jesli sesja istnieje to  active
    $stmt -> closeCursor();
    $this->id=$_COOKIE['shopCookie'];
    $this->salt = $session['salt_token'];
    $this->ip= $session['ip'];
    $this->browser_info= $session['browser_info'];
    $this->time = $session['updated_at'];


    setcookie('shopCookie', $this->id, time() + 3600);              //update ciasteczka

    $stmt = $pdo->prepare('UPDATE session SET updated_at = :time WHERE session_id = :sid');
    $stmt->bindValue(':sid', $_COOKIE['shopCookie'], PDO::PARAM_STR);
    $stmt->bindValue(':time', time(), PDO::PARAM_INT);
    $stmt->execute();


    if($session['user_id'] != 0){       //zalogowany uzytkownik

    }
    else{                               //niezalogowany uzytkownik
$this->user = new user(true);
    }

}
else{
    $stmt->closeCursor();
    $this->newSession();
}
    }


    function newSession(){              //tworzenie nowej sesji
        global $pdo, $request;
        $this->id = random_session_id();
        $this->salt = random_salt(10);
        setcookie('shopCookie',$this->id,time()+3600);
        //przekazanie informacji o sesji do bazy
        $stmt = $pdo->prepare('INSERT INTO session (session_id,updated_at, salt_token, user_id, uniq_info, browser_info, ip) VALUES (:session_id, :time, :salt, :user_id, :info, :browser_info, :ip)');
        $stmt -> bindValue(':session_id', $this->id, PDO::PARAM_STR );
        $stmt -> bindValue(':time', time(), PDO::PARAM_INT );
        $stmt -> bindValue(':salt', $this->salt, PDO::PARAM_STR );
        $stmt -> bindValue(':user_id', 0, PDO::PARAM_INT);
        $stmt -> bindValue(':info',$request->getInfo(),PDO::PARAM_STR);
        $stmt -> bindValue(':browser_info', $request->getBrowser(), PDO::PARAM_STR);
        $stmt -> bindValue(':ip', $request->getIp(),PDO::PARAM_STR);
        $stmt->execute();
        $this->user = new user(true);
    }

    function updateSession(user $user){             //dla zalogowanego
        global $pdo,$request;
    }

    public function getSessionId(){
        return $this->id;
    }


}
