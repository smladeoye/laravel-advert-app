<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    const MESSAGE_TYPE_SUCCESS = "message.success";
    const MESSAGE_TYPE_INFO = "message.info";
    const MESSAGE_TYPE_ERROR = "message.error";
    const MESSAGE_TYPE_WARNING = "message.error";

}
