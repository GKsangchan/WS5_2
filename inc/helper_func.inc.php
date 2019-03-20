<?php

function calculateTotalPrice(array $productPrice, array $productNumber, array &$subTotal, float &$priceNoVat, float &$priceWithVat, float $percentVat = 7) {
    $priceNoVat = 0;
    for($i = 0; $i < count($productPrice); $i++)
    {
        $subTotal[$i] = $productPrice[$i] * $productNumber[$i];

        $priceNoVat += + $subTotal[$i];

    }
    $priceWithVat = $priceNoVat*(1+$percentVat/100);

}

function showTable(array $header, array $data){
    echo "<table width=\"60%\" style=\"text-align: center; border: 1px solid black; margin:auto\">";
    echo "<tr>";
    foreach ($header as $h){
        echo "<th style=\"border: 1px solid black\">$h</th>";
    }
    echo "</tr>";
    foreach ($data as $row) {
        echo "<tr>";
        foreach ($row as $col){
           echo "<td style='border: 1px solid black'>$col</td>";
        }
        echo "</tr>";
    }
    echo "</table>";
}

function create_table(array $data,int $border=1,int $cellpadding=1,int $cellspacing=1,string $width = "30%",string $height = "auto",string $align = 'center',string $type_table = "Horizontal") {
    echo "<table border='$border' cellpadding='$cellpadding' cellspacing='$cellspacing' align=$align style='width:$width;height:$height'>";
    reset($data);
    $row = count($data[0]);
    $col = count($data);
    $data_row = current($data);
    $i = 0;
    if($type_table == "Horizontal") {
        while ($data_row) {
            if($i == 0){
                echo "<tr>";
                $data_col = current($data_row);
                while($data_col){
                    echo "<th>".$data_col."</th>";
                    $data_col = next($data_row);
                }
                echo "</tr>";
                $i++;
            }else{
                echo "<tr>";
                $data_col = current($data_row);
                while($data_col){
                    echo "<td>".$data_col."</td>";
                    $data_col = next($data_row);
                }
                echo "</tr>";
            }
            //echo "<tr><td>$value</td></tr>\n";
            $data_row = next($data);
        }
    }else if($type_table == "Vertical"){
        while($data_row){
            $i= 0;
            echo "<tr>";
            $data_col = current($data_row);
            while($data_col){
                if($i == 0){
                    echo "<th>".$data_col."</th>";
                    $i++;
                }else{
                    echo "<td>".$data_col."</td>";
                }
                $data_col = next($data_row);
            }
            echo "</tr>";
            $data_row = next($data);
        }
    }
    else{
        while($data_row){
            $i= 0;
            echo "<tr>";
            $data_col = current($data_row);
            while($data_col){
                echo "<td>".$data_col."</td>";
                $data_col = next($data_row);
            }
            echo "</tr>";
            $data_row = next($data);
        }
    }
    echo "</table>";
}