<?php

namespace App\Http\Controllers;

use App\Mail\FeedbackMail;
use App\Mail\LaraformMail;
use App\Models\Variable;
use App\Models\Form;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    /**
     *
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */

    public function send(Request $request)
    {
        $toEmail = Variable::where('key', 'email')->first()->translate->value;

        try {
            Mail::to($toEmail)->send(new FeedbackMail($request));
        } catch (\Exception $exception) {
            return response()->json([
                'status' => false,
                'message' => __('feedback.fail_msg') . $exception->getMessage()
            ]);
        }

        return response()->json([
            'status' => true,
            'message' => __('feedback.success_msg')
        ]);
    }

    public function laraform(Request $request)
    {
        $key = $request->key;
        $data = $request->except('key');
        $files = $request->file();
        
        $form = Form::where('key', $key)->first();

        Mail::to($form->email)->send(new LaraformMail($data, $form, $files));

        return true;
    }
}
