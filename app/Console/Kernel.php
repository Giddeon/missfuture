<?php

namespace App\Console;

use App\BlogPosts;
use Carbon\Carbon;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\Log;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')
        //          ->hourly();

        $schedule->call(function () {
            $date = new \DateTime();
            $date->modify('-5 minutes');
//            $date->modify('-2 days');
            $formatted_date = $date->format('Y-m-d H:i:s');
            $posts = BlogPosts::whereBetween('date', [$formatted_date, \Carbon\Carbon::now()])->get();
            $vkAPI = new \BW\Vkontakte();
            $publicID = 145247465;
            $FBtoken = "EAASlmv6k7v8BAD66RNIp5KOFfJb9Vq1JAhiInIZBENlLFIrOLKqlTgOOPbip2e507n9DAKbcW7GrJUp7zFGZAw45xKCapqonUgOWzGHP0kLtEcSlAipsgqFhHhXywypTidGOHlCMCJ81gqheQAi44CZCHly37pZAGbUIkho3vwZDZD";
            $fb = app(\SammyK\LaravelFacebookSdk\LaravelFacebookSdk::class);
            foreach ($posts as $post) {
                if ($vkAPI->postToPublic($publicID, $post->preview_text . "\n\n https://missfuture.ru/posts/" . $post->code, "/var/www/html/public/blog_pics/" . $post->picture, explode(",", $post->tags))) {

                    echo "Ура! Всё работает, пост добавлен\n";

                } else {

                    echo "Фейл, пост не добавлен(( ищите ошибку\n";
                }


                $result = $fb->post("1509230889095947/feed", ["message" => $post->preview_text . "\n\n", "link" => "https://missfuture.ru/posts/" . $post->code], $FBtoken);
                Log::info("Facebook response", $result);
            }
        })->everyFiveMinutes();
    }

    /**
     * Register the Closure based commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        require base_path('routes/console.php');
    }
}
