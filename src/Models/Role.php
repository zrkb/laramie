<?php

namespace Laramie\Admin\Models;

use Laramie\Admin\Traits\HasPrevNext;
use Laramie\Admin\Traits\ResourceModel;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Role extends \Spatie\Permission\Models\Role
{
	use ResourceModel, HasPrevNext;
}