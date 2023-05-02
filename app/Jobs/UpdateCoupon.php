<?php

namespace App\Jobs;

use App\Model\Coupon;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class UpdateCoupon implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $coupon;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Coupon $coupon)
    {
        $this->coupon = $coupon;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
       
      
        if (getNumbers()->get('cart_subtotal') !=null) {
            session()->put('coupon', [
                'name' => $this->coupon->code,
                'discount' => $this->coupon->discount(getNumbers()->get('cart_subtotal')),
            ]);
        }
    }
}