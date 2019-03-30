<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

use View;
use Auth;
use App\Cheque;
use App\ChequeBank;
use App\ChequeBounce;
use App\ChequeHold;
use App\ChequeWithdraw;
use App\Notification;
use Carbon\Carbon;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        View::composer('*', function($view)
        {
            if(Auth::check())
            {
                $notifications = Notification::all()
                ->where('staff_number', \Auth::user()->staff_number)
                ->where('status', 'unread');

                $dateCarbon = Carbon::now();
                $date = $dateCarbon->toDateString();

                $view->with(compact(
                    'notifications',
                    'date'
                ));
            }
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
