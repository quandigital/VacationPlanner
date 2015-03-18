<?php namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Storages\User\UserRepository;

class UserController extends Controller
{

    protected $user;

    public function __construct(UserRepository $user)
    {
        $this->user = $user;
    }

    // access methods from EloquentUserRepository now via
    // $this->user->anyMethod()

}
