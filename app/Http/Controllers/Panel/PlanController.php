<?php

namespace App\Http\Controllers\Panel;

use App\Plan;
use App\User;
use App\Notification;
use App\Mail\SendMail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class PlanController extends Controller
{
    public function Add(Request $request)
    {
        return view('Panel.Plans.add');
    }

    public function Save(Request $request)
    {
        // dd($request->all());
        $plan = new Plan;
        $plan->name = $request->name;
        $plan->price = $request->price;
        $plan->days = $request->time;
        $plan->description = $request->desc;
        $plan->save();
        if (!is_null($request->sendsms)) {
            $users = User::all();
            if ($request->sendsms == "sms") {
                //
            }

            if ($request->sendsms == "email") {


                foreach ($users as $key => $user) {
                    Mail::to($user->email)->send(
                        new SendMail($plan->name, '')
                    );
                }
            }

            if ($request->sendsms == "noty") {
                $content = 'با سلام <br/>';
                $content .= 'اشتراک جدید با نام ' . $plan->name . ' در سایت اضافه شد <br/><br/>';

                foreach ($users as $key => $user) {
                    $notification = new Notification;
                    $notification->subject = 'اشتراک جدید';
                    $notification->content = $content;
                    $notification->sender = 'admin';
                    $notification->reciver_id = $user->id;
                    $notification->save();
                }
            }
        }

        toastr()->success('اشتراک جدید با موفقیت ثبت شد');
        return redirect()->route('Panel.PlanList');
    }

    public function Edit($id)
    {
        return view('Panel.Plans.Edit', ['plan' => Plan::find($id)]);
    }

    public function SaveEdit($id)
    {

        Plan::whereId($id)->update([
            'name' => request()->name,
            'price' => request()->price,
            'days' => request()->time,
            'description' => request()->desc,

        ]);
        toastr()->success('اشتراک با موفقیت ویرایش  شد');
        return redirect()->route('Panel.PlanList');
    }

    function list()
    {
        return view('Panel.Plans.list')->with('plans', Plan::all());
    }

    public function Delete(Request $request)
    {
        foreach ($request->array as $key => $id) {
            $plan = Plan::find($id);
            $plan->delete();

            toastr()->success('اشتراک با موفقیت حذف  شد');
            return back();
        }
    }
}
