<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LinkedUri extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'linked_uri';
    public $timestamps = false;

    protected $fillable = [
        'parcel_id',
        'id_keyword',
    ];


    public function get()
    {
    }
    public function DELlinked_uri($parcel_id)
    {
        return LinkedUri::where('parcel_id', $parcel_id)->delete();
    }
}
