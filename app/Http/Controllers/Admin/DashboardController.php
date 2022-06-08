<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Testimonial;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function __invoke()
    {
        $date = \Carbon\CarbonImmutable::now()
            ->locale(config('app.locale'))
            ->timezone(config('app.timezone'));

        $menus = Menu::select(
            DB::raw('count(id) as `menus_count`'), 
            DB::raw("DATE_FORMAT(created_at, '%m-%Y') month_year"),  
            DB::raw('YEAR(created_at) year, MONTH(created_at) month')
        )
            ->groupby('year','month')
            ->get()
            ->filter(fn ($item) => $item->year === $date->year);
        $events = Event::select(
            DB::raw('count(id) as `menus_count`'), 
            DB::raw("DATE_FORMAT(created_at, '%m-%Y') month_year"),  
            DB::raw('YEAR(created_at) year, MONTH(created_at) month')
        )
            ->groupby('year','month')
            ->get()
            ->filter(fn ($item) => $item->year === $date->year);
        $testimonials = Testimonial::select(
            DB::raw('count(id) as `menus_count`'), 
            DB::raw("DATE_FORMAT(created_at, '%m-%Y') month_year"),  
            DB::raw('YEAR(created_at) year, MONTH(created_at) month')
        )
            ->groupby('year','month')
            ->get()
            ->filter(fn ($item) => $item->year === $date->year);

        $months = [
            $date->subMonth()->subMonth()->subMonth()->monthName,
            $date->subMonth()->subMonth()->monthName,
            $date->subMonth()->monthName,
            $date->monthName,
            $date->addMonth()->monthName,
            $date->addMonth()->addMonth()->monthName,
            $date->addMonth()->addMonth()->addMonth()->monthName,
        ];
        $menusCountPerMonth = [
            $menus->filter(fn ($item) => $item->month === $date->subMonth()->subMonth()->subMonth()->month)->first()?->menus_count,
            $menus->filter(fn ($item) => $item->month === $date->subMonth()->subMonth()->month)->first()?->menus_count,
            $menus->filter(fn ($item) => $item->month === $date->subMonth()->month)->first()?->menus_count,
            $menus->filter(fn ($item) => $item->month === $date->month)->first()?->menus_count,
            $menus->filter(fn ($item) => $item->month === $date->addMonth()->month)->first()?->menus_count,
            $menus->filter(fn ($item) => $item->month === $date->addMonth()->addMonth()->month)->first()?->menus_count,
            $menus->filter(fn ($item) => $item->month === $date->addMonth()->addMonth()->addMonth()->month)->first()?->menus_count,
        ];
        $eventsCountPerMonth = [
            $events->filter(fn ($item) => $item->month === $date->subMonth()->subMonth()->subMonth()->month)->first()?->menus_count,
            $events->filter(fn ($item) => $item->month === $date->subMonth()->subMonth()->month)->first()?->menus_count,
            $events->filter(fn ($item) => $item->month === $date->subMonth()->month)->first()?->menus_count,
            $events->filter(fn ($item) => $item->month === $date->month)->first()?->menus_count,
            $events->filter(fn ($item) => $item->month === $date->addMonth()->month)->first()?->menus_count,
            $events->filter(fn ($item) => $item->month === $date->addMonth()->addMonth()->month)->first()?->menus_count,
            $events->filter(fn ($item) => $item->month === $date->addMonth()->addMonth()->addMonth()->month)->first()?->menus_count,
        ];
        $testimonialsCountPerMonth = [
            $testimonials->filter(fn ($item) => $item->month === $date->subMonth()->subMonth()->subMonth()->month)->first()?->menus_count,
            $testimonials->filter(fn ($item) => $item->month === $date->subMonth()->subMonth()->month)->first()?->menus_count,
            $testimonials->filter(fn ($item) => $item->month === $date->subMonth()->month)->first()?->menus_count,
            $testimonials->filter(fn ($item) => $item->month === $date->month)->first()?->menus_count,
            $testimonials->filter(fn ($item) => $item->month === $date->addMonth()->month)->first()?->menus_count,
            $testimonials->filter(fn ($item) => $item->month === $date->addMonth()->addMonth()->month)->first()?->menus_count,
            $testimonials->filter(fn ($item) => $item->month === $date->addMonth()->addMonth()->addMonth()->month)->first()?->menus_count,
        ];

        return view('admin.dashboard.index', [
            'months' => $months,
            'menusCountPerMonth' => $menusCountPerMonth,
            'eventsCountPerMonth' => $eventsCountPerMonth,
            'testimonialsCountPerMonth' => $testimonialsCountPerMonth,
        ]);
    }
}
