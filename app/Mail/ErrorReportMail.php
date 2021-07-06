<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;

/**
 * Reports Error to Admin
 *
 * $validated, $exception
 */
class ErrorReportMail extends Mailable
{
    private array $validated;
    private \Exception $exception;

    public function __construct(array $validated, \Exception $exception)
    {
        $this->validated = $validated;
        $this->exception = $exception;
    }

    public function build()
    {
        return $this->view('emails.error-report')->with([
            'validated' => $this->validated,
            'exception' => $this->exception
        ]);
    }
}