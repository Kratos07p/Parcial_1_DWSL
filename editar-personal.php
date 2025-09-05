<?php
include_once('./conf/conf.php');

$mensaje = "";

if (!isset($_GET['id'])) {
    header("Location: personal.php");
    exit;
}

$id = $_GET['id'];

$sql_personal = "SELECT * FROM personal WHERE id = $id";
$result = mysqli_query($con, $sql_personal);

if (mysqli_num_rows($result) == 0) {
    header("Location: personal.php");
    exit;
}

$personal = mysqli_fetch_assoc($result);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $telefono = $_POST['telefono'];
    $dui = $_POST['dui'];
    $fecha_nacimiento = $_POST['fecha_nacimiento'];
    $departamento = $_POST['departamento'];
    $distrito = $_POST['distrito'];
    $colonia = $_POST['colonia'];
    $calle = $_POST['calle'];
    $casa = $_POST['casa'];
    $estado_civil = $_POST['estado_civil'];

    $fotografia = $personal['fotografia'];
    if (isset($_FILES['fotografia']) && $_FILES['fotografia']['error'] == 0) {
        $fotografia = basename($_FILES['fotografia']['name']);
    }

    $validar = "SELECT * FROM personal WHERE dui='$dui' AND id != $id";
    $resultado = mysqli_query($con, $validar);

    if (mysqli_num_rows($resultado) > 0) {
        $mensaje = "<div class='alert alert-danger'>El DUI ya está registrado.</div>";
    } else {
        $sql = "UPDATE personal SET
                    nombre='$nombre',
                    telefono='$telefono',
                    dui='$dui',
                    fecha_nacimiento='$fecha_nacimiento',
                    departamento='$departamento',
                    distrito='$distrito',
                    colonia='$colonia',
                    calle='$calle',
                    casa='$casa',
                    estado_civil='$estado_civil',
                    fotografia='$fotografia'
                WHERE id=$id";

        if (mysqli_query($con, $sql)) {
            $mensaje = "<div class='alert alert-success'>Registro actualizado correctamente.</div>";
            header("Location: personal.php");
        } else {
            $mensaje = "<div class='alert alert-danger'>Error: " . mysqli_error($con) . "</div>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Personal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<?php include_once('nav.php'); ?>

<div class="container mt-5">
    <div class="card shadow-lg">
        <div class="card-body">
            <?php if ($mensaje != "") echo $mensaje; ?>

            <form action="" method="POST" enctype="multipart/form-data">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Nombre</label>
                        <input type="text" name="nombre" class="form-control" value="<?php echo $personal['nombre']; ?>" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Teléfono</label>
                        <input type="text" name="telefono" class="form-control" value="<?php echo $personal['telefono']; ?>" required placeholder="7777-7777">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">DUI</label>
                        <input type="text" name="dui" class="form-control" value="<?php echo $personal['dui']; ?>" required placeholder="00000000-0">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Fecha de Nacimiento</label>
                        <input type="date" name="fecha_nacimiento" class="form-control" value="<?php echo $personal['fecha_nacimiento']; ?>" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Departamento</label>
                        <input type="text" name="departamento" class="form-control" value="<?php echo $personal['departamento']; ?>">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Distrito</label>
                        <input type="text" name="distrito" class="form-control" value="<?php echo $personal['distrito']; ?>">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-4">
                        <label class="form-label">Colonia</label>
                        <input type="text" name="colonia" class="form-control" value="<?php echo $personal['colonia']; ?>">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Calle</label>
                        <input type="text" name="calle" class="form-control" value="<?php echo $personal['calle']; ?>">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Casa/Depto</label>
                        <input type="text" name="casa" class="form-control" value="<?php echo $personal['casa']; ?>">
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Estado Civil</label>
                    <select name="estado_civil" class="form-select">
                        <option value="">Seleccione...</option>
                        <option value="Soltero" <?php if($personal['estado_civil']=='Soltero') echo 'selected'; ?>>Soltero</option>
                        <option value="Casado" <?php if($personal['estado_civil']=='Casado') echo 'selected'; ?>>Casado</option>
                        <option value="Divorciado" <?php if($personal['estado_civil']=='Divorciado') echo 'selected'; ?>>Divorciado</option>
                        <option value="Viudo" <?php if($personal['estado_civil']=='Viudo') echo 'selected'; ?>>Viudo</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Fotografía</label>
                    <input type="file" name="fotografia" class="form-control" >
                    <?php if($personal['fotografia']): ?>
                        <?php echo "Ruta actual: ".$personal['fotografia']; ?>
                    <?php endif; ?>
                </div>

                <div class="d-grid">
                    <button type="submit" class="btn btn-primary btn-lg">Actualizar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
