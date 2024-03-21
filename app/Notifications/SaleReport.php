<?php

namespace App\Notifications;

use App\Models\Sale;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SaleReport extends Notification implements ShouldQueue
{
    use Queueable;

    protected $sale;
    /**
     * Create a new notification instance.
     */
    public function __construct(Sale $sale)
    {
        $this->sale = $sale;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        $mail = (new MailMessage)->subject("Nova venda realizada!")
            ->greeting("Saudações, {$notifiable->name}!") 
            ->line("Parabéns! Uma nova venda foi realizada!");

        
        $mail->line("Venda: #{$this->sale->id}");
        
        $mail->line("Nome: {$this->sale->name}");
        
        $mail->line("Email: {$this->sale->email}");

        $mail->line("Comissão: " . $this->getMoney($this->sale->commission));

        $mail->line("Valor: " . $this->getMoney($this->sale->value));

        $mail->line("Data: " . Carbon::parse($this->sale->created_at)
            ->setTimezone('America/Sao_Paulo')
            ->format('d/m/Y H:i:s')
        );

        $mail->line('--------------------------------------'); 
        
        
        $mail->action('Ir para o App', url('/seller'))
            ->line('Obrigado por usar a nossa aplicação!')
            ->salutation('Atenciosamente, Tray');
        
        return $mail;
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }

    public function getMoney(int $value): string 
    {
        return 'R$ ' . number_format($value / 100 , 2, ',', '.');
    }
}
