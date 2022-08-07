<?php
require_once 'databaseconfig.php';

if (isset($_REQUEST['del'])){
$userid = intval($_GET['del']);
$sql = "DELETE FROM students WHERE id = :id";
$query = $conn->prepare($sql);
$query-> bindParam (':id', $userid , PDO::PARAM_STR);
$query->execute();
echo "<script>alert('deleteeeeeeee');</script>";
echo "<script> window.location.href='index.php'; </script>";

}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>پروژه عملی</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container border p-4 mt-4">
        <div class="row">
            <div class="col-md-12">
                <h3 class="p-3 pt-5">TopLearn.com</h3>
                <hr />
                <a href="insert.php"><button class="btn btn-primary font-16 m-3">وارد کردن رکورد</button></a>
                <div class="table-responsive">
                    <table id="mytable" class="table table-bordered table-striped m-2">
                        <thead>
                            <th>شناسه</th>
                            <th>نام</th>
                            <th>نام خانوادگی</th>
                            <th>ایمیل</th>
                            <th>شماره</th>
                            <th>آدرس</th>
                            <th>تاریخ ساخت</th>
                            <th>ویرایش</th>
                            <th>حذف</th>
                        </thead>
                        <tbody>
                        <?php

                        $sql = "SELECT * FROM students";
                        $query = $conn->prepare($sql);
                        $query-> execute();
                        $results = $query-> fetchAll(PDO::FETCH_OBJ);
                        $i=1;

                        if( $query-> rowCount()> 0){
                        foreach($results as $result){
                            ?>
                            <tr>
                                <td>
                                <?php echo $i;
                                $i++;
                                ?>
                                
                                </td>
                                <td>
                                    <?php echo $result->firstName ?>
                                </td>
                                <td>
                                <?php echo $result->lastName ?>
                                </td>
                                <td>
                                <?php echo $result->email ?>
                                </td>
                                <td>
                                <?php echo $result->phone ?>
                                </td>
                                <td>
                                <?php echo $result->address ?>
                                </td>
                                <td>
                                <?php echo $result->createdAT ?>
                                </td>    

                                <td><a href="update.php?id=<?php echo $result->id ?>"><button class="btn btn-warning"><span class="glyphicon glyphicon-pencil"></span></button></a></td>

                                <td><a href="index.php?del=<?php echo $result->id ?>"><button class="btn btn-danger" onClick="return confirm('آیا حذف انجام شود');"><span class="glyphicon glyphicon-trash"></span></button></a></td>
                            </tr>
                        </tbody>
                        <?php
                            }        
                        }   
                        ?>   
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>

</html>