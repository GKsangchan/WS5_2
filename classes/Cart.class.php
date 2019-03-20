<?php
/**
 * Created by PhpStorm.
 * User: CPE_Garrfield
 * Date: 27/2/2562
 * Time: 22:02
 */
        class Cart{
                private $productL = array();
                private $totalprice = 0;
                public function __construct(array $amount)
                {
                    try {
                        $con = new PDO("mysql:dbname=myshop;host=localhost;charset=UTF8","root","garfield");
                    } catch (PDOException $e) {
                        echo "Error : " . $e->getMessage() . "<br/>";
                        die();
                    }
                    $stmt = $con->query('SELECT * FROM `products`');
                    $product = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    reset($product);
                    $data_row = current($product);
                    $i=1;
                    while($data_row) {
                        if($amount[$data_row['product_id']] > 0) {
                            array_push($this->productL, array($i, $data_row['product_name'], number_format($data_row['price'],2), $amount[$data_row['product_id']], number_format($data_row['price'] * $amount[$data_row['product_id']],2)));
                            $this->totalprice += $data_row['price'] * $amount[$data_row['product_id']];
                        }
                        $i++;
                        $data_row = next($product);
                    }
                }
                public function getProductInCart(){
                    return $this->productL;
                }
                public function calculateTotalPrice(){
                    return array($this->totalprice,$this->totalprice*0.07,($this->totalprice)+($this->totalprice*0.07));
                }
        }
?>