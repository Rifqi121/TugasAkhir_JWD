<?php
    if (isset($_GET['page'])) {
        $page = $_GET['page'];
    
        switch ($page) {
            case 'beranda':
                include 'views/beranda.php';
                break;
            case 'paket':
                include 'views/paket.php';
                break;
            case 'pesanan':
                include 'views/pesanan.php';
                break;
            case 'login':
                include 'views/login.php';
                break;
        }
    } else {
        include 'views/login.php';
    }
?>