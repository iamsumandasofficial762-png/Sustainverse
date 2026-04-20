<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

use App\Models\Menu;
use App\Models\Category;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Schema::defaultStringLength(191);
        Paginator::useBootstrap();

        View::composer('components.header', function ($view) {
            $view->with([
                'menus' => Menu::all(),
                'categories' => Category::where('is_deleted', 0)
                            ->get()
            ]);
        });
        

        // FOOTER DATA (TOTAL VISITORS)
        View::composer('components.footer', function ($view) {
            $totalVisitors = DB::table('visitors')
                ->distinct()
                ->count('ip_address');
            $view->with('totalVisitors', $totalVisitors);
        });

        // VISITOR COUNT LOGIC
        if (!Session::has('visitor_counted')) {

            $ip = request()->ip();

            $exists = DB::table('visitors')
                ->where('ip_address', $ip)
                ->whereDate('visited_at', today())
                ->exists();

            if (!$exists) {
                DB::table('visitors')->insert([
                    'ip_address' => $ip,
                    'visited_at' => now(),
                ]);
            }

            Session::put('visitor_counted', true);
        }
    }
}
