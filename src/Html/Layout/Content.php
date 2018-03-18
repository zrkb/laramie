<?php

namespace Laramie\Admin\Libraries\HTML;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Database\Eloquent\Model as Eloquent;
use Illuminate\Support\Collection;

class Content implements Renderable
{
	protected $model;
	protected $columns;
	protected $fields;
	protected $items;
    protected $view = 'admin::html.table';

    public function __construct(Eloquent $model)
    {
    	$this->model = $model
        $this->columns = new Collection();
        $this->items = new Collection();;
    }
}
