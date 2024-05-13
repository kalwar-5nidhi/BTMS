<!DOCTYPE html>
<html>
<head>
 <title>Buses Data</title>
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
 <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
 <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
</head>
<body>

<header>
    <a href="admin_dashboard.php"><button class="btn btn-primary">Back to Dashboard</button></a>
</header>

<div class="container">
    <div class="col-lg-12">
        <br><br>
        <h1 class="text-warning text-center">Buses Data</h1>
        <br>
        <table id="tabledata" class="table table-striped table-hover table-bordered">
            <thead class="bg-dark text-white text-center">
                <tr>
                    <th>Bus ID</th>
                    <th>Bus Name</th>
                    <th>Bus Number</th>
                    <th>Capacity</th>
                    <th>From</th>
                    <th>To</th>
                    <th>status</th>
                    <th>date_updated</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include 'database.php'; // Assuming this file has the database connection code

                $q = "SELECT * FROM buses";
                $query = mysqli_query($con, $q);

                while ($res = mysqli_fetch_array($query)) {
                ?>
                    <tr class="text-center">
                        <td><?php echo $res['bus_id']; ?></td>
                        <td><?php echo $res['bus_name']; ?></td>
                        <td><?php echo $res['bus_number']; ?></td>
                        <td><?php echo $res['capacity']; ?></td>
                        <td><?php echo $res['From']; ?></td>
                        <td><?php echo $res['To']; ?></td>
                        <td><?php echo $res['status']; ?></td>
                        <td><?php echo $res['date_updated']; ?></td>
                        <td>
                            <a href="busesDelete.php?id=<?php echo $res['bus_id']; ?>" class="btn btn-danger">Delete</a>
                            <a href="busesUpdate.php?id=<?php echo $res['bus_id']; ?>" class="btn btn-primary">Update</a>
                            <a href="busesInsert.php?id=<?php echo $res['bus_id']; ?>" class="btn btn-primary">Insert</a>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#tabledata').DataTable();
    });
</script>

</body>
</html>
