<?php

namespace App\Mail;

use App\Models\GeneralParamter;
use App\Models\Invoice;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Nasution\Terbilang;

class BroadcastMail extends Mailable
{
    use Queueable, SerializesModels;

    public $subject;
    public $msg;
    public $invoiceId;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($subject, $msg, $invoiceId = null)
    {
        $this->subject = $subject;
        $this->msg = $msg;
        $this->invoiceId = $invoiceId;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            subject: $this->subject,
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        return new Content(
            view: 'common.mail.broadcast.broadcast',
            with: ['msg' => $this->msg]
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [];
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $email = $this->view('common.mail.broadcast.broadcast')
            ->with(['msg' => $this->msg]);

        if ($this->invoiceId != null) {
            $invoice = Invoice::find($this->invoiceId)->first();
            if ($invoice != null) {
                $pdfName =  "Invoice #" . $invoice->invoice_number . ".pdf";

                $generalParameter = GeneralParamter::first();

                $pdf = Pdf::loadView('common.pdf.invoice.invoice-pdf', [
                    'invoice' => $invoice,
                    'orderDetail' => $invoice->order->orderDetails->first(),
                    'generalParameter' => $generalParameter,
                    'amountStr' => Terbilang::convert($invoice->total),
                ]);

                $email->attachData($pdf->output(), $pdfName);
            }
        }

        return $email;
    }
}
