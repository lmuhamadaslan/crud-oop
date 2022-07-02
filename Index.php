<?php
include_once 'Database.php';

$customerObj = new Database();

if (isset($_GET['deleteId']) && !empty($_GET['deleteId'])) {
    $deleteId = $_GET['deleteId'];
    $customerObj->deleteData($deleteId);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
    <title>PHP MySql OOP CRUD Example Tutorial</title>
</head>

<body>
    <div class="card text-center" style="padding:15px" ;>
        <h4>PHP MySql OOP CRUD Example Tutorial</h4>
    </div><br><br>

    <div class="container">
        <?php
        if (isset($_GET['msg1']) == 'insert') {
            echo "<div class='alert alert-success alert-dismissible'>
            <button type='button' class='close' data-dismiss='alert'>×</button>
            Your Registration added successfully
          </div>";
        }

        if (isset($_GET['msg2']) == 'update') {
            echo "<div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert'>×</button>
              Your Registration updated successfully
            </div>";
        }

        if (isset($_GET['msg3']) == 'delete') {
            echo "<div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert'>×</button>
              Your Registration deleted successfully
            </div>";
        }
        ?>
        <h2>View Records
            <a href="Add.php" style="float:right;"><button class="btn btn-success"><i class="fas fa-plus"></i></button></a>
        </h2>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Salary</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $customers = $customerObj->selectData();
                foreach ($customers as $customer) {
                ?>
                    <tr>
                        <td><?php echo $customer['customers_id'] ?></td>
                        <td><?php echo $customer['customers_name'] ?></td>
                        <td><?php echo $customer['customers_email'] ?></td>
                        <td><?php echo $customer['customers_salary'] ?></td>
                        <td>
                            <button class="btn btn-primary btn-sm mr-2"><a href="Edit.php?editId=<?php echo $customer['customers_id'] ?>">
                                    <i class="fa fa-pencil text-white" aria-hidden="true"></i>
                                </a></button>
                            <button class="btn btn-danger btn-sm"><a href="Index.php?deleteId=<?php echo $customer['customers_id'] ?>" onclick="confirm('Are you sure want to delete this record')">
                                    <i class="fa fa-trash text-white" aria-hidden="true"></i>
                                </a></button>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
</body>

</html>