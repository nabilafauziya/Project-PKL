@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @include('layouts/_flash')
                <div class="card">
                    <div class="card-header">
                        Data Kelas
                    </div>
                    <br>
                    <center><img src="https://cdn-icons.flaticon.com/png/512/2108/premium/2108926.png?token=exp=1659582332~hmac=9086ca620f84fc9bd9aca5cd201140c4" width="150px" height="150px" alt="logo"></center>
                    <div class="card-body">
                        <form action="{{ route('kelas.store') }}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Kelas</label>
                                <input type="text" class="form-control  @error('kelas') is-invalid @enderror"
                                    name="kelas">
                                @error('kelas')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Jurusan</label>
                                <input type="text" class="form-control  @error('jurusan') is-invalid @enderror"
                                    name="jurusan">
                                @error('jurusan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <div class="d-grid gap-2">
                                    <button class="btn btn-primary" type="submit">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection