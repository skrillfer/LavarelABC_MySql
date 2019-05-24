<!DOCTYPE html>
<html>
    <head>
    <style>
table {     font-family: "Lucida Sans Unicode", "Lucida Grande", Sans-Serif;
font-size: 12px;    margin: 45px;     width: 480px; text-align: left;    border-collapse: collapse; }

th {     font-size: 13px;     font-weight: normal;     padding: 8px;     background: #b9c9fe;
border-top: 4px solid #aabcfe;    border-bottom: 1px solid #fff; color: #039; }

td {    padding: 8px;     background: #e8edff;     border-bottom: 1px solid #fff;
color: #669;    border-top: 1px solid transparent; }

tr:hover td { background: #d0dafd; color: #339; }

footer {
background-color: black;
position: absolute;
bottom: 0;
width: 100%;
height: 40px;
color: white;
}
.define {
    width:960px;
    margin:0 auto;
    text-align: center;
}
.links > a {
    color: #636b6f;
    padding: 0 25px;
    font-size: 22px;
    font-weight: 300;
    letter-spacing: .1rem;
    text-decoration: none;
    text-transform: uppercase;
}
</style>
    </head>
    <body style="background-color:#91e842">
      <div class="links">
          <a href="/Categorias">Listar Categorias</a>
          <a href="/Detalles">Listar Detalles</a>

      </div>
      <hr>

      <center>
        <h1>Crear Detalles</h1>
        <form action="/insertarDetalle" method="post">
          <table >
            <tr>
              <?php echo e(csrf_field()); ?>


              <td>Categoria:</td>
              <td><select  id="categorias" class="drop" name="categorias" required>
                <?php $__currentLoopData = $data2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option   value="<?php echo e($value->AYD2_CATEGORIA_ID); ?>"><?php echo e($value->AYD2_CATEGORIA_descripcion); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select></td>
            </tr>
            <tr>
              <td>Decimal:</td>
              <td><input  type="number" step="0.01" name="AYD2_DETALLE_Decimal" required></td>
            </tr>
            <tr>
            <td>Descripcion:</td>
              <td><input  type="text"  name="AYD2_DETALLE_Descripcion" required></td>
            </tr>
            <td>Fecha:</td>
              <td><input  type="date"  name="AYD2_DETALLE_Date" required></td>
            </tr>
            <td>Fecha Tiempo:</td>
              <td><input  type="date"  name="AYD2_DETALLE_Fecha1" required></td>
              <td><input  type="time"  name="AYD2_DETALLE_Tiempo1" required></td>
            </tr>
            <td>TimeStamp:</td>
              <td><input  type="date"  name="AYD2_DETALLE_Fecha2" required></td>
              <td><input  type="time"  name="AYD2_DETALLE_Tiempo2" required></td>
            </tr>
            <td>Boolean:</td>
              <td><input  type="number" min="0" max="1" name="AYD2_DETALLE_Boolean" required></td>
            </tr>
            <tr style="text-align:center">
              <td><input type="submit" name="submit" value="Agregar"></td>
            </tr>
          </table>
        </form>
      </center>
      <hr>
      <center>
        <h1>Lista de Detalles</h1>
        <table style="width:100%">
          <tr>
            <td>ID</td>
            <td>Categoria</td>
            <td>Decimal</td>
            <td>Descripcion</td>
            <td>Fecha</td>
            <td>Fecha Tiempo</td>
            <td>Time Stamp</td>
            <td>Boolean</td>
            <td>Action</td>
          </tr>
          <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
              <td><?php echo e($value->AYD2_DETALLE_ID); ?></td>
              <td><?php echo e($value->AYD2_CATEGORIA_ID); ?></td>
              <td><?php echo e($value->AYD2_DETALLE_Decimal); ?></td>
              <td><?php echo e($value->AYD2_DETALLE_Descripcion); ?></td>
              <td><?php echo e($value->AYD2_DETALLE_Date); ?></td>
              <td><?php echo e($value->AYD2_DETALLE_DateTime); ?></td>
              <td><?php echo e($value->AYD2_DETALLE_TimeStamp); ?></td>
              <td><?php echo e($value->AYD2_DETALLE_Boolean); ?></td>
              <td><a href="/editarDetalle/<?php echo e($value->AYD2_DETALLE_ID); ?>"><button>Edit</button> &nbsp; <a href="/eliminarDetalle/<?php echo e($value->AYD2_DETALLE_ID); ?>"><button>Delete</button></td>
            </tr>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </table>
      </center>
    </body>
</html>
