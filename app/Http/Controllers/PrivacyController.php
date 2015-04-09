<?php namespace Style\Http\Controllers;

use Style\Share;
use Style\Http\Requests;
use Style\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Style\Shares;

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
    return view('privacy.create')->with(compact($slug, $users));
  }

  /**
   * Save a privacy user to the DB
   *
   * @param  string  $slug
   * @return Response
   */
  public function store($slug)
  {

  }

  /**
   * Delete a privacy user from the DB
   *
   * @param  string  $slug
   * @return Response
   */
  public function destroy($slug)
  {
    //
  }


}
