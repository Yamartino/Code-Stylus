<?php namespace Style;

use Illuminate\Database\Eloquent\Model;

class Guide extends Model {

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = ['slug', 'title', 'content'];

}
