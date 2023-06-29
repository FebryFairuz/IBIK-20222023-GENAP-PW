<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Orders extends Model
{
    use HasFactory;
    protected $table = 'orders';

    protected $fillable = [
        'code', 'total', 'payment_id', 'notes', 'created_by'
    ];

    public function storedData($data){
        $results = Orders::create($data);
        $results->id;
        return $results;
    }

    public function updatedData($data){
        $isExist = $this->getByCondition(array('id'=>$data['id']))->first();
        if(!empty($isExist)){
            unset($data['_token']);
            $results = DB::table($this->table)->where(array('id'=>$data['id']))->update($data);
            return $results;
        }else{
            return null;
        }
    }

    public function getByCondition($condition){
        $results = DB::table($this->table)->where($condition);
        return $results;
    }

    public function removeByCondition($condition){
        $results = Orders::where($condition)->delete();
        return $results;
    }

    public function insertOrderRel($data){
        $results = DB::table("order_rel_product")->where($condition);
        return $results;
    }

}
