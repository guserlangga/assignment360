<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Invoicemail extends Mailable
{
    use Queueable, SerializesModels;

    protected $name;
    protected $phone;
    protected $car_name;

    public function __construct(string $name, string $phone, string $car_name){

        $this->name = $name;
        $this->phone = $phone;
        $this->car_name = $car_name;

    }

    public function build(){

        $data = [
            'name'=>$this->name,
            'phone'=>$this->phone,
            'car_name'=>$this->car_name,
        ];
        return $this->subject('Car Invoice')
            ->view('salesmail')
            ->with($data);
    }
}
