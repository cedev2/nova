<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = ['title', 'description', 'status', 'color'];

    const STATUS_PENDING = 'pending';
    const STATUS_PROGRESS = 'progress';
    const STATUS_COMPLETE = 'complete';

    public static function statusOptions()
    {
        return [
            self::STATUS_PENDING => 'Pending',
            self::STATUS_PROGRESS => 'In Progress',
            self::STATUS_COMPLETE => 'Complete',
        ];
    }
}
