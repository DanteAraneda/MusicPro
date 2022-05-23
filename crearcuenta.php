<?php include("template/cabecera.php"); ?>

<?php 

include("administrador/config/bd.php");

$txtPrim_nombre=(isset($_POST['txtPrim_nombre']))?$_POST['txtPrim_nombre']:"";
$txtSeg_nombre=(isset($_POST['txtSeg_nombre']))?$_POST['txtSeg_nombre']:"";
$txtApe_paterno=(isset($_POST['txtApe_paterno']))?$_POST['txtApe_paterno']:"";
$txtApe_materno=(isset($_POST['txtApe_materno']))?$_POST['txtApe_materno']:"";
$txtRut=(isset($_POST['txtRut']))?$_POST['txtRut']:"";
$txtDv=(isset($_POST['txtDv']))?$_POST['txtDv']:"";
$txtCelular=(isset($_POST['txtCelular']))?$_POST['txtCelular']:"";
$txtmail=(isset($_POST['txtmail']))?$_POST['txtmail']:"";
$txtDireccion=(isset($_POST['txtDireccion']))?$_POST['txtDireccion']:"";
$txtCiudad=(isset($_POST['txtCiudad']))?$_POST['txtCiudad']:"";
$txtRegion=(isset($_POST['txtRegion']))?$_POST['txtRegion']:"";

$accion=(isset($_POST['accion']))?$_POST['accion']:"";

switch ($accion) {
    case "Agregar":
        # code...
        $sentenciaSQL= $conexion->prepare("INSERT INTO `usuario` (`nombre_p`, `nombre_m`, `apellido_p`, `apellido_m`, `rut`, `dv`, `celular`, `correo`, `direccion`, `ciudad`, `region`, `tipo_usuario_id_tipo_usuario`) VALUES ( :nombre_p , :nombre_m , :apellido_p , :apellido_m , :rut , :dv , :celular , :correo, :direccion , :ciudad , :region, '4')");
        $sentenciaSQL->bindParam(':nombre_p',$txtPrim_nombre);
        $sentenciaSQL->bindParam(':nombre_m',$txtSeg_nombre);
        $sentenciaSQL->bindParam(':apellido_p',$txtApe_paterno);
        $sentenciaSQL->bindParam(':apellido_m',$txtApe_materno);
        $sentenciaSQL->bindParam(':rut',$txtRut);
        $sentenciaSQL->bindParam(':dv',$txtDv);
        $sentenciaSQL->bindParam(':celular',$txtCelular);
        $sentenciaSQL->bindParam(':correo',$txtmail);
        $sentenciaSQL->bindParam(':direccion',$txtDireccion);
        $sentenciaSQL->bindParam(':ciudad',$txtCiudad);
        $sentenciaSQL->bindParam(':region',$txtRegion);

        

        $sentenciaSQL->execute();
        header("Location:login.php");
        

        //muestra si se presiono correctamente
        //echo "Presionado boton Agregar";
        break;
    }



?>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Crea tu cuenta
                </div>

                <div class="card-body">

                    <form method="POST" enctype="multipart/form-data">

                        <div class = "form-group">
                            <label for="txtSubCategoria">Primer Nombre: </label>
                            <input type="text" required class="form-control" name="txtPrim_nombre" id="txtPrim_nombre" placeholder="MusicPro">
                        </div>
                        <div class = "form-group">
                            <label for="txtTipo">Segundo Nombre: </label>
                            <input type="text" required class="form-control"  name="txtSeg_nombre" id="txtSeg_nombre" placeholder="MusicPro">
                        </div>
                        <div class = "form-group">
                            <label for="txtNombre">Apellido Paterno: </label>
                            <input type="text" required class="form-control" name="txtApe_paterno" id="txtApe_paterno" placeholder="MusicPro">
                        </div>
                        <div class = "form-group">
                            <label for="txtDescripcion">Apellido Materno: </label>
                            <input type="text" required class="form-control"  name="txtApe_materno" id="txtApe_materno" placeholder="MusicPro">
                        </div>
                        <div class = "form-group">
                            <label for="txtMarca">Rut: </label>
                            <input type="text" required class="form-control" name="txtRut" id="txtRut" placeholder="12345678"> 
                        </div>
                        <div class = "form-group">
                            <label for="txtPrecio">Dv: </label>
                            <input type="text" required class="form-control"  name="txtDv" id="txtDv" placeholder="K">
                        </div>
                        <div class = "form-group">
                            <label for="txtFecha">Celular: </label>
                            <input type="text" required class="form-control"  name="txtCelular" id="txtCelular" placeholder="912345678">
                        </div>
                        <div class = "form-group">
                            <label for="txtFecha">Correo Electronico: </label>
                            <input type="text" required class="form-control" name="txtmail" id="txtmail" placeholder="musicpro@musicpro.cl">
                        </div>
                        <div class = "form-group">
                            <label for="txtFecha">Dirección: </label>
                            <input type="text" required class="form-control" name="txtDireccion" id="txtDireccion" placeholder="MusicPro #1234">
                        </div>
                        <div class = "form-group">
                            <label for="txtFecha">Ciudad: </label>
                            <input type="text" required class="form-control" name="txtCiudad" id="txtCiudad" placeholder="Santiago">
                        </div>
                        <div class = "form-group">
                            <label for="txtFecha">Región: </label>
                            <input type="text" required class="form-control" name="txtRegion" id="txtRegion" placeholder="Metropolitana">
                        </div>
                        </br>
                        <button type="submit" class="btn btn-outline-info" name="accion" value="Agregar">Crear Cuenta</button>
                    </form>

                </div>
            </div>
        </div>
<?php include("template/pie.php");  ?>