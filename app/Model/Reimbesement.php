<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\ReimbesementDetail;
use DB;

class Reimbesement extends Model
{
    protected $table = 'reimbesements';
    protected $casts = [ 'reimbesement_date'=>'datetime'];

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['from'] ?? false, function ($query, $from) {
            return $query->where('reimbesement_date', '>=', $from);
        });

        $query->when($filters['to'] ?? false, function ($query, $to) {
            return $query->where('reimbesement_date', '<=', $to);
        });
    }

    public function details(){
        return $this->hasMany(ReimbesementDetail::class,'reimbesement_id', 'id');
    }

    public function get_total(){
        return $this->details()->where('deleted_at', NULL);
    }
}
