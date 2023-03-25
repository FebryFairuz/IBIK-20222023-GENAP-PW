@extends('clone_tokped.templates.template_index')

@section('content')
    {{-- <h1>{{ $name }}</h1>
<h2>{{ $npm }}</h2> --}}

    {{-- <h1>Show on array</h1>
<h2>NPM: {{ $data['npm'] }}</h2>
<h2>Name: {{ $data['name'] }}</h2> --}}

    {{-- <pre>
    {{ var_dump($data) }}
</pre>

<h1>Loop Array</h1>
<ol>
@foreach ($data as $index => $value)
    <li>NPM :{{ $value['npm'] }}</li>
@endforeach
</ol> --}}

    <div id="carouselExample" class="carousel slide">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="https://images.tokopedia.net/img/cache/1208/NsjrJu/2023/3/21/622b5184-d338-4c3b-b28e-02cad3cc4b65.jpg.webp?ect=4g"
                    class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="https://images.tokopedia.net/img/cache/1208/NsjrJu/2023/2/28/9e865a52-185d-4154-bd6d-89dc177ce288.jpg.webp?ect=4g"
                    class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="https://images.tokopedia.net/img/cache/1208/NsjrJu/2023/3/22/ed7cbb39-b074-4c14-920d-a538c8afee0d.jpg.webp?ect=4g"
                    class="d-block w-100" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <div class="flash-sale mt-5">
        <div style="overflow-x: auto; white-space: nowrap">
            <div class="d-flex ">
                @if (count($data) > 0)
                    @foreach ($data as $index => $v)
                        <div class="border">
                            <img src="{{ $v['img'] }}" alt="pic">
                            <div>
                                <p class="fw-bold">RP {{ $v['price'] }}</p>
                                <p class="text-dark">{{ $v['discount'] }}%</p>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="col">
                        <div class="alert alert-danger">
                            No procduct found.
                        </div>
                    </div>
                @endif
            </div>
        </div>


    </div>
@endsection
