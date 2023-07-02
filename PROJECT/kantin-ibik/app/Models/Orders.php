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

    public function fetchInvoice($code){
        $results = DB::table('order_rel_product AS a')
                    ->select(array('b.code', 'a.product_id', 'c.name', 'a.quantity', 'a.price','b.created_by','b.created_at', 'b.total', 'd.name AS payment_name'))
                    ->join('orders  AS b','b.id','=','a.order_id')
                    ->join('products  AS c','c.id','=','a.product_id')
                    ->join('payments  AS d','d.id','=','b.payment_id')
                    ->where('b.code', '=',$code)
                    ->get();
                    //->toSql();
        return $results;
    }

    public function fetchOrderHist(){
        $results = DB::table($this->table.' AS a')
                    ->select(array('a.*','b.name as payment_name',DB::raw('(select COUNT(order_id) from order_rel_product  where order_id = a.id) as TotalItem')))
                    ->join('payments AS b','b.id','=','a.payment_id')
                    ->orderBy('a.created_at','desc')
                    ->get();
        return $results;
    }

}
