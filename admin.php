<?php
include 'config.php';
session_start();

if ($_SESSION['role'] != 'admin') {
    header('Location: index.php');
}

$orders = mysqli_query($conn, "SELECT * FROM orders JOIN users ON orders.user_id = users.id JOIN vehicles ON orders.vehicle_id = vehicles.id");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin - Lihat Pesanan</title>
</head>
<body>
    <h2>Daftar Pesanan</h2>
    <table>
        <tr>
            <th>Email User</th>
            <th>Kendaraan</th>
            <th>Dengan Sopir</th>
            <th>Metode Pembayaran</th>
            <th>Status</th>
        </tr>
        <?php while ($order = mysqli_fetch_assoc($orders)) { ?>
            <tr>
                <td><?= $order['email'] ?></td>
                <td><?= $order['name'] ?></td>
                <td><?= $order['with_driver'] ? 'Ya' : 'Tidak' ?></td>
                <td><?= $order['payment_method'] ?></td>
                <td><?= $order['status'] ?></td>
            </tr>
        <?php } ?>
    </table>
    <a href="add_vehicle.php">Tambah Kendaraan</a>
</body>
</html>
