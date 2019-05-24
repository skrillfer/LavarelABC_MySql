<?php

use App\Http\Controllers\Controller;
namespace App\Http\Controllers;
use DB;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    function editar($id){
      $value['value'] = DB::table('AYD2_CATEGORIA_201213562')->where('AYD2_CATEGORIA_ID',$id)->first();
      return view('actualizar_Form',$value);
    }

    function hacerEditar(Request $req,$id){
      $AYD2_CATEGORIA_descripcion=$req->input('AYD2_CATEGORIA_descripcion');
      DB::table('AYD2_CATEGORIA_201213562')->where('AYD2_CATEGORIA_ID',$id)->update(['AYD2_CATEGORIA_descripcion' => $AYD2_CATEGORIA_descripcion]);
      return Redirect::action('Controller@getData');
    }

    //funcion para eliminar un registro de la tabla
    function eliminar($id){
      $i = DB::table('AYD2_CATEGORIA_201213562')->where('AYD2_CATEGORIA_ID',$id)->delete();
      DB::commit();
      return Redirect::action('Controller@getData');
    }
    //funcion para insertar datos en la base de datos
    function insertar(Request $req){
      $AYD2_CATEGORIA_descripcion = $req->input('AYD2_CATEGORIA_descripcion');
      $AYD2_CATEGORIA_ID = 0;
      $data = array("AYD2_CATEGORIA_ID"=>$AYD2_CATEGORIA_ID,"AYD2_CATEGORIA_descripcion"=>$AYD2_CATEGORIA_descripcion);
      DB::table('AYD2_CATEGORIA_201213562')->insert($data);
      DB::commit();
      echo "success";
      $this->getData();
      return Redirect::action('Controller@getData');

    }


    //obteniendo la data de la base de datos
    function getData()
    {
      $data['data'] = DB::table('AYD2_CATEGORIA_201213562')->get();
      if(count($data > 0)){
        return view('insertForm',$data);
      }else{
        return view('insertForm');
      }
    }

    //obteniendo la data de la base de datos
    function getDetalles()
    {
      $data['data'] = DB::table('AYD2_DETALLE_201213562')->get();

      $data2['data2'] = DB::table('AYD2_CATEGORIA_201213562')->get();

      if(count($data > 0)){
        return view('detalles_Form',$data,$data2);
      }else{
        return view('detalles_Form');
      }
    }

    //funcion para insertar datos en la base de datos
    function insertarDetalle(Request $req){
      $id =0;
      $cat=Input::get('categorias');
      $dec=$req->input('AYD2_DETALLE_Decimal');
      $desc=$req->input('AYD2_DETALLE_Descripcion');
      $fecha=$req->input('AYD2_DETALLE_Date');
      $fecha1=$req->input('AYD2_DETALLE_Fecha1').' '.$req->input('AYD2_DETALLE_Tiempo1');
      $fecha2=$req->input('AYD2_DETALLE_Fecha2').' '.$req->input('AYD2_DETALLE_Tiempo2');
      $Boolean=$req->input('AYD2_DETALLE_Boolean');

      $data = array("AYD2_DETALLE_ID"=>$id,"AYD2_CATEGORIA_ID"=>$cat,"AYD2_DETALLE_Decimal"=>$dec,"AYD2_DETALLE_Descripcion"=>$desc
                    ,"AYD2_DETALLE_Date"=>$fecha,"AYD2_DETALLE_DateTime"=>$fecha1,"AYD2_DETALLE_TimeStamp"=>$fecha2,"AYD2_DETALLE_Boolean"=>$Boolean);
      DB::table('AYD2_DETALLE_201213562')->insert($data);
      return Redirect::action('Controller@getDetalles');
    }

    //funcion para eliminar un registro de la tabla
    function eliminarDetalle($id){
      $i = DB::table('AYD2_DETALLE_201213562')->where('AYD2_DETALLE_ID',$id)->delete();
      DB::commit();
      return Redirect::action('Controller@getDetalles');
    }

    function editarDetalle($id){
      $value['value'] =DB::table('AYD2_DETALLE_201213562')->select('AYD2_DETALLE_ID','AYD2_CATEGORIA_ID','AYD2_DETALLE_Decimal','AYD2_DETALLE_Descripcion','AYD2_DETALLE_Date',DB::raw('DATE_FORMAT(AYD2_DETALLE_DateTime,\'%Y-%m-%d\') as Fecha1'),DB::raw('TIME(AYD2_DETALLE_DateTime) as Tiempo1'),DB::raw('DATE(AYD2_DETALLE_TimeStamp) as Fecha2'),DB::raw('TIME(AYD2_DETALLE_TimeStamp) as Tiempo2'),'AYD2_DETALLE_Boolean')
        ->where('AYD2_DETALLE_ID',$id)->first();
      $data2['data2'] = DB::table('AYD2_CATEGORIA_201213562')->get();
      return view('actualizarDetalle_Form',$value,$data2);
    }

    function hacerEditarDetalle(Request $req,$id){

      $cat=Input::get('categorias');
      $dec=$req->input('AYD2_DETALLE_Decimal');
      $desc=$req->input('AYD2_DETALLE_Descripcion');
      $fecha=$req->input('AYD2_DETALLE_Date');
      $fecha1=$req->input('AYD2_DETALLE_Fecha1').' '.$req->input('AYD2_DETALLE_Tiempo1');
      $fecha2=$req->input('AYD2_DETALLE_Fecha2').' '.$req->input('AYD2_DETALLE_Tiempo2');
      $Boolean=$req->input('AYD2_DETALLE_Boolean');

      //$AYD2_CATEGORIA_descripcion=$req->input('AYD2_CATEGORIA_descripcion');
      DB::table('AYD2_DETALLE_201213562')->where('AYD2_DETALLE_ID',$id)->update(
        ['AYD2_CATEGORIA_ID' => $cat,'AYD2_DETALLE_Decimal' => $dec,'AYD2_DETALLE_Descripcion' => $desc,'AYD2_DETALLE_Date' => $fecha,'AYD2_DETALLE_DateTime' => $fecha1,'AYD2_DETALLE_TimeStamp' => $fecha2,'AYD2_DETALLE_Boolean' => $Boolean]
      );
      return Redirect::action('Controller@getDetalles');

    }
}
