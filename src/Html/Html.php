<?php

namespace Laramie\Admin\Html;

use Laramie\Admin\Html\Elements\BaseElement;
use Laramie\Admin\Html\Elements\Blank;
use Laramie\Admin\Html\Elements\Table;
use Illuminate\Support\Traits\Macroable;

class Html
{
	use Macroable;

    public function table($contents = null)
    {
        return Table::create()->html($contents);
    }

	public function div($contents = null)
	{
        return (new Blank('div'))->html($contents);
	}

	public function span($contents = null)
	{
        return (new Blank('span'))->html($contents);
	}

	public function p($contents = null)
	{
        return (new Blank('p'))->html($contents);
	}
}
