<?php

namespace App\Models;

use App\Models\Core\Groups;
use App\User;
use Illuminate\Database\Eloquent\Model;

/**
 * @property \App\User coordinators
 * @property \App\User subcoordinators
 */
class Organization extends Model
{

    /**
     * Return the account owner of the organization, only own account owner
     * per organization.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function accountOwner()
    {
        return $this->hasOne(User::class);
    }

    /**
     * Support for multiple organizations per user if needed
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users()
    {
        return $this->belongsToMany(User::class, 'organization_user', 'organization_id', 'user_id')->using(OrganizationUser::class);
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
        return $this->hasManyThrough(
            UserTrip::class,
            User::class,
            'organization_id',
            'entry_by'
        );
    }

    /**
     * Checked the user id to see if they belong to this organization
     *
     * @param int $id Checks the user's id to see if the belong to this org
     *
     * @return bool
     */
    public function hasUserId($id)
    {
        $user_ids = $this->users()->select('id')->get()->pluck('id');

        return in_array($id, $user_ids);
    }

    /**
     * Check if the user id is the account holder of this organization
     *
     * @param int $userId The user ID
     *
     * @return bool
     */
    public function isAccountHolder($userId)
    {
        return $this->user_id == $userId;
    }
}
