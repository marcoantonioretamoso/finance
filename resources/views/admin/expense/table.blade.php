<div id="resultadoBusqueda" class="table-responsive">
    <!--begin::Table-->
    <div id="kt_subscription_products_table_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
        <div class="table-responsive">
            <table class="table align-middle table-row-dashed fs-6 fw-bold gy-4 dataTable no-footer"
                id="kt_subscription_products_table">
                <!--begin::Table head-->
                <thead>
                    <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                        <th>#</th>
                        <th >Descripcion</th>
                        <th >Monto</th>
                        <th >Fecha</th>
                        <th class="text-end">Opciones</th>
                    </tr>
                </thead>
                <!--end::Table head-->
                <!--begin::Table body-->
                <tbody class="text-gray-600 fs-7">
                    @forelse ($expenses as $expense)
                        <tr class="odd">
                            <td>{{ $expense->id }}</td>
                            <td>{{ $expense->description }}</td>
                            <td>{{ $expense->amount }}</td>
                            <td>{{ \Carbon\Carbon::parse($expense->created_at)->translatedFormat('l d/m/Y') }}</td>
                            <td class="text-end">
                                    <a onclick="editExpenses(`{{ $expense->id }}`, `{{ $expense->description }}`, `{{ $expense->amount }}`)"class="btn btn-icon btn-flex btn-active-light-primary w-30px h-30px me-3"
                                        data-bs-toggle="tooltip" title="" data-kt-action="product_remove"
                                        data-bs-original-title="Mostrar">
                                        <i class="fa-solid fa-pen"></i>
                                    </a>
                                    <a onclick="deleteExpense(`{{ $expense->id }}`, `{{ $expense->description }}`)"
                                        class="btn btn-icon btn-flex btn-active-light-primary w-30px h-30px me-3"
                                        data-bs-toggle="tooltip" title="" data-kt-action="product_remove"
                                        data-bs-original-title="Eliminar">
                                        <!--begin::Svg Icon | path: icons/duotune/general/gen027.svg-->
                                        <span class="svg-icon svg-icon-3">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none">
                                                <path
                                                    d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z"
                                                    fill="currentColor"></path>
                                                <path opacity="0.5"
                                                    d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z"
                                                    fill="currentColor"></path>
                                                <path opacity="0.5"
                                                    d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z"
                                                    fill="currentColor"></path>
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                    </a>
                                <!--end::Delete-->
                            </td>
                        </tr>
                    @empty
                        <tr class="odd">
                            <td colspan="7"> No se encontraron ingresos</td>
                        </tr>
                    @endforelse
                </tbody>
                <!--end::Table body-->
            </table>
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start">
            </div>
            <div class="col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end">
            </div>
        </div>
    </div>
    <!--end::Table-->

    {{ $expenses->links() }}
</div>
