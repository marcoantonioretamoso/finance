@extends('admin.layouts.app')

@section('toolbar')
    <div class="toolbar" id="kt_toolbar">
        <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
            <div data-kt-swapper="true" data-kt-swapper-mode="prepend"
                data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
                class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                <h1 class="d-flex text-dark fw-bolder fs-3 align-items-center my-1">Listado de Ingresos</h1>
            </div>

        </div>
    </div>
@endsection

@section('content')
    <div class="listar main_proveedores">
        <div class="card card-flush">
            <div class="card-header align-items-center py-5 gap-2 gap-md-5">
                <div class="card-title">
                    <div class="d-flex align-items-center position-relative my-1">
                        <span class="svg-icon svg-icon-1 position-absolute ms-4">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none">
                                <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2"
                                    rx="1" transform="rotate(45 17.0365 15.1223)" fill="currentColor" />
                                <path
                                    d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z"
                                    fill="currentColor" />
                            </svg>
                        </span>
                        <input id="buscador" type="text" class="form-control form-control-solid w-250px ps-14"
                            placeholder="Buscar proveedores" />
                    </div>
                </div>
                <div class="card-toolbar">
                  {{-- <div class="row mx-5">
                                  <input type="hidden" name="buscar" id="buscar">
                                  <div class="col-md-12 mb-3">
                                      <div class="input-group mt-5">
                                          <input type="date" class="form-control" name="fecha_inicio" id="from_date"
                                              value="{{ $dateInit }}" />
                                          <span class="input-group-text">hasta</span>
                                          <input type="date" class="form-control" name="fecha_fin" id="to_date"
                                              value="{{ $dateEnd }}"/>
                                      </div>
                                  </div>
                              </div> --}}
                    {{-- <label for="paginacion" class="me-2 mb-0" style="color: #9e9e9e">Listar paginate:</label>
                    <div class="card-toolbar flex-row-fluid d-flex align-items-center justify-content-end gap-2" style="margin-right: 10px">
                        <select name="paginacion" id="paginacion" class="form-select form-select-sm" data-control="select2" data-placeholder="Seleccione una opción" required>
                            <option value="10" {{ session('paginateProveedor', 10) == 10 ? 'selected' : '' }}>10</option>
                            <option value="20" {{ session('paginateProveedor') == 20 ? 'selected' : '' }}>20</option>
                            <option value="50" {{ session('paginateProveedor') == 50 ? 'selected' : '' }}>50</option>
                            <option value="200" {{ session('paginateProveedor') == 200 ? 'selected' : '' }}>200</option>
                            <option value="all" {{ session('paginateProveedor') == 'all' ? 'selected' : '' }}>Todos</option>
                        </select>
                    </div>
                    @can('agregar proveedores') --}}
                        {{-- <button data-bs-toggle="modal" data-bs-target="#modalCreateIngreso" class="btn btn-primary btn-sm"><i class="fa-solid fa-plus"></i> Registrar Ingreso</button> --}}
                        <a onclick="modalCreateIngreso()" data-bs-toggle="modal" data-bs-target="#modalCreateIngreso" class="btn btn-primary btn-sm">
                            <i class="fa-solid fa-plus"></i> Registrar Ingreso
                        </a>
                    {{-- @endcan --}}
                </div>
            </div>
            {{-- <div class="card-body pt-0">
                <div id="table">
                    <div class="table-responsive">
                        <table class="table align-middle table-row-dashed table-mobile fs-6 gy-5">
                            <thead>
                                <tr class="text-start text-gray-400 fw-bolder fs-7 gs-0">
                                    <th>#</th>
                                    <th>Descripcion</th>
                                    <th>Monto</th>
                                    <th>Opciones</th>
                                </tr>
                            </thead>

                            <tbody class="fw-bold text-gray-600">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div> --}}
            <div class="card-body">
              <div class="row">
                  {{-- <div class="col">
                      <div class="row">
                          <form id="exportForm" action="{{ url('admin/egresos/export-excel') }}" method="GET">
                              <div class="row">
                                  <input type="hidden" name="buscar" id="buscar">
                                  <div class="col-md-6 mb-3">
                                      <div class="input-group mt-5">
                                          <input type="date" class="form-control" name="fecha_inicio" id="from_date"
                                              value="{{ $dateInit }}" />
                                          <span class="input-group-text">hasta</span>
                                          <input type="date" class="form-control" name="fecha_fin" id="to_date"
                                              value="{{ $dateEnd }}"/>
                                      </div>
                                  </div>
                              </div>
                          </form>
                      </div>

                  </div> --}}
                  {{-- <div class="col-auto">
                      <!-- Colocar aquí el buscador -->
                      <div class="d-flex align-items-center position-relative" style="margin-top: -8px">
                          <span class="svg-icon svg-icon-1 position-absolute ms-4">
                              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                  <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="currentColor"></rect>
                                  <path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="currentColor"></path>
                              </svg>
                          </span>
                          <input id="buscador" name="buscador" type="text" class="form-control form-control-solid w-250px ps-14" placeholder="Buscar usuario">
                      </div>
                  </div> --}}
              </div>
              <div class="mt-7" id="table">
                  @include('admin.income.table')
              </div>
          </div>
        </div>
    </div>
    {{-- <div class="create main_proveedores" style="display: none">
        @include('admin.proveedores.create')
    </div>
    <div class="update main_proveedores" style="display: none">
        @include('admin.proveedores.edit')
    </div> --}}
@endsection

@section('modals')
    @include('admin.income.modal.create')
    @include('admin.income.modal.edit')
@endsection

@push('scripts')
    <script>
      let income_id = 0;
        $(document).ready(function(){
            $('#incomeForm').submit(function(e) {
                e.preventDefault();
                let form = document.getElementById('incomeForm');
                if (!form.checkValidity()) {
                    form.reportValidity();
                    return;
                }
                let formData = new FormData(form);
                $.ajax({
                    url: "{{ url('admin/incomes/store') }}",
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        console.log(response);
                        if (response.codigo == 0) {
                            //successfull(response.mensaje);
                            Toast.fire({
                                icon: 'success',
                                title: response.mensaje,
                            });
                            $('#table').html(response.data);
                            $('#modalCreateIngreso').modal('hide');
                            form.reset();
                        } else {
                            console.log(error);
                            //swalError(response.mensaje);
                            Toast.fire({
                                icon: 'error',
                                title: response.mensaje,
                            });
                        }
                    },
                    error: function(error) {
                        console.log(error);
                        //swalError('Ocurrió un error al editar el ciudad');
                        Toast.fire({
                            icon: 'error',
                            title: 'Ocurrió un error al editar el ciudad',
                        });
                    }
                });
            });
            $('#incomeFormEdit').submit(function(e) {
                e.preventDefault();
                let form = document.getElementById('incomeFormEdit');
                if (!form.checkValidity()) {
                    form.reportValidity();
                    return;
                }
                let formData = new FormData(form);
                $.ajax({
                    url: "{{ url('admin/incomes/update') }}/" + income_id,
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        console.log(response);
                        if (response.codigo == 0) {
                            //successfull(response.mensaje);
                            Toast.fire({
                                icon: 'success',
                                title: response.mensaje,
                            });
                            $('#table').html(response.data);
                            $('#modalEditIngreso').modal('hide');
                            form.reset();
                        } else {
                            console.log(error);
                            //swalError(response.mensaje);
                            Toast.fire({
                                icon: 'error',
                                title: response.mensaje,
                            });
                        }
                    },
                    error: function(error) {
                        console.log(error);
                        //swalError('Ocurrió un error al editar el ciudad');
                        Toast.fire({
                            icon: 'error',
                            title: 'Ocurrió un error al editar el ciudad',
                        });
                    }
                });
            });
        });
        function modalCreateIngreso(){
            $('#modalCreateIngreso').modal('show');
        }
        function editIncome(id, descripcion, monto) {
            income_id =  id;
            $('#incomeFormEdit input[name="monto"]').val(monto);
            $('#incomeFormEdit textarea[name="descripcion"').val(descripcion);
            $('#modalEditIngreso').modal('show');
        }
        function deleteIncome(id, descripcion) {
            confirmar(function() {
                $.ajax({
                    url: "{{ url('admin/incomes/destroy') }}/" + id, // URL a la que se enviarán los datos
                    type: 'POST',
                    data: {
                        _token: "{{ csrf_token() }}",
                    },
                    success: function(response) {
                        console.log(response);
                        if (response.codigo == 0) {
                            successfull(response.mensaje);
                            $('#table').html(response.data);
                        } else {
                            console.log(error);
                            swalError(response.mensaje);
                        }
                    },
                    error: function(error) {
                        console.log(error);
                        swalError('Ocurrió un error al eliminar el condominio');
                    }
                });
            }, ``, `Estas seguro de Eliminar el ingreso:<br> ${descripcion} ?`);
        }
    </script>
@endpush