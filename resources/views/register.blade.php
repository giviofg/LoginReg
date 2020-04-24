@extends('template')
@section('register')
    <section class="main-section">
        <!-- Content -->
        <div class="card">
            <div class="card-body register-card-body">
            <p class="login-box-msg">Register a new membership</p>
            <br>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif    

            <form action="{{ url('/registerPost') }}" method="post">
                {{ csrf_field () }}
                <div class="input-group mb-3">
                <input type="email" class="form-control" id="email" name="email" placeholder="email">
                <div class="input-group-append">
                    <div class="input-group-text">
                    <span class="fas fa-envelope"></span>
                    </div>
                </div>
                </div>
                <div class="input-group mb-3">
                <input type="password" class="form-control" id="password" name="password" placeholder="password">
                <div class="input-group-append">
                    <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                    </div>
                </div>
                </div>
                <div class="input-group mb-3">
                <input type="password" class="form-control" id="confirmation" name="confirmation" placeholder="confirmation">
                <div class="input-group-append">
                    <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                    </div>
                </div>
                </div>
                <div class="input-group mb-3">
                <input type="text" class="form-control" id="name" name="name" placeholder="name">
                <div class="input-group-append">
                    <div class="input-group-text">
                    <span class="fas fa-user"></span>
                    </div>
                </div>
                </div>
                <div class="row">
                    <div class="col-8">
                        <div class="icheck-primary">
                        <input type="checkbox" id="agreeTerms" name="terms" value="agree">
                        <label for="agreeTerms">
                        I agree to the <a href="#">terms</a>
                        </label>
                        </div>
                    </div>
                    <!-- /.col -->
                </div>
                <div class="row">
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary">Register</button>
                    </div>
                    <div class="col-4">
                        <button type="reset" class="btn btn-danger">Cancel</button>
                    </div>
                    <div class="col-4">
                        <!-- kosong -->
                    </div>
                </div>
            </form>

            <a href="{{ url('/login') }}" class="text-center">I already have a membership</a>
        </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</section>
@endsection