<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class OrderRel extends Model
{
    use HasFactory;
    protected $table = 'order_rel_product';

    protected $fillable = [
        'order_id', 'product_id', 'price', 'quantity'
    ];

    public function storedData($data){
        $results = OrderRel::create($data);
        return $results;
    }

    public function updatedData($data){
        $isExist = $this->getByCondition(array('order_id'=>$data['order_id']))->first();
        if(!empty($isExist)){
            unset($data['_token']);
            $results = DB::table($this->table)->where(array('order_id'=>$data['order_id']))->update($data);
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
        $results = OrderRel::where($condition)->delete();
        return $results;
    }
}
