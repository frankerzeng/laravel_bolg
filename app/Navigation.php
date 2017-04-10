<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Navigation extends Model {
    const STATUS_ONLINE  = 0;
    const STATUS_OFFLINE = 1;
}