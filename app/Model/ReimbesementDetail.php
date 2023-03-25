<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Reimbesement;

class ReimbesementDetail extends Model
{
    protected $table = 'reimbesement_details';
    protected $guarded = ['id'];

    public function reimbesement()
    {
        return $this->belongsTo(Reimbesement::class, 'reimbesement_id', 'id');
    }
}
