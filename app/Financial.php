<?php

namespace Laravel;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Financial extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'wat', 'hoeveel',
    ];

    protected $table = 'financials';

    public static function getFromMonth($date) {
        $firstDay = date('Y-m-01', $date);
        $lastDay = date('Y-m-t', $date);

        $return = self::where('created_at', '>',$firstDay)->where('created_at', '<',$lastDay)->get();
        return $return;
    }
}
