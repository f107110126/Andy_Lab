<?php

namespace App\Http\Controllers\Tutorial;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SessionsController extends Controller
{
    public function write(Request $request)
    {
        if (empty($_GET)) {
            return 'please use index=value in get of url to write something.';
        }
        foreach ($_GET as $index => $value) {
            // to write value to session:
            // session([$index => $value]);
            // $request->session([$index => $value]);
            // $request->session()->put($index, $value);
            $request->session()->put($index, $value);
        }
        // example to write data into session
        return 'Write Done';
    }

    public function read(Request $request)
    {
        if (empty($_GET)) dd(session()->all());
        $result = [];
        foreach ($_GET as $index => $value) {
            // to read value from session:
            // session($index);
            // $request->session()->get('index');
            $result[$index] = $request->session()->get($index, 'value not been set.');
        }
        dd($result);
    }

    public function writeFlash(Request $request)
    {
        if (empty($_GET)) {
            return 'please use index=value in get of url to write something.';
        }
        foreach ($_GET as $index => $value) {
            // to write value to session:
            // session()->flash([$index, $value);
            // $request->session()->flash($index, $value);
            $request->session()->flash($index, $value);
            // about flash it need to done a http request then it will been remove.
            // to read flash it just as same as read session.
            // or something different but same result
            // return redirect()->with('message' => 'something else ...');
            // same as flash, only this line be called, pass this message to next one request.
            flash($value);
        }
        return 'flash has been set.';
    }

    // or creat a flash function:
    // protected function flash($message)
    // {
    //     session()->flash('message', $message);
    // }
}
