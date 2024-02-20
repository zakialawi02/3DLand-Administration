<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Uri extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'uri_table';
    protected $primaryKey = 'id_keyword';

    protected $guarded = [
        'id_keyword',
    ];

    public function getURI()
    {
    }
}
