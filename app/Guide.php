<?php namespace Style;

use Illuminate\Database\Eloquent\Model;

class Guide extends Model {

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = ['slug', 'title', 'content', 'user_id', 'private'];

  /**
   * The attributes that should be casted to native types.
   *
   * @var array
   */
  protected $casts = [
    'private' => 'boolean',
  ];

}
