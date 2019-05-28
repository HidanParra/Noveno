<?php
require_once 'includes/_db.php';
require_once 'includes/_funciones.php';
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="#" />
    <title></title>


    <link rel="stylesheet" href="lib/bootstrap/css/bootstrap.min.css">
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css'>
    <link rel="stylesheet" type="text/css" href="lib/datatables/datatables.min.css"/>
    <link rel="stylesheet"  type="text/css" href="lib/datatables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css">

  </head>

  <body>

    <div class="container">
        <div class="row">
            <div class="col-lg-12">
            <h2>Salones
            <button id="btnNuevo" type="button" class="btn btn-primary" data-toggle="modal">Agregar un nuevo salon
                <span class="fas fa-plus"></span>
            </button>
        </h2>

            </div>
        </div>
    </div>
    <br>
    <div class="container">
        <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive">
                        <table id="tablausuario" class="table table-striped table-bordered table-condensed" style="width:100%">
                        <thead class="text-center">
                            <tr>
                                <th>Id</th>
                                <th>Numero de Salón</th>
                                <th>Capacidad</th>
                                <th>Audiovisual</th>
                                <th>Observaciones</th>
                                <th>Editar</th>
                                <th>Eliminar</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            <?php
                                $salones = $db->select("salones",
                                /*[
                                    "[>]campus"=>"cps_id",
                                    "[>]tipo_usuarios"=>"tyu_id"
                                ],*/
                                [
                                    "salones.sal_id",
                                    "salones.sal_num",
                                    "salones.sal_cap",
                                    "salones.sal_av",
                                    "salones.sal_ob"
                                    /*"usuarios.usr_tel",
                                    "usuarios.usr_status",
                                    "campus.cps_campus",
                                    "tipo_usuarios.tyu_nombre"*/
                                ]);
                                foreach ($salones as $salones => $sal) {
                            ?>
                                    <tr>
                                        <td><?php echo $sal["sal_id"]; ?></td>
                                        <td><?php echo $sal["sal_num"]; ?></td>
                                        <td><?php echo $sal["sal_cap"]; ?></td>
                                        <td><?php echo $sal["sal_av"]; ?></td>
                                        <td><?php echo $sal["sal_ob"]; ?></td>
                                       <!-- <td><?php /*echo $usr["tyu_nombre"];*/ ?></td>
                                       -->
                                        <td>
                                            <a href="#" class="editar_salones" data-id="<?php echo $sal["sal_id"]; ?>"><i class="fas fa-edit"></i></a>
                                        </td>
                                        <td>
                                            <a href="#" class="eliminar_salones" data-id="<?php echo $sal["sal_id"]; ?>"><i class="fas fa-trash"></i></a>
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

<!--Modal-->
<div class="modal fade" id="modalusuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
            </div>
        <form id="formulario" action="">
            <div class="modal-body">
                <!--<div class="form-group">
                <input type="number" class="form-control" id="matricula"  placeholder="Id">
                </div>-->
                <div class="form-group">
                <input type="text" class="form-control" id="num"  placeholder="Numero de Salón">
                </div>
                <div class="form-group">
                <input type="text" class="form-control" id="cap" placeholder="Capacidad">
                </div>
                <div class="form-group">
                <label class="form-control" id="av">Audiovisual</label>
                </div>
                <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" id="pan" name="inlineRadioOptions" id="pantalla" value="Pantalla">
                <label class="form-check-label" for="inlineRadio1">Pantalla</label>
                <br>
                </div>

                <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" id="pro" name="inlineRadioOptions" id="proyector" value="Proyector">
                <label class="form-check-label" for="inlineRadio2">Proyector</label>
                <br>
                </div>

                <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" id="nin" name="inlineRadioOptions" id="ninguno" value="Ninguno" checked>
                <label class="form-check-label" for="inlineRadio2">Ninguno</label>
                <br>
                </div>
                <br>
                <br>

<!--
                <div class="form-group">
                   <select id="lista">
                   <option value="0">Seleccionar Campus</option>
                    <?php
                            $campus = $db->select("campus","*");
                            foreach ($campus as $campus => $cps) {
                        ?>
                                <option value="<?php echo $cps["cps_id"]?>"><?php echo $cps["cps_campus"]?></option>
                        <?php
                            }
                        ?>
                   </select>
                </div>
-->
                <div class="form-group">
                <input type="email" class="form-control" name="correo" id="ob" placeholder="Observaciones">
                </div>
<!--
                <div class="form-group">
                   <select id="tipo">
                   <option value="0">Seleccionar Tipo de usuario</option>
                   <?php
                            $tipo = $db->select("tipo_usuarios","*");
                            foreach ($tipo as $tipo => $tyu) {
                        ?>
                                <option value="<?php echo $tyu["tyu_id"]?>"><?php echo $tyu["tyu_nombre"]?></option>
                        <?php
                            }
                        ?>
                   </select>
                </div>
-->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                <button type="button" id="btnGuardar" class="btn btn-success">Guardar</button>
            </div>
        </form>
        </div>
    </div>
</div>


    <script src="lib/jquery/jquery-3.3.1.min.js"></script>
    <script src="lib/popper/popper.min.js"></script>
    <script src="lib/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="lib/datatables/datatables.min.js"></script>
    <script type="text/javascript" src="js/main.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>


  </body>
</html>
