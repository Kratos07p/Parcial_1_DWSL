<?php
include_once('./conf/conf.php');

if (!isset($_GET['id'])) {
    header("Location: personal.php");
    exit;
}

$id = $_GET['id'];
$sql_foto = "SELECT fotografia FROM personal WHERE id = $id";
$result_foto = mysqli_query($con, $sql_foto);
if ($row = mysqli_fetch_assoc($result_foto)) {
    $ruta_foto = $row['fotografia'];
}

$sql_delete = "DELETE FROM personal WHERE id = $id";
if (mysqli_query($con, $sql_delete)) {
    header("Location: personal.php");
    exit;
} else {
    echo "Error al eliminar el registro: " . mysqli_error($con);
}

mysqli_close($con);
?>
