<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Meta;
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    // public function __construct()
    // {
    //     # Default title
    //     Meta::title('This is default page title to complete section title');

    //     # Default robots
    //     Meta::set('robots', 'index,follow');

    //     # Default image
    //     Meta::set('image', asset('images/logo.png'));
    // }
}
