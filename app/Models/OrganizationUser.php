<?php

namespace App\Models;

use App\Models\Core\Users;
use Illuminate\Database\Eloquent\Relations\Pivot;

class OrganizationUser extends Pivot
{

    /**
     * Support for multiple organizations per user if needed
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(Users::class, 'user_id');
    }

    /**
     * Support for multiple organizations per user if needed
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }

}
