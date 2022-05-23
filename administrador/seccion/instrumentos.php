<?php include("../template/head.php"); ?>
<?php
$txtID=(isset($_POST['txtID']))?$_POST['txtID']:"";
$txtCategoria=(isset($_POST['txtCategoria']))?$_POST['txtCategoria']:"";
$txtSubCategoria=(isset($_POST['txtSubCategoria']))?$_POST['txtSubCategoria']:"";
$txtTipo=(isset($_POST['txtTipo']))?$_POST['txtTipo']:"";
$txtDescripcion=(isset($_POST['txtDescripcion']))?$_POST['txtDescripcion']:"";
$txtMarca=(isset($_POST['txtMarca']))?$_POST['txtMarca']:"";
$txtPrecio=(isset($_POST['txtPrecio']))?$_POST['txtPrecio']:"";

$actual=date("Y")."-".date("m")."-".date("d");
$txtNombre=(isset($_POST['txtNombre']))?$_POST['txtNombre']:"";
$txtimagen=(isset($_FILES['txtimagen']['name']))?$_FILES['txtimagen']['name']:"";
$accion=(isset($_POST['accion']))?$_POST['accion']:"";

include("../config/bd.php");


switch ($accion) {
    case "Agregar":
        # code...
        $sentenciaSQL= $conexion->prepare("INSERT INTO `producto` ( `categoria`, `sub_categoria`, `tipo`, `nombre_prod`, `descripcion`, `marca`, `precio`, `fecha_ingreso`, `imagen`) VALUES ( :categoria, :sub_categoria, :tipo, :nombre, :descripcion, :marca, :precio, :fecha_ingreso, :imagen)");
        $sentenciaSQL->bindParam(':nombre',$txtNombre);
        $sentenciaSQL->bindParam(':categoria',$txtCategoria);
        $sentenciaSQL->bindParam(':sub_categoria',$txtSubCategoria);
        $sentenciaSQL->bindParam(':tipo',$txtTipo);
        $sentenciaSQL->bindParam(':descripcion',$txtDescripcion);
        $sentenciaSQL->bindParam(':marca',$txtMarca);
        $sentenciaSQL->bindParam(':precio',$txtPrecio);
        $sentenciaSQL->bindParam(':fecha_ingreso',$actual);

        $imagenfecha= new DateTime();
        $nombreArchivo=($txtimagen!="")?$imagenfecha->getTimestamp()."_".$_FILES["txtimagen"]["name"]:"imagen.jpg";
        $tmpImagen=$_FILES["txtimagen"]["tmp_name"];
        if($tmpImagen!=""){
            move_uploaded_file($tmpImagen,"../../img/".$nombreArchivo);
        }
        $sentenciaSQL->bindParam(':imagen',$nombreArchivo);

        $sentenciaSQL->execute();
        header("Location:instrumentos.php");
        

        //muestra si se presiono correctamente
        //echo "Presionado boton Agregar";
        break;
    case "Modificar":
        # code...
        //muestra si se presiono correctamente
        //echo "Presionado boton Modificar";

        


        $sentenciaSQL=$conexion->prepare("UPDATE producto SET categoria=:categoria, sub_categoria=:sub_categoria, tipo=:tipo, nombre_prod=:nombre_prod, descripcion=:descripcion, marca=:marca, precio=:precio, fecha_ingreso=:fecha_ingreso WHERE id_producto=:id");
        $sentenciaSQL->bindParam(':id',$txtID);
        $sentenciaSQL->bindParam(':categoria',$txtCategoria);
        $sentenciaSQL->bindParam(':sub_categoria',$txtSubCategoria);
        $sentenciaSQL->bindParam(':tipo',$txtTipo);
        $sentenciaSQL->bindParam(':nombre_prod',$txtNombre);
        $sentenciaSQL->bindParam(':descripcion',$txtDescripcion);
        $sentenciaSQL->bindParam(':marca',$txtMarca);
        $sentenciaSQL->bindParam(':precio',$txtPrecio);
        $sentenciaSQL->bindParam(':fecha_ingreso',$actual);

        if($txtimagen!=""){
            $imagenfecha= new DateTime();
            $nombreArchivo=($txtimagen!="")?$imagenfecha->getTimestamp()."_".$_FILES["txtimagen"]["name"]:"imagen.jpg";
            $tmpImagen=$_FILES["txtimagen"]["tmp_name"];
            move_uploaded_file($tmpImagen,"../../img/".$nombreArchivo);

            $sentenciaSQL=$conexion->prepare("SELECT * FROM producto WHERE id_producto=:id");
            $sentenciaSQL->bindParam(':id',$txtID);
            $sentenciaSQL->execute();
            $instrumento=$sentenciaSQL->fetch(PDO::FETCH_LAZY);
            if(isset($instrumento["imagen"])&&($instrumento["imagen"]!="imagen.jpg")){
                if(file_exists("../../img/".$instrumento["imagen"])){
                    unlink("../../img/".$instrumento["imagen"]);
            }
        }  
        $sentenciaSQL=$conexion->prepare("UPDATE producto SET imagen=:imagen WHERE id_producto=:id");
        $sentenciaSQL->bindParam(':imagen',$nombreArchivo);
        $sentenciaSQL->bindParam(':id',$txtID);

        }
        
        $sentenciaSQL->execute();
        header("Location:instrumentos.php");
        break;
    case "Cancelar":
        # code...
        //muestra si se presiono correctamente
        //echo "Presionado boton Cancelar";
        header("Location:instrumentos.php");
        break;
    case "Seleccionar":
        # code...
        //muestra si se presiono correctamente
        //echo "Presionado boton Seleccionar";
        $sentenciaSQL=$conexion->prepare("SELECT * FROM producto WHERE id_producto=:id");
        $sentenciaSQL->bindParam(':id',$txtID);
        $sentenciaSQL->execute();
        //recupera los registros en $instrumento para mostrar pero uno por uno (metodo Fetch_LAZY)
        $instrumento=$sentenciaSQL->fetch(PDO::FETCH_LAZY);
        $txtCategoria=$instrumento['categoria'];
        $txtSubCategoria=$instrumento['sub_categoria'];
        $txtTipo=$instrumento['tipo'];
        $txtNombre=$instrumento['nombre_prod'];
        $txtDescripcion=$instrumento['descripcion'];
        $txtMarca=$instrumento['marca'];
        $txtPrecio=$instrumento['precio'];
        $txtFecha=$instrumento['fecha_ingreso'];
        $txtimagen=$instrumento['imagen'];
        
        break;
    case "Borrar":
        # code...
        //muestra si se presiono correctamente
        //echo "Presionado boton Borrar";
        $sentenciaSQL=$conexion->prepare("SELECT * FROM producto WHERE id_producto=:id");
        $sentenciaSQL->bindParam(':id',$txtID);
        $sentenciaSQL->execute();
        $instrumento=$sentenciaSQL->fetch(PDO::FETCH_LAZY);
        if(isset($instrumento["imagen"])&&($instrumento["imagen"]!="imagen.jpg")){
            if(file_exists("../../img/".$instrumento["imagen"])){
                unlink("../../img/".$instrumento["imagen"]);
            }
        }        
        $sentenciaSQL=$conexion->prepare("DELETE FROM producto WHERE id_producto= :id");
        $sentenciaSQL->bindParam(':id',$txtID);
        $sentenciaSQL->execute();
        header("Location:instrumentos.php");
        break;            
    default:
        # code...
        break;
}

