<?php

require "../function/koneksi.php";
require "../function/fungsi.php";

$post_id = $_GET['post_id'];

$posts = ambil_semua_data_post("SELECT * FROM `posts` WHERE `post_id` = '$post_id'");
// $comments = ambil_satu_data_post("SELECT * FROM `coments` WHERE `post_id` = '$post_id'");

$post_id = $_GET['post_id'];

$comments = ambil_semua_data_post("SELECT * FROM `comments`  JOIN `users` ON comments.user_id = users.user_id WHERE `post_id` = '$post_id'");

session_start();
$passUser =  $_SESSION["password"];

$userFinder = ambil_semua_data_users("SELECT * FROM `users` WHERE `password` = '$passUser'");
$user_id = $userFinder['user_id'];

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
    <div class="container">
        <div class="row">
            <?php foreach ($posts as $post) : ?>

                <div class="col-md-5">
                    <div class="list-group">
                        <?php foreach ($posts as $post) : ?>

                            <img src="../img/<?= $post['image_url'] ?>" class="img-thumbnail" alt="...">
                            <a href="other_post.php?post_id=<?= $post['post_id'] ?>" class="list-group-item list-group-item-action">
                                <div class="d-flex w-100 justify-content-between">
                                    <h5 class="mb-1"><?= $post['title'] ?></h5>
                                    <small><?= $post['created_at'] ?></small>
                                </div>
                                <p class="mb-1"><?= $post['content'] ?></p>
                                <p></p>

                            </a>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="col-md-7">
                <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h2>Komentar</h2>

                <?php foreach ($comments as $post) : ?>
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div class="d-flex align-items-center">
                                    <img src="../image/profile.png" class="rounded-circle me-2" width="40" height="40">
                                    <div>
                                        <h5><?= $post['username'] ?></h5>
                                        <small><?= $post['created_at'] ?></small>
                                    </div>
                                </div>
                                <?php if ($user_id == $post['user_id']) : ?>
                                    <a href="../proses/hapus-comment.php?comment_id=<?= $post['comment_id']?>&post_id=<?= $post_id ?>" class="btn btn-danger btn-sm">Hapus</a>
                                <?php endif; ?>
                            </div>
                            <p><?= $post['content'] ?></p>
                        </div>
                    </div>

                <?php endforeach; ?>
            </div>
            <div class="col-md-4">
                <form action="../proses/tambah_comment.php" method="post">
                    <input type="hidden" name="post_id" value="<?= $post_id ?>">
                    <input type="hidden" name="user_id" value="<?= $user_id ?>">
                    <input type="text" name="content" class="form-control mb-3" placeholder="Tulis komentar Anda...">
                    <input type="submit" name="submit" value="Tambah Komentar" class="btn btn-primary">
                    
                    <a class="btn btn-primary mt-2" href="menu.php" role="button">back to menu</a>
                    
                </form>
            </div>
        </div>
    </div>   
                </div>
        </div>

    <?php endforeach; ?>
    </div>

</body>

</html>