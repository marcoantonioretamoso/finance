<!--begin::Aside-->
<div id="kt_aside" class="aside aside-dark aside-hoverable" data-kt-drawer="true" data-kt-drawer-name="aside"
    data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true"
    data-kt-drawer-width="{default:'200px', '300px': '250px'}" data-kt-drawer-direction="start"
    data-kt-drawer-toggle="#kt_aside_mobile_toggle">
    <!--begin::Brand-->
    <div class="aside-logo flex-column-auto " id="kt_aside_logo">
        <!--begin::Logo-->
        <div class="aside-logo flex-column-auto d-flex align-items-center justify-content-center">
            <a href="{{route('index')}}" class="d-flex justify-content-center">
                {{-- @if ($configuracion->logotipo!="")
                    <img alt="Logo" src="{{$configuracion->logotipo}}"class="h-50px logo" />                    
                @else --}}
                    <img alt="Logo" src="/metronic8/demo1/assets/media/logos/default-dark.svg" width="80px" class="h-25px logo" /> 
                {{-- @endif --}}
            </a>
        </div>
        <!--end::Logo-->
        <!--begin::Aside toggler-->
        <div id="kt_aside_toggle" class="btn btn-icon w-auto px-0 btn-active-color-primary aside-toggle"
            data-kt-toggle="true" data-kt-toggle-state="active" data-kt-toggle-target="body"
            data-kt-toggle-name="aside-minimize">
            <!--begin::Svg Icon | path: icons/duotune/arrows/arr079.svg-->
            <span class="svg-icon svg-icon-1 rotate-180">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                    fill="none">
                    <path opacity="0.5"
                        d="M14.2657 11.4343L18.45 7.25C18.8642 6.83579 18.8642 6.16421 18.45 5.75C18.0358 5.33579 17.3642 5.33579 16.95 5.75L11.4071 11.2929C11.0166 11.6834 11.0166 12.3166 11.4071 12.7071L16.95 18.25C17.3642 18.6642 18.0358 18.6642 18.45 18.25C18.8642 17.8358 18.8642 17.1642 18.45 16.75L14.2657 12.5657C13.9533 12.2533 13.9533 11.7467 14.2657 11.4343Z"
                        fill="currentColor" />
                    <path
                        d="M8.2657 11.4343L12.45 7.25C12.8642 6.83579 12.8642 6.16421 12.45 5.75C12.0358 5.33579 11.3642 5.33579 10.95 5.75L5.40712 11.2929C5.01659 11.6834 5.01659 12.3166 5.40712 12.7071L10.95 18.25C11.3642 18.6642 12.0358 18.6642 12.45 18.25C12.8642 17.8358 12.8642 17.1642 12.45 16.75L8.2657 12.5657C7.95328 12.2533 7.95328 11.7467 8.2657 11.4343Z"
                        fill="currentColor" />
                </svg>
            </span>
            <!--end::Svg Icon-->
        </div>
        <!--end::Aside toggler-->
    </div>
    <!--end::Brand-->
    <!--begin::Aside menu-->
    <div class="aside-menu flex-column-fluid">
        <!--begin::Aside Menu-->
        <div class="hover-scroll-overlay-y my-5 my-lg-5" id="kt_aside_menu_wrapper" data-kt-scroll="true"
            data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-height="auto"
            data-kt-scroll-dependencies="#kt_aside_logo, #kt_aside_footer" data-kt-scroll-wrappers="#kt_aside_menu"
            data-kt-scroll-offset="0">
            <!--begin::Menu-->
            <div class="menu menu-column menu-title-gray-800 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-500"
                id="#kt_aside_menu" data-kt-menu="true" data-kt-menu-expand="false">
                {{-- <div data-kt-menu-trigger="click" class="menu-item  menu-accordion mb-1">
                    <span class="menu-link">
                        <span class="menu-icon">
                            <i class="fas fa-briefcase"></i>
                            <!--end::Svg Icon-->
                        </span>
                        <span class="menu-title">Gestión Administrativa</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <div class="menu-sub menu-sub-accordion">
                        @can('listar condominios')
                            <div class="menu-item">
                                <a class="menu-link {{ Request::is('admin/condominios') || Request::is('admin/condominios/*') ? 'active' : '' }}"
                                    href="{{ route('index.condominio') }}">
                                    <span class="menu-icon">
                                        <i class="fa-solid fa-building"></i>
                                    </span>
                                    <span class="menu-title">Condominios</span>
                                </a>
                            </div>
                        @endcan
                        @can('ver unidades')
                            <div class="menu-item">
                            <a class="menu-link {{ Request::is('admin/unidades') || Request::is('admin/unidad/*') ? 'active' : '' }}"
                                href="{{ route('unidades.index') }}">
                                <span class="menu-icon">
                                    <i class="fa-solid fa-house-chimney"></i>
                                </span>
                                <span class="menu-title"> Unidades</span>
                            </a>
                        </div>
                        @endcan
                        
                        @can('listar contactos')
                            <div class="menu-item">
                                <a class="menu-link {{ Request::is('admin/contactos') || Request::is('admin/contactos/*') ? 'active' : '' }}"
                                    href="{{ route('index.contacto') }}">
                                    <div class="menu-icon">
                                        <i class="fa-solid fa-address-book"></i>
                                    </div>
                                    <span class="menu-title">Contactos</span>
                                </a>
                            </div>
                        @endcan

                        @can('listar proveedores')
                            <div class="menu-item">
                                <a class="menu-link {{ Request::is('admin/proveedores') || Request::is('admin/proveedores/*') ? 'active' : '' }}"
                                    href="{{ route('proveedores.index') }}">
                                    <span class="menu-icon">
                                        <i class="fa-solid fa-users-rectangle"></i>
                                    </span>
                                    <span class="menu-title">Proveedores</span>
                                </a>
                            </div>
                        @endcan
                        <div class="menu-item">
                            <a class="menu-link {{ Request::is('admin/ciudades') || Request::is('admin/ciudad/*') ? 'active' : '' }}"
                                href="{{ route('ciudades.index') }}">
                                <span class="menu-icon">
                                    <i class="fa-solid fa-city"></i>
                                </span>
                                <span class="menu-title"> Ciudades</span>
                            </a>
                        </div>

                        @can('listar directivos')
                            <div class="menu-item">
                                <a class="menu-link {{ Request::is('admin/directivo') || Request::is('admin/directivo/*') ? 'active' : '' }}"
                                    href="{{ route('directivo.index') }}">
                                    <span class="menu-icon">
                                        <i class="fa-solid fa-user-tie"></i>
                                    </span>
                                    <span class="menu-title"> Directivos</span>
                                </a>
                            </div>
                        @endcan

                        @can('listar documentos')
                            <div class="menu-item">
                                <a class="menu-link {{ Request::is('admin/documento') || Request::is('admin/documento/*') ? 'active' : '' }}"
                                    href="{{ route('documento.index') }}">
                                    <span class="menu-icon">
                                        <i class="fa-regular fa-folder-open"></i>
                                    </span>
                                    <span class="menu-title"> Documento</span>
                                </a>
                            </div>
                        @endcan
                    </div>
                </div> --}}


                <!--envio notificacion-->
                {{-- <div data-kt-menu-trigger="click" class="menu-item  menu-accordion mb-1">
                    <span class="menu-link">
                        <span class="menu-icon">
                            <i class="fas fa-bell"></i>
                            <!--end::Svg Icon-->
                        </span>
                        <span class="menu-title">Notificaciones</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <div class="menu-sub menu-sub-accordion">
                        <div class="menu-item">
                            @can('listar notificaciones por whatsapp')
                                <a class="menu-link {{ Request::is('admin/notificaciones/whatsapp') || Request::is('admin/notificaciones/whatsapp*') ? 'active' : '' }}"
                                    href="{{route('notificacion.whatsapp.index')}}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Notificaciones por WhatsApp</span>
                                </a>
                            @endcan
                        </div>
                    </div>
                </div> --}}

                    <div class="menu-item">
                        <a class="menu-link {{ Str::is(['admin/incomes'], request()->path()) ? 'active' : '' }}"
                            href="{{route('incomes.index')}}">
                            <span class="menu-icon">
                                <i class="far fa-money-bill-alt"></i>
                            </span>
                            <span class="menu-title">Ingresos</span>
                        </a>
                    </div>
                {{-- @endcan
                @can('listar egresos') --}}
                    <div class="menu-item">
                        <a class="menu-link {{ Str::is(['admin/expenses'], request()->path()) ? 'active' : '' }}"
                            href="{{route('expenses.index')}}">
                            <span class="menu-icon">
                                <i class="fas fa-hand-holding-usd"></i>
                            </span>
                            <span class="menu-title">Egresos</span>
                        </a>
                    </div>
                    <div class="menu-item">
                        <a class="menu-link {{ Str::is(['admin/loans'], request()->path()) ? 'active' : '' }}"
                            href="{{route('loans.index')}}">
                            <span class="menu-icon">
                                <i class="fas fa-hand-holding-usd"></i>
                            </span>
                            <span class="menu-title">Prestamos</span>
                        </a>
                    </div>
                {{-- @endcan --}}
                
                {{-- <div data-kt-menu-trigger="click" class="menu-item  menu-accordion mb-1">
                    <span class="menu-link">
                        <span class="menu-icon">
                            <i class="fas fa-cog"></i>
                            <!--end::Svg Icon-->
                        </span>
                        <span class="menu-title">Reportes</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <div class="menu-sub menu-sub-accordion">
                            <div class="menu-item">
                                <a class="menu-link {{ Request::is('admin/reporte/consolidado/') || Request::is('admin/reporte/consolidado/*') ? 'active' : '' }}"
                                    href="{{ route('reporte.consolidado') }}">
                                    <span class="menu-icon">
                                        <i class="fas fa-id-card"></i>
                                    </span>
                                    <span class="menu-title">Reporte consolidado del Condominio</span>
                                </a>
                            </div>
                            <div class="menu-item">
                                <a class="menu-link {{ Request::is('admin/reporte/ingresos-egresos') || Request::is('admin/reporte/ingresos-egresos/*') ? 'active' : '' }}"
                                    href="{{ route('reporte.ingresos-egresos') }}">
                                    <span class="menu-icon">
                                        <i class="fas fa-id-card"></i>
                                    </span>
                                    <span class="menu-title">Reporte de ingresos y egresos</span>
                                </a>
                            </div>
                    </div>
                </div> --}}

                {{-- @role('Super-Admin')
                    <div data-kt-menu-trigger="click" class="menu-item  menu-accordion mb-1">
                        <span class="menu-link">
                            <span class="menu-icon">
                                <i class="fas fa-user-cog"></i>
                                <!--end::Svg Icon-->
                            </span>
                            <span class="menu-title">Gestión de usuarios</span>
                            <span class="menu-arrow"></span>
                        </span>
                        <div class="menu-sub menu-sub-accordion">
                            <div class="menu-item">
                                <a class="menu-link {{ Str::is(['admin/usuarios'], request()->path()) ? 'active' : '' }}"
                                    href="{{ url('admin/usuarios') }}">
                                    <span class="menu-icon">
                                        <i class="fa-solid fa-user"></i>
                                    </span>
                                    <span class="menu-title">Usuarios</span>
                                </a>
                            </div>
                            <div class="menu-item">
                                <a class="menu-link {{ Str::is(['admin/roles'], request()->path()) ? 'active' : '' }}"
                                    href="{{ url('admin/roles') }}">
                                    <span class="menu-icon">
                                        <i class="fas fa-user-tag"></i>
                                    </span>
                                    <span class="menu-title">Roles</span>
                                </a>
                            </div>
                        </div>
                    </div>
                @endrole --}}
            </div>
            <!--end::Menu-->
        </div>
        <!--end::Aside Menu-->
    </div>
    
</div>
<!--end::Aside-->
