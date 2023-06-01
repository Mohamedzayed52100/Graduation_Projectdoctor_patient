<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\Mime\Part\TextPart;
use Symfony\Component\Mime\Message;
use Symfony\Component\Mime\Email;
use Symfony\Component\Mime\Part\HtmlPart;
use \MacsiDigital\Zoom\Facades\Zoom;
use Carbon\Carbon;
use \Firebase\JWT\JWT;
use Illuminate\Support\Facades\DB;
use \MacsiDigital\Zoom\Support\ZoomJWT;
class ZoomController extends Controller
{

    private $apiKey = 'ud6C0zBIT1qLQBn5mA7SnA';
    private $apiSecret = 'boyO3H4ekfsF5FPYszDFabl5YGJih47RMm8m';

    public function index()
    {
        return view('zoom.index');
    }

    public function scheduleMeeting(Request $request)
    {


       /// return $request->all();



      // return $request->input('start_time');

    
    $datetimeLocal = $request->input('start_time');
    $timestamp = strtotime($datetimeLocal);
   // return date('Y-m-d H:i:s', $timestamp);


    // Convert the input to a Carbon instance
    $carbon = Carbon::createFromFormat('Y-m-d\TH:i', $datetimeLocal);

 // return $carbon;
       $patient=$request->input('patient');
        $data = [
            'topic' => $request->input('topic'),
            'type' => 2,
            'start_time' => $request->input('start_time'),
            'duration' => $request->input('duration'),
            'timezone' => $request->input('timezone'),
            'agenda' => $request->input('agenda'),
        ];

        $responsezoom = Http::withHeaders([
            'Authorization' => 'Bearer ' . $this->generateJwtToken(),
            'Content-Type' => 'application/json'
        ])->post('https://api.zoom.us/v2/users/me/meetings', $data);

        if ($responsezoom->successful()) {


            DB::table('zoom')->insert([
                'uuid' => $responsezoom['uuid'],
                'id' => $responsezoom['id'],
                'host_id' => $responsezoom['host_id'],
                'host_email' => $responsezoom['host_email'],
                'topic' => $responsezoom['topic'],
                'join_url' => $responsezoom['join_url'],
                'start_at' => date('Y-m-d H:i:s', $timestamp),
                'type' => $responsezoom['type'],
                'status' => $responsezoom['status'],
                'start_time' => $responsezoom['start_time'],
                'duration' => $responsezoom['duration'],
                'timezone' => $responsezoom['timezone'],
                'agenda' => $responsezoom['agenda'],
                'created_at' => $responsezoom['created_at'],
                'start_url' => $responsezoom['start_url'],
                'password' => $responsezoom['password'],
                'h323_password' => $responsezoom['h323_password'],
                'pstn_password' => $responsezoom['pstn_password'],
                'encrypted_password' => $responsezoom['encrypted_password'],
                'doctor_id' => session('doctorid'),
                
            ]);


            // DB::table(zoom)->where('id' , $responsezoom['id'])->first()->primary_id,
            // foreach($patient  as $key => $value){
                for($i =0 ; $i <count($patient) ;$i++){
                DB::table('zoompatient')->insert([
                    'zoom_id'=>DB::table('zoom')->where('id' , $responsezoom['id'])->first()->primary_id,

                    'doctor_id'=>session('doctorid'),
                    'patient_id'=>$patient[$i],
                ]);

            }
            
           // return $responsezoom;
            return view('testzoom' , compact('responsezoom'));
             $responsezoom['join_url'];
            return redirect()->back()->with('success', 'Meeting has been scheduled successfully.');
        } else {
            return redirect()->back()->with('error', 'Failed to schedule meeting. Please try again later.');
        }
    }

    private function generateJwtToken()
    {
        $payload = [
            'iss' => $this->apiKey,
            'exp' => time() + 60
        ];

        return \Firebase\JWT\JWT::encode($payload, $this->apiSecret, 'HS256');
    }
    public function scheduleMeeting2(Request $request)
{
    $data = [
        'topic' => $request->input('topic'),
        'type' => 2,
        'start_time' => $request->input('start_time'),
        'duration' => $request->input('duration'),
        'timezone' => $request->input('timezone'),
        'agenda' => $request->input('agenda'),
    ];

    $response = Http::withHeaders([
        'Authorization' => 'Bearer ' . $this->generateJwtToken(),
        'Content-Type' => 'application/json'
    ])->post('https://api.zoom.us/v2/users/me/meetings', $data);

    if ($response->successful()) {
        $responseData = $response->json();

        // Get the join URL of the scheduled meeting
        $joinUrl = $responseData['join_url'];

        // Send the join URL to the user via email
        $userEmail = 'mohamedzayed52100@gmail.com';
        $meetingTopic = $request->input('topic');


        $data = [
            'name' => 'John Doe',
            'email' => 'johndoe@example.com',
            'message' => '"Hello nYou have been invited to a Zoom meeting on the topic $meetingTopic Please use the following link to join the meeting: $joinUrl Thank you."'
        ];
        Mail::send([],  $data , function ($message) use ($userEmail, $meetingTopic, $joinUrl , $data) {
            // $text = new TextPart("Hello nYou have been invited to a Zoom meeting on the topic $meetingTopic Please use the following link to join the meeting: $joinUrl Thank you." );
            // $html = new HtmlPart('<h1>Hello, this is a test email.</h1>');

            $message->to($userEmail)
                ->subject('Zoom Meeting Invitation')
                ->setBody($data['message'], 'text/plain'); 
        });

        return redirect()->back()->with('success', 'Meeting has been scheduled successfully. Invitation has been sent to ' . $userEmail);
    } else {
        return redirect()->back()->with('error', 'Failed to schedule meeting. Please try again later.');
    }
}


public function function3(){
//     $zoomApi = new ZoomJWT();
// $token = $zoomApi->generateToken();
$zoomMeeting = Zoom::meeting()->make([
    'type' => 2,
    'start_time' => '2023-06-01T12:00:00Z',
    'duration' => 60,
    'timezone' => 'America/Los_Angeles',
    'topic' => 'Laravel Zoom Meeting',
    'password' => '123456',
    'settings' => [
        'host_video' => true,
        'participant_video' => true,
        'join_before_host' => true,
        'mute_upon_entry' => true,
        'watermark' => true,
        'approval_type' => 2,
        'audio' => 'both',
        'auto_recording' => 'cloud',
        'waiting_room' => true,
    ],
]);

$zoomMeetingUrl = $zoomMeeting->joinUrl;
}
}

/*

composer require guzzlehttp/guzzle
composer require laravel/helpers

 


*/