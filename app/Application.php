<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    protected $table = "applications";

    protected $fillable = [
        'id',
        'jobID',
        'mouStatus',
        'showApplication',
        'stuID',
        'applicationStatus',
        'employerID',
        'applyDesc',
        'pdfFile',
        'resume'
    ];
}
