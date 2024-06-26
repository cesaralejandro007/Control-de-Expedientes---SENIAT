<?php
namespace modelo;
use config\connect\connectDB as connectDB;
class RegistroExpedienteModelo extends connectDB
{
    public function registrarE($supervisor,$nro_providencia,$sujeto_pasivo,$rif,$domicilio_fiscal,$fiscal_A,$id_area)
    {
        $validar_registro = $this->validar_registro($nro_providencia);
        if ($validar_registro==false) {
            $respuesta["resultado"]=3;
            $respuesta["mensaje"]="El expediente ya se encuentra registrada.";
        } else {
            try {
            $this->conex->query("INSERT INTO expedientes(
                NroProvi,
                sujetoP,
                RifSP,
                DomicilioFiscal,
                id_area_expediente,
                id_estado_expedientes,
                status_exp
                )
            VALUES(
                '$nro_providencia',
                '$sujeto_pasivo',
                '$rif',
                '$domicilio_fiscal',
                '$id_area',
                '2',
                '1'
            )");

            $resultado = $this->conex->query("SELECT * FROM expedientes WHERE NroProvi = '$nro_providencia'");
            $datos = $resultado->fetchAll();
            $id_expediente = $datos[0]['id'];

            $this->conex->query("INSERT INTO userxexpediente(
                id_user,
                id_expediente,
                supervisor
                )
            VALUES(
                '$fiscal_A',
                '$id_expediente',
                '$supervisor'
            )");

            $respuesta["resultado"]=1;
            $respuesta["mensaje"]="Registro Exitoso.";
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }
        return $respuesta;
    }

    public function validar_registro($nro_providencia)
    {
        try {
            $resultado = $this->conex->prepare("SELECT * FROM expedientes WHERE NroProvi='$nro_providencia'");
            $resultado->execute();
            $fila = $resultado->fetchAll();
            if ($fila) {
                return false;
            } else {
                return true;
            }
        } catch (Exception $e) {
            return false;
        }
    }

    public function eliminar($id_expediente,$id_usuario)
    {
    try {
        $this->conex->query("DELETE FROM userxexpediente WHERE id_user = '$id_usuario' AND id_expediente = '$id_expediente'");
        $this->conex->query("DELETE FROM expedientes WHERE id = '$id_expediente'");
        $respuesta['resultado'] = 1;
        $respuesta['mensaje'] = "Eliminacion exitosa";
        return $respuesta;
    } catch (Exception $e) {
        $respuesta['resultado'] = 0;
        $respuesta['mensaje'] = $e->getMessage();
    }
    }

    public function cargar($id_expediente, $id_usuario)
    {
        $resultado = $this->conex->prepare("SELECT *, expedientes.id as id_expediente, user.id as id_usuario, userxexpediente.id AS id_expedient_user FROM expedientes,userxexpediente,user WHERE user.id = userxexpediente.id_user AND userxexpediente.id_expediente = expedientes.id AND expedientes.id ='$id_expediente' and user.id ='$id_usuario'");
        $respuestaArreglo = [];
        try {
            $resultado->execute();
            $respuestaArreglo = $resultado->fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
        return $respuestaArreglo;
    }

    public function buscar_status_expediente($id_expediente)
    {
        $resultado = $this->conex->prepare("SELECT * FROM expedientes WHERE  id ='$id_expediente'");
        $respuestaArreglo = [];
        try {
            $resultado->execute();
            $respuestaArreglo = $resultado->fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
        return $respuestaArreglo;
    }

    public function modificar($id_expedient_user ,$id_expediente,$supervisor,$nro_providencia,$sujeto_pasivo,$rif,$domicilio_fiscal,$fiscal_A)
    {
        $validar_modificar = $this->validar_modificar($id_expediente, $nro_providencia);
        if ($validar_modificar) {
            $respuesta['resultado'] = 3;
            $respuesta['mensaje'] = "El expediente ya se encuetra registrada.";
        }else {
            try {
                $this->conex->query("UPDATE expedientes SET NroProvi = '$nro_providencia', sujetoP = '$sujeto_pasivo', RifSP = '$rif', DomicilioFiscal = '$domicilio_fiscal' WHERE id = '$id_expediente'");
                $this->conex->query("UPDATE userxexpediente SET id_user = '$fiscal_A', id_expediente = '$id_expediente' WHERE id = '$id_expedient_user'");
                $respuesta["resultado"]=1;
                $respuesta["mensaje"]="Modificación exitosa.";
            } catch (Exception $e) {
                $respuesta['resultado'] = 0;
                $respuesta['mensaje'] = $e->getMessage();
            }
        }
        return $respuesta;
    }
    
    public function listar_area($division)
    {
        $resultado = $this->conex->prepare("SELECT *, area_expediente.id as id_area FROM area_expediente,division_expediente WHERE area_expediente.id_division_expediente = division_expediente.id AND division_expediente.nombre_division = '$division'");
        $respuestaArreglo = [];
        try {
            $resultado->execute();
            $respuestaArreglo = $resultado->fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
        return $respuestaArreglo;
    }

    public function cambiar_area_expedient($nro_expediente ,$area_expediente)
    {
        try {
            $this->conex->query("UPDATE expedientes SET id_area_expediente = '$area_expediente' WHERE NroProvi = '$nro_expediente'");
            $respuesta["resultado"]=1;
            $respuesta["mensaje"]="Modificación exitosa.";
        } catch (Exception $e) {
            $respuesta['resultado'] = 0;
            $respuesta['mensaje'] = $e->getMessage();
        }
        return $respuesta;
    }

    public function cambiar_estado($estado ,$id_expediente)
    {
        try {
            $this->conex->query("UPDATE expedientes SET id_estado_expedientes = '$estado' WHERE id = '$id_expediente'");
            $respuesta["resultado"]=1;
            $respuesta["mensaje"]="Modificación exitosa.";
        } catch (Exception $e) {
            $respuesta['resultado'] = 0;
            $respuesta['mensaje'] = $e->getMessage();
        }
        return $respuesta;
    }


    public function validar_modificar($id, $nro_providencia)
    {
        try {
            $resultado = $this->conex->prepare("SELECT * FROM expedientes WHERE NroProvi='$nro_providencia' AND id<>'$id'");
            $resultado->execute();
            $fila = $resultado->fetchAll();
            if ($fila) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            return false;
        }
    }


    public function actualizar_funcionario_asignados($id_expe, $cedula)
    {
        try {
            $resultado = $this->conex->prepare("SELECT * FROM user WHERE cedula_user = '$cedula'");
            $resultado->execute();
            $respuestaArreglo = $resultado->fetchAll();
            $id_usuario = $respuestaArreglo[0]['id'];
            $this->conex->query("UPDATE userxexpediente, expedientes 
            SET userxexpediente.id_user = '$id_usuario', 
                expedientes.status_exp = '1' 
            WHERE userxexpediente.id = '$id_expe' 
                AND userxexpediente.id_expediente = expedientes.id;");
            $respuesta["resultado"]=1;
            $respuesta["mensaje"]="Modificación exitosa.";
        } catch (Exception $e) {
            $respuesta['resultado'] = 0;
            $respuesta['mensaje'] = $e->getMessage();
        }
        return $respuesta;
    }


    public function listar()
    {
        $resultado = $this->conex->prepare("SELECT *,expedientes.id as id_expedientes, user.id as id_usuario, userxexpediente.id as id_expedientes_usuario FROM expedientes,estado_expediente,userxexpediente,user,area_expediente, division_expediente WHERE expedientes.id_estado_expedientes = estado_expediente.id and expedientes.id = userxexpediente.id_expediente AND userxexpediente.id_user = user.id and expedientes.id_area_expediente = area_expediente.id and division_expediente.id = area_expediente.id_division_expediente and division_expediente.nombre_division = 'División de Fiscalización'");
        $respuestaArreglo = [];
        try {
            $resultado->execute();
            $respuestaArreglo = $resultado->fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
        return $respuestaArreglo;
    }
    
    public function listar_division()
    {
        $resultado = $this->conex->prepare("SELECT * FROM division_expediente");
        $respuestaArreglo = [];
        try {
            $resultado->execute();
            $respuestaArreglo = $resultado->fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
        return $respuestaArreglo;
    }

    public function regis_buscarArea($id_division)
    {
        $resultado = $this->conex->prepare("SELECT * FROM area_expediente WHERE id_division_expediente = '$id_division'");
        $respuestaArreglo = [];
        try {
            $resultado->execute();
            $respuestaArreglo = $resultado->fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    
        // Generar las opciones del select
        $optionsHTML = '';
        foreach ($respuestaArreglo as $fila) {
            $optionsHTML .= '<option value="' . $fila['id'] . '">' . $fila['nombre_area'] . '</option>';
        }
    
        // Incorporar el select en el HTML
        $selectHTML = '<div class="input-group mb-1">';
        $selectHTML .= '<label class="input-group-text" for="registro_id_area">Área</label>';
        $selectHTML .= '<select class="form-select" id="registro_id_area">';
        $selectHTML .= '<option value="0" selected>Seleccionar área</option>';
        $selectHTML .= $optionsHTML; // Agregar las opciones generadas dinámicamente
        $selectHTML .= '</select> <spam id="sregistro_id_area"></spam>';
        $selectHTML .= '</div>';    
        // Retornar el select HTML
        return $selectHTML;
    }
    
    public function buscarArea($id_division)
    {
        $resultado = $this->conex->prepare("SELECT * FROM area_expediente WHERE id_division_expediente = '$id_division'");
        $respuestaArreglo = [];
        try {
            $resultado->execute();
            $respuestaArreglo = $resultado->fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }

        $resultado1 = $this->conex->prepare("SELECT * FROM user,area,division WHERE user.id_area = area.id AND area.id_division = division.id AND division.id = '$id_division' AND user.nombre_rol = 'Supervisor'");
        $respuestaArreglo1 = [];
        try {
            $resultado1->execute();
            $respuestaArreglo1 = $resultado1->fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    
        // Generar las opciones del select
        $optionsHTML = '';
        $optionsHTML1 = '';
        foreach ($respuestaArreglo as $fila) {
            $optionsHTML .= '<option value="' . $fila['id'] . '">' . $fila['nombre_area'] . '</option>';
        }

        foreach ($respuestaArreglo1 as $fila1) {
            $optionsHTML1 .= '<option value="' . $fila1['cedula_user'] .", ".$fila1['nombre_user']. '">' . $fila1['nombre_user'] . '</option>';
        }
    
        $selectHTML = '<div class="input-group mb-3">';
        $selectHTML .= '<label class="input-group-text" for="id_area">Área</label>';
        $selectHTML .= '<select class="form-select" id="id_area">';
        $selectHTML .= '<option value="0" selected>Seleccionar área</option>';
        $selectHTML .= $optionsHTML; // Agregar las opciones generadas dinámicamente
        $selectHTML .= '</select>';
        $selectHTML .= '<spam id="sid_area"></spam>';
        $selectHTML .= '</div>';
        
        // Utilizar la misma variable para agregar el segundo select
        $selectHTML .= '<div class="input-group mb-3">';
        $selectHTML .= '<label class="input-group-text" for="selecsuperv">Supervisor</label>';
        $selectHTML .= '<select class="form-select" id="selecsuperv">';
        $selectHTML .= '<option value="0" selected>Seleccionar Supervisor</option>';
        $selectHTML .= $optionsHTML1; // Agregar las opciones generadas dinámicamente
        $selectHTML .= '</select>';
        $selectHTML .= '<spam id="sselecsuperv"></spam>';
        $selectHTML .= '</div>';
        
        $selectHTML .= '<div class="d-flex justify-content-center" id="enviar_expediente"><button type="button" onclick="enviar_expediente()" class="btn btn-outline-primary">Despachar expediente</button></div>';
        
        // Retornar el select HTML
        return $selectHTML;
    }

    public function actualizar_area_expediente($id_area,$id_expediente,$division_actual)
    {
        $validar_modificar = $this->validar_ubicacion($id_area, $division_actual);
        if ($validar_modificar) {
            $respuesta['resultado'] = 2;
            $respuesta['mensaje'] = "El expediente no se puede despechar en la misma división.";
        }else {
            try {
                $this->conex->query("UPDATE expedientes SET id_area_expediente = '$id_area', status_exp = 0  WHERE id = '$id_expediente'");
                $respuesta["resultado"]=1;
                $respuesta["mensaje"]="Modificación exitosa.";
            } catch (Exception $e) {
                $respuesta['resultado'] = 0;
                $respuesta['mensaje'] = $e->getMessage();
            }
        }
        return $respuesta;
    }

    public function validar_ubicacion($id_area,$division_actual)
    {
        try {
            $resultado = $this->conex->prepare("SELECT * FROM area_expediente,division_expediente WHERE area_expediente.id_division_expediente = division_expediente.id AND area_expediente.id = '$id_area' AND division_expediente.nombre_division = '$division_actual';");
            $resultado->execute();
            $fila = $resultado->fetchAll();
            if ($fila) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            return false;
        }
    }
    
    public function listar_fiscal()
    {
        $resultado = $this->conex->prepare("SELECT *,user.id as id_usuario FROM user,area,division WHERE user.id_area = area.id AND area.id_division = division.id AND nombre_rol = 'Fiscal' AND division.nombrediv = 'División de Fiscalizacíon'");
        $respuestaArreglo = [];
        try {
            $resultado->execute();
            $respuestaArreglo = $resultado->fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
        return $respuestaArreglo;
    }

}