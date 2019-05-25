<?php

namespace App\Models\Core;

use App\Models\Hotel;
use App\Models\Organization;
use App\Models\OrganizationUser;
use App\Models\Rfp;
use App\Models\Sximo;

/**
 * @property int id
 */
class Users extends Sximo
{

    protected $table = 'tb_users';
    protected $primaryKey = 'id';

    public function __construct($attributes = array())
    {
        parent::__construct($attributes);
    }

    public function rfps()
    {
        return $this->hasMany(Rfp::class, 'user_id');
    }

    public static function querySelect()
    {

        return " 
			SELECT  tb_users.*,  tb_groups.name 
			FROM tb_users LEFT JOIN tb_groups ON tb_groups.group_id = tb_users.group_id 
		";
    }

    public static function queryWhere()
    {

        return "    WHERE tb_users.id !=''   ";
    }

    public static function queryGroup()
    {
        return "      ";
    }

    public static function getRows($args, $gid = 0)
    {
        $table = with(new static)->table;
        $key   = with(new static)->primaryKey;

        extract(array_merge(array(
            'page'   => '0',
            'limit'  => '0',
            'sort'   => '',
            'order'  => '',
            'params' => '',
            'flimit' => '',
            'fstart' => '',
            'global' => 1,
        ), $args));

        $offset           = ($page - 1) * $limit;
        $limitConditional = ($page != 0 && $limit != 0) ? "LIMIT  $offset , $limit" : '';
        /* Added since version 5.1.7 */
        if ($fstart != '' && $flimit != '') {
            $limitConditional = "LIMIT  $fstart , $flimit";
        }
        /* End Added since version 5.1.7 */

        $orderConditional = ($sort != '' && $order != '') ? " ORDER BY {$sort} {$order} " : '';

        // Update permission global / own access new ver 1.1
        $table = with(new static)->table;
        if ($global == 0) {
            $params .= " AND {$table}.entry_by ='" . $gid . "'";
        }
        // End Update permission global / own access new ver 1.1

        $rows   = array();
        $result = \DB::select(self::querySelect() . self::queryWhere() . " 
				{$params} " . self::queryGroup() . " {$orderConditional}  {$limitConditional} ");

        $total = \DB::select("
				SELECT  count(tb_users.id) as total 
			FROM tb_users LEFT JOIN tb_groups ON tb_groups.group_id = tb_users.group_id " . self::queryWhere() . " 
				{$params} " . self::queryGroup());
        $total = (count($total) != 0 ? $total[0]->total : 0);

        return $results = array('rows' => $result, 'total' => $total);
    }

    public static function level($id)
    {

        $group_id = 0;
        $sql      = \DB::table('tb_groups')->where('group_id', $id)->get();
        if (count($sql)) {
            $row      = $sql[0];
            $group_id = $row->level;
        }

        return $group_id;

    }

    public function hotel()
    {
        return $this->belongsTo(Hotel::class, 'hotel_id');
    }

    /**
     * Support for multiple organizations per user if needed
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function organizations()
    {
        return $this->belongsToMany(Organization::class, 'organization_user', 'user_id', 'organization_id')->using(OrganizationUser::class);
    }

    /**
     * Support for a single organization for a user if needed
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }

}
