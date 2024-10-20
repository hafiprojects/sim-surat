<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DocumentType extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $table = "document_types";
    protected $guarded = ["id"];

    public function documentIn()
    {
        return $this->hasMany(DocumentIn::class);
    }

    public function documentOut()
    {
        return $this->hasMany(DocumentOut::class);
    }
}
