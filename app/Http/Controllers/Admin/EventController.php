<?php

namespace App\Http\Controllers\Admin;

use App\Models\Event;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $events = Event::all();

    return view('admin.event.index', [
      'events' => $events,
    ]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $events = Event::all();

    return view('admin.event.create', [
      'events' => $events,
    ]);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param \Illuminate\Http\Request $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $validatedInput = $request->validate([
      'title' => ['required', 'string', 'unique:menus,name'],
      'description' => ['required', 'string', 'max:100'],
      'photo' => ['required', 'file', 'max:1024', 'dimensions:min_width=1200,min_height=600']
    ]);

    $photoPath = $request->file('photo')->storePubliclyAs(
      'event/photos',
      str($validatedInput['title'])->kebab() . '.' . $validatedInput['photo']->getClientOriginalExtension(),
      'public',
    );

    $eventCreated = Event::create([
      'title' => $validatedInput['title'],
      'description' => $validatedInput['description'],
      'photo_path' => $photoPath,
    ]);

    return to_route('admin.event.index')->with([
      'status' => 'success',
      'message' => "Event $eventCreated->title berhasil ditambahkan"
    ]);
  }

  /**
   * Display the specified resource.
   *
   * @param int $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    $event = Event::findOrFail($id);

    return view('admin.event.show', [
      'event' => $event
    ]);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param int $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    $event = Event::findOrFail($id);

    return view('admin.event.edit', [
      'event' => $event
    ]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param \Illuminate\Http\Request $request
   * @param int $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
    $event = Event::findOrFail($id);
    $rules = [
      'title' => ['required', 'string'],
      'description' => ['required', 'string', 'max:100'],
      'photo' => ['nullable', 'file', 'max:1024', 'dimensions:min_width=1200,min_height=600']
    ];

    if ($request->title !== $event->title) {
      $rules['title'][] = 'unique:menus,name';
    }

    $validatedInput = $request->validate($rules);

    //Update image event
    if (isset($validatedInput['photo'])) {
      tap($request->file('photo'), function ($previous) use ($event, $validatedInput) {
        $event->forceFill([
          'photo_path' => $validatedInput['photo']->storePubliclyAs(
            'event/photos',
            str($validatedInput['title'])->kebab() . '.' . $validatedInput['photo']->getClientOriginalExtension(),
            'public',
          ),
        ])->save();

        if ($previous) {
          Storage::disk('public')->delete($previous);
        }
      });
    }

    $event->update([
      'title' => $validatedInput['title'],
      'description' => $validatedInput['description'],
    ]);

    return to_route('admin.event.index')->with([
      'status' => 'success',
      'message' => "Event $event->title berhasil diperbaharui"
    ]);
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param int $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    $event = Event::findOrFail($id);

    if (is_file_exists($event->photo_path)) {
      Storage::delete($event->photo_path);
    }

    $result = $event->delete();

    return to_route('admin.event.index')->with([
      'status' => $result ? 'success' : 'danger',
      'message' => $result ? 'Event berhasil dihapus' : 'Event gagal dihapus',
    ]);
  }
}
