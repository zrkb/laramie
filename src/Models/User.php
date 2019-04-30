<?php

namespace Pandorga\Laramie\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Schema;
use Pandorga\Laramie\Models\Authenticatable;
use Pandorga\Laramie\Presenters\UserPresenter;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
	use Notifiable, HasRoles, SoftDeletes, UserPresenter;

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
