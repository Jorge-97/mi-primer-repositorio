<div class="form-group row align-items-center" :class="{'has-danger': errors.has('Nombre'), 'has-success': fields.Nombre && fields.Nombre.valid }">
    <label for="Nombre" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.alumno.columns.Nombre') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.Nombre" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('Nombre'), 'form-control-success': fields.Nombre && fields.Nombre.valid}" id="Nombre" name="Nombre" placeholder="{{ trans('admin.alumno.columns.Nombre') }}">
        <div v-if="errors.has('Nombre')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('Nombre') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('Telefono'), 'has-success': fields.Telefono && fields.Telefono.valid }">
    <label for="Telefono" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.alumno.columns.Telefono') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.Telefono" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('Telefono'), 'form-control-success': fields.Telefono && fields.Telefono.valid}" id="Telefono" name="Telefono" placeholder="{{ trans('admin.alumno.columns.Telefono') }}">
        <div v-if="errors.has('Telefono')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('Telefono') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('Direccion'), 'has-success': fields.Direccion && fields.Direccion.valid }">
    <label for="Direccion" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.alumno.columns.Direccion') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.Direccion" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('Direccion'), 'form-control-success': fields.Direccion && fields.Direccion.valid}" id="Direccion" name="Direccion" placeholder="{{ trans('admin.alumno.columns.Direccion') }}">
        <div v-if="errors.has('Direccion')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('Direccion') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('Edad'), 'has-success': fields.Edad && fields.Edad.valid }">
    <label for="Edad" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.alumno.columns.Edad') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.Edad" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('Edad'), 'form-control-success': fields.Edad && fields.Edad.valid}" id="Edad" name="Edad" placeholder="{{ trans('admin.alumno.columns.Edad') }}">
        <div v-if="errors.has('Edad')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('Edad') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('FechaNacimiento'), 'has-success': fields.FechaNacimiento && fields.FechaNacimiento.valid }">
    <label for="FechaNacimiento" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.alumno.columns.FechaNacimiento') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-sm-8'">
        <div class="input-group input-group--custom">
            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
            <datetime v-model="form.FechaNacimiento" :config="datePickerConfig" v-validate="'required|date_format:yyyy-MM-dd HH:mm:ss'" class="flatpickr" :class="{'form-control-danger': errors.has('FechaNacimiento'), 'form-control-success': fields.FechaNacimiento && fields.FechaNacimiento.valid}" id="FechaNacimiento" name="FechaNacimiento" placeholder="{{ trans('brackets/admin-ui::admin.forms.select_a_date') }}"></datetime>
        </div>
        <div v-if="errors.has('FechaNacimiento')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('FechaNacimiento') }}</div>
    </div>
</div>


