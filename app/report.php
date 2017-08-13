<?php
/**
 * Created by PhpStorm.
 * User: Ahmed Esmail
 * Date: 17/04/2017
 * Time: 02:35 م
 */

namespace app;
use Illuminate\Database\Eloquent\Model;


class report extends Model
{
    public $timestamps = false;
    protected $fillable = ['ReportId' , 'ReporterID'  , 'ReportDate' , '	ReportTypeID' , 'reporter_type'  ];
}














