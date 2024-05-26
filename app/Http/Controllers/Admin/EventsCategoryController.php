<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\RoleHelpers;
use App\Http\Controllers\Controller;
use App\Models\EventsCategory;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class EventsCategoryController extends Controller
{
    protected $HOME_URL = 'dashboard/events-category';

    public function __construct()
    {
        $this->middleware(function (Request $request, Closure $next) {
            if (RoleHelpers::isEventOrganizer() && Route::getCurrentRoute()->getActionMethod() != 'index') {
                return abort(403);
            }

            return $next($request);
        });
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = EventsCategory::all();
        return view('admin.events-category.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.events-category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(EventsCategory::$rules);
        EventsCategory::create($request->all());

        noty('Berhasil Simpan Data', 'info');

        return redirect($this->HOME_URL);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\EventsCategory  $EventsCategory
     * @return \Illuminate\Http\Response
     */
    public function show(EventsCategory $EventsCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\EventsCategory  $EventsCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(EventsCategory $EventsCategory)
    {
        return view('admin.events-category.edit', ['data' => $EventsCategory]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\EventsCategory  $EventsCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EventsCategory $EventsCategory)
    {
        $request->validate(EventsCategory::$rules);
        $EventsCategory->update($request->all());

        noty('Berhasil Edit Data', 'info');

        return redirect($this->HOME_URL);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EventsCategory  $EventsCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(EventsCategory $EventsCategory)
    {
        try {
            $EventsCategory->delete();
            noty('Berhasil Hapus Data', 'info');
        } catch (\Exception $e) {
            noty('Gagal Hapus Data', 'error');
        }

        return redirect($this->HOME_URL);
    }
}
