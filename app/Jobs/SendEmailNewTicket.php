<?php

namespace SGH\Jobs;

use SGH\Jobs\Job;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

use Mail;

use SGH\Models\User;
use SGH\Models\Prospecto;

class SendEmailNewTicket extends Job implements ShouldQueue
{
    use InteractsWithQueue, SerializesModels;

    private $ticket;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($ticket)
    {
        $this->ticket = $ticket;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $ticket = $this->ticket;
        $view   = 'emails.info_ticket_creado';

        if ($this->attempts() < 3) {
            Mail::send($view, compact('ticket'), function($message) use($ticket) {
                //Remitente
                $message->from(env('MAIL_USERNAME'), env('MAIL_NAME'));
                //Asunto
                $TICK_ID = str_pad($ticket->TICK_ID, 6, '0', STR_PAD_LEFT);
                $message->subject('Ticket '.$TICK_ID.' creado');
                //Correo al usuario que creó el ticket
                $user = $ticket->usuario;
                $message->to($user->email, $user->name);
                //Copia del correo al jefe
                $prosJefe = Prospecto::getJefe($user->cedula);
                $jefe_email = $prosJefe->PROS_CORREO;
                $message->cc($jefe_email, $name = null);
            });
        }

    }
}