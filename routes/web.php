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
Route::get('/', [HomeController::class, 'index'])->middleware('auth');;


//Routes for the Posts

//show all posts
Route::get('/posts', [trialPost::class,'index'])->middleware('auth');
Route::get('/posts/post/{id}', [trialPost::class,'show'])->middleware('auth');

//Add new Post
Route::get('/posts/addNewPost', [trialPost::class,'create'])->middleware('auth');
Route::post('/posts/post/addNew', [trialPost::class,'store'])->middleware('auth');

//Edit existing post
Route::get('/posts/editPost/{id}', [trialPost::class,'edit'])->middleware('auth');
Route::put('/editThisPost/{id}',[trialPost::class,'update'])->middleware('auth');

//delete any post
Route::get('/posts/deletePost/{id}', [trialPost::class,'destroy'])->middleware('auth');

//Routes for the Task Categories
//add new task Category
Route::get('/addNewTaskCategory', [TaskCategoriesController::class,'create'])->middleware('auth');
Route::post('/addNewCategory',[TaskCategoriesController::class,'store'])->middleware('auth');

//Edit existing task category
Route::get('/editCategory/{id}', [TaskCategoriesController::class,'edit'])->middleware('auth');
Route::put('/editThisCategory', [TaskCategoriesController::class,'update'])->middleware('auth');

//Remove any existing task category
Route::get('/removeCategory/{id}',[TaskCategoriesController::class,'destroy'])->middleware('auth');


//Routes for The User Role
Route::get('/addNewUserRole',[UserRolesController::class,'create'])->middleware('auth');
Route::post('addThisRole',[UserRolesController::class,'store'])->middleware('auth');

//Edit an existing userRole
Route::get('/editThisUserRole/{id}',[UserRolesController::class,'edit'])->middleware('auth');
Route::put('/editThisRole',[UserRolesController::class,'update'])->name('editThisRole')->middleware('auth');

Route::get('removeThisRole/{id}',[UserRolesController::class,'destroy'])->middleware('auth');

//Users Detail and more options route

Route::get('/pingProject/showAllUsers',[userController::class,'index'])->middleware('auth');
Route::get('/pingProject/focusUser/{id}',[userController::class,'show'])->middleware('auth');

//Add New User
Route::get('/pingProject/addNewUser',[userController::class,'create'])->middleware('auth');

Route::post('/addThisUser',[userController::class,'store'])
->name('addThisUser')
->middleware('auth');

//Edit User
Route::get('/editUser/{id}',[userController::class,'edit'])->middleware('auth');
Route::put('/updateThisUser',[userController::class,'update'])
->name('updateThisUser')
->middleware('auth');

//Delete any user
Route::get('/deleteUser/{id}',[userController::class,'destroy'])->middleware('auth');


Route::get('/findUsersWithRoleId/{role_id}',[userRoleFilter::class,'showWithRole'])
->middleware('auth')
->name('findUsersWithRoleId');

//Routes related to the users tasks

// Current user Pending Tasks
Route::get('/currentUserPendingTasks/{user_id}', [UserTasksController::class,'showPendingTasks'])->middleware('auth');
//current user Completed Tasks
Route::get('/currentUserCompletedTasks/{user_id}', [UserTasksController::class,'showPendingTasks'])->middleware('auth');

//all users Pending Task
Route::get('/AllUsersPendingTasks', [UserTasksController::class,'usersPendingTasks'])->middleware('auth');
Route::get('/AllUsersCompletedTasks',[UserTasksController::class,'userCompletedTasks'])->middleware('auth');

//Direct Assign New Task
Route::get('/directAssignNewTask',[UserTasksController::class,'index']);