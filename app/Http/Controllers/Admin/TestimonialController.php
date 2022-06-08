<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $testimonials = Testimonial::all();
        
        return view('admin.testimonial.index', [
            'testimonials' => $testimonials,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.testimonial.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedInput = $request->validate([
            'name' => ['required', 'string'],
            'comment' => ['required', 'string', 'max:255'],
            'photo' => ['required', 'file', 'image', 'max:512'],
        ]);

        $date = \Carbon\CarbonImmutable::now();
        $now = "$date->year-$date->month-$date->week-$date->day-$date->hour-$date->minute-$date->second-$date->milli";

        //Insert image menu
        $photoPath = $request->file('photo')->storePubliclyAs(
            'testimonial/user_photos', 
            $now . '_' . str($validatedInput['name'])->kebab() . '.' . $request->file('photo')->getClientOriginalExtension(), 
            'public',
        );
        
        $testimonialCreated = Testimonial::create([
            'name' => $validatedInput['name'],
            'comment' => $validatedInput['comment'],
            'customer_photo_path' => $photoPath,
        ]);

        return to_route('admin.testimonial.index')->with([
            'status' => "success",
            'message' => "Testimoni dari <strong>$testimonialCreated->name</strong> berhasil ditambahkan"
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function edit(Testimonial $testimonial)
    {
        return view('admin.testimonial.edit', [
            'testimonial' => $testimonial,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Testimonial $testimonial)
    {
        $validatedInput = $request->validate([
            'name' => ['required', 'string'],
            'comment' => ['required', 'string', 'max:255'],
            'photo' => ['sometimes', 'file', 'image', 'max:512'],
        ]);

        //Update image event
        if (isset($validatedInput['photo'])) {
            tap($request->file('photo'), function ($previous) use ($testimonial, $validatedInput) {
                $date = \Carbon\CarbonImmutable::now();
                $now = "$date->year-$date->month-$date->week-$date->day-$date->hour-$date->minute-$date->second-$date->milli";

                $testimonial->forceFill([
                    'customer_photo_path' => $validatedInput['photo']->storePubliclyAs(
                        'testimonial/user_photos',
                        $now . '_' . str($validatedInput['name'])->kebab() . '.' . $validatedInput['photo']->getClientOriginalExtension(),
                        'public',
                    ),
                ])->save();
    
                if ($previous) {
                    Storage::disk('public')->delete($previous);
                }
            });
        }

        $testimonial->update([
            'name' => $validatedInput['name'],
            'comment' => $validatedInput['comment'],
        ]);

        return to_route('admin.testimonial.index')->with([
            'status' => "success",
            'message' => "Testimoni dari <strong>$testimonial->name</strong> berhasil diperbaharui"
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function destroy(Testimonial $testimonial)
    {
        $testimonial->deleteOrFail();

        return back()->with([
            'status' => "success",
            'message' => "Testimonial dari <strong>$testimonial->name</strong> berhasil dihapus",
        ]);
    }
}
