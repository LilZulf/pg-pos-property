<div class="page-title-box d-sm-flex align-items-center justify-content-between bg-galaxy-transparent">
    <h4 class="mb-sm-0">{{ $page }}</h4>

    <div class="page-title-right">
        <ol class="breadcrumb m-0">
            @foreach ($links as $key => $link)
                @if ($loop->last)
                    <li class="breadcrumb-item active" aria-current="page">{{ $link['name'] }}</li>
                @else
                    <li class="breadcrumb-item"><a href="{{ $link['url'] }}">{{ $link['name'] }}</a></li>
                @endif
            @endforeach
            {{-- <li class="breadcrumb-item"><a href="javascript: void(0);">Transaction</a></li>
            <li class="breadcrumb-item active">Starter</li> --}}
        </ol>
    </div>

</div>
