<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    protected $table = 'subject';
    protected $primaryKey = 'subject_id';
    public $timestamps = false;

    protected $fillable = [
        'code',
        'title',
        'unit',
    ];

    protected $casts = [
        'unit' => 'integer',
    ];

    public static function rules($id = null)
    {
        $rules = [
            'code' => 'required|string|max:20|unique:subject,code',
            'title' => 'required|string|max:100|unique:subject,title',
            'unit' => 'required|integer|min:1',
        ];

        if ($id) {
            $rules['code'] .= ',' . $id . ',subject_id';
            $rules['title'] .= ',' . $id . ',subject_id';
        }

        return $rules;
    }
}
