<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Vendor CSS Files -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">

    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">



    <title>@yield('title', 'Suda Stack')</title>

    <style>
        .custom-input {
            border: 2px solid #ccc;
            border-radius: 30px;
            box-shadow: none;
        }

        .custom-input:focus {
            border-color: #1E90FF;
            box-shadow: none;
        }

        .input-group-text {
            background-color: #1E90FF;
            border: none;
            color: #fff;
        }

        .input-group-text i {
            font-size: 18px;
        }

        .form-group label {
            font-weight: bold;
            color: #333;
        }
    </style>
</head>


<div class="form-group m-5">
    <label for="customInput">Custom Input Field</label>
    <div class="input-group">
        <input type="text" class="form-control custom-input" id="customInput" placeholder="Enter text">
        <div class="input-group-append">
            <span class="input-group-text"><i class="bi bi-search"></i></span>
        </div>
    </div>
</div>



<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">

        <a class="navbar-brand" href="#">Quora</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse right-aligned" id="navbarNav">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item"><a class="nav-link" href="#"><i class="bi bi-house-door"></i></a> </li>
                <li class="nav-item"><a class="nav-link" href="#"><i class="bi bi-globe2"></i></a> </li>
                <li class="nav-item"><a class="nav-link" href="#"><i class="bi bi-book"></i></a> </li>
                <li class="nav-item"><a class="nav-link" href="#"><i class="bi bi-lightbulb"></i></a> </li>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="https://i.pravatar.cc/25">
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="#">Edit</a>
                        <a class="dropdown-item" href="#">Settings</a>
                        <div class="dropdown-divider"></div> <a class="dropdown-item" href="#">Logout</a>
                    </div>
                </li>
            </ul>
        </div>

    </div>
</nav>
