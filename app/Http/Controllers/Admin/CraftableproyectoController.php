<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Craftableproyecto\BulkDestroyCraftableproyecto;
use App\Http\Requests\Admin\Craftableproyecto\DestroyCraftableproyecto;
use App\Http\Requests\Admin\Craftableproyecto\IndexCraftableproyecto;
use App\Http\Requests\Admin\Craftableproyecto\StoreCraftableproyecto;
use App\Http\Requests\Admin\Craftableproyecto\UpdateCraftableproyecto;
use App\Models\Craftableproyecto;
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

class CraftableproyectoController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexCraftableproyecto $request
     * @return array|Factory|View
     */
    public function index(IndexCraftableproyecto $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Craftableproyecto::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id'],

            // set columns to searchIn
            ['id']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.craftableproyecto.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.craftableproyecto.create');

        return view('admin.craftableproyecto.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreCraftableproyecto $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreCraftableproyecto $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the Craftableproyecto
        $craftableproyecto = Craftableproyecto::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/craftableproyectos'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/craftableproyectos');
    }

    /**
     * Display the specified resource.
     *
     * @param Craftableproyecto $craftableproyecto
     * @throws AuthorizationException
     * @return void
     */
    public function show(Craftableproyecto $craftableproyecto)
    {
        $this->authorize('admin.craftableproyecto.show', $craftableproyecto);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Craftableproyecto $craftableproyecto
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Craftableproyecto $craftableproyecto)
    {
        $this->authorize('admin.craftableproyecto.edit', $craftableproyecto);


        return view('admin.craftableproyecto.edit', [
            'craftableproyecto' => $craftableproyecto,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateCraftableproyecto $request
     * @param Craftableproyecto $craftableproyecto
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateCraftableproyecto $request, Craftableproyecto $craftableproyecto)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values Craftableproyecto
        $craftableproyecto->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/craftableproyectos'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/craftableproyectos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyCraftableproyecto $request
     * @param Craftableproyecto $craftableproyecto
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyCraftableproyecto $request, Craftableproyecto $craftableproyecto)
    {
        $craftableproyecto->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyCraftableproyecto $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyCraftableproyecto $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    Craftableproyecto::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
