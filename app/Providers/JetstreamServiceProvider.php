<?php

namespace App\Providers;

use App\Actions\Jetstream\DeleteUser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;
use Laravel\Jetstream\Jetstream;


// yang akan di modifikasi kontrak instance nya
use Laravel\Fortify\Contracts\RegisterResponse;
use Laravel\Fortify\Contracts\LoginResponse;
use App\Http\Responses\RegisterResponse as NewRegisterResponse;



class JetstreamServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // daftarkan custom after register frontsite disini
        $this->app->instance(RegisterResponse::class, new class implements RegisterResponse
        {
            public function toResponse($request)
            {
                $url = '/register_success';

                return redirect($url);
            }
        });

        // custom login Response for Fortify
        // $this->app->instance(LoginResponse::class, new class implements LoginResponse
        // {
        //     public function toResponse($request)
        //     {
        //         // set to index
        //         $home = '/';

        //         // return redirect from variable $home
        //         return redirect()->intended($home);
        //     }
        // });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->configurePermissions();

        Jetstream::deleteUsersUsing(DeleteUser::class);
    }

    /**
     * Configure the permissions that are available within the application.
     *
     * @return void
     */
    protected function configurePermissions()
    {
        Jetstream::defaultApiTokenPermissions(['read']);

        Jetstream::permissions([
            'create',
            'read',
            'update',
            'delete',
        ]);
    }
}
