<?php
include 'template/header.php';
include 'template/navbar.php';
include "config/conexion.php";
$sentencia = $bd->query("SELECT DISTINCT e.idempleado,
                                e.nombre,
                                e.apellido,
                                d.descripcion depto
                        FROM activos.empleado e,
                            activos.departamento d,
                            activos.activo a,
                            activos.asignacion aa
                        WHERE     e.Departamento = d.idDepto
                        AND e.idEmpleado = aa.idEmpleado
                        AND a.idActivo = aa.idActivo;");
$empleado = $sentencia->fetchAll(PDO::FETCH_OBJ);
?>

<div class="container-fluid" style="overflow:hidden; overflow-y:hidden">
    <div class="row flex-nowrap ">
        <?php include 'template/sidebar.php' ?>
        <div class="container mt-5">
            <div class="row ">
                <div class="col-md-7">
                    <!-- inicio alerta -->
                    <?php
                    include "template/alerta.php";
                    ?>
                    <!-- fin alerta -->
                    <div class="card">
                        <div class="card-header">
                            <h3>Listado asignaciones</h3>
                        </div>
                        <div class="p-4">
                            <table class="table align-middle">
                                <thead>
                                    <tr>
                                        <th scope="col">ID Empleado</th>
                                        <th scope="col">Nombre</th>
                                        <th scope="col">Apellido</th>
                                        <th scope="col">Departamento</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                    foreach ($empleado as $dato) {
                                    ?>

                                    <tr>
                                        <td scope="row"><?php echo $dato->idempleado; ?></td>
                                        <td><?php echo $dato->nombre; ?></td>
                                        <td><?php echo $dato->apellido; ?></td>
                                        <td><?php echo $dato->depto; ?></td>
                                        <td>
                                            <?php
                                              echo '<a href="tarjeta.php?idempleado='.$dato->idempleado.'" class="btn btn-primary btn-sm">Generar Tarjeta</a>';
                                            ?>
                                        </td>
                                    </tr>

                                    <?php
                                    }
                                    ?>

                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include 'template/footer.php' ?>