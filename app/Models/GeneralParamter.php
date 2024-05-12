<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $seo_keyword
 * @property string $seo_description
 * @property integer $transaction_tax
 */
class GeneralParamter extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'general_parameter';

    /**
     * @var array
     */
    protected $fillable = ['seo_keyword', 'seo_description', 'transaction_tax'];

    public static $rules = [
        'seo_keyword' => 'required',
        'seo_description' => 'required',
        'transaction_tax' => 'required',
    ];
}
