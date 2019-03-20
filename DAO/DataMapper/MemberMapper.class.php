<?php
        class MemberMapper{
            private $memberList;
            private const TABLE = "users";
            public function __construct() {

                $con = Db::getInstance();
                $query = "SELECT * FROM ".self::TABLE;
                $stmt = $con->prepare($query);
                $stmt->setFetchMode(PDO::FETCH_CLASS, "Member");
                $stmt->execute();
                $this->memberList  = array();
                while ($memb = $stmt->fetch())
                {
                    $this->memberList[$memb->getId()] = $memb;
                }
            }

            public function getAll(): array {
                return $this->memberList;
            }
            public function get(int $id): ?Product {
                return $this->memberList[$id]??null;
            }
            public function update(Member $memb) {

                if (isset($this->memberList[$memb->getId()])) {
                    $query = "UPDATE ".self::TABLE." SET ";
                    $membIt = $memb->getIterator();
                    foreach ($membIt as $memi => $val) {
                        $query .= " $memi='$val',";
                    }
                    $query = substr($query, 0, -1);
                    $query .= " WHERE product_id = ".$memb->getId();
                    //echo $query;
                    $con = Db::getInstance();
                    if ($con->exec($query) === true) {
                        $this->memberList[$memb->getId()] = $memb;
                        return true;
                    }
                    return false;
                }
                else {
                    throw new Exception("Product doesn't exist");
                }



            }
        }
?>