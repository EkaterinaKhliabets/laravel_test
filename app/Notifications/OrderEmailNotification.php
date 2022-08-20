<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class OrderEmailNotification extends Notification implements ShouldQueue
{
    use Queueable;

    private $order;
    private $organization;
    private $bankAccount;
    private $client;
    private $buys;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($order, $organization, $bankAccount, $client, $buys)
    {
        $this->order = $order;
        $this->organization = $organization;
        $this->bankAccount = $bankAccount;
        $this->client = $client;
        $this->buys = $buys;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
       /* return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');*/
       /* return (new MailMessage)
            ->view('admin.mail', ['admin'=>$notifiable, 'user' => $this->user]);*/
        return (new MailMessage)
            ->view('email.order', [
                'organization'=> $this->organization,
                'order' => $this->order,
                'client' => $this->client,
                'bankAccount' => $this->bankAccount,
                'buys' => $this->buys,
            ]);
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
