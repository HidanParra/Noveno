<?php

    require_once '_db.php';
    if(isset($_POST["accion"])){
	    switch ($_POST["accion"]) {
            /*case 'insertar_usuarios':
                insertar_usuarios();
            break;
            case 'consultar_usuarios':
                consultar_usuarios($_POST["id"]);
            break;
            case 'eliminar_usuarios':
                eliminar_usuarios($_POST["id"]);
            break;
            case 'editar_usuarios':
                editar_usuarios();
            break;*/
            case 'insertar_salones':
                insertar_salones();
            break;
            case 'editar_salones':
                    editar_salones();
            break;
            case 'eliminar_salones':
                    eliminar_salones();
            break;
        }

    }

    function editar_salones(){
        global $db;
        extract($_POST);

        $editar=$db ->update("salones", ["sal_id"=>$id,
                                            "sal_num"=>$num,
                                            "sal_cap"=>$cap,
                                            "sal_av"=>$av,
                                            "sal_ob"=>$ob]);
        if($insertar){
            echo "edición exitosa";
        }else{
            echo "Se ocasiono un error";
        }

    }
    function insertar_salones(){
        global $db;
        extract($_POST);

        $insertar=$db ->insert("salones",[
                                            "sal_num"=>$num,
                                            "sal_cap"=>$cap,
                                            "sal_av"=>$av,
                                            "sal_ob"=>$ob]);
        if($insertar){
            echo "Registro Exitoso";
        }else{
            echo "Se ocasiono un error";
        }
    }
    /*function insertar_usuarios(){
        global $db;
        extract($_POST);

        $insertar=$db ->insert("usuarios",["usr_id" => $mac,
                                            "usr_nombre"=>$nom,
                                            "usr_appat"=>$pat,
                                            "usr_apmat"=>$mat,
                                            "usr_email"=>$cor,
                                            "usr_tel"=>$tel,
                                            "usr_password"=>$pass,
                                            "usr_nivel"=>$niv,
                                            "cps_id"=>$lista,
                                            "tyu_id"=>$tip,
                                            "usr_status"=>1
                                            ]);
        if($insertar){
            echo "Registro existoso";
        }else{
            echo "Se ocasiono un error";
	    }
    }*/

    function eliminar_salones($id){
        global $db;
        $eliminar = $db->delete("salones",["sal_id" => $id]);
        if($eliminar){
            echo "Registro eliminado";
        }else{
            echo "registro no eliminado";
        }
    }



    /*function consultar_usuarios($id){
        global $db;
         $consultar = $db -> get("usuarios","*",["AND" => ["usr_status"=>1, "usr_id"=>$id]]);
        echo json_encode($consultar);

    }

    function editar_usuarios(){
        global $db;
        extract($_POST);
         $editar=$db ->update("usuarios",["usr_id" => $mac,
                                        "usr_nombre"=>$nom,
                                        "usr_appat"=>$pat,
                                        "usr_apmat"=>$mat,
                                        "usr_email"=>$cor,
                                        "usr_tel"=>$tel,
                                        "usr_password"=>$pass,
                                        "usr_nivel"=>$niv,
                                        "cps_id"=>$lista,
                                        "tyu_id"=>$tip,
                                        ],["usr_id"=>$id]);
        if($editar){
            echo "Ediccion completada";
        }else{
            echo "Se ocasiono un error";
        }
    }

    function mostrar_usuarios(){
        global $db;
        $consultar=$db->select("usuarios","*",["usr_status" =>1]);
        echo json_encode($consultar);
    }*/

?>
