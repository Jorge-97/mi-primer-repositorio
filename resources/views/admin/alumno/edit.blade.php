@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.alumno.actions.edit', ['name' => $alumno->id]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <alumno-form
                :action="'{{ $alumno->resource_url }}'"
                :data="{{ $alumno->toJson() }}"
                v-cloak
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.alumno.actions.edit', ['name' => $alumno->id]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.alumno.components.form-elements')
                    </div>
                    
                    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('brackets/admin-ui::admin.btn.save') }}
                        </button>
                    </div>
                    
                </form>

        </alumno-form>

        </div>
    
</div>

@endsection