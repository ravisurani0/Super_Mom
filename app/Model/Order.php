<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Model\User;
use App\Model\OrderItems;

class Order extends Model
{
    //
    use SoftDeletes;

    protected $fillable = [
        'created_by',
        'order_pdf',
        'order_subtotal',
        'discount',
        'tax_amount',
        'order_total',
        'transporter',
        'status',
    ];

    protected $hidden = [
        'updated_at',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

    public function getCreatedAtAttribute($value)
    {
        return $timestamp=date('d-m-Y',strtotime($value));
    }


    public function orderItems()
    {
        return $this->hasMany(OrderItems::class, 'order_id', 'id');
    }

    public function scopeWithOrderItemsCount($query)
    {
        return $query->withCount([
            'orderItems as pending_items' => function ($query) {
                $query->where('status', false);
            },
            'orderItems as delivered_items' => function ($query) {
                $query->where('status', true);
            },
            'orderItems as total_items' => function ($query) {

            }
        ]);
    }

    public function orderProducts()
    {
        return $this->belongsToMany(OrderItems::class)->withPivot('products_id', 'id');
    }


    public function getOrderPdfAttribute($value)
    {
        return env('APP_URL') . 'storage/orders/' . $value;
    }

    public function getOrderTotal($value)
    {
        $decimal = round($value - ($no = floor($value)), 2) * 100;
        $hundred = null;
        $digits_length = strlen($no);
        $i = 0;
        $str = array();
        $words = array(
            0 => '', 1 => 'One', 2 => 'Two',
            3 => 'Three', 4 => 'Four', 5 => 'Five', 6 => 'Six',
            7 => 'Seven', 8 => 'Eight', 9 => 'Nine',
            10 => 'Ten', 11 => 'Eleven', 12 => 'Twelve',
            13 => 'Thirteen', 14 => 'Fourteen', 15 => 'Fifteen',
            16 => 'Sixteen', 17 => 'Seventeen', 18 => 'Eighteen',
            19 => 'Nineteen', 20 => 'Twenty', 30 => 'Thirty',
            40 => 'Forty', 50 => 'Fifty', 60 => 'Sixty',
            70 => 'Seventy', 80 => 'Eighty', 90 => 'Ninety'
        );
        $digits = array('', 'Hundred', 'Thousand', 'Lakh', 'Crore');
        while ($i < $digits_length) {
            $divider = ($i == 2) ? 10 : 100;
            $number = floor($no % $divider);
            $no = floor($no / $divider);
            $i += $divider == 10 ? 1 : 2;
            if ($number) {
                $plural = (($counter = count($str)) && $number > 9) ? 's' : null;
                $hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
                $str[] = ($number < 21) ? $words[$number] . ' ' . $digits[$counter] . $plural . ' ' . $hundred : $words[floor($number / 10) * 10] . ' ' . $words[$number % 10] . ' ' . $digits[$counter] . $plural . ' ' . $hundred;
            } else
                $str[] = null;
        }
        $Rupees = implode('', array_reverse($str));
        $paise = ($decimal) ? "." . ($words[$decimal / 10] . " " . $words[$decimal % 10]) . ' Paise' : '';
        return ($Rupees ? $Rupees . 'Only.' : '') . $paise;
    }
}
