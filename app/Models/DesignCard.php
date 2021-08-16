<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DesignCard extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'customer_id',
        'label',
        'design_image',
        'design_file',
        'designer_id',
        'design_number',
        'salesrep_id',
        'weaver_id',
        'warps_id',
        'picks',
        'total_picks',
        'loom_id',
        'total_repeat',
        'wastage',
        'finishing_id',
        'cost_in_roll',
        'total_cost',
        'after_discount_cost',
        'speed_effiency',
        'customer_grade',
        'category',
        'chart',
        'length',
        'width',
        'sq_inch',
        'cost_sq_inch',
        'add_on_cost',
        'needle',
    ];

    public function getWeaverIdAttribute($value)
    {
        $weaver = json_decode($value, true);

        return is_array($weaver) && count($weaver) > 0
            ? $weaver
            : [];
    }

    public function getAddOnCastAttribute($value)
    {
        $addOnCost = json_decode($value, true);

        return is_array($addOnCost) && count($addOnCost) > 0
            ? $addOnCost
            : [];
    }

    public function getNeedleAttribute($value)
    {
        $needle = json_decode($value, true);

        return is_array($needle) && count($needle) > 0
            ? $needle
            : [];
    }

    public function getLoomIdAttribute($value)
    {
        $looms = json_decode($value, true);

        return is_array($looms) && count($looms) > 0
            ? $looms
            : [];
    }

    public function getTotalRepetAttribute($value)
    {
        $totalRepet = json_decode($value, true);

        return is_array($totalRepet) && count($totalRepet) > 0
            ? $totalRepet
            : [];
    }

    public function customerDetail()
    {
        return $this->hasOne(CustomerMaster::class,'id','customer_id');
    }

    
    public function designerDetail()
    {
        return $this->hasOne(Staf_master::class,'id','designer_id')->where('role_id',1);
    }

    public function salesRepDetail()
    {
        return $this->hasOne(Staf_master::class,'id','salesrep_id')->where('role_id',2);
    }

    public function warpDetail()
    {
        return $this->hasOne(WarpMaster::class,'id','warps_id');
    }

    public function finishingDetail()
    {
        return $this->hasOne(FinishingMachineMaster::class,'id','finishing_id');
    }

}
