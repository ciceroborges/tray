<?php

namespace App\Notifications;

use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SalesDailyReport extends Notification implements ShouldQueue
{
    use Queueable;

    protected $sales;
    /**
     * Create a new notification instance.
     */
    public function __construct(array $sales)
    {
        $this->sales = $sales;
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
        $date = Carbon::parse($this->sales[0]['created_at'])
            ->setTimezone('America/Sao_Paulo')
            ->format('d/m/Y');

        $mail = (new MailMessage)->subject("Relatório diário de vendas")
            ->greeting("Saudações, {$notifiable->name}!") 
            ->line("Aqui está um resumo das vendas de hoje {$date}");

        foreach ($this->sales as $sale) {
            $mail->line("Venda: #{$sale['id']}");
            
            $mail->line("Nome: {$sale['name']}");
            
            $mail->line("Email: {$sale['email']}");

            $mail->line("Comissão: " . $this->getMoney($sale['commission']));

            $mail->line("Valor: " . $this->getMoney($sale['value']));

            $mail->line("Data: " . Carbon::parse($sale['created_at'])
                ->setTimezone('America/Sao_Paulo')
                ->format('d/m/Y H:i:s')
            );

            $mail->line('--------------------------------------'); 
        }
        
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
        return 'R$ ' . number_format($value, 2, ',', '.');
    }
}
