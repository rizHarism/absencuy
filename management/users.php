<table class="table">
    <tr class="tr">
        <th class="th">No.</th>
        <th class="th">User_id</th>
        <th class="th">Nama</th>
        <th class="th">Jabatan</th>
        <th class="th" colspan="2">Aksi</th>
    </tr>

    <?php
    include("../connection.php");
    session_start();
    $user_id = $_SESSION['user_id'];

    $sql = "SELECT * FROM users";
    $result = $db->query($sql);
    $no = 1;
    while ($data = $result->fetch_assoc()) {
        echo "<tr class='tr'>";
        echo "<td class='td'>" . $no++ . "</td>";
        echo "<td class='td'>" . $data['user_id'] . "</td>";
        echo "<td class='td'>" . $data['nama_lengkap'] . "</td>";
        echo "<td class='td'>" . $data['role'] . "</td>";
        echo "<td class='td'><a href='#'>Edit</a></td>";
        echo "<td class='td'><a href='#'>Delete</a></td>";
        echo "</tr>";
    }
    ?>
</table>
<div style="display: flex; justify-content:center;align-items:center; margin-top: 20px;">
    <button style="text-align: center;" onclick="window.print()">Print Laporan</button>
</div>