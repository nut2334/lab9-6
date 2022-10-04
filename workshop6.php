<?php include "connect.php" ?>
<html>
<head><meta charset="utf-8">
<script>
    function confirmDelete(pid) {
        console.log("hi");
        var ans = confirm("ต้องการลบสินค้ารหัส" + pid);
        if (ans==true)
        document.location = "delete.php?username=" + pid;
    }
</script>
</head>

<body>
<?php
$stmt = $pdo->prepare("SELECT * FROM member");
$stmt->execute();
?>
<?php while ($row = $stmt->fetch()): ?>
    ชื่อ : <?=$row ["name"]?> <br>
    ที่อยู่ : <?=$row ["address"]?> <br>
    อีเมล์ : <?=$row ["email"]?> <br>
    <a href='editform.php?pid=". $row ["username"] ."'>แก้ไข</a> | 
    <a href='#' onclick="confirmDelete('<?=$row["username"]?>')"> ลบ </a>
    <hr><br>
<?php endwhile; ?>

</body>
</html>