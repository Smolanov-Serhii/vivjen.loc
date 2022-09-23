<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class LaraformMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;
    public $form;
    public $files;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data, $form, $files)
    {
        $this->data = $data;
        $this->form = $form;
        $this->files = $files;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $body = $this->form->translate->body;
        $output_array = array();
        preg_match_all("#\[.*?\]#", $this->form->translate->body, $output_array);

        foreach ($output_array[0] as $item) {
            $data = str_replace(['[',']'], '', $item);

            $body = str_replace($item, $this->data[$data], $body);
        }

        $files = [];

        $output_array = array();
        preg_match_all("#\[.*?\]#", $this->form->translate->attach, $output_array);

        foreach ($output_array[0] as $item) {
            $data = str_replace(['[',']'], '', $item);

            if (isset($this->files[$data])) {
                foreach ($this->files[$data] as $file) {
                    if (!is_null($file)) {
                        array_push($files, $file);
                    }
                }
            }
        }

        $result = $this->subject($this->form->translate->subject)->view('emails.laraform', ['body' => $body]);

        if (!empty($files)) {
            foreach ($files as $file) {
                $result->attach($file->getRealPath(), array(
                        'as' => $file->getClientOriginalName(),
                        'mime' => $file->getMimeType())
                );
            }
        }

        return $result;
    }
}
