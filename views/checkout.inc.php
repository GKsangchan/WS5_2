<?php
session_start();
try {
    if (!isset($_SESSION['member']))
    {
        header("Location: " . Router::getSourcePath() . "index.php");
        //print_r($_SESSION['member']);
    }
    require_once Router::getSourcePath() . "inc/helper_func.inc.php";

// เก็บข้อมูลจากสิ่งที่ controller เตรียมไว้ให้
    $products = $_SESSION['productList'];

// เริ่มต้นการเขียน view
    $title = "Checkout";
    ob_start();
    ?>
    <?php
    //print_r($_SESSION['member']->getName());
    echo "<div align=\"right\">";
    echo "<font face=\"maitree\" size=\"3\" style=\"font-weight:bold\">ผู้ใช้ " . $_SESSION['member']->getName() . " " . $_SESSION['member']->getSurname() . "</font>";
    ?>
    <a href="index.php?controller=Member&action=logout" style="align:right">Logout</a>
    </div><br><br><br>
    <?php
    spl_autoload_register(function ($class) {
        include 'classes/' . $class . '.class.php';
    });
        $product_list = Product::findAll();
        $C1 = new Cart($_POST);
        $C1cart = $C1->getProductInCart();
        $C1price = $C1->calculateTotalPrice();
    ?>
    <font face="maitree" size="10" style="font-weight:bold" align="center">ยินดีตอนรับสู่ My Shop</font><br><br>

    <?php
    //require_once('../inc/helper_func.inc.php');
    $arr = array(array("ลำดับ", "ชื่อสินค้า", "ราคาต่อชิ้น (บาท)", "จำนวน", "ราคารวม"));
    reset($C1cart);
    $data_row = current($C1cart);
    while ($data_row) {
        array_push($arr, $data_row);
        $data_row = next($C1cart);
    }
    create_table($arr);
    create_table(array(array("ราคารวมทั้งหมด (excl. VAT)", number_format($C1price[0], 2)), array("VAT (7%)", number_format($C1price[1], 2)), array("ราคารวมทั้งหมด (incl. VAT)", number_format($C1price[2], 2))), 0, 0, 0, "30%", "auto", "center", "None");

    ?>
    <br>
    <font face="maitree" size="3" style="font-weight:bold" align="center">ขอบคุณที่ใช้บริการ...</font><br>
    <br><form method="post" action=<?= Router::getSourcePath() . "index.php?controller=Product&action=cart" ?>>
        <button type="submit" value="ย้อนกลับ" onclick="history.back()" style="font-family:'maitree'" align="center">ย้อนกลับ</button>
    </form>
<?php
    $content = ob_get_clean();
    include Router::getSourcePath()."templates/layout.php";
}catch (Throwable $e) { // PHP 7++
    echo "Access denied: No Permission to view this page";
    exit(1);
}

?>
