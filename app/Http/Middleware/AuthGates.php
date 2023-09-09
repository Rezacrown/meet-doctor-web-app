<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

// for authorize
// jangan sampai salah namespace!!!
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

// model
use App\Models\User;
use App\Models\ManagementAccess\Role;

class AuthGates
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     *
     */

    // public function __construct() {
    //     return null;
    // }

    // middleware ini digunakan untuk authorize role pada role managemen, yaitu untuk role doctor, pasien, dan super admin
    // ini mirip seperti memakai packcage spatie di laravel:)

    public function handle(Request $request, Closure $next)
    {
        // get all user by session browser
        // $user = \Auth::user();
        $user = Auth::user();

        // checking validation middleware
        // system on or not
        // user active or not
        if (!app()->runningInConsole() && $user) {

            $roles              = Role::with('permission')->get();
            $permissionsArray   = [];

            // nested loop
            // looping for role ( where table role )
            foreach ($roles as $role) {
                // looping for permission ( where table permnission_role )
                foreach ($role->permission as $permissions) {
                    // set data $role->id kedalam array 2 dimensi atau nested
                    $permissionsArray[$permissions->title][] = $role->id;
                }
            }

            // check user role
            foreach ($permissionsArray as $title => $roles) {
                // Gate: parameter pertama adalah nama key nya, dan kedua adalah clousure atau function callback yang harus mengembalikan booelan baik itu true atau false
                // Gate ini digunakan bersamaan sebagai role authorize managemen dengan pasangannya di blade tempalate yaitu @can() dan @endcan di blade template
                // fungsi @can adalah untuk memeriksa key Gate apakah aksesnya true/diperbolehkan, jika iya maka akan melakukan render component yg kita taruh di dalam @can tersebut
                Gate::define($title, function (User $user)
                // untuk melempar $roles kedalam parameter kedua 2 fungsi Gate kita menggunakan use ()
                // alasannya karena kita tidak bisa menggunakan global variable karena berbeda scope di php!
                use ($roles) {
                    // array_intersect fungsinya adalah mengembalikan semua value yang sama pada array di paramter array_intersect, returnnya berupa array baru yang mengandung semua value yang sama dari 2 atau lebih array.

                    // pluck() fungsinya sama seperti all() atau get() hanya saja dia mencari spesific field yang dibutuhkan, parameter 1 berupa nama collum field yg dicari dan paramter kedua merupakan nama key yang sesuai pada collumn field di parameter 1.
                    return count(array_intersect($user->role->pluck('id')
                        ->toArray(), $roles)) > 0;
                });
            }
        }

        // return all middleware
        return $next($request);
    }
}
