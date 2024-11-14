<?php
include 'config.php';
session_start();

$vehicles = mysqli_query($conn, "SELECT * FROM vehicles");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Pilih Kendaraan</title>
</head>
<body>
    <h2>Pilih Kendaraan</h2>
    <form action="proses_rental.php" method="POST">
        <?php while ($vehicle = mysqli_fetch_assoc($vehicles)) { ?>
            <input type="radio" name="vehicle_id" value="<?= $vehicle['id'] ?>" required>
            <?= $vehicle['name'] ?> (<?= $vehicle['type'] ?>) - 
            <?= $vehicle['with_driver'] ? 'Dengan Sopir' : 'Tanpa Sopir' ?><br>
        <?php } ?>
        <label>Metode Pembayaran:</label><br>
        <select name="payment_method">
            <option value="ovo">OVO</option>
            <option value="gopay">GoPay</option>
            <option value="qris">QRIS</option>
        </select><br>
        <button type="submit">Pesan Sekarang</button>
    </form>
</body>
</html>
