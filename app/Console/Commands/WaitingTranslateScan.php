<?php
/**
 * Created by PhpStorm.
 * User: Float
 * Date: 2018/10/31
 * Time: 11:23
 */
namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Controllers\TranslateController;
/**
 * Class WaitingTranslateScan
 * @package App\Console\Commands
 */
class WaitingTranslateScan extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'WaitingTranslateScan:Scanning';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '等待转码队列扫描';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        \Log::info(date('Y-m-d H:i:s') . 'start');
        $translate=new TranslateController();
        $translate->start();
    }
}
