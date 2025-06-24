<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Abarrotes las campanas</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="css/proveedorstyle.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <link rel="icon" type="image/png" href="img/store.png">
    <script>
        $(document).ready(function () {
            // Inicializa tu DataTable
            var table = $('#Tabla_Buscar').DataTable({
                "language": {
                    "emptyTable": "No existen datos",
                    "info": "Mostrando el total de registros",
                    "infoEmpty": "Mostrando 0 registros",
                    "infoFiltered": "(filtrados de MAX registros en total)",
                    "infoPostFix": "",
                    "thousands": ",",
                    "loadingRecords": "Cargando...",
                    "processing": "Procesando...",
                    "search": "Buscar:",
                    "zeroRecords": "No  encuentran    registros ",
                    "searchPlaceholder": "Buscar registro",
                    "aria": {
                        "sortAscending": ": activar para ordenar la columna ascendente",
                        "sortDescending": ": activar para ordenar la columna descendente"
                    }
                }
            });
        });
    </script>
</head>
<body>
    <aside class="menu">
        <ul>
            <li><a href="index.html"><i class="fa-solid fa-house"></i>&nbsp &nbsp Inicio</a></li><br>
            <li><a href="#"><i class="fa-solid fa-cart-shopping"></i>&nbsp &nbsp Productos</a></li><br>
            <li><a href="calendar.html"><i class="fa-solid fa-calendar-days"></i> &nbsp &nbsp Calendario</a></li><br>
            <li><a href="proveedores.php"><i class="fa-solid fa-address-book"></i> &nbsp &nbsp Proveedores</a></li><br>
            <li><a href="clientes.php"><i class="fa-solid fa-user"></i> &nbsp &nbsp Clientes</a></li><br>
        </ul>
    </aside>
    <section class="content">
        <center><h1>Abarrotes las campanas</h1><br></center>
        <center>
        <div class="alumnos-lista">
            <table id="Tabla_Buscar">
                <thead>
                    <tr>
                        <th class="id-header">Nombre</th>
                        <th>Numero de Telefono</th>
                        <th>Direccion</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include("php/conectar.php");
                    // Verificar si la conexión a la base de datos se realizó correctamente
                    if ($conexion->connect_error) {
                        die("Error en la conexión: " . $conexion->connect_error);
                    }
                    $sql = "SELECT Nombre, Telefono, Direccion FROM clientes";
                    $result = $conexion->query($sql);
                    if ($result === false) {
                        die("Error en la consulta SQL: " . $conexion->error);
                    }
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            ?>
                            <tr>
                                <td id="Nombre"><?php echo $row["Nombre"]; ?></td>
                                <td><?php echo $row["NumeroTelefono"]; ?></td>
                                <td><?php echo $row["Telefono"]; ?></td>
                                <td><?php echo $row["Direccion"]; ?></td>
                            </tr>
                        <?PHP
                        }
                    } else {
                        echo "<tr><td colspan='5'>No se encontraron registros.</td></tr>";
                    }
                    $conexion->close();
                    ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="5"></th>
                    </tr>
                </tfoot>
            </table>
        </div></center>
    </section>
</body>
</html>
