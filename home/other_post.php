<?php

require "../function/koneksi.php";
require "../function/fungsi.php";

$post_id = $_GET['post_id'];

$posts = ambil_semua_data_post("SELECT * FROM `posts` WHERE `post_id` = '$post_id'");
// $comments = ambil_satu_data_post("SELECT * FROM `coments` WHERE `post_id` = '$post_id'");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>

<body>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">post_id</th>
                <th scope="col">title</th>
                <th scope="col">content</th>
                <th scope="col">userId</th>
                <th scope="col">kategori</th>
                <th scope="col">image</th>
                <th scope="col">created</th>
                <th scope="col">adited</th>
                <th scope="col">selengkapnya</th>


            </tr>
        </thead>
        <?php foreach ($posts as $post) : ?>
            <tbody>
                <td scope="col"><?= $post['post_id'] ?></td>
                <td scope="col"><?= $post['title'] ?></td>
                <td scope="col"><?= $post['content'] ?></td>
                <td scope="col"><?= $post['user_id'] ?></td>
                <td scope="col"><?= $post['category_id'] ?></td>
                <td scope="col"><?= $post['image_url'] ?></td>
                <td scope="col"><?= $post['created_at'] ?></td>
                <td scope="col"><?= $post['update_at'] ?></td>
                <td scope="col">
                <a href="other_profile.php?id=<?= $post['user_id'] ?>"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                            <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                        </svg></a>
                        <a href="">
                            
                        </a> |
                        |
                        <a href="comment-page-post.php?post_id=<?= $post_id ?>"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chat" viewBox="0 0 16 16">
  <path d="M2.678 11.894a1 1 0 0 1 .287.801 10.97 10.97 0 0 1-.398 2c1.395-.323 2.247-.697 2.634-.893a1 1 0 0 1 .71-.074A8.06 8.06 0 0 0 8 14c3.996 0 7-2.807 7-6 0-3.192-3.004-6-7-6S1 4.808 1 8c0 1.468.617 2.83 1.678 3.894zm-.493 3.905a21.682 21.682 0 0 1-.713.129c-.2.032-.352-.176-.273-.362a9.68 9.68 0 0 0 .244-.637l.003-.01c.248-.72.45-1.548.524-2.319C.743 11.37 0 9.76 0 8c0-3.866 3.582-7 8-7s8 3.134 8 7-3.582 7-8 7a9.06 9.06 0 0 1-2.347-.306c-.52.263-1.639.742-3.468 1.105z"/>
</svg></a>
                </td>
            </tbody>
        <?php endforeach; ?>

    <a href="./menu.php">back</a>
</body>

</html>