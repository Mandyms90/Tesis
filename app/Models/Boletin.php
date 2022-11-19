<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Boletin
 *
 * @property $id
 * @property $titulo
 * @property $descripcion
 * @property $imagen
 * @property $pdf
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Boletin extends Model
{
    
    static $rules = [
		'titulo' => 'required',
		'descripcion' => 'required',
		'imagen' => 'required',
		'pdf' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['titulo','descripcion','imagen','pdf'];



}
