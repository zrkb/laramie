<?php

namespace Laramie\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use App\Http\Controllers\Controller;
use Laramie\Admin\Http\Controllers\Interfaces\Displayable;

abstract class BaseResourceController extends Controller
{
	use Displayable;

	protected $slug;
	protected $repo;

	public function __construct()
	{
		$this->items = new Collection();
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		return view('admin::crud/index', ['items' => $this->getItems()]);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\User  $user
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		return view('admin::crud/show');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		return view('admin::crud/create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		return view('admin::crud/create');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \String $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		return view('admin::crud/edit');
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \String $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id)
	{
		return view('admin::crud/edit');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \String $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
	}
}
