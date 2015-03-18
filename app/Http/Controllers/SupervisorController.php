<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Storages\Supervisor\SupervisorRepository;
use Illuminate\Http\Request;

class SupervisorController extends Controller {

    protected $supervisor;

    public function __construct(SupervisorRepository $SupervisorRepository)
    {
        $this->supervisor = $SupervisorRepository;
    }

    // access methods from EloquentSupervisorRepository now via
    // $this->supervisor->anyMethod()

}
