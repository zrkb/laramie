<?php

namespace Laramie\Admin\Html\Elements;

use Illuminate\Database\Eloquent\Model as Eloquent;
use Illuminate\Support\Collection;
use Illuminate\Support\HtmlString;

class Table extends BaseElement
{
	protected $tag = 'table';

	/**
     * The Header Section
     *
     * @var \Laramie\Admin\Html\Elements\BaseElement
     */
	protected $header;

	/**
     * The Body Section
     *
     * @var \Laramie\Admin\Html\Elements\BaseElement
     */
	protected $body;

	/**
     * The Footer Section
     *
     * @var \Laramie\Admin\Html\Elements\BaseElement
     */
	protected $footer;

	protected $columns;
	protected $fields;
	protected $view = 'admin::html.table';

	public function __construct()
	{
		$this->build();

		$this->items = new Collection();
		$this->columns = new Collection();
	}

	private function build()
	{
		$this->header = new Blank('thead');
		$this->body = new Blank('tbody');
		$this->footer = new Blank('tfoot');

		$this->append($this->header);
		$this->append($this->body);
		$this->append($this->footer);
	}

	public function items(Collection $items)
	{
		$this->items = $items;

		$items = $items->map(function($item) {
			return $this->row($item);
		});

		return $this->append($items);
	}

	public function row($item)
	{
		$row = new Blank('tr');
		
		return $row;
	}
}
