<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/4.0.0/cerulean/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">
    <script type="text/javascript" charset="utf8" src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-2.0.3.js"></script>
    <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="simplePagination.css" />
    <script src="simplePagination.js"></script>
</head>
<body>
    <?php
        $url = 'https://jsonplaceholder.typicode.com/comments';
        $crl = curl_init($url);
        curl_setopt($crl, CURLOPT_RETURNTRANSFER, 1);
        $data = curl_exec($crl);
        $myJSON = json_decode($data);
        $rows = count($myJSON);
        $user_rows = 25;
        $j = 0;
        if( isset($_GET['page']) ):
            $user_rows = $_GET['page'];
            $j = $user_rows-25;
        endif;
    ?>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <table class="table table-stripe">
                    <thead>
                    <th>ID </th>
                    <th>PostID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Body</th>
                    </thead>
                    <tbody id="target-content">
                    <?php  for($i=$j;$i<$user_rows; $i++): ?>
                        <tr>
                            <td><?= $myJSON[$i]->id; ?></td>
                            <td><?= $myJSON[$i]->postId; ?></td>
                            <td><?= $myJSON[$i]->name; ?></td>
                            <td><?= $myJSON[$i]->email; ?></td>
                            <td><?= $myJSON[$i]->body; ?></td>
                        </tr>
                    <?php endfor; ?>
                    </tbody>
                </table>
                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        <?php $k = 1; for( $x=25;$x<=$rows;$x+=25 ): ?>
                            <li class="page-item">
                                <a class="page-link" href="?page=<?= $x; ?>">
                                    <?= $k; ?>
                                </a>
                            </li>
                        <?php $k++; endfor; ?>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</body>
</html>