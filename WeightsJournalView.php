<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class SupplierDetail
 */
class WeightsJournalView extends Model
{
    protected $table = 'weightsjournal_index';

    public $timestamps = true;

    protected $fillable = [
        'barn_name',
        'batch_name',
        'farm_name',
        'currentAvgWeightMale',
        'currentAvgWeightFemale',
        'pastAvgWeightMale',
        'pastAvgWeightFemale',
        'deltaAvgWeightMale',
        'deltaAvgWeightFemale'
    ];

    protected $guarded = [];


}
