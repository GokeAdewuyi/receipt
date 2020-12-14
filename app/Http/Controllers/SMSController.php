<?php

namespace App\Http\Controllers;

use PDF;
use App;
use App\Mail\TestMail;
use Error;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Mail;

class SMSController extends Controller
{
    public function sendSMS(): JsonResponse
    {
        $client = new Client();
        $url = 'https://rest.nexmo.com/sms/json';
        $params = [
            'from' => 'CRUD',
            'to' => '2349060040819',
            'text' => 'Your reservation with CRUD HOTELS was successful. Your Booking id is HMS/0001/0001/90',
            'api_key' => env('VONAGE_API_KEY'),
            'api_secret' => env('VONAGE_API_SECRET'),
        ];

        try {
            $response = $client->request('POST', $url, [
                'json' => $params,
                'verify' => false,
            ]);
        } catch (GuzzleException $e) {
            return response()->json(['success' => false, 'errors' => $e->getMessage()]);
        }

        $responseBody = json_decode($response->getBody());

        return response()->json(['success' => true, 'message' => $responseBody]);

    }

    public function sendWhatsApp(): JsonResponse
    {
        $client = new Client();
        $url = 'https://messages-sandbox.nexmo.com/v0.1/messages?api_key='.env('VONAGE_API_KEY').'&api_secret='.env('VONAGE_API_SECRET');

        $params = [
            'from' => [
                'type' => 'whatsapp',
                'number' => '14157386170'
            ],
            'to' => [
                'type' => 'whatsapp',
                'number' => '2348177787689'
            ],
            'message' => [
                'content' => [
                    'type' => 'text',
                    'text' =>'Your reservation with CRUD HOTELS was successful. Your Booking id is HMS/0001/0001/90'
                ]
            ],
        ];

        $headers = [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ];

        try {
            $response = $client->request('POST', $url, [
                'json' => $params,
                'headers' => $headers,
                'verify' => false,
            ]);
        } catch (GuzzleException $e) {
            return response()->json(['success' => false, 'errors' => $e->getMessage()]);
        }

        $responseBody = json_decode($response->getBody());

        return response()->json(['success' => true, 'message' => $responseBody]);

    }

    public function sendMail()
    {
        $data = [
            'booking_id' => 'CRD/HMS/001/190',
            'first_name' => 'Goke',
            'last_name' => 'Adewuyi',
            'c_name' => 'Goke Adewuyi',
            'email' => 'rafiumoshood@crudng.com',
            'phone' => '09060040819',
            's_name' => 'Sade Adu',
            'reservationType' => 'Room',
            'date' => '2020-12-10',
            'check_in' => '2020-12-10',
            'check_out' => '2020-12-10',
            'selection' => 'Room',
            'days' => 5,
            'type' => [
                'name' => 'Evans',
                'number' => '101',
                'type' => [
                    'name' => 'Executive'
                ]
            ],
            'hotel' => [
                'name' => 'CRUD Hotels',
                'address' => 'Block 41, Flat 5',
                'email' => 'support@crudng.com',
                'website' => 'www.crudng.com',
                'phone' => '08177787689'
            ],
            'payment_details' => [
                'payment_method' => 'pos',
                'payment_type' => 'part',
                'actual_amount' => '250000',
                'amount_paid' => '200000',
                'balance' => '50000'
            ]
        ];

        try {
            Mail::to($data['email'])->send(new TestMail($data));
        } catch (Error $error) {
            return response()->json([$error->getMessage()], 422);
        }

        return response()->json('done');
    }

    public function pdf()
    {
        $data = [
            'booking_id' => 'CRD/HMS/001/190',
            'first_name' => 'Goke',
            'last_name' => 'Adewuyi',
            'c_name' => 'Goke Adewuyi',
            'email' => 'rafiumoshood@crudng.com',
            'phone' => '09060040819',
            's_name' => 'Sade Adu',
            'reservationType' => 'Room',
            'date' => '2020-12-10',
            'check_in' => '2020-12-10',
            'check_out' => '2020-12-10',
            'selection' => 'Room',
            'days' => 5,
            'type' => [
                'name' => 'Evans',
                'number' => '101',
                'type' => [
                    'name' => 'Executive'
                ]
            ],
            'hotel' => [
                'name' => 'CRUD Hotels',
                'address' => 'Block 41, Flat 5',
                'email' => 'support@crudng.com',
                'website' => 'www.crudng.com',
                'phone' => '08177787689'
            ],
            'payment_details' => [
                'payment_method' => 'pos',
                'payment_type' => 'part',
                'actual_amount' => '250000',
                'amount_paid' => '200000',
                'balance' => '50000'
            ]
        ];
        return PDF::loadView('pdf', $data)->setPaper('A4', 'portrait')->stream('receipt.pdf');//->save('files/'.$data['first_name'].'_receipt.pdf');
//        PDF::loadView('pdf', $data)->setPaper('A4', 'portrait')->save('files/'.$data['first_name'].'_receipt.pdf');
//        return 'saved';

    }

    public function index()
    {
        $data = [
            'booking_id' => 'CRD/HMS/001/190',
            'c_name' => 'Goke Adewuyi',
            'email' => 'adewuyiyusuf@yahoo.com',
            'phone' => '09060040819',
            's_name' => 'Sade Adu',
            'reservationType' => 'Room',
            'date' => '2020-12-10',
            'check_in' => '2020-12-10',
            'check_out' => '2020-12-10',
            'selection' => 'Room',
            'days' => 5,
            'type' => [
                'name' => 'Evans',
                'number' => '101',
                'type' => [
                    'name' => 'Executive'
                ]
            ],
            'hotel' => [
                'name' => 'CRUD Hotels',
                'address' => 'Block 41, Flat 5',
                'email' => 'support@crudng.com',
                'website' => 'www.crudng.com',
                'phone' => '08177787689'
            ],
            'payment_details' => [
                'payment_method' => 'pos',
                'payment_type' => 'part',
                'actual_amount' => '250000',
                'amount_paid' => '200000',
                'balance' => '50000'
            ]
        ];

        return view('mail', ['data' => $data]);
    }
}
