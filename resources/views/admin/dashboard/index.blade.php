@extends('admin.layouts.app')

@section('styles')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.36.3/apexcharts.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
@endsection

@section('toolbar')
<!--begin::Toolbar-->
<div class="toolbar" id="kt_toolbar">
    <!--begin::Container-->
    <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
        <!--begin::Page title-->
        <div data-kt-swapper="true" data-kt-swapper-mode="prepend"
            data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
            class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
            <!--begin::Title-->
            <h1 class="d-flex text-dark fw-bolder fs-3 align-items-center my-1">Dashboard</h1>
            {{-- <!--end::Title-->
            <!--begin::Separator-->
            <span class="h-20px border-gray-300 border-start mx-4"></span>
            <!--end::Separator-->
            <!--begin::Breadcrumb-->
            <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
                <!--begin::Item-->
                <li class="breadcrumb-item text-muted">
                    <a href="../../demo1/dist/index.html"
                        class="text-muted text-hover-primary">Home</a>
                </li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item">
                    <span class="bullet bg-gray-300 w-5px h-2px"></span>
                </li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item text-muted">Utilities</li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item">
                    <span class="bullet bg-gray-300 w-5px h-2px"></span>
                </li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item text-muted">Modals</li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item">
                    <span class="bullet bg-gray-300 w-5px h-2px"></span>
                </li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item text-muted">General</li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item">
                    <span class="bullet bg-gray-300 w-5px h-2px"></span>
                </li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item text-dark">Invite Friends</li>
                <!--end::Item-->
            </ul>
            <!--end::Breadcrumb--> --}}
        </div>
        <!--end::Page title-->
        <!--begin::Actions-->
        <div class="d-flex align-items-center gap-2 gap-lg-3">
            <!--begin::Filter menu-->
            {{-- <div class="m-0">
                <!--begin::Menu toggle-->
                <a href="#"
                    class="btn btn-sm btn-flex btn-light btn-active-primary fw-bolder"
                    data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                    <!--begin::Svg Icon | path: icons/duotune/general/gen031.svg-->
                    <span class="svg-icon svg-icon-5 svg-icon-gray-500 me-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none">
                            <path
                                d="M19.0759 3H4.72777C3.95892 3 3.47768 3.83148 3.86067 4.49814L8.56967 12.6949C9.17923 13.7559 9.5 14.9582 9.5 16.1819V19.5072C9.5 20.2189 10.2223 20.7028 10.8805 20.432L13.8805 19.1977C14.2553 19.0435 14.5 18.6783 14.5 18.273V13.8372C14.5 12.8089 14.8171 11.8056 15.408 10.964L19.8943 4.57465C20.3596 3.912 19.8856 3 19.0759 3Z"
                                fill="currentColor" />
                        </svg>
                    </span>
                    <!--end::Svg Icon-->Filter
                </a>
                <!--end::Menu toggle-->
                <!--begin::Menu 1-->
                <div class="menu menu-sub menu-sub-dropdown w-250px w-md-300px"
                    data-kt-menu="true" id="kt_menu_6244761e325a6">
                    <!--begin::Header-->
                    <div class="px-7 py-5">
                        <div class="fs-5 text-dark fw-bolder">Filter Options</div>
                    </div>
                    <!--end::Header-->
                    <!--begin::Menu separator-->
                    <div class="separator border-gray-200"></div>
                    <!--end::Menu separator-->
                    <!--begin::Form-->
                    <div class="px-7 py-5">
                        <!--begin::Input group-->
                        <div class="mb-10">
                            <!--begin::Label-->
                            <label class="form-label fw-bold">Status:</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <div>
                                <select class="form-select form-select-solid"
                                    data-kt-select2="true" data-placeholder="Select option"
                                    data-dropdown-parent="#kt_menu_6244761e325a6"
                                    data-allow-clear="true">
                                    <option></option>
                                    <option value="1">Approved</option>
                                    <option value="2">Pending</option>
                                    <option value="2">In Process</option>
                                    <option value="2">Rejected</option>
                                </select>
                            </div>
                            <!--end::Input-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="mb-10">
                            <!--begin::Label-->
                            <label class="form-label fw-bold">Member Type:</label>
                            <!--end::Label-->
                            <!--begin::Options-->
                            <div class="d-flex">
                                <!--begin::Options-->
                                <label
                                    class="form-check form-check-sm form-check-custom form-check-solid me-5">
                                    <input class="form-check-input" type="checkbox"
                                        value="1" />
                                    <span class="form-check-label">Author</span>
                                </label>
                                <!--end::Options-->
                                <!--begin::Options-->
                                <label
                                    class="form-check form-check-sm form-check-custom form-check-solid">
                                    <input class="form-check-input" type="checkbox"
                                        value="2" checked="checked" />
                                    <span class="form-check-label">Customer</span>
                                </label>
                                <!--end::Options-->
                            </div>
                            <!--end::Options-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="mb-10">
                            <!--begin::Label-->
                            <label class="form-label fw-bold">Notifications:</label>
                            <!--end::Label-->
                            <!--begin::Switch-->
                            <div
                                class="form-check form-switch form-switch-sm form-check-custom form-check-solid">
                                <input class="form-check-input" type="checkbox" value=""
                                    name="notifications" checked="checked" />
                                <label class="form-check-label">Enabled</label>
                            </div>
                            <!--end::Switch-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Actions-->
                        <div class="d-flex justify-content-end">
                            <button type="reset"
                                class="btn btn-sm btn-light btn-active-light-primary me-2"
                                data-kt-menu-dismiss="true">Reset</button>
                            <button type="submit" class="btn btn-sm btn-primary"
                                data-kt-menu-dismiss="true">Apply</button>
                        </div>
                        <!--end::Actions-->
                    </div>
                    <!--end::Form-->
                </div>
                <!--end::Menu 1-->
            </div> --}}
            <!--end::Filter menu-->
            <!--begin::Secondary button-->
            <!--end::Secondary button-->
            <!--begin::Primary button-->
            {{-- <a href="../../demo1/dist/.html" class="btn btn-sm btn-primary"
                data-bs-toggle="modal" data-bs-target="#kt_modal_create_app">Create</a> --}}
            <!--end::Primary button-->
        </div>
        <!--end::Actions-->
    </div>
    <!--end::Container-->
</div>
<!--end::Toolbar-->
@endsection

@section('content')
    <!--begin::Row-->
    {{-- <div class="row gy-5 g-xl-8" style="margin-bottom: 20px">
        <!--begin::Col-->
        <div class="col-xl-12">
            <!--begin::Mixed Widget 2-->
            <div class="card card-xl-stretch" style=" min-height: 450px; color: #000">
                <!--begin::Header-->
                <div class="card-header border-0  py-5">
                    <h3 class="card-title fw-bolder"><i class="fa-solid fa-suitcase" style="margin-right: 10px; color: #000;"></i> Ingresos y egresos</h3>
                </div>
                <!--end::Header-->
                <!--begin::Body-->
                <div class="card-body p-0 d-flex justify-content-center align-items-center text-center">
                        <div id="chartIngresosEgresos" style="height: 350px; width: 90%"></div>
                    <!--end::Chart-->
                </div>

                <!--end::Body-->
            </div>
            <!--end::Mixed Widget 2-->
        </div>
    </div> --}}
    <div class="row gy-5 g-xl-8" style="margin-bottom: 20px">
    <!-- Card Ingresos -->
    <div class="col-xl-3">
        <div class="card card-xl-stretch" style="min-height: 150px; color: #000; background-color: #f0f8ff">
            <div class="card-header border-0 py-3">
                <h3 class="card-title fw-bolder">
                    <i class="fa-solid fa-arrow-down" style="margin-right: 10px; color: #008FFB;"></i> Ingresos
                </h3>
            </div>
            <div class="card-body d-flex flex-column justify-content-center">
                <span class="fs-2x fw-bolder text-primary" id="totalIngresos">Bs 0.00</span>
                <span class="text-muted mt-2">Total acumulado mes</span>
            </div>
        </div>
    </div>

    <!-- Card Egresos -->
    <div class="col-xl-3">
        <div class="card card-xl-stretch" style="min-height: 150px; color: #000; background-color: #fff0f0">
            <div class="card-header border-0 py-3">
                <h3 class="card-title fw-bolder">
                    <i class="fa-solid fa-arrow-up" style="margin-right: 10px; color: #FF4560;"></i> Egresos
                </h3>
            </div>
            <div class="card-body d-flex flex-column justify-content-center">
                <span class="fs-2x fw-bolder text-danger" id="totalEgresos">Bs 0.00</span>
                <span class="text-muted mt-2">Total acumulado mes</span>
            </div>
        </div>
    </div>

    <!-- Card Prestamo -->
    <div class="col-xl-3">
        <div class="card card-xl-stretch" style="min-height: 150px; color: #000; background-color: #e2f7f8">
            <div class="card-header border-0 py-3">
                <h3 class="card-title fw-bolder">
                    <i class="fa-solid fa-arrow-up" style="margin-right: 10px; color: #0db1ba;"></i> Prestamo
                </h3>
            </div>
            <div class="card-body d-flex flex-column justify-content-center">
                <span class="fs-2x fw-bolder text-danger" id="totalPrestamos">Bs 0.00</span>
                <span class="text-muted mt-2">Total prestado mes</span>
            </div>
        </div>
    </div>

    <!-- Card Monto Total -->
    <div class="col-xl-3">
        <div class="card card-xl-stretch" style="min-height: 150px; color: #000; background-color: #f0fff0">
            <div class="card-header border-0 py-3">
                <h3 class="card-title fw-bolder">
                    <i class="fa-solid fa-wallet" style="margin-right: 10px; color: #00E396;"></i> Saldo Actual
                </h3>
            </div>
            <div class="card-body d-flex flex-column justify-content-center">
                <span class="fs-2x fw-bolder text-success" id="montoTotal">Bs 0.00</span>
                <span class="text-muted mt-2">Balance disponible</span>
            </div>
        </div>
    </div>
</div>

<!-- Gráfico debajo de las cards -->
<div class="row gy-5 g-xl-8" style="margin-bottom: 20px">
    <div class="col-xl-12">
        <div class="card card-xl-stretch" style="min-height: 450px; color: #000">
            <div class="card-header border-0 py-5">
                <h3 class="card-title fw-bolder">
                    <i class="fa-solid fa-suitcase" style="margin-right: 10px; color: #000;"></i> 
                    Ingresos y egresos por mes
                </h3>
            </div>
            <div class="card-body p-0 d-flex justify-content-center align-items-center text-center">
                <div id="chartIngresosEgresos" style="height: 350px; width: 90%"></div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('modals')
@endsection

@push('scripts')
    <script>
        let chartIngresosEgresos;
        let chart;
        $(document).ready(function(){
            consultarGraficas();
            // showGraficaIngresosEgresos(50,20);
        });
        function consultarGraficas(){
            mostrarLoading();
            $.ajax({
                type: "GET",
                url: "{{ url('admin/consultar-graficas-dashboard') }}",//error
                data: {},
                dataType: 'json',
                async: true,
                processData: false,
                contentType: false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (response) {
                    if(response.codigo == 0) {
                        console.log(response);
                        ocultarLoading();
                        showGraficaIngresosEgresos(response.data);
                        $('#totalIngresos').text("Bs " + response.data.montoIngresoActual);
                        $('#totalEgresos').text("Bs " + response.data.montoEgresoActual);
                        $('#montoTotal').text("Bs " + response.data.montoTotalAcumulado);
                        $('#totalPrestamos').text("Bs " + response.data.montoPrestamoActual);
                    }
                },
                error: function (response) {
                    Toast.fire({
                        icon: 'error',
                        title: 'Ocurrió un error',
                    });
                },
                complete: function() {
                    ocultarLoading();
                } 
            });
        }
        // function showGraficaIngresosEgresos(dataResponse) {
        //     // Extraer los arrays de ingresos y egresos del objeto de respuesta
        //     const ingresos = dataResponse.ingresos;
        //     const egresos = dataResponse.egresos;
            
        //     // Convertir números de mes a nombres de mes
        //     const meses = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];

        //     // Obtener todos los meses únicos presentes en los datos
        //     const todosMeses = [...new Set([
        //         ...ingresos.map(item => item.mes),
        //         ...egresos.map(item => item.mes)
        //     ])].sort((a, b) => a - b);

        //     // Crear arrays ordenados de datos para cada mes
        //     const categorias = todosMeses.map(mes => meses[mes - 1]);
        //     const datosIngresos = todosMeses.map(mes => {
        //         const item = ingresos.find(i => i.mes === mes);
        //         return item ? item.total : 0;
        //     });
        //     const datosEgresos = todosMeses.map(mes => {
        //         const item = egresos.find(i => i.mes === mes);
        //         return item ? item.total : 0;
        //     });

        //     console.log(categorias, datosIngresos, datosEgresos);

        //     var options = {
        //         series: [
        //             {
        //                 name: 'Ingresos',
        //                 data: datosIngresos
        //             },
        //             {
        //                 name: 'Egresos',
        //                 data: datosEgresos
        //             }
        //         ],
        //         chart: {
        //             type: 'line',
        //             height: 350
        //         },
        //         stroke: {
        //             width: 2,
        //             curve: 'smooth'
        //         },
        //         xaxis: {
        //             categories: categorias
        //         },
        //         yaxis: {
        //             labels: {
        //                 formatter: (val) => val / 1000 + 'K'
        //             }
        //         },
        //         colors: ['#008FFB', '#FF4560'],
        //         legend: {
        //             position: 'top',
        //             horizontalAlign: 'left'
        //         }
        //     };

        //     if (chart) {
        //         chart.destroy();
        //     }

        //     chart = new ApexCharts(document.querySelector("#chartIngresosEgresos"), options);
        //     chart.render();
        // }
        function showGraficaIngresosEgresos(dataResponse) {
    // Extraer los arrays de ingresos, egresos y préstamos
    const ingresos = dataResponse.ingresos;
    const egresos = dataResponse.egresos;
    const prestamos = dataResponse.prestamos;
    
    // Convertir números de mes a nombres de mes
    const meses = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];

    // Obtener todos los meses únicos presentes en los datos (sin ordenarlos)
    const todosMeses = [...new Set([
        ...ingresos.map(item => item.mes),
        ...egresos.map(item => item.mes),
        ...prestamos.map(item => item.mes)
    ])];

    // Crear arrays de datos para cada mes
    const categorias = todosMeses.map(mes => meses[mes - 1]);
    const datosIngresos = todosMeses.map(mes => {
        const item = ingresos.find(i => i.mes === mes);
        return item ? item.total : 0;
    });
    const datosEgresos = todosMeses.map(mes => {
        const item = egresos.find(i => i.mes === mes);
        return item ? item.total : 0;
    });
    const datosPrestamos = todosMeses.map(mes => {
        const item = prestamos.find(i => i.mes === mes);
        return item ? item.total : 0;
    });

    console.log(categorias, datosIngresos, datosEgresos, datosPrestamos);

    var options = {
        series: [
            {
                name: 'Ingresos',
                data: datosIngresos
            },
            {
                name: 'Egresos',
                data: datosEgresos
            },
            {
                name: 'Préstamos',
                data: datosPrestamos
            }
        ],
        chart: {
            type: 'line',
            height: 350
        },
        stroke: {
            width: 2,
            curve: 'smooth'
        },
        xaxis: {
            categories: categorias
        },
        yaxis: {
            labels: {
                // formatter: (val) => val 
            }
        },
        colors: ['#008FFB', '#FF4560', '#00E396'], // Azul, Rojo, Verde
        legend: {
            position: 'top',
            horizontalAlign: 'left'
        }
    };

    if (chart) {
        chart.destroy();
    }

    chart = new ApexCharts(document.querySelector("#chartIngresosEgresos"), options);
    chart.render();
}

    </script>
@endpush
