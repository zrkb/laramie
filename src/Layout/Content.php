<?php

namespace Laramie\Admin\Layout;

use Closure;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Support\Collection;
use Illuminate\Support\HtmlString;

class Content implements Htmlable, Renderable
{
	/**
	 * Content header.
	 *
	 * @var string
	 */
	protected $header = '';

	/**
	 * Content description.
	 *
	 * @var string
	 */
	protected $description = '';

	/**
	 * @var Row[]
	 */
	protected $rows;

	public function __construct(Closure $callback = null)
	{
		$this->rows = new Collection();

		if ($callback instanceof Closure) {
			$callback($this);
		}
	}

	public function header($header = '')
	{
		$this->header = $header;

		return $this;
	}

	public function description($description = '')
	{
		$this->description = $description;

		return $this;
	}

	public function body($content)
	{
		return $this->row($content);
	}

	public function row($content)
	{
		if ($content instanceof Closure) {
			$row = new Row();
			call_user_func($content, $row);
			$this->addRow($row);
		} else {
			$this->addRow((new Row())->html($content));
		}

		return $this;
	}

	protected function addRow(Row $row)
	{
		$this->rows->push($row);
	}

	public function build()
	{
        $rows = $this->rows->map(function ($row): String {
            if ($row instanceof \Spatie\Html\HtmlElement) {
                return $row->render();
            }

            if (is_null($row)) {
                return '';
            }

            if (is_string($row)) {
                return $row;
            }

            throw new Exception('Invalid HTML content');
        })->implode('');

        return new HtmlString($rows);
	}

	public function render()
	{
		$items = [
			'title'      => $this->header,
			'pageTitle' => $this->description,
			'slot'     => $this->build(),
		];

		return view('admin::layouts/card', $items)->render();
	}

	public function __toString()
	{
		return $this->render();
	}

	public function toHtml(): String
	{
		return $this->render();
	}

}
