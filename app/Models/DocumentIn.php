<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentIn extends Model
{
    use HasFactory;

    protected $table = 'document_ins';
    protected $guarded = ['id'];
}