$sentenciaSQL=$conexion->prepare("SELECT * FROM producto");
$sentenciaSQL->execute();
//recupera los registros en $listaproducto para mostrar todos (metodo Fetch_assoc)
$listaproducto=$sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);


?>
<div class="col-md-4">
    
    <div class="card">
        <div class="card-header">
            Datos de instrumentos
        </div>

        <div class="card-body">

            <form method="POST" enctype="multipart/form-data">

                <div class = "form-group">
                    <label for="txtID">ID</label>
                    <input type="text" required readonly class="form-control" value="<?php echo $txtID; ?>" name="txtID" id="txtID" placeholder="ID">
                </div>

                <div class="form-group">
                    <label for="txtCategoria" class="form-label mt-4">Categoria: </label>
                    <select required class="form-select" value="<?php echo $txtCategoria; ?>" name="txtCategoria" id="txtCategoria">
                        <option>Instrumentos de Cuerdas</option>
                        <option>Percusión</option>
                        <option>Amplificadores</option>
                        <option>Accesorios</option>
                    </select>
                </div>
                <div class = "form-group">
                    <label for="txtSubCategoria">SubCategoria: </label>
                    <input type="text" required class="form-control" value="<?php echo $txtSubCategoria; ?>" name="txtSubCategoria" id="txtSubCategoria" placeholder="SubCategoria">
                </div>
                <div class = "form-group">
                    <label for="txtTipo">Tipo: </label>
                    <input type="text" required class="form-control" value="<?php echo $txtTipo; ?>" name="txtTipo" id="txtTipo" placeholder="Tipo">
                </div>
                <div class = "form-group">
                    <label for="txtNombre">Nombre: </label>
                    <input type="text" required class="form-control" value="<?php echo $txtNombre; ?>" name="txtNombre" id="txtNombre" placeholder="Nombre">
                </div>
                <div class = "form-group">
                    <label for="txtDescripcion">Descripcion: </label>
                    <input type="text" required class="form-control" value="<?php echo $txtDescripcion; ?>" name="txtDescripcion" id="txtDescripcion" placeholder="Descripcion">
                </div>
                <div class = "form-group">
                    <label for="txtMarca">Marca: </label>
                    <input type="text" required class="form-control" value="<?php echo $txtMarca; ?>" name="txtMarca" id="txtMarca" placeholder="Marca">
                </div>
                <div class = "form-group">
                    <label for="txtPrecio">Precio: </label>
                    <input type="text" required class="form-control" value="<?php echo $txtPrecio; ?>" name="txtPrecio" id="txtPrecio" placeholder="Precio">
                </div>
                <div class = "form-group">
                    <label for="txtFecha">Fecha: <?php echo $actual; ?></label>

                </div>
                <div class = "form-group">
                    <label for="txtimagen">Imagen: </label>
                    <input type="file" class="form-control" name="txtimagen" id="txtimagen" placeholder="Imagen">
                </div>

                <div class="btn-group" role="group" aria-label="">
                    <button type="submit" name="accion" <?php echo($accion=="Seleccionar")?"disabled":""; ?> value="Agregar" class="btn btn-success">Agregar</button>
                    <button type="submit" name="accion" <?php echo($accion!="Seleccionar")?"disabled":""; ?> value="Modificar" class="btn btn-warning">Modificar</button>
                    <button type="submit" name="accion" <?php echo($accion!="Seleccionar")?"disabled":""; ?> value="Cancelar" class="btn btn-info">Cancelar</button>
                </div>

            </form>


            </div>

        </div>

        
    </div>
  
