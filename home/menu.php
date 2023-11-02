<h1>halaman menu</h1>
<?php
session_start();

require "../function/koneksi.php";
require "../function/fungsi.php";

if (!$_SESSION) {
    header("location:login.php");
} elseif ($_SESSION['username'] == 'ADMIN') {
    header("location:admin-page.php");
}

echo "<br>";
echo $_SESSION['username'] . "\n";
echo "<br>";


$datas = ambil_semua_data_post("SELECT * FROM `posts`");

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>

    <a href="./post.php"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle-fill" viewBox="0 0 16 16">
            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z" />
        </svg></a>

    <!-- <table class="table">
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

        <?php foreach ($datas as $data) : ?>
            <tbody>
                <td scope="col"><?= $data['post_id'] ?></td>
                <td scope="col"><?= $data['title'] ?></td>
                <td scope="col"><?= $data['content'] ?></td>
                <td scope="col"><?= $data['user_id'] ?></td>
                <td scope="col"><?= $data['category_id'] ?></td>
                <td scope="col"><?= $data['image_url'] ?></td>
                <td scope="col"><?= $data['created_at'] ?></td>
                <td scope="col"><?= $data['update_at'] ?></td>
                <td>
                    <a href="other_post.php?post_id=<?= $data['post_id'] ?>&user_id=<?= $data['user_id'] ?>">detail</a> |

                    <a href="other_profile.php?id=<?= $data['user_id'] ?>"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                            <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                        </svg></a>
                </td>
            </tbody>
        <?php endforeach; ?>
    </table> -->





    <nav class="navbar navbar-default navbar-fixed-top p-e-2" role="navigation">
        <a class="navbar-brand" href="#">Title</a>
        <ul class="nav navbar-nav d-inline">
            <li>

                <a class="btn btn-default btn-dark" href="home/register.php" role="button">singin</a>
                <a class="btn btn-default btn-dark" href="home/login.php" role="button">login</a>

            </li>
        </ul>
    </nav>

    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 d-flex">
        <?php foreach($datas as $data): ?>
        <div class="card" style="width: 18rem;">
            <img src="../img/<?= $data['image_url'] ?>" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title"><?= $data['title'] ?></h5>
                <p class="card-text"><?= $data['content'] ?></p>
                <a href="other_post.php?post_id=<?= $data['post_id'] ?>&user_id=<?= $data['user_id'] ?>"" class="btn btn-primary">Go somewhere</a>
                
            </div>
        </div>
        <?php endforeach; ?>
    </div>



    <a href="../function/logout.php">logut</a>

    <a href="./user-dashbord.php"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
            <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
        </svg></a>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>