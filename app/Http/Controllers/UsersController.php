<?php namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Storages\User\UserRepository;

class UsersController extends Controller
{

    protected $user;

    public function __construct(UsersController $user)
    {
        $this->user = $user;
    }

}
