<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Informe
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
class Informe extends Model
{
    
    static $rules = [
		'titulo' => 'required',
		'descripcion' => 'required',
		'imagen' => 'required',
		'pdf' => 'required',
    'private' => 'required',
    'user_id' => 'required',

    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['titulo','descripcion','imagen','pdf','private','user_id'];

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }


}
