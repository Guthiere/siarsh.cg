<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\UsersTable;
use App\Models\User;
Use App\Models\Role;
Use App\Models\Permiso;


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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])
                ->get('/users',UsersTable::class )
                ->name('users');



//Seccion de pruebas (temp)

Route::get('/test', function () {

    // return  Role::create([
    //         'name'=>'Admin',
    //         'slug'=>'admin',
    //         'description'=>'Administrador',
    //         'full-access'=>'yes',
    //     ]);

    // return  Role::create([
    //     'name'=>'Guest',
    //     'slug'=>'guest',
    //     'description'=>'Guest',
    //     'full-access'=>'yes',
    // ]);

    // return  Role::create([
    //     'name'=>'Test',
    //     'slug'=>'test',
    //     'description'=>'test',
    //     'full-access'=>'no',
    // ]);


        // $user= User::find(1);
        // $user->roles()->sync([1]);

        // return $user->roles;

    //      return  Permiso::create([
    //     'name'=>'Eliminar Permiso',
    //     'slug'=>'eliminar.permiso',
    //     'description'=>'un Usuario puede eliminar permisos',
    // ]);

        $role = Role::find(2);
       $role ->permisos()->sync([1,2,3]);

        return $role->permisos;

});
