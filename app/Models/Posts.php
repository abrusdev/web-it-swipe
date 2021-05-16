<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'category_id',
        'image'
    ];

    public static function storeImage($image): string
    {
        $filenameWithExt = \Str::snake($image->getClientOriginalName());
        // Get Filename
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        // Get just Extension
        $extension = $image->getClientOriginalExtension();
        // Filename To store
        $fileNameToStore = $filename . '_' . time() . '.' . $extension;

        $image->move(public_path('storage/posts'), $fileNameToStore);
        return $fileNameToStore;
    }
}
