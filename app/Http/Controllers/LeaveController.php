<?php

namespace App\Http\Controllers;

use App\Leave;
use App\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Notification;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMailable;

class LeaveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    function __construct()
    {
         $this->middleware('permission:leave-request', ['only' => ['create','store']]);
         $this->middleware('permission:leave-approve', ['only' => ['approve','updateApproval']]);
    }

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('leave.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'reason' => 'required',
            'start_date' => 'required',
            'end_date' => 'required'
        ]);
        $model = new Leave();
        $model->reason = $request->reason;
        $model->start_date = $request->start_date;
        $model->end_date =  $request->end_date;
        $date = Carbon::now();
        $model->request_date = ($date->toDateString());
        $model->staff_number = \Auth::user()->staff_number;
        $model->save();
        return redirect('leave/request')->with('success', 'Leave requested successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Leave  $leave
     * @return \Illuminate\Http\Response
     */
    public function show(Leave $leave)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Leave  $leave
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $leave = Leave::find($id);

        return view ('leave.edit')->with('leave', $leave);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Leave  $leave
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'reason' => 'required',
            'start_date' => 'required',
            'end_date' => 'required'
        ]);
        $model =Leave::find($id);
        $model->reason = $request->reason;
        $model->start_date = $request->start_date;
        $model->end_date =  $request->end_date;
        $model->status = null;
        $model->save();
        return redirect('leave/requests')->with('success', 'Leave updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Leave  $leave
     * @return \Illuminate\Http\Response
     */
    public function destroy(Leave $leave)
    {
        //
    }

    public function approve()
    {
        $leaves = Leave::where('status', null)
        ->get();
        return view('leave.approve')->with(compact('leaves'));
    }

    public function updateApproval(Request $request)
    {
        $leave_status =  $request->approve_reject;
        if(isset($leave_status))
        {
            foreach( $leave_status as $key => $status ) 
            {
                if(isset($leave_status[$key])) 
                {
                    $model = Leave::find($key);
                    if ($status=='approve') 
                    {
                        $model->status = 'approved';

                        $notification = new Notification();
                        $msg = 'Your leave request has been approved.';
                        $notification->message = $msg;
                        $notification->staff_number = $request->staff_number[$key];
                        $date = Carbon::now();
                        $notification->date = ($date->toDateString());
                        $notification->status = 'unread';
                        $notification->avatar = 'https://api.adorable.io/avatars/151/qwe@adorable.io.png'; 
                        $notification->save();
                        $user = User::where('staff_number', $request->staff_number[$key])
                        ->first();
                        $email = $user->email;
                        Mail::to($email)->send(new SendMailable($msg));
                    }
                    else if ($status=='reject') 
                    {
                        $model->status = 'rejected';
                        $model->reject_reason = $request->reject_reason[$key];
                        $rules = [
                            'reject_reason.'.$key => 'required',
                        ];

                        $message = [
                            'reject_reason.'.$key.'.required' => 'Reason for rejecting leave cannot be blank.',
                        ];
                        $this->validate($request, $rules, $message);
                         
                        $notification = new Notification();
                        $notification->message = "Your leave request has been rejected";
                        $notification->staff_number = $request->staff_number[$key];
                        $date = Carbon::now();
                        $notification->date = ($date->toDateString());
                        $notification->status = 'unread';
                        $notification->avatar = 'https://api.adorable.io/avatars/151/m@adorable.io.png'; 
                        $notification->save();

                        $msg = 'Your leave request has been rejected.';
                        $user = User::where('staff_number', $request->staff_number[$key])
                        ->first();
                        $email = $user->email;
                        Mail::to($email)->send(new SendMailable($msg));
                    }      
                    else if($status=='details')
                    {
                        $model->status = 'Request for more details';                         
                        $notification = new Notification();
                        $notification->message = "You have been requested to provide more details for your leave request";
                        $notification->staff_number = $request->staff_number[$key];
                        $date = Carbon::now();
                        $notification->date = ($date->toDateString());
                        $notification->status = 'unread';
                        $notification->avatar = 'https://api.adorable.io/avatars/151/qwrtm@adorable.io.png'; 
                        $notification->save();

                        $msg = 'You have been requested to provide more details regarding your leave request.';
                        $user = User::where('staff_number', $request->staff_number[$key])
                        ->first();
                        $email = $user->email;
                        Mail::to($email)->send(new SendMailable($msg));
                    }       
                    $model->save();
                }
            }
        }
            return redirect('leave/approve')->with('success','Leave updated successfully');
    }

    public function myRequests()
    {
        $leaves = Leave::where('staff_number', \Auth::user()->staff_number)
        ->get();

        return view('leave.my_leave_requests')->with(compact('leaves'));
    }
}
