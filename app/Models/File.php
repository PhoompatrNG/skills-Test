<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;

    protected $fillable = [
        'folder_id',
        'file_name',
        // เพิ่มฟิลด์อื่น ๆ ตามต้องการ
    ];

    public function folder()
    {
        return $this->belongsTo(Folder::class);
    }
}
