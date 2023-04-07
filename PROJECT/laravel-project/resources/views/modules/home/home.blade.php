@extends('templates.layouts')

@section('content')
    <div class="d-flex align-items-center p-3 my-3 text-white bg-purple rounded shadow-sm">
        <img class="me-3" src="{{ url('./assets/media/icons/icon-ibik.png') }}" alt="icon-ibik" width="45" height="45">
        <div class="lh-1">
            <h1 class="h6 mb-0 text-white lh-1">Bootstrap</h1>
            <small>Since 2011</small>
        </div>
    </div>

    <div class="card mb-5">
        <div class="card-header">
            <h3 class="card-title">{{ $data['title'] }}</h3>
        </div>
        <div class="card-body">
            <p>NPM {{ $data['npm'] }} termasuk bilangan
                @if ($data['npm'] % 2 === 0)
                    <span class="text-primary">GENAP</span>
                @else
                    <span class="text-info">GANJIL</span>
                @endif
            </p>

            <p>NPM {{ $data['npm'] }} termasuk bilangan
                @switch($data['npm'] % 2)
                    @case(0)
                        <span class="text-primary">GENAP</span>
                    @break

                    @default
                        <span class="text-info">GANJIL</span>
                    @break
                @endswitch
            </p>

            <div class="skills">
                <h4 class="text-uppercase">Skill:</h4>
                <div class="d-flex flex-row justify-content-between">
                    <p class="text-dark">PHP</p>
                    <div>
                        @for ($i = 0; $i < 5; $i++)
                            <span class="me-1 text-warning">
                                <i class="bi bi-star-fill"></i>
                            </span>
                        @endfor
                    </div>
                </div>

                <div class="d-flex flex-row justify-content-between">
                    <p class="text-dark">JAVA</p>
                    <div>
                        @for ($i = 0; $i < 5; $i++)
                            <span class="me-1 text-warning">
                                <i class="bi bi-star{{ $i > 2 ? '-fill' : '' }}"></i>
                            </span>
                        @endfor
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">List of Student</h3>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NPM</th>
                        <th>Name</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data['students'] as $index => $result)
                        <tr>
                            <td>{{ $index+1 }}</td>
                            <td>{{ $result['npm'] }}</td>
                            <td>{{ $result['name'] }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
