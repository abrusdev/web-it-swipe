<?php

namespace App\Models;

use Arr;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Posts
 *
 * @property int $id
 * @property string $title
 * @property string $description
 * @property int $category_id
 * @property string $image
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Posts newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Posts newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Posts query()
 * @method static \Illuminate\Database\Eloquent\Builder|Posts whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Posts whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Posts whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Posts whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Posts whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Posts whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Posts whereUpdatedAt($value)
 * @mixin \Eloquent
 */
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
        return '/storage/posts/' . $fileNameToStore;
    }


    public static function createPost($request)
    {
        $image = Posts::storeImage($request->file('image'));
        $category_id = $request->get('slug');

        $data = $request->only(['title', 'description']);

        $data['image'] =  $image;
        $category = Category::find($category_id);

        $category->posts()->create($data);
    }
}
