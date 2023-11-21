{{-- Generar links dinámicamente --}}
@php
    $links = [
        'Dashboard' => [
            'icon' => 'bi bi-house-door',
            'sublink1' => [
                'name' => 'Inicio',
                'route' => route('admin.dashboard'),
                'active' => request()->routeIs('admin.dashboard'),
            ],
            'sublink2' => [
                'name' => 'Analíticas',
                'route' => 'admin.analytics',
                'active' => request()->routeIs('admin.analytics'),
            ],
        ],
        'Aplicación' => [
            'icon' => 'bi bi-grid',
            'sublink1' => [
                'name' => 'Familias',
                'route' => route('admin.families.index'),
                'active' => request()->routeIs('admin.families.*'),
            ],
            'sublink2' => [
                'name' => 'Productos',
                'route' => 'admin.products',
                'active' => request()->routeIs('admin.products'),
            ],
            'sublink3' => [
                'name' => 'Categorías',
                'route' => 'admin.categories',
                'active' => request()->routeIs('admin.categories'),
            ],
        ],

    ];
@endphp

<aside class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div>
            <img src="{{ asset('assets/admin/assets/images/logo-icon.png') }}" class="logo-icon" alt="logo icon">
        </div>
        <div>
            <h4 class="logo-text">Skodash</h4>
        </div>
        <div class="toggle-icon ms-auto"><i class="bi bi-chevron-double-left"></i>
        </div>
    </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">
        @foreach ($links as $link => $sublinks )
            <li>
                <a href="javascript:;" class="has-arrow">
                    <div class="parent-icon">
                        <i class="{{ $sublinks['icon'] }}"></i>
                    </div>
                    <div class="menu-title">{{ $link  }}</div>
                </a>
                <ul>
                    @foreach ($sublinks as $sublink => $value)
                        @if (is_array($value))
                            <li> <a href="{{ $value['route'] }}"><i class="bi bi-arrow-right-short"></i>{{ $value['name'] }}</a>
                            </li>
                        @endif
                    @endforeach
                </ul>
            </li>
        @endforeach
        <li class="menu-label">© 2023 All Rights Reserved</li>
    </ul>
    <!--end navigation-->
</aside>