<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    const STATE_CURRENT = 1;
    const STATE_PROCESSED = 2;

    protected $fillable = ['user_id', 'state'];

    public function goods()
    {
        return $this->belongsToMany(
            Good::class,
            'order_goods',
            'order_id',
            'good_id'
        );
    }

    public function getSum() : int
    {
        $sum = 0;
        foreach ($this->goods as $good) {
            $sum += $good->price;
        }

        return (int) $sum;
    }

    public static function getCurrentOrder(int $id )
    {
        return self::where('user_id', '=', $id)
        ->where('state', '=', Order::STATE_CURRENT)
        ->first();
    }

    public function saveAsProcessed()
    {
        $this->state = self::STATE_PROCESSED;
        return $this->save();
    }

    public function getRandomId()
    {
        return mt_rand(1, 9);   
    }
}
