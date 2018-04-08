<?php

namespace Laramie\Admin\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Http\FormRequest;
use Illuminate\Support\Collection;
use Illuminate\Container\Container as App;
use Laramie\Admin\Facades\Admin;
use Laramie\Admin\Layout\Content;
use Laramie\Admin\Layout\Table;
use Laramie\Admin\Http\Controllers\Interfaces\Displayable;
use Laramie\Admin\Http\Controllers\Interfaces\Viewable;
use Laramie\Admin\Repositories\BaseRepository;

abstract class BaseResourceController extends Controller
{
	use Displayable, Viewable;

	/**
	 * @var app
	 */
	protected $app;

	/**
	 * @var repository
	 */
	protected $repository;

	/**
	 * Specify Repository class name
	 *
	 * @return class
	 */
	abstract public function repository();

	public function __construct(App $app)
	{
		$this->app = $app;
		$this->makeRepository();
	}

	public function makeRepository()
	{
		$repository = $this->app->make($this->repository());
 
		if (!$repository instanceof BaseRepository) {
			throw new Exception("Class {$this->repository()} must be an instance of Laramie\\Admin\\Repositories\\BaseRepository");
		}
 
		return $this->repository = $repository;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		return Admin::content(function (Content $content) {
			$items = $this->repository->getAll();

			$content->title($this->getTitle());
			$content->header($this->getLabel());
			$content->body($this->list($items)->render());
		});
	}

	abstract public function list($items);

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\User  $user
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		$item = $this->repository->findById($id);

		return view($this->getShowView(), [
			'item' => $item,
			'label' => $this->getLabel(),
			'back' => true,
		]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		return view('admin::crud/create', [
			'title' => 'Añadir ' . $this->getLabel(),
			'pageTitle' => 'Añadir ' . $this->getLabel(),
			'label' => $this->getLabel(),
			'back' => true,
		]);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store()
	{
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
	public function update(FormRequest $request, $id)
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
		if ($this->repository->delete($id)) {
			session()->flash('success', 'Registro eliminado exitosamente.');	
		} else {
			session()->flash('danger', 'No se pudo eliminar el registro. Por favor comuníquese con el administrador.');
		}

		return redirect()->route(resource('index'));
	}
}
