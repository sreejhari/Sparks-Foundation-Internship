<?php
 
 include('connection.php');

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
<section>
        <div>
            <table class="center">
                <tr>
                    <th>Sno.</th>
                    <th>Sender</th>
                    <th>Receiver</th>
                    <th>Amount</th>
                    <th>Time</th>
                </tr>
                <?php 
                 $sql = "SELECT * FROM transfer_history";
                 $result = mysqli_query($con, $sql);
                 $nums=mysqli_num_rows($result);
                    $sno = 0;
                    while($row=mysqli_fetch_array($result)){

                        $sno = $sno + 1;
                        echo "<tr>
                        <th scope='row'>". $sno . "</th>
                        <td>". $row['Sender'] . "</td>
                        <td>". $row['Receiver'] . "</td>
                        <td>". $row['Amount'] . "</td>
                        <td>". $row['Time'] . "</td>
                        </tr>";
                    }
                ?>


            </table>
        </div>
	</section>
</body>
</html>
