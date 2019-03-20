<?php
/**
 * Created by PhpStorm.
 * User: Diiar
 * Date: 24/1/2562
 * Time: 14:51
 */

class ProductController
{
    public function handleRequest(string $action="index", array $params) {
        switch ($action) {
            case "checkout":
                    $this->$action();
                break;
            case "index":
                $this->index();
                break;
            case "cart":
                $this->$action();
                break;
            default:
                break;
        }

    }
    private function checkout() {
            include Router::getSourcePath()."views/checkout.inc.php";
            //header("Location: ".Router::getSourcePath()."index.php?msg=invalid user");
    }
    private function cart(){
        include Router::getSourcePath()."views/cart.inc.php";
    }
    private function index() {
        header("Location: ".Router::getSourcePath()."index.php?msg=invalid user");
    }
}