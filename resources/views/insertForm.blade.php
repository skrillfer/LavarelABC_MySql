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
        <h1>Crear Categorias</h1>
        <form action="/insertar" method="post">
          <table >
            <tr>
              {{ csrf_field() }}
              <td>Descripcion:</td>
              <td><input type="text" name="AYD2_CATEGORIA_descripcion"></td>
            </tr>
            <tr style="text-align:center">
              <td><input type="submit" name="submit" value="Agregar"></td>
            </tr>
          </table>
        </form>
      </center>
      <hr>
      <center>
        <h1>Lista de Categorias</h1>
        <table>
          <tr>
            <td>ID</td>
            <td>Descripcion</td>
            <td>Action</td>
          </tr>
          @foreach($data as $value)
            <tr>
              <td>{{$value->AYD2_CATEGORIA_ID}}</td>
              <td>{{$value->AYD2_CATEGORIA_descripcion}}</td>
              <td><a href="/editar/{{$value->AYD2_CATEGORIA_ID}}"><button>Edit</button> &nbsp; <a href="/eliminar/{{$value->AYD2_CATEGORIA_ID}}"><button>Delete</button></td>
            </tr>
          @endforeach
        </table>
      </center>
    </body>
</html>
