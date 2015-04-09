<?php namespace Style\Http\Controllers;

use Style\Guide;
use Style\Share;
use Style\Http\Requests;
use Style\Http\Requests\AddPrivacyUser;
use Style\Http\Controllers\Controller;

use Illuminate\Http\Request;

class PrivacyController extends Controller {

  /**
   * Show the privacy view for adding users to private guides
   *
   * @param  string  $slug
   * @param  \Style\Share  $share
   * @return Response
   */
  public function show($slug, Share $share)
  {
    $users = $share->getShareUsersBySlug($slug);
    return view('privacy.show', compact('slug', 'users'));
  }

  /**
   * Save a privacy user to the DB
   *
   * @param  string  $slug
   * @param  Share  $share
   * @param  Guide  $guide
   * @param  AddPrivacyUser  $request
   * @return Response
   */
  public function store($slug, Share $share, Guide $guide, AddPrivacyUser $request)
  {
    $share->guide_id = $guide->whereSlug($slug)->first()->id;
    $share->username = $request->username;
    $share->save();
    return redirect("guides/$slug/privacy");
  }

  /**
   * Delete a privacy user from the DB
   *
   * @param  string  $slug
   * @return Response
   */
  public function destroy($slug, $username, Share $share)
  {
    $share->leftJoin('guides', 'guides.id', '=', 'shares.guide_id')
          ->where('shares.username', $username)
          ->where('guides.slug', $slug)
          ->delete();
    return redirect("guides/$slug/privacy");
  }


}