<div class="col-md-8">
    
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>CATEGORIA</th>
                <th>SUBCATEGORIA</th>
                <th>TIPO</th>
                <th>NOMBRE</th>
                <th>DESCRIPCION</th>
                <th>MARCA</th>
                <th>PRECIO</th>
                <th>FECHA</th>
                <th>IMAGEN</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach($listaproducto as $producto){ ?>
            <tr>
                <td > <?php echo $producto['id_producto']; ?>  </td>
                <td > <?php echo $producto['categoria']; ?>  </td>
                <td > <?php echo $producto['sub_categoria']; ?>  </td>
                <td > <?php echo $producto['tipo']; ?>  </td>
                <td > <?php echo $producto['nombre_prod']; ?>  </td>
                <td > <?php echo $producto['descripcion']; ?>  </td>
                <td > <?php echo $producto['marca']; ?>  </td>
                <td > <?php echo $producto['precio']; ?>  </td>
                <td > <?php echo $producto['fecha_ingreso']; ?>  </td>
                <td > 
                <img src="../../img/<?php echo $producto['imagen']; ?>" width="80" alt="">
                 

                </td>
                
                <td>

                <form method="POST">

                    <input type="hidden" name="txtID" id="txtID" value="<?php echo $producto['id_producto']; ?>" />
                    <input type="submit" name="accion" value="Seleccionar" class="btn btn-primary" />
                    <input type="submit" name="accion" value="Borrar" class="btn btn-danger" />
                </form>

                </td>
            </tr>

        <?php } ?>    
        </tbody>
    </table>

</div>

<?php include("../template/foot.php"); ?>