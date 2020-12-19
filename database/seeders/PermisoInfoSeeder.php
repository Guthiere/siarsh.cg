<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Team;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Role;
use App\Models\Permiso;
use Laravel\Jetstream\Team as JetstreamTeam;

class PermisoInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
         //truncate tables usando DB
         DB::statement("SET foreign_key_checks = 0");
         DB::table('role_user')->truncate();
         DB::table('permiso_role')->truncate();
         //Truncate table Utilizando el modelo
         Permiso::truncate();
         Role::truncate();
     DB::statement("SET foreign_key_checks = 1");

     //User DATA Admin
     $useradmin = User::where('email','admin@admin.com')->first();

     if($useradmin){
         $useradmin->delete();
     }

     $useradmin = User::create([
         'name' =>'Admin',
         'email' => 'admin@admin.com',
         'dni'=>'0000-0000-00000',
         'password' => Hash::make('admin'),
         'activo' => '1'
     ]);

     $useradmin->ownedTeams()->save(Team::forceCreate([
        'user_id' => $useradmin->id,
        'name' => explode(' ', $useradmin->name, 2)[0]."'s Team",
        'personal_team' => true,
    ]));

     $roleadmin = Role::Create([
                         'name'=>'Admin',
                         'slug'=>'admin',
                         'description'=>'Administrator',
                         'full-access'=>'yes'
                             ]);
     $useradmin->roles()->sync([$roleadmin->id]);

     //Permiso
     $permiso_all = [];

     //Permiso Role
         $permiso = Permiso::Create([
             'name'=>'List Role',
             'slug'=>'role.index',
             'description'=>'A user can list role',
         ]);
         $permiso_all[] = $permiso->id;

         $permiso = Permiso::Create([
             'name'=>'Show Role',
             'slug'=>'role.show',
             'description'=>'A user can see role',
         ]);

         $permiso_all[] = $permiso->id;

         $permiso = Permiso::Create([
             'name'=>'Create Role',
             'slug'=>'role.create',
             'description'=>'A user can create role',
         ]);

         $permiso_all[] = $permiso->id;

         $permiso = Permiso::Create([
             'name'=>'Edit Role',
             'slug'=>'role.edit',
             'description'=>'A user can edit role',
         ]);

         $permiso_all[] = $permiso->id;

         $permiso = Permiso::Create([
             'name'=>'Destroy Role',
             'slug'=>'role.destroy',
             'description'=>'A user can destroy role',
         ]);

         $permiso_all[] = $permiso->id;

         //Table Permiso User
         $permiso = Permiso::Create([
             'name'=>'List User',
             'slug'=>'user.index',
             'description'=>'A user can list user',
             ]);

         $permiso_all[] = $permiso->id;

         $permiso = Permiso::Create([
             'name'=>'Show User',
             'slug'=>'user.show',
             'description'=>'A user can see user',
             ]);

             $permiso_all[] = $permiso->id;

         $permiso = Permiso::Create([
             'name'=>'Edit User',
             'slug'=>'user.edit',
             'description'=>'A user can edit user',
             ]);

         $permiso_all[] = $permiso->id;

         $permiso = Permiso::Create([
             'name'=>'Destroy User',
             'slug'=>'user.destroy',
             'description'=>'A user can destroy user',
             ]);

         $permiso_all[] = $permiso->id;

         $permiso = Permiso::Create([
             'name'=>'Edit Own User',
             'slug'=>'userown.edit',
             'description'=>'A user can edit own user',
             ]);

         $permiso_all[] = $permiso->id;

         $permiso = Permiso::Create([
                 'name'=>'Show Own User',
                 'slug'=>'userown.show',
                 'description'=>'A user can see own user',
                 ]);

                 //rol Registered User
        $roleuser = Role::Create([
            'name'=>'Registered User',
            'slug'=>'registereduser',
            'description'=>'Registered User',
            'full-access'=>'no'
                ]);

        $useradmin->roles()->sync([$roleadmin->id]);
            //Table Permiso_role
            //$roleadmin->Permisos()->sync([$roleadmin->id]);
            $roleadmin->find(2)->permisos()->sync([6,10,11]);
    }
}
