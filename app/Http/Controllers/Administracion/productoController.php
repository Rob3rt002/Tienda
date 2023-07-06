<?php

namespace App\Http\Controllers\Administracion;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\productoModel;
use Exception;

class productoController extends Controller
{
    public function returnData($data,$msg){
        if (sizeof($data) > 0) {
            $response =[
                "status" => "true",
                "data" => $data
            ];
            
        } else {
            $response =[
                "status" => "true",
                "message" => $msg
            ];
            
        }
        return json_encode($response);
    }

    public function index(){
        $model = new productoModel();
        $result = $model->get();
        return $this->returnData($result,"No se encontraron empresas");
        echo "<pre>";
        // print_r($result);
    }

   
    

   
    public function store(Request $request){
        try{
            $objData = json_decode($request->getContent());
            $model = new productoModel();
            $result = $model->create($objData);
            
            if ($result) {
                echo "registro exitoso";
            }else {
                echo "Se produjo un error, intentando registrar";
            }
        }catch(Exception $e){
            echo "Se produjo un error, No se que paso";
        }
    }

    
    public function show(string $id){
        $model = new productoModel();
        $result = $model->getById($id);
        //var_dump($result, $id);
        return $this->returnData($result,"No se encontraron empresas");
    }

    
    

    
    public function update(Request $request, $id){
        $objData = json_decode($request->getContent(), true);
        $model = new productoModel();
        $result = $model->actualizar($objData,$id);
        
        if ($result) {
            return $this->returnData([], "Actualizacion Exitosa");
        }else {
            return $this->returnData([], "Actualizacion Errada");
        }
    }

    
    public function destroy(string $id){
        $model = new productoModel();
        $result = $model->eliminar($id); 
        // var_dump($result);
        if ($result) {
            return $this->returnData([], "Eliminacion Exitosa");
        }else {
            return $this->returnData([], "Eliminacion Errada");
        }
    }
}
