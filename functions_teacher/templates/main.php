<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row col-md-2">
            <?php if ($errors):?>
                <div class="alert alert-danger" role="alert">
                    <?php foreach ($errors as $error):?>
                        <div class="error"><?=$error;?></div>
                    <?php endforeach; ?>
                </div>
            <?php endif;?>

            <form action="" method="post">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input id="name" name="name" class="form-control" placeholder="Name">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input id="password" name="password" type="password" class="form-control" placeholder="123">
                </div>
                <button type="submit" class="btn btn-default">Submit</button>
            </form>

            <?php if ($users):?>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                           <td>#</td>
                           <td>Name</td>
                           <td>Password</td>
                           <td>Remove</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            foreach ($users as $i => $user):?>
                            <tr>
                                <td><?=($i + 1);?></td>
                                <td><?=$users[$i]['name'];?></td>
                                <td><?=$users[$i]['password'];?></td>
                                <td><a href="/?action=remove&user-id=<?=$i;?>">X</a></td>
                            </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
            <?php endif;?>
        </div>
    </div>
</body>
</html>