<?php namespace Style\Http\Controllers;

use League\CommonMark\CommonMarkConverter;
use Style\CodeParser;
use Style\Guide;
use Style\User;
use Style\Http\Requests;
use Style\Http\Requests\CreateGuideRequest;
use Style\Http\Controllers\Controller;

use Illuminate\Http\Request;

class GuideController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
   * @param  Guide $guide
   * @param  User $user
	 * @return Response
	 */
	public function index(Guide $guide, User $user)
	{
    $guides = $guide->whereUserId($user->currentUser()->id)->get();
    return view('guide.all', compact('guides'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
  {
    return view('guide.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
   * @param CreateGuideRequest $request
   * @param Guide $guide
   * @param User $user
	 * @return Response
	 */
	public function store(CreateGuideRequest $request, Guide $guide, User $user)
	{
    $user_id = $user->currentUser()->id;
    $guide->create(array_merge(
      $request->all(),
      compact('user_id')
    ));
    return redirect($request->get('slug'));
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $slug
   * @param  Guide  $guide
   * @param  CommonMarkConverter $markdown
   * @param  CodeParser $parser
	 * @return Response
	 */
	public function show($slug, Guide $guide, CommonMarkConverter $markdown, CodeParser $parser)
	{
    if($data = $guide->whereSlug($slug)->first()){
      $data->content = $markdown->convertToHtml($data->content);
      $content = $parser->H1ToList($data->content);
      $data->content = $content['content'];
      $data->index = $content['index'];
      return view('guide.show', $data);
    }
    return abort(404);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  string  $slug
	 * @return Response
	 */
	public function edit($slug)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  string  $slug
	 * @return Response
	 */
	public function update($slug)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  string  $slug
	 * @return Response
	 */
	public function destroy($slug)
	{
		//
	}

}
