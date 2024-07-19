<?php
if (isset($_GET['page'])) {
    $page = $_GET['page'];
    
    $allowed_pages = [
        // 'index',
        // 'books/books',
        // 'books/create_book',
        // 'authors/authors',
        // 'authors/create_author'
        'member/member',
        'member/create/create',
        'member/update/update'
    ];
    
    if (in_array($page, $allowed_pages)) {
        include $page . '.php';
    } else {
        echo '<p>Page not found</p>';
    }
} else {
    echo '<p>No page specified</p>';
}
