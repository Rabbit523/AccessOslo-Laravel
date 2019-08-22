<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Services\Core\Settings;
use App\Models\Core\PostPages;

use App;
use Vinkla\Instagram\Instagram;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    private $index = array();
    
    public function boot()
    {   
        // $instagram = new Instagram('1905523419.1677ed0.b34f590659d34800bd08927ecaa69508');
        // $instagrams = $instagram->media();
        // $count = count($instagrams);
        // $rand_ = 10000;
        // $i = 0;
        // $j = 0;
        // $data = array();
        // while ($i < 9) {
        //     $rand = $this->gen_rand($count);
        //     $data[] = $instagrams[$rand];
        //     $i ++;
        // }
        // View::share('instagrams', $data);
        $datas = PostPages::where('status', 'published')->get();
        View::share('blogs', $datas);
        View::share('configuration', Settings::getSiteConfiguration());
    }

    public function gen_rand($count) {        
        while (1) {
            $rand = rand(0, $count - 1);
            $b = false;
            for ($i = 0; $i < count($this->index); $i++) {
                if ($rand == $this->index[$i]) {
                    $b = true;
                }
            }                        
            if (!$b) {
                $this->index [] = $rand;
                return $rand;
            }            
        }
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
