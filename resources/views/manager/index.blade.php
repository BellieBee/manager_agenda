@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        @if(session()->has('created'))
            <div class="row">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success!</strong> {{ session()->get('created') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        @elseif(session()->has('updated'))
            <div class="row">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success!</strong> {{ session()->get('updated') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        @elseif(session()->has('destroyed'))
            <div class="row">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success!</strong> {{ session()->get('destroyed') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        @endif
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">
                    <div class="row justify-content-between">
                        <div class="col-3">
                            Manager Index
                        </div>
                        <div class="col-3">
                            <a class="btn btn-info btn-sm" href="{{ route('agenda.create') }}" role="button">Create</a>
                        </div>
                    </div> 
                </div>

                <div class="card-body">
                    <div class="table-responsive-xl">
                        <table class="table">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Code</th>
                                    <th scope="col">Employee</th>
                                    <th scope="col">Location</th>
                                    <th scope="col">Manager</th>
                                    <th scope="col">Department</th>
                                    <th scope="col">Registred</th>
                                    <th scope="col">Options</th>
                                </tr>
                            </thead>
                            <tbody class="table-hover">
                                @foreach($employees as $employee)
                                    <tr>
                                        <th>{{ $employee->code }}</th>
                                        <td>{{ $employee->employee }}</td>
                                        <td>{{ $employee->location }}</td>
                                        <td>{{ $employee->user->name }}</td>
                                        <td>{{ $employee->department->name }}</td>
                                        <td>{{ $employee->date }}</td>
                                        <td>
                                            <form action="{{ route('agenda.destroy', ['agenda' => $employee->id]) }}" method="POST">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                                <a href="#" class="btn btn-secondary btn-sm"><i class="far fa-address-card"></i></a>
                                                <a href="{{ route('agenda.edit', ['agenda' => $employee->id]) }}" class="btn btn-success btn-sm"><i class="far fa-edit"></i></i></a>
                                                <button class="btn btn-danger btn-sm"><i class="far fa-trash-alt"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
