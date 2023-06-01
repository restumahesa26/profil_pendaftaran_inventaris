<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>SI PPDB</title>
    <link rel="stylesheet" href="{{ url('backend/vendors/feather/feather.css') }}">
    <link rel="stylesheet" href="{{ url('backend/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ url('backend/vendors/ti-icons/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ url('backend/vendors/typicons/typicons.css') }}">
    <link rel="stylesheet" href="{{ url('backend/vendors/simple-line-icons/css/simple-line-icons.css') }}">
    <link rel="stylesheet" href="{{ url('backend/vendors/css/vendor.bundle.base.css') }}">
    <link rel="stylesheet" href="{{ url('backend/css/vertical-layout-light/style.css') }}">
    <link rel="shortcut icon" href="{{ url('logo_mts.png') }}" />
</head>

<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth px-0">
                <div class="row w-100 mx-0">
                    <div class="col-lg-4 mx-auto">
                        <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                            <div class="brand-logo">
                                <img src="{{ url('logo_mts.png') }}" alt="logo" style="width: 100px">
                            </div>
                            <h4>Reset Password</h4>
                            <h6 class="fw-light">Masukkan Email Akun Yang Terdaftar</h6>
                            @error('email')
                            <span class="text-danger" style="font-size: 14px;">{{ $message }}</span>
                            @enderror
                            @if(Session::has('status'))
                            <span class="text-success" style="font-size: 14px;">{{ Session::get('status')}}</span>
                            @endif
                            <form class="pt-3" action="{{ route('password.email') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Email" name="email" value="{{ old('email') }}" required>
                                </div>
                                <div class="mt-3">
                                    <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">Reset Password</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ url('backend/vendors/js/vendor.bundle.base.js') }}"></script>
    <script src="{{ url('backend/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ url('backend/js/off-canvas.js') }}"></script>
    <script src="{{ url('backend/js/hoverable-collapse.js') }}"></script>
    <script src="{{ url('backend/js/template.js') }}"></script>
    <script src="{{ url('backend/js/settings.js') }}"></script>
    <script src="{{ url('backend/js/todolist.js') }}"></script>
</body>
</html>
