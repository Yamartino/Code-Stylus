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

  public function isPrivate($slug){
    return $this->whereSlug($slug)->first()->private;
  }

  public function userHasPermission($user, $slug){
    return $this->leftJoin('shares', 'guides.id', '=', 'shares.guide_id')
                ->where('shares.username', $user->username)
                ->where('guides.slug', $slug)
                ->first()
                ||
                $this->whereSlug($slug)->first()->user_id == $user->id;
  }

  public function isOwner($slug, $user){
    return $this->whereSlug($slug)->whereUserId($user->id);
  }

}
