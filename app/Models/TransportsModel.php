<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class TransportsModel extends Model
{
    use HasFactory, Notifiable;

    protected $table = 'transports';
    protected $fillable = ([
        'merk_transport'
    ]);
}
