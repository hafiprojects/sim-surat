<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use function App\Helpers\hashidEncode;

class DocumentOut extends Model
{
    use HasFactory;

    protected $table = 'document_outs';
    protected $guarded = ['id'];

    public function getHashIdAttribute()
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
        'sent_at' => 'datetime:Y-m-d H:i:s',
    ];
}
