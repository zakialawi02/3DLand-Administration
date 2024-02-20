<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resident extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'residents_table';
    protected $primaryKey = 'id_resident';

    protected $guarded = [
        'id_resident',
    ];

    public function getResident()
    {
        return "tes";
    }
}
