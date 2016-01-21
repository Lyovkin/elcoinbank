<?php
/**
 * Created by PhpStorm.
 * User: anatoliy
 * Date: 21.01.16
 * Time: 17:03
 */

namespace App\Composers;


use App\Models\Course;
use Illuminate\View\View;

class CourseComposer
{
    public function compose(View $view)
    {
        $course = Course::all()->first();

        $view->with('course', $course);
    }

}