<?php
session_start();
try {
    if (!isset($_SESSION['member']) || !is_a($_SESSION['member'],"Member"))
    {
        header("Location: " . Router::getSourcePath() . "index.php");

    }else{
        //print_r($_SESSION['member']);
    }

require_once Router::getSourcePath()."inc/helper_func.inc.php";

// เก็บข้อมูลจากสิ่งที่ controller เตรียมไว้ให้
$products = $_SESSION['productList'];

// เริ่มต้นการเขียน view
$title = "My Cart";
ob_start();

?><?php
    //print_r($_SESSION['member']->getName());
    echo "<div align=\"right\">";
    echo "<font face=\"maitree\" size=\"3\" style=\"font-weight:bold\">ผู้ใช้ " . $_SESSION['member']->getName() . " " . $_SESSION['member']->getSurname() . "</font>";
    ?>
    <a href="index.php?controller=Member&action=logout" style="align:right">Logout</a>
    </div><br><br><br>

    <h1>ยินดีตอนรับสู่ My Shop</h1>
    <form name="cartForm" id="cartForm" method="post" action=<?= Router::getSourcePath() . "index.php?controller=Product&action=checkout" ?>>
        <?php
        $header = array("ลำดับ","ชื่อสินค้า","ราคาต่อชิ้น (บาท)","จำนวน");
        $data = array();
        $i = 0;
        foreach ($products as $prod) {
            $data[$i] = array($i+1,$prod->getProductName(),$prod->getPrice(),"<input type='number' name='".$prod->getProductId()."' id='".$prod->getProductId()."' value='0' min='0'/>");
            $i++;
        }
        showTable($header,$data);
        ?>

        <div style="margin: 1em; padding: 2em">
            <button type="submit" name="checkout"  value="Check Out" style="font-family:'maitree'">Check out</button>
            <button type="reset" name="cancel" value="Cancel" style="font-family:'maitree'">Cancel</button>
        </div>
    </form>

<?php
$content = ob_get_clean();

include Router::getSourcePath()."templates/layout.php";
} catch (Throwable $e) { // PHP 7++
    echo "Access denied: No Permission to view this page";
    exit(1);
}
?>
<?php
/*echo "<hr/>";
echo "<pre><code>";
show_source(__FILE__);
echo "</code></pre>";*/
