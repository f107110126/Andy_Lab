<?php

namespace App\Http\Controllers\VueTutorial;

use App\Http\Controllers\Controller;
use App\Tutorial\Coupon;
use App\Tutorial\VueTask;
use Illuminate\Http\Request;
use Laravel\Ui\Presets\Vue;

class BasicController extends Controller
{
    public function TutorialsV1($section = 0)
    {
        if ($section > 9) return $this->map($section);
        $section_str = str_pad($section, 3, 0, STR_PAD_LEFT);
        print 'app-src/resources/views/Tutorial/Vues/section-' . $section_str . '.blade.php';
        if (file_exists('app-src/resources/views/Tutorial/Vues/section-' . $section_str . '.blade.php'))
            return view('Tutorial.Vues.section-' . $section_str);
        else
            // return view('Tutorial/Vues/menu');
            return view('Tutorial.Vues.menu', [
                'list' => collect([
                    (Object)['index' => 1, 'title' => 'Hello Databinding'],
                    (Object)['index' => 2, 'title' => 'Vue Show'],
                    (Object)['index' => 3, 'title' => 'Event Handling'],
                    (Object)['index' => 4, 'title' => 'A Peek into Components'],
                    (Object)['index' => 5, 'title' => 'Computed Properties'],
                    (Object)['index' => 6, 'title' => 'Subscription Plans Exercise'],
                    (Object)['index' => 7, 'title' => 'Rendering and Working With Lists'],
                    (Object)['index' => 8, 'title' => 'Custom Components 101'],
                    (Object)['index' => 9, 'title' => 'Vue Makes it so Easy'],
                ])
            ]);
    }

    protected function map($section = 10)
    {
        switch ($section) {
            case 10:
                return $this->tutorial10();
                break;
            case 11:
                return view('Tutorial.Vues.section-011');
                break;
            case 12:
                return view('Tutorial.Vues.section-012');
                break;
            case 13:
                return view('Tutorial.Vues.section-013');
                break;
            case 14:
                return view('Tutorial.Vues.section-014');
                break;
            default:
                return abort(404);
        }
    }

    protected function tutorial10()
    {
        $tasks = VueTask::all();
        return view('Tutorial.Vues.section-010', compact('tasks'));
    }

    public function apiTasks()
    {
        return VueTask::all();
    }

    public function apiTasksShow(VueTask $task)
    {
        return $task;
    }

    public function coupons($code)
    {
        return Coupon::whereCode($code)->firstOrFail();
    }
}
