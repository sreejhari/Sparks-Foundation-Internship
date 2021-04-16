<?php


include('connection.php');

//selecting data to show
$sql = "SELECT * FROM `bank`";
$result = mysqli_query($con, $sql);
// mysqli_close($con);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Banking System</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<style>
body {
  background-image: url('back/image.jpg');
}
</style>
<body>
    <section class="container">
        <form action="single_user.php" method="POST">
            <section>

                <div>
                    <table class="center">
                        <tr>
                            <th>Sno.</th>
                            <th>Name</th>
                            <th>Current Balance</th>
                        </tr>
                        <?php 
                            $sno = 0;
                            while($row = mysqli_fetch_assoc($result)){
                                $sno = $sno + 1;
                                echo "<tr>
                                <td scope='row'>". $sno . "</td>
                                <td>". $row['name'] . "</td>
                                <td>". $row['currentbalance'] . "</td>
                                </tr>";
                            }
                                
                        ?>
                    </table>
                </div>
            </section>
            <section class="container drop-down">
                <label for="names">Select a user to start transaction : </label>
                <select name="name" id="name">
                    <option value="" disabled selected>Select User</option><br>
                    <?php
                        $query = "SELECT * FROM `bank` ORDER BY `bank`.`name` ASC";
                        $query_run = mysqli_query($con, $query);
            
                        while ($row = mysqli_fetch_assoc($query_run)) {
                            echo "<option value='".$row['name']."'>".$row['name']."</option>";
                        }
                        mysqli_close($con);
                    ?>
                </select>
                <div class="container">
                    <button type="submit" class="btn submit-btn">Submit</button>
                    <a href="index.php" class="home">Home</a> 
                </div>
            </section>
        </form>
    </section>
</body>
</html>
