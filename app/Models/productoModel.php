<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Exception;

class productoModel extends Model
{
    public function get(){
        $sql= "SELECT * FROM productos where producto_active = 1";
        return DB::select($sql);
        
    }

    public function getById($productoId){
        $sql= "SELECT * FROM productos where producto_id=? and producto_active=1";
        return DB::select($sql,array($productoId));
        
    }

    public function actualizar($data,$productoId){
        
        $sql = "UPDATE productos SET";
        $sqlSets = [];
        $sqlValues = [];
        foreach ($data as $key => $value){
            $sqlSets[] = " $key = ? ";
            $sqlValues[] = $value;
        }
        $sqlSets = implode(',',$sqlSets);
        $sql .= $sqlSets . "where producto_id = ?";
        $sqlValues[]= $productoId;
        return DB::update($sql, $sqlValues);
        
    }

    public function create($data){
        try {
            $sql = "insert into productos(producto_stock,producto_name,producto_description,precio,producto_active) values(?,?,?,?,?)";
            DB::insert($sql, [$data->producto_stock,$data->producto_name, $data->producto_description,$data->precio, $data->producto_active]);
            return true;
        } catch (Exception $e) {
            // Importante este getMessage te envia informacion de lo que ocurre
            echo $e->getMessage();
            return false;
        }
        
    }

    public function eliminar($id){
        $sql = "DELETE FROM productos WHERE producto_id=?";
        return DB::select($sql,[$id]);
    }

}
