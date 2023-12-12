<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Ecomente - Login</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="text-center">
                        <img src="{{URL('Img/logo-ecomente-quiz.png')}}"   style="width: 220px; height: 220px;">
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{route('login')}}">
                            @csrf

                            <div class="mb-3">
                                <label for="email" class="form-label">{{ __('E-Mail') }}</label>
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">{{ __('Senha') }}</label>
                                <input id="password" type="password" class="form-control" name="password" required>
                            </div>

                            @if(session('error'))
                                <div class="alert alert-danger" role="alert">
                                    {{ session('error') }}
                                </div>
                            @endif

                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="remember" name="remember">
                                <label class="form-check-label" for="remember">{{ __('Lembrar') }}</label>
                            </div>

                            <button type="submit" class="btn btn-primary">{{ __('Login') }}</button>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies (optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
