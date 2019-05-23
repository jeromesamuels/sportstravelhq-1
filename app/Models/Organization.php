<?php

namespace App\Models;

use App\Models\Core\Groups;
use App\Models\Core\Users;
use Illuminate\Database\Eloquent\Model;

/**
 * @property \App\Models\Core\Users coordinators
 * @property \App\Models\Core\Users subcoordinators
 */
class Organization extends Model
{

    /**
     * Support for multiple organizations per user if needed
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users()
    {
        return $this->belongsToMany(Users::class, 'organization_user', 'organization_id', 'user_id')->using(OrganizationUser::class);
    }

    /**
     * Get the coordinators users
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function coordinators()
    {
        $group_id = Groups::where('name', 'Travel Coordinator')->first()->group_id;

        return $this->users()->where('tb_users.group_id', $group_id);
    }

    /**
     * Get the coordinators users
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function subcoordinators()
    {
        $group_id = Groups::where('name', 'Subcoordinator')->first()->group_id;

        return $this->users()->where('tb_users.group_id', $group_id);
    }

    /**
     * Get all trips from all coordinators
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough
     */
    public function trips()
    {
        return $this->hasManyThrough(UserTrip::class, Users::class, 'organization_id', 'entry_by');
    }
}
