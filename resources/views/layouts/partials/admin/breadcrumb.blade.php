<!--breadcrumb-->
@if ( count($breadcrumbs) )
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-4">
        {{-- <div class="breadcrumb-title pe-3">eCommerce</div> --}}
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="bx bx-home-alt"></i></a>
                    </li>

                    @foreach ($breadcrumbs as $item)
                        <li class="breadcrumb-item active" aria-current="page">
                            @isset($item['route'])
                                <a href="{{ $item['route'] }}" class="opacity-50"> {{ $item['name'] }} </a>
                            @else
                                {{ $item['name'] }}
                            @endisset
                        </li>
                    @endforeach

                </ol>
            </nav>
        </div>
    </div>   
@endif
<!--end breadcrumb-->