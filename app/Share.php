<?php namespace Style;

use Illuminate\Database\Eloquent\Model;

class Shares extends Model {

	public function getShareUsersBySlug($slug){
    return $this->leftJoin('guides', 'guides.id', '=', 'shares.guide_id')->where('guides.slug', $slug)->get();
  }

}
