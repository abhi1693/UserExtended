<?php namespace Clake\Userextended\Models;

use Model;
use RainLab\User\Models\UserGroup;
use October\Rain\Database\Traits\Sortable;

use Clake\UserExtended\Traits\Timezonable;

/**
 * TODO: Add scope functions to easily find group queries
 */

/**
 * Class GroupsExtended
 * @package Clake\Userextended\Models
 */
class GroupsExtended extends UserGroup
{

    use Sortable;

    use Timezonable;

    protected $timezonable = [
        'created_at',
        'updated_at'
    ];

    /**
     * Used to manually add relations for the user table
     * UserExtended constructor.
     */
    public function __construct()
    {

        $hasMany = $this->hasMany;
        $hasMany['roles'] = ['Clake\UserExtended\Models\Roles', 'key' => 'group_id'];
        $this->hasMany = $hasMany;

        parent::__construct();
    }

    public function scopeCode($query, $code)
    {
        return $query->where('code', $code);
    }

}