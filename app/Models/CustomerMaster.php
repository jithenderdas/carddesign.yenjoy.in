<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Traits\QueryScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Sanctum\HasApiTokens;

class CustomerMaster extends Model
{
    use HasFactory, HasApiTokens, QueryScope;
    use SoftDeletes;
    
    protected $fillable = [
        "first_name",
        "last_name",
        "email",
        "mobile_number",
        "secondary_email",
        "sales_rep",
        "password",
        "bank_name",
        "account_no",
        "IFSCCode",
        "opening_balance",
        "credit_period",
        "grade",
        "company_name",
        "company_phone",
        "billing_address",
        "shipping_address"
        
    ];
    protected $hidden = ["password", "remember_token"];

    protected $casts = [
        "email_verified_at" => "datetime",
    ];

    public function setPasswordAttribute($value)
    {
        $this->attributes["password"] = bcrypt($value);
    }
}
