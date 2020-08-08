<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Alumno\BulkDestroyAlumno;
use App\Http\Requests\Admin\Alumno\DestroyAlumno;
use App\Http\Requests\Admin\Alumno\IndexAlumno;
use App\Http\Requests\Admin\Alumno\StoreAlumno;
use App\Http\Requests\Admin\Alumno\UpdateAlumno;
use App\Models\Alumno;
use Brackets\AdminListing\Facades\AdminListing;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class AlumnosController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexAlumno $request
     * @return array|Factory|View
     */
    public function index(IndexAlumno $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Alumno::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'Nombre', 'Telefono', 'Direccion', 'Edad', 'FechaNacimiento'],

            // set columns to searchIn
            ['id', 'Nombre', 'Telefono', 'Direccion']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.alumno.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.alumno.create');

        return view('admin.alumno.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreAlumno $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreAlumno $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the Alumno
        $alumno = Alumno::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/alumnos'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/alumnos');
    }

    /**
     * Display the specified resource.
     *
     * @param Alumno $alumno
     * @throws AuthorizationException
     * @return void
     */
    public function show(Alumno $alumno)
    {
        $this->authorize('admin.alumno.show', $alumno);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Alumno $alumno
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Alumno $alumno)
    {
        $this->authorize('admin.alumno.edit', $alumno);


        return view('admin.alumno.edit', [
            'alumno' => $alumno,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateAlumno $request
     * @param Alumno $alumno
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateAlumno $request, Alumno $alumno)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values Alumno
        $alumno->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/alumnos'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/alumnos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyAlumno $request
     * @param Alumno $alumno
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyAlumno $request, Alumno $alumno)
    {
        $alumno->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyAlumno $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyAlumno $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    Alumno::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
