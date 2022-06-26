<?php

class user
{
    private $id;
    private $login;
    private $construct;

    public function __construct($anon = true)       //default for anon user
    {
        if ($anon == true) {
            $this->id = 0;
            $this->login = '';
        }
        $this->construct = true;
    }


    public function setLogin($login)
    {
        $this->login = $login;
    }
    public function getLogin()
    {
        return $this->login;

    }

    public function getId()
    {
        return $this->id;

    }
    public function setId($id)
    {
        $this->id = $id;
    }

    public function isAnon()
    {
        return ($this->id == 0);

    }

    public function checkPass($login, $pass)
    {
        global $pdo;
        $stmt = $pdo->prepare("SELECT id, login FROM user WHERE login=:login AND pass=:pass");
        $stmt->bindValue(':login', $login, PDO::PARAM_STR);
        $stmt->bindValue(':pass', $pass, PDO::PARAM_STR);
        $stmt->execute();

        if ($row = $stmt->fetchAll(PDO::FETCH_ASSOC)) {        //udane logowanie
            $user = new user;
            $user->setId($row[0]['id']);
            $user->login = $row[0]['login'];
            return $user;
        } else {
            return 0;
        }
    }

}

?>
