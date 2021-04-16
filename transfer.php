<?php
session_start();
$sender=$_SESSION["name"];

include('connection.php');
//selecting data to show
$sql = "SELECT * FROM `bank`";
$result = mysqli_query($con, $sql);
$customers = mysqli_fetch_all($result, MYSQLI_ASSOC);

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
    <section class="container transfer">
        <form action="transferComplete.php" method="POST">
            <label for="Sname">Sender:</label><br>
            <select name="Sname" id="Sname">
                <option value="<?php echo $sender;?>" selected><?php echo $sender;?>
                </option>
            </select><br>

            <label for="Rname">Select a user for transaction:</label><br>
            <select name="Rname" id="Rname">
                <option value="" disabled selected>Select reciever</option>
                <?php
                    $query = "SELECT * FROM `bank` ORDER BY `bank`.`name` ASC";
                    $query_run = mysqli_query($con, $query);

                    while ($row = mysqli_fetch_assoc($query_run)) {
                        echo "<option value='".$row['name']."'>".$row['name']."</option>";
                    }
                    mysqli_close($con);
                ?>
            </select>
            <label for="amount">Enter the amount to transfer :</label><br>
            <input type="number" name="amount" id="amount" placeholder="Amount(in Rs)">
            <div class="container sender-btn">
                <button class="btn" type="submit" id="amount_value">Submit</button>
                <a href="selectuser.php" class="home">Back</a>
            </div>
        </form>
    </section>
    
</body>
</html>
