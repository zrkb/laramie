<?php

namespace Laramie\Admin\Layout;

use Spatie\Html\BaseElement;

class Column extends BaseElement
{
	protected $tag = 'div';
	
	/**
	 * @var int
	 */
	protected $width = 12;

	public function __construct($content, $width = 12)
	{
		$this->width = $width;

		// $this->addClass('col-md-' . $this->width);
	}
}
