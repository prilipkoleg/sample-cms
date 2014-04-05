<?php

$conn = mysqli_connect('localhost','dangelzm','532453','testblog');
if (!$conn)
{
    die('Could not connect: ' . mysqli_error($conn));
}

mysqli_query($conn, "SET NAMES 'utf8'");
mysqli_query($conn, "SET CHARACTER SET utf8");
mysqli_query($conn, "SET CHARACTER_SET_CONNECTION=utf8");
mysqli_query($conn, "SET SQL_MODE = ''");


if(isset($_GET['page'])){

    switch ($_GET['page']) {
        case 'category':
            showCategoryArticles($conn, $_GET['id']);
            break;
        case 'author':
            showAuthorArticles($conn, $_GET['id']);
            break;
        case 'article':
            showArticle($conn, $_GET['id']);
            break;
    }

} else {
    echo "<h3>Категории</h3>";

    $categories = getCategories($conn);
    while($row = mysqli_fetch_array($categories))
    {
        echo "<a href='?page=category&id=" . $row['category_id'] . "'>" . $row['name'] . "</a> <br />";
    }

    echo "<h3>Авторы</h3>";

    $authors = getAuthors($conn);
    while($row = mysqli_fetch_array($authors))
    {
        echo "<a href='?page=author&id=" . $row['author_id'] . "'>" . $row['first_name'] . " " . $row['last_name'] . "</a> <br />";
    }
}


function getCategories($conn) {
    $sql="SELECT * FROM category" ;
    $result = mysqli_query($conn, $sql);

    return $result;
}

function getAuthors($conn) {
    $sql="SELECT * FROM author" ;
    $result = mysqli_query($conn, $sql);

    return $result;
}

function showArticle($conn, $article_id) {
    $result = mysqli_query($conn, "SELECT * FROM article WHERE article_id=" . $article_id);
    while($row = mysqli_fetch_array($result))
    {
        echo "<h3>" . $row['title'] . "</h3>";
        echo "<p>" . $row['text'] . "</p>";
    }

}

function showCategoryArticles($conn, $cat_id) {
    $result = mysqli_query($conn, "SELECT * FROM article WHERE category_id =" . $cat_id);
     while($row = mysqli_fetch_array($result))
    {
        echo "<a href='?page=article&id=" . $row['article_id'] . "'>" . $row['title'] . "</a> <br />";
    }

}

function showAuthorArticles($conn, $author_id) {
    $result = mysqli_query($conn, "SELECT * FROM article WHERE author_id =" . $author_id);
    while($row = mysqli_fetch_array($result))
    {
        echo "<a href='?page=article&id=" . $row['article_id'] . "'>" . $row['title'] . "</a> <br />";
    }

}




mysqli_close($conn);
?>