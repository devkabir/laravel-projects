<?php

namespace App\Http\Controllers;

use App\DataTables\TaskDataTable;
use App\DataTables\UserDataTable;
use App\Models\Task;
use App\Models\User;
use Illuminate\Contracts\Support\Renderable;
use Yajra\DataTables\Services\DataTable;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return Renderable
     */
    public function index(): Renderable
    {
        return view('home');
    }

    public function users()
    {
        $users = User::latest()->paginate(10);
        return view('users', compact('users'));
    }

    public function tasks()
    {
        $tasks = Task::with("user:id,name")->latest()->paginate(10);
        return view('tasks', compact('tasks'));
    }

    public function users_datatable(UserDataTable $dataTable)
    {
        return $dataTable->render('users-datatable');
    }
    public function tasks_datatable(TaskDataTable $dataTable)
    {
        return $dataTable->render('tasks-datatable');
    }
}
