<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Products extends Model
{
    use HasFactory;
    protected $table = 'products';

    protected $fillable = [
        'name', 'description','price','is_active','images'
    ];

    public function storedData($data){
        $results = Products::create($data);
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
        $results = Products::where($condition)->delete();
        return $results;
    }

}
