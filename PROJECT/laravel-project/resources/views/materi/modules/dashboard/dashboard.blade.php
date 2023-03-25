@extends('templates.t_index')

@section('content')

    <div class="d-flex align-items-center p-3 my-3 text-white bg-purple rounded shadow-sm">
        <img class="me-3" src="https://getbootstrap.com/docs/5.3/assets/brand/bootstrap-logo-white.svg" alt="icon"
            width="48" height="38">
        <div class="lh-1">
            <h1 class="h6 mb-0 text-white lh-1">
                {{ $data['lect']['fname'] . ' ' . $data['lect']['mname'] . ' ' . $data['lect']['lname'] }}</h1>
            <small>{{ $data['lect']['npm'] }}</small>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Students</h3>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NPM</th>
                            <th>Fullname</th>
                            <th>Gender</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($data['students']) > 0)
                            @foreach ($data['students'] as $index => $result)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $result['npm'] }}</td>
                                    <td>{{ $result['fname'] . ' ' . $result['mname'] . ' ' . $result['lname'] }}</td>
                                    <td>{{ $result['gender'] == 'M' ? 'Male' : 'Female' }}</td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="4">No record found</td>
                            </tr>
                        @endif

                    </tbody>
                </table>
            </div>
        </div>
    </div>


@endsection
