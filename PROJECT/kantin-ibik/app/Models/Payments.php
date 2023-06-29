<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Payments extends Model
{
    use HasFactory;
    protected $table = 'payments';

    protected $fillable = [
        'name', 'is_active', 'icon'
    ];

    public function storedData($data){
        $results = Payments::create($data);
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
        $results = Payments::where($condition)->delete();
        return $results;
    }


}
