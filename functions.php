<?php
function task1()
{
    $xml = simplexml_load_file('data.xml');
    echo "<h3 style='color: #4b505d;'>" . "Заказ № " . $xml['PurchaseOrderNumber'] . "</h3>" .
        "<h4 style='color: #4b505d;'>" . "Дата: " . $xml[OrderDate] . "</h4>" .
//        SHIPPING TABLE
        "<table style='border-collapse: collapse;width: 100%;text-align: center;'border='1px'>" .
        "<h3>" . $xml->Address[0][Type] . "</h3>" .
        "<tr>" .
        "<th>Name</th>" .
        "<th>Street</th>" .
        "<th>City</th>" .
        "<th>State</th>" .
        "<th>Zip</th>" .
        "<th>Country</th>" .
        "</tr>";

    echo "<tr>";
    foreach ($xml->Address[0] as $value) {
        echo "<td style='padding: 10px'>" . $value . "</td>";
    };
    echo "</tr>";
    echo "</table>";
//    BILLING TABLE
    echo
        "<table style='border-collapse: collapse;width: 100%;text-align: center;'border='1px'>" .
        "<h3>" . $xml->Address[1][Type] . "</h3>" .
        "<tr>" .
        "<th>Name</th>" .
        "<th>Street</th>" .
        "<th>City</th>" .
        "<th>State</th>" .
        "<th>Zip</th>" .
        "<th>Country</th>" .
        "</tr>";
    echo "<tr>";
    foreach ($xml->Address[1] as $value) {
        echo "<td style='padding: 10px'>" . $value . "</td>";
    };
    echo "</tr>";
    echo "</table>";
//    ITEMS
    foreach ($xml->Items->Item as $value){
        echo "<h3>" . "Item № " . $value['PartNumber'] . "</h3>";
        if(isset($value->Comment)){
            echo "<p style='color: #525252;'>" .
                "Product Name: " . $value->ProductName . "<br>" .
                "Quantity: " . $value->Quantity . "<br>" .
                "USPrice: " . $value->USPrice . "<br>" .
                "Comment: " . $value->Comment . "<br>" .
                "</p>";
        }
        if (isset($value->ShipDate)){
            echo "<p style='color: #525252;'>" .
                "Product Name: " . $value->ProductName . "<br>" .
                "Quantity: " . $value->Quantity . "<br>" .
                "USPrice: " . $value->USPrice . "<br>" .
                "ShipDate: " . $value->ShipDate . "<br>" .
                "</p>";
        }
    }

}

;