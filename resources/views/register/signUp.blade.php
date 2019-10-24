<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="/css/style.css">
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</head>
<body>

<div class="main">

    <section class="signup">
        <!-- <img src="images/signup-bg.jpg" alt=""> -->
        <div class="container">
            <div class="signup-content ">
                @if(count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form method="POST" id="signup-form" class="signup-form" action="{{ route('register.signUp') }}">
                    @csrf
                    <h2 class="form-title">Create account</h2>
                    <div class="form-group">
                        <input type="text" class="form-input" name="namesurname" id="name" placeholder="Your Full Name"/>
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-input" name="email" id="email" pattern="^\w+@[a-zA-Z_]+?\.[a-zA-Z.]{2,5}$" placeholder="Your Email"/>
                    </div>
                    <div class="form-group">
                        <input type="number" class="form-input" name="identityNo" id="identityNo"  maxlength="11" placeholder="ID Card Number"/>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-input" name="password" id="password" placeholder="Password" required/>
                        <span toggle="#password" class="zmdi zmdi-eye field-icon toggle-password"></span>
                    </div>
                    <div class="form-group">
                        <input type="password" id="re_password" class="form-input" name="password_confirmation"  placeholder="Repeat your password"/>
                    </div>
                    <div class="form-group">
                        <input type="checkbox" name="agree-term" value="checked" id="agree-term" class="agree-term" />
                        <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all statements in  <a href="{{route('terms')}}" class="term-service">Terms of service</a></label>
                    </div>


                    <div class="form-group">
                        <input type="submit" name="submit" id="submit" class="form-submit" value="Sign up" disabled="disabled" />
                    </div>
                </form>
                <p class="loginhere">
                    Have already an account ? <a href="{{route('login.signIn')}}" class="loginhere-link">Login here</a>
                </p>
            </div>
        </div>
    </section>

</div>

<!-- JS -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="js/main.js"></script>

<script>
    $('#agree-term').click(function() {
        if ($('#submit').is(':disabled')) {
            $('#submit').removeAttr('disabled');
        } else {
            $('#submit').attr('disabled', 'disabled');
        }
    });
</script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>
