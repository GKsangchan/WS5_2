<?php
$title = "Shopping Cart";
try {
    ob_start();

?>
    <h1>ยินดีต้อนรับสู่ My Shop</h1>
    <div style="color: red;">
        <?= $_GET['msg'] ?? "" ?>
    </div>
    <form name="loginForm" id="loginForm" method="post"
          action=<?= Router::getSourcePath() . "index.php?controller=Member&action=login" ?>>
        <fieldset>
            <legend>Cashier Login:</legend>
            <div>
                <label style="display: inline-block; width: 90px; text-align: right;" for="username">username: </label>
                <input type="text" name="username" id="username" required/>
            </div>
            <div>
                <label style="display: inline-block; width: 90px; text-align: right;" for="password" width="100px">password: </label>
                <input type="password" name="password" id="password" required/>
            </div><br>
            <button type="submit" style="font-family:'maitree'">Login</button>
            <button type="reset" style="font-family:'maitree'">Cancel</button>
        </fieldset>
    </form>

<?php

    $content = ob_get_clean();

    include Router::getSourcePath()."templates/layout.php";
} // -- try
catch (Throwable $e) {
    ob_clean(); // ล้าง output เดิมที่ค้างอยู่จากการสร้าง page
    echo "Access denied: No Permission to view this page";
    exit(1);
}
?>
<?php
/*echo "<hr/>";
echo "<pre><code>";
show_source(__FILE__);
echo "</code></pre>";*/