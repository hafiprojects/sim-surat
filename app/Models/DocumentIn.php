<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use function App\Helpers\hashidEncode;

class DocumentIn extends Model
{
    use HasFactory;

    protected $table = 'document_ins';
    protected $guarded = ['id'];

    public function getHashidAttribute()
    {
        return hashidEncode($this->id);
    }

    public function documentType()
    {
        return $this->belongsTo(DocumentType::class);
    }

    public function createdByUser()
    {
        return $this->belongsTo(User::class, 'created_by_user_id');
    }

    protected $casts = [
        'received_at' => 'date',
        'finished_at' => 'date',
    ];
}
