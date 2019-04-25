<?php

namespace Pandorga\Laramie\Presenters;

trait UserPresenter
{
    public function getInitialsAttribute()
    {
        return $this->first_name[0] . $this->last_name[0];
    }

    public function getFullNameAttribute()
    {
        return implode(' ', [$this->first_name, $this->last_name]);
    }
    
    public function getAccountAgeAttribute()
    {
        return $this->created_at->diffForHumans();
    }

    public function getLastModifiedAttribute()
    {
        return $this->updated_at->diffForHumans();
    }
}