<?php
require_once('../DAO/ActiveRecord/Member.class.php');

    print_r(Member::findByAccount("user","user"));

?>