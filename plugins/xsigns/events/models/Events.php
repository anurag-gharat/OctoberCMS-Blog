<?php
namespace Xsigns\events\Models;

use Model;
use Illuminate\Support\Facades\DB;
use Xsigns\events\classes\Tools;
use DateTimeZone;

/**
 * Model
 */
class Events extends Model
{
    use \October\Rain\Database\Traits\Validation;

    /*
     * Validation
     */
    public $rules = [
        'title' => 'required|string',
        'short' => 'required',
        'from' => 'required',
        'to' => 'required',
    ];

    /*
     * Disable timestamps by default.
     * Remove this line if timestamps are defined in the database table.
     */
    public $timestamps = false;

    /**
     * @var string The database table used by the model.
     */
    public $table = 'xsigns_events';

    public function afterSave()
    {
        $alias = Tools::standardize( $this->title);
        $res = DB::select("SELECT id FROM xsigns_events WHERE id != " . $this->id . " AND alias='" . $alias . "'");
        if (count($res) > 0) $alias .= '-' . $this->id;
        $arrAdd['alias'] = $alias;
        DB::table('xsigns_events')->where('id', '=', $this->id)->update($arrAdd);
        $this->alias = $alias;
    }
}