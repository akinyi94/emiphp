<?php
$menu = array(
    'users' => array('text'=>'users', 'url'=>'users_add.php'),
    'staff' => array('text'=>'staff', 'url'=>'staff_add.php'),
    'registration' => array('text'=>'registration', 'url'=>'registration_add.php'),
    'billing' => array('text'=>'billing', 'url'=>'billing_add.php'),
    'enquiries' => array('text'=>'enquiries', 'url'=>'enquiries_add.php'),
    'receipt' => array('text'=>'receipt', 'url'=>'receipt_add.php'),
    );

function generateMenu($items) {
        
        $html = "<nav class='navbar navbar-expand-md bg-dark navbar-dark justify-content-between'>\n 
        <div class='container-fluid'>\n
        <a href='logout.php' class='btn btn-danger navbar-brand'>logout</a>\n
        ";
        $html .= "
        <button class='navbar-toggler' data-bs-target='#collapsible' data-bs-toggle='collapse'>\n
            <span class='navbar-toggler-icon'></span>\n
        </button>\n
    </div>\n
    <div class='collapse navbar-collapse ' id='collapsible'>\n
    <ul class='navbar-nav'>\n";
        foreach($items as $item) {
        $html .= "<li class='nav-item'>";
        $html .= "<a class='nav-link' href='{$item['url']}'>{$item['text']}</a>\n";
        $html .= "</li>";
    }
    $html .="</ul>";
    $html .= "</div>\n";
        $html .= "</nav>\n";
        return $html;
        }
?>