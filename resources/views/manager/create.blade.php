@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('agenda.index') }}">Manager</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Create</li>
                </ol>
            </nav>
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li><strong>{{ $error }}</strong></li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="card">
                <div class="card-header">
                    Manager Create
                </div>

                <div class="card-body">
                    <form action="{{ route('agenda.store') }}" method="post">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="validationCustom01">Employee's Name:</label>
                                <input type="text" name="employee" class="form-control" id="validationCustom01" placeholder="First and last name" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="validationCustom02">Location:</label>
                                <input type="text" name="location" class="form-control" id="validationCustom02" placeholder="Put your location" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="validationCustom03">Address:</label>
                                <input type="text" name="address" class="form-control" id="validationCustom03">
                                <small class="form-text text-muted">Opcional.</small>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="validationCustom04">Department:</label>
                                <select class="form-control" name="department_id" id="validationCustom04" required>
                                    <option value="" disabled selected>Choose one department</option>
                                    @foreach($departments as $department)
                                        <option value="{{ $department->id }}">{{ $department->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="validationCustom05">Phone Number:</label>
                                <input type="text" name="phone_1" class="form-control" id="validationCustom05" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="validationCustom06">Another Phone Number:</label>
                                <input type="text" name="phone_2" class="form-control" id="validationCustom06">
                                <small class="form-text text-muted">Opcional.</small>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="validationCustom07">Email:</label>
                                <input type="text" name="email" class="form-control" id="validationCustom07" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Manager:</label>
                                <input type="text" class="form-control" id="disabledInput" name="user_id" value="{{ auth()->user()->name }}" disabled>
                            </div>
                        </div>
                        <button type="submit" style="float:right" class="btn btn-primary">Save</button>
                    </form>    
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
