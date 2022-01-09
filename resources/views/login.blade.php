<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <title>Login</title>
</head>
<body>
    <div class="container">
        <div class="content-wrapper">
            <section class="h-100">
                <div class="container h-100 w-50">
                    <div class="justify-content-md-center mt-5">
                        <span class="alert alert-info" id="alert" style="display:none"></span>
                        <div class="card-wrapper">
                            <div class="card fat">
                                <div class="card-body">
                                    <h4 class="card-title">Login</h4>
                                    <form method="POST" id="loginForm" class="my-login-validation" novalidate="" action="{{route('apiLogin')}}">
                                        <input type="hidden" name="_token" value='@csrf' >
                                        @csrf
                                        <div class="form-group">
                                            <label for="email">E-Mail Address</label>
                                            <input id="email" type="email" class="form-control" name="email" value="" required autofocus>
                                            <div class="invalid-feedback">
                                                Email is invalid
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="password">Password</label>
                                            <input id="password" type="password" class="form-control" name="password" required data-eye>
                                            <div class="invalid-feedback">
                                                Password is required
                                            </div>
                                            <a href="/login" class="float-right">
                                                Forgot Password?
                                            </a>
                                        </div>

                                        <div class="form-group">
                                            <div class="custom-checkbox custom-control">
                                                <input type="checkbox" name="remember" id="remember" class="custom-control-input">
                                                <label for="remember" class="custom-control-label">Remember Me</label>
                                            </div>
                                        </div>

                                        <div class="form-group m-0">
                                            <button type="submit" class="btn btn-primary btn-block">
                                                LogIn
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</body>

<script>
    $("#loginForm").submit(function(e) {

        e.preventDefault(); // avoid to execute the actual submit of the form.

        var form = $(this);
        var url = form.attr('action');

        $.ajax({
            type: "POST",
            url: url,
            data: form.serialize(), // serializes the form's elements.
            success: function(data)
            {
                if(data.message !=null){
                    $('#alert').css('display','block');
                    $('#alert').html(data.message);
                }else{
                    console.log( data.access_token)
                    window.localStorage.setItem('access_token', data.access_token);
                    window.location = '/list'
                }
            },
            });


        });
    </script>
</html>

