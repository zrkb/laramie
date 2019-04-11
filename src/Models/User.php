<?php

namespace Laramie\Admin\Models;

use Laramie\Admin\Presenters\UserPresenter;
use Laramie\Admin\Traits\HasCustomFilters;
use Laramie\Admin\Traits\HasPrevNext;
use Laramie\Admin\Traits\HasSegments;
use Laramie\Admin\Traits\ResourceModel;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Schema;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
	use Notifiable, HasRoles, SoftDeletes, UserPresenter, ResourceModel, HasSegments, HasCustomFilters, HasPrevNext;

	protected static $ignoreChangedAttributes = ['remember_token'];

	protected $guard_name = 'web';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'first_name', 'last_name',
		'name', 'email', 'password',
	];

	/**
	 * The attributes that should be mutated to dates.
	 *
	 * @var array
	 */
	protected $dates = ['deleted_at'];

	/**
	 * The attributes that should be hidden for arrays.
	 *
	 * @var array
	 */
	protected $hidden = [
		'password', 'remember_token',
	];

    public function getLogAttributesToIgnore()
    {
        return ['remember_token'];
    }
}
