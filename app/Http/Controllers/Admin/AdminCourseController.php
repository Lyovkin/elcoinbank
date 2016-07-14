<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CourseRequest;
use App\Models\Course;
use Illuminate\Http\Request;
use App\Models\Currency;
use Validator;

/**
 * Class AdminCourseController
 *
 * @package App\Http\Controllers
 * @Resource("course")
 * @Controller(prefix="admin")
 */
class AdminCourseController extends AbstractAdminController
{
    /**
     * AdminCurrencyController constructor.
     */
    public function __construct()
    {
        $this->middleware(['web', 'admin']);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $courses = Course::with('currency')->get();
        return view('admin.course.index', compact('courses'));
    }

    /**
     * @param Course $course
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Course $course)
    {
        return view('admin.course.edit', compact('course'));
    }

    /**
     * @param Request $request
     * @param Course $course
     * @return \Illuminate\Http\RedirectResponse
     * @internal param Currency $currency
     */
    public function update(Request $request, Course $course)
    {
        $currency = Currency::where('id', $course->currency_id)->first();
        $currency->fill($request->all());
        $currency->update();

        $course->fill($request->all());
        $course->currency()->associate($currency);
        $course->update();

        return redirect()->route('admin.course.index');
    }

    /**
     * @param Course $course
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @internal param Currency $currency
     */
    public function create(Course $course)
    {
        return view('admin.course.create', compact('course'));
    }

    /**
     * @param Request $request
     * @param Course $course
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request, Course $course)
    {
        $regex = '/^(?=.+)(?:[1-9]\d*|0)?(?:\.\d+)?$/';

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'course_purchase' => ['required', 'regex:'.$regex]
        ]);

        if ($validator->fails()) {
            return redirect()->route('admin.course.create')
                ->withErrors($validator->errors())
                ->withInput();
        }

        $currency = new Currency();
        $currency->name = $request->name;
        $currency->save();

        $course->currency()->associate($currency);
        $course->fill($request->all());
        $course->save();

        return redirect()->route('admin.course.index');
    }

    /**
     * @param Course $course
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Course $course)
    {
        $currency = Currency::where('id', $course->currency_id)->first();
        $currency->delete();

        $course->delete();
        return back();
    }
}
