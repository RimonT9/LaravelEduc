<?php

namespace App\Console\Commands;

use App\Components\ImportDataClient;
use App\Models\Post;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class ImportJsonPlaceholderCommand extends Command
{
    
    protected $signature = 'import:jsonplaceholder';

    protected $description = 'Get data from jsonplaceholder';

    /**
     * Execute the console command.
     * @return int
     */
    public function handle()
    {
        // $import = new ImportDataClient();
        // $response = $import->client->request('GET', 'posts'); //Curl error 6
        // dd($response);

        $response = Http::withoutVerifying()->get('https://jsonplaceholder.typicode.com/posts');
        $jsonData = json_decode($response);
        
        foreach ($jsonData as $item){
            Post::firstOrCreate([
                'title' => $item->title
            ],[
                'title' => $item->title,
                'post_content' => $item->body,
                'category_id' => 2
            ]);
        }
    }
}
