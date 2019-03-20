<?php
    class Member{
        private $id;
        private $username;
        private $password;
        private $name;
        private $surname;
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
        public function getIterator()
        {
            return new ArrayIterator(get_object_vars($this));
        }
    }
?>