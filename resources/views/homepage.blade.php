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
            <div class="signup-content">
                @if(session()->has('message'))
                    <div class="form-title">
                        <div class="alert alert-{{session('message_type')}}">{{session('message')}}</div>
                    </div>
                @endif
                    @csrf
                        <h2 class="form-title">Welcome,</h2>
                        <input type="button" name="submit" id="submit" class="form-submit" value="Sign Up" onclick="window.location.href='{{route('register.signUp')}}'" /><br><br>
                        <input type="submit" name="submit" id="submit" class="form-submit" value="Sign In" onclick="window.location.href='{{route('login.signIn')}}'"  /><br><br>
                        <input type="submit" name="submit" id="submit" class="form-submit" value="Test"  /><br><br>
                        <input type="submit" name="submit" id="submit" class="form-submit" value="Test"  /><br><br>
                    </div>
            </div>
        </div>
    </section>

</div>

<!-- JS -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="js/main.js"></script>
<script src="/js/app.js"></script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>
