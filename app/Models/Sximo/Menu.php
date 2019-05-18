<?php namespace App\Models\Sximo;

use App\Models\Sximo;

class Menu extends Sximo
{

    protected $table = 'tb_menu';
    protected $primaryKey = 'menu_id';

    //-- This table does not have created_at and updated_at
    public $timestamps = false;

    /**
     * Menu constructor.
     *
     * @param array $attributes DB attributes
     */
    public function __construct($attributes = array())
    {
        parent::__construct($attributes);
    }

}
