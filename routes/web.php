<?php

use App\Models\trialPosts;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\trialPost;
use App\Http\Controllers\TaskCategoriesController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\userController;
use App\Http\Controllers\UserRolesController;
use App\View\Components\userRoleFilter;
use App\Http\Controllers\UserTasksController;
use Illuminate\View\Component;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

//Default Route
Route::get('/', [HomeController::class, 'index']);


//Routes for the Posts

//show all posts
Route::get('/posts', [trialPost::class,'index']);
Route::get('/posts/post/{id}', [trialPost::class,'show']);

//Add new Post
Route::get('/posts/addNewPost', [trialPost::class,'create']);
Route::post('/posts/post/addNew', [trialPost::class,'store']);

//Edit existing post
Route::get('/posts/editPost/{id}', [trialPost::class,'edit']);
Route::put('/editThisPost/{id}',[trialPost::class,'update']);

//delete any post
Route::get('/posts/deletePost/{id}', [trialPost::class,'destroy']);

//Routes for the Task Categories
//add new task Category
Route::get('/addNewTaskCategory', [TaskCategoriesController::class,'create']);
Route::post('/addNewCategory',[TaskCategoriesController::class,'store']);

//Edit existing task category
Route::get('/editCategory/{id}', [TaskCategoriesController::class,'edit']);
Route::put('/editThisCategory', [TaskCategoriesController::class,'update']);

//Remove any existing task category
Route::get('/removeCategory/{id}',[TaskCategoriesController::class,'destroy']);


//Routes for The User Role
Route::get('/addNewUserRole',[UserRolesController::class,'create']);
Route::post('addThisRole',[UserRolesController::class,'store']);

//Edit an existing userRole
Route::get('/editThisUserRole/{id}',[UserRolesController::class,'edit']);
Route::put('/editThisRole',[UserRolesController::class,'update'])->name('editThisRole');

Route::get('removeThisRole/{id}',[UserRolesController::class,'destroy']);

//Users Detail and more options route

Route::get('/pingProject/showAllUsers',[userController::class,'index']);
Route::get('/pingProject/focusUser/{id}',[userController::class,'show']);

//Add New User
Route::get('/pingProject/addNewUser',[userController::class,'create']);

Route::post('/addThisUser',[userController::class,'store'])
->name('addThisUser');

//Edit User
Route::get('/editUser/{id}',[userController::class,'edit']);
Route::put('/updateThisUser',[userController::class,'update'])
->name('updateThisUser');

//Delete any user
Route::get('/deleteUser/{id}',[userController::class,'destroy']);


Route::get('/findUsersWithRoleId/{role_id}',[userRoleFilter::class,'showWithRole'])
->name('findUsersWithRoleId');

//Routes related to the users tasks

// Current user Pending Tasks
Route::get('/thisUserPendingTasks/{user_id}', [UserTasksController::class,'showPendingTasks']);
//current user Completed Tasks
Route::get('/thisUserCompletedTasks/{user_id}', [UserTasksController::class,'showCompletedTasks']);

//all users Pending Task
Route::get('/AllUsersPendingTasks', [UserTasksController::class,'usersPendingTasks']);
Route::get('/AllUsersCompletedTasks',[UserTasksController::class,'usersCompletedTasks']);

//Direct Assign New Task
Route::get('/directAssignNewTask',[UserTasksController::class,'create']);
Route::post('/addThisNewTask',[UserTasksController::class,'store'])->name('addThisNewTask');

//Make any task status to complete
Route::get('/makeThisTaskComplete/{task_id}',[UserTasksController::class,'makeComplete'])->name('makeThisTaskComplete');

//make any task status to pending
Route::get('/makeThisTaskPending/{task_id}',[UserTasksController::class,'makePending'])->name('makeThisTaskPending');

//Edit a particular task
Route::get('/task/editThisTask/{task_id}',[UserTasksController::class,'edit'])->name('task.editThisTask');
Route::put('/task/editATask',[UserTasksController::class,'update'])->name('task.editATask');


//Delete a particular task
Route::get('deleteThisTask/{task_id}',[UserTasksController::class,'destroy'])->name('deleteThisTask');