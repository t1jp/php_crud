<!doctype html>
<html lang="en">

<head>
  <title>CRUD PHP</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.0-beta1 -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css"
    integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
      <!-- Bootstrap JavaScript Libraries -->
  <script src="https://code.jquery.com/jquery-3.6.1.slim.js" integrity="sha256-tXm+sa1uzsbFnbXt8GJqsgi2Tw+m4BLGDof6eUPjbtk=" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js"
    integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js"
    integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous">
  </script>
  <link rel="stylesheet" href="main.css" type="text/css">


</head>

<body>
    <header>
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="javascript:void(0)">JP</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="mynavbar">
      <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a class="nav-link" href="http://localhost:8080/CRUD_PHP/">CRUD PHP</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="https://github.com/t1jp">GITHUB</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="https://dev-desacms.pantheonsite.io/">CMS</a>
        </li>
      </ul>
      <form class="d-flex">
        <input class="form-control me-2" type="text" placeholder="Search">
        <button class="btn btn-primary" type="button">Search</button>
      </form>
    </div>
  </div>
</nav>
    </header>
   
<!-- Button trigger modal -->
<button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="limpiarForms();">
  Agregar
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
      <div class="container">
    <form class="d-flex" action="crud_estudiantes.php" method="post">
        <div class="col">

        <div class="mb-3">
                <label for="txt_id" class="form-label">Id</label>
                <input type="text" name="txt_id" id="txt_id" class="form-control" placeholder="0" readonly>
            </div>

            <div class="mb-3">
                <label for="txt_carne" class="form-label">Codigo</label>
                <input type="text" name="txt_carne" id="txt_carne" class="form-control" placeholder="E001" onchange="carnetValidacion(this);" require>
            </div>

            <div class="mb-3">
                <label for="txt_nombres" class="form-label">Nombres</label>
                <input type="text" name="txt_nombres" id="txt_nombres" class="form-control" placeholder="Luis Jose" require>
            </div>

            <div class="mb-3">
                <label for="txt_apellidos" class="form-label">Apellidos</label>
                <input type="text" name="txt_apellidos" id="txt_apellidos" class="form-control" placeholder="Mendez Orduz" require>
            </div>

            <div class="mb-3">
                <label for="txt_direccion" class="form-label">Direccion</label>
                <input type="text" name="txt_direccion" id="txt_direccion" class="form-control" placeholder="5ta calle oriente" require>
            </div>
            
            <div class="mb-3">
                <label for="txt_telefono" class="form-label">Telefono</label>
                <input type="number" name="txt_telefono" id="txt_telefono" class="form-control" placeholder="00000000" require>
            </div>


            <div class="mb-3">
                <label for="txt_correo" class="form-label">correo</label>
                <input type="text" name="txt_correo" id="txt_correo" class="form-control" placeholder="x@mail.com" require>
            </div>


            <div class="mb-3">
              <label for="lbl_sangre" class="form-label">Tipo Sangre</label>
              <select class="form-control" name="drop_sangre" id="drop_sangre">
                <option value=0>-----sangre-----</option>

                <?php 
                
                include("datos_conexion.php");
                $db_conexion = mysqli_connect($db_host, $db_usr, $db_pass, $db_nombre);
                $db_conexion ->real_query("select id_tipo_sangre as id,sangre from tipos_sangre;");
                $resultado = $db_conexion->use_result();
                while ($fila = $resultado->fetch_assoc()) {

            
                    echo"<option value=".$fila['id'].">". $fila['sangre']. "</option>";


                }
                $db_conexion ->close();
                ?>
                
              </select>
            </div>
            
            <div class="mb-3">
                <label for="txt_fn" class="form-label">fecha de nacimiento</label>
                <input type="date" name="txt_fn" id="txt_fn" class="form-control" require>
            </div>
            
            <div class="mb-3">
                
                <input type="submit" name="btn_agregar" id="btn_agregar" class="btn btn-outline-success" value="agregar" require>
                <input type="submit" name="btn_modificar" id="btn_modificar" class="btn btn-outline-warning" value="modificar" require>
                <input type="submit" class="btn btn-outline-danger" id="btn_eliminar"  name="btn_eliminar" 
                 onclick="javascript:if(!confirm('Desea Eliminar Este Estudiante?')) return false " value="eliminar" require>
            
            </div>

        </div>
    </form>
            </div> 



      </div>
      
    </div>
  </div>
