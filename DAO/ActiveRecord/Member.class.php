<?php
spl_autoload_register(function ($class) {
    $path = '../DAO/' . $class . '.class.php';
    if (file_exists($path))
        require_once $path;
});
    class Member{
        private $id;
        private $username;
        private $password;
        private $name;
        private $surname;
        private const TABLE = "users";
        //----------- Getters & Setters
        public function getId():int
        {
            return $this->id;
        }

        public function setId(int $id)
        {
            $this->id = $id;
        }

        public function getUsername():string
        {
            return $this->username;
        }

        public function setUsername(string $username)
        {
            $this->username = $username;
        }

        public function getPassword():string
        {
            return $this->password;
        }

        public function setPassword(string $password)
        {
            $this->password = $password;
        }
        public function getName():string
        {
            return $this->name;
        }
        public function setName(string $name)
        {
            $this->name = $name;
        }
        public function getSurname():string
        {
            return $this->surname;
        }
        public function setSurname(string $surname)
        {
            $this->surname = $surname;
        }
        //----------- CRUD
        public static function findAll(): array {
            $con = Db::getInstance();
            $query = "SELECT * FROM ".self::TABLE;
            $stmt = $con->prepare($query);
            $stmt->setFetchMode(PDO::FETCH_CLASS, "Member");
            $stmt->execute();
            $MemberList  = array();
            while ($memb = $stmt->fetch())
            {
                $MemberList[$memb->getId()] = $memb;
            }
            return $MemberList;
        }
        public static function findByAccount(string $username,string $password): ?Member {
            $con = Db::getInstance();
            $query = "SELECT * FROM ".self::TABLE." WHERE username ='".$username."' AND password ='".md5($password)."'";
            //echo $query;
            $stmt = $con->prepare($query);
            $stmt->setFetchMode(PDO::FETCH_CLASS, "Member");
            $stmt->execute();
            if ($memb = $stmt->fetch())
            {
                return $memb;
            }
            return null;
        }
        public function insert() {
            $con = Db::getInstance();
            $values = "";
            foreach ($this as $memb => $val) {
                $values .= "'$val',";
            }
            $values = substr($values,0,-1);
            $query = "INSERT INTO ".self::TABLE." VALUES ($values)";
            //echo $query;
            $res = $con->exec($query);
            $this->id = $con->lastInsertId();
            return $res;

        }
        public function update() {
            $query = "UPDATE ".self::TABLE." SET ";
            foreach ($this as $memb => $val) {
                $query .= " $memb='$val',";
            }
            $query = substr($query, 0, -1);
            $query .= " WHERE id = ".$this->getId();
            $con = Db::getInstance();
            $res = $con->exec($query);
            return $res;
        }

    }
?>