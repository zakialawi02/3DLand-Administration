<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parcel extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'parcel_table';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'parcel_id',
        'parcel_name',
        'parcel_occupant',
    ];

    public function getParcel()
    {
        $parcel_table = Parcel::select('parcel_table.*', 'residents_table.*')
            ->selectRaw('JSON_ARRAYAGG(
                    JSON_OBJECT(
                        "id_keyword", uri_table.id_keyword,
                        "word_name", uri_table.word_name,
                        "slug", uri_table.slug,
                        "isUrl", uri_table.isUrl
                    )
                ) AS tag')
            ->leftJoin('linked_uri', 'parcel_table.parcel_id', '=', 'linked_uri.parcel_id')
            ->leftJoin('residents_table', 'parcel_table.parcel_occupant', '=', 'residents_table.id_resident')
            ->leftJoin('uri_table', 'linked_uri.id_keyword', '=', 'uri_table.id_keyword')
            ->groupBy('parcel_table.id', 'parcel_table.parcel_id', 'parcel_table.parcel_name', 'parcel_table.parcel_occupant')
            ->get();
        return $parcel_table;
    }
}
