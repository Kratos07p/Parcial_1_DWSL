<?php
session_start();
if(isset($_SESSION['usuario'])== null){
    Header('Location: index.php');
}
include_once('./conf/conf.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"><script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>Personal</title>
</head>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        img {
            width: 50px;
            height: 50px;
            border-radius: 50%;
        }
    </style>
<body>
    <?php
        include_once('nav.php');
        $sql = "SELECT * FROM personal";
        $result = mysqli_query($con, $sql);
    ?>
    <br><br>
    <a href="agregar-personal.php" class="btn btn-success">Nuevo Personal</a>
    <br><br>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Teléfono</th>
                <th>DUI</th>
                <th>Fecha Nac.</th>
                <th>Departamento</th>
                <th>Distrito</th>
                <th>Colonia</th>
                <th>Calle</th>
                <th>Casa</th>
                <th>Estado Civil</th>
                <th>Fotografía</th>
                <th>Fecha Registro</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
        <?php
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result)){
                echo "<tr>";
                echo "<td>".$row['id']."</td>";
                echo "<td>".$row['nombre']."</td>";
                echo "<td>".$row['telefono']."</td>";
                echo "<td>".$row['dui']."</td>";
                echo "<td>".$row['fecha_nacimiento']."</td>";
                echo "<td>".$row['departamento']."</td>";
                echo "<td>".$row['distrito']."</td>";
                echo "<td>".$row['colonia']."</td>";
                echo "<td>".$row['calle']."</td>";
                echo "<td>".$row['casa']."</td>";
                echo "<td>".$row['estado_civil']."</td>";

                echo "<td><img src='./img/avatar.png' alt='Avatar'></td>";

                echo "<td>".$row['fecha_registro']."</td>";
                echo "<td>
                        <a href='editar-personal.php?id=".$row['id']." 'class='btn btn-primary'>Editar</a>  
                        <a href='eliminar-personal.php?id=".$row['id']." ' onclick=\"return confirm('¿Seguro que deseas eliminar este registro?');\" class='btn btn-danger'>Eliminar</a>
                      </td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='14'>No hay registros</td></tr>";
        }
        ?>
        </tbody>
    </table>
<?php
mysqli_close($con);
?>
</body>
</html>