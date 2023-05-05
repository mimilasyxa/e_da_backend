<?php

namespace App\Console\Commands;

use Dedoc\Scramble\Generator;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\Console\Command\Command as CommandAlias;

class GenerateOpenapi extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'openapi:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(Generator $generator)
    {
        try {
            Storage::set(json_encode($generator()), config('scramble.openapi_disk'));
            Storage::disk(config('scramble.openapi_disk'))->put(
                config('scramble.json_path'),
                json_encode($generator())
            );
            $this->info('Successfully processed!');

            return CommandAlias::SUCCESS;
        } catch (\Exception $exception) {
            $this->error($exception->getMessage());

            return CommandAlias::FAILURE;
        }
    }
}
