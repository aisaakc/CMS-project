<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body>
    <style>
        body {
            background-color: rgba(0, 0, 0, 0.9);
        }

        .container {
            height: 100vh;
        }

        .w-form {
            width: 40%;
        }
    </style>
    <div class="container d-flex">
        <form action="{{route('login.verify')}}" method="POST" class="m-auto bg-white p-5 rounded-sm shadow-lg w-form">
            @csrf
            <h2 class="text-center">Inicio de seccion</h2>

            @error('invalid_credentials')
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <small>
                    {{ $message }}
                </small>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times</span>
                </button>
            </div>
            @enderror
            <div class="form-group mb-3">
                <label for="examplexdd">Email</label>
                <input name="email" type="email" value="{{old('email')}}" class="form-control" id="examplexdd" aria-describedby="emailHelp" placeholder="Enter email">
                @error('email')
                <small class="text-danger mt-1">
                    <strong> {{$message}} </strong>
                </small>
                @enderror
            </div>
           

            <div class="form-group mb-3">
                <label for="passwordxdd">Password</label>
                <input name="password" type="password" class="form-control" id="passwordxdd" placeholder="Password">
                @error('password')
                <small class="text-danger mt-1">
                    <strong> {{$message}} </strong>
                </small>
                @enderror
            </div>

            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Ingresar</button>
            </div>
            <div class="mt-3 text-center">
                <a href="{{ route('register')}}">registrarme</a>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>
