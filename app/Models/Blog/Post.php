<?php


namespace App\Models\Blog;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Spatie\Tags\HasTags;


class Post extends Model
{
   
    // use HasTags;
    use HasFactory;
  protected $table = 'posts';
  protected $guarded = [];
  public function author()
  {
      return $this->belongsTo(Author::class, 'author_id');
  }


  public function category()
  {
      return $this->belongsTo(Category::class, 'category_id');
  }
}