</div>








    
<div class="container">
        <table class="table table-sm table-dark table-inverse table-responsive">
            <thead class="thead-inverse">
                <tr>
                    <th>carne</th>
                    <th>Nombres</th>
                    <th>Apellidos</th>
                    <th>Direccion</th>
                    <th>Telefono</th>
                    <th>Correo</th>
                    <th>Sangre</th>
                    <th>nacimiento</th>
                </tr>
                </thead>
                <tbody class="table-group-divider" id="tbl_estudiantes">

                <?php 
                
                include("datos_conexion.php");
                $db_conexion = mysqli_connect($db_host, $db_usr, $db_pass, $db_nombre);
                $db_conexion ->real_query("select e.id_estudiante as id, e.carne,e.nombres, e.apellidos, e.direccion, e.telefono, e.correo_electronico, s.sangre,e.fecha_nacimiento, s.id_tipo_sangre from estudiantes as e inner join tipos_sangre as s on e.id_tipo_sangre = s.id_tipo_sangre;");
                $resultado = $db_conexion->use_result();
                while ($fila = $resultado->fetch_assoc()) {
 
            
                    echo"<tr data-id=".$fila['id']." data-ids=".$fila['id_tipo_sangre'].">";

                    echo"<td>".$fila['carne']."</td>";
                    echo"<td>".$fila['nombres']."</td>";
                    echo"<td>".$fila['apellidos']."</td>";
                    echo"<td>".$fila['direccion']."</td>";
                    echo"<td>".$fila['telefono']."</td>";
                    echo"<td>".$fila['correo_electronico']."</td>";
                    echo"<td>".$fila['sangre']."</td>";
                    echo"<td>".$fila['fecha_nacimiento']."</td>";

                    echo"</tr>";



                }
                $db_conexion ->close();
                ?>

                
                    
                
                


                </tbody>
        </table>
 </div> 
    
 

 

  <script>
    $("#tbl_estudiantes").on('click','tr td',function (e) { 
        
        var target,id,ids,carne,nombres,apellidos,direccion,telefono,correo,nacimiento;
        target = $(event.target);
        id = target.parent().data('id');
        ids = target.parent().data('ids');
        carne = target.parent('tr').find("td").eq(0).html();
        nombres = target.parent('tr').find("td").eq(1).html();
        apellidos = target.parent('tr').find("td").eq(2).html();
        direccion = target.parent('tr').find("td").eq(3).html();
        telefono = target.parent('tr').find("td").eq(4).html();
        correo = target.parent('tr').find("td").eq(5).html();
        nacimiento = target.parent('tr').find("td").eq(7).html();

        $("#txt_id").val(id);
        $("#txt_carne").val(carne);
        $("#txt_nombres").val(nombres);
        $("#txt_apellidos").val(apellidos);
        $("#txt_direccion").val(direccion);
        $("#txt_telefono").val(telefono);
        $("#txt_correo").val(correo);
        $("#drop_sangre").val(ids);
        $("#txt_fn").val(nacimiento);
        $("#exampleModal").modal("show");
        
        
    });
  </script>
  <script type="text/javascript">
    function limpiarForms(){
      $('#txt_id').val(0);
      $("#drop_sangre").val(0);
      $("#txt_carne").val("");
      $("#txt_nombres").val("");
      $("#txt_apellidos").val("");
      $("#txt_direccion").val("");
      $("#txt_telefono").val("");
      $("#txt_correo").val("");
      $("#txt_fn").val("");
    }
    function carnetValidacion(text) {
      const pattern = /(^E{1})([0-9]{3})$/;
      if (!pattern.test(text.value)) {
        text.setCustomValidity
          ('Ingrese un carnet Valido: E001-E999');
      }else {
        text.setCustomValidity('');
    }
    return true;
    }
    </script>
</body>

</html>