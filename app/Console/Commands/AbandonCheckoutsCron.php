<?php

namespace App\Console\Commands;

use App\Model\Cart;
use App\Notifications\AbandonCheckout;
use App\User;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Notification;

class AbandonCheckoutsCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'AbandonCheckouts:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
     * @return int
     */
    public function handle()
    {
        $cartProducts = Cart::with('customersCartProduct',)->whereDate('created_at','<', Carbon::now()->subDays(1))->where('customer_id' ,'!=',0)->get();
        foreach($cartProducts as $product){
            Notification::send($product->customersCartProduct, new AbandonCheckout($product,$product->customersCartProduct));
        }
    }
}
