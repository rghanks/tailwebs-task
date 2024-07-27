<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <div class="logo-container"> 
        <img class="logo" src="/logo.png" />   
    </div>

    <form action="{{ route('account.authenticate')}}" method="post" autocomplete="off"> 
        @csrf   
        <div class="login-form">
        @if(Session::has('error'))
        <div style="padding:10px;background:#ff000045;border-radius: 5px;">
            <p style="color:red;"> {{ Session::get('error') }} </p>
        </div>    <br>        
        @endif
            <div class="icon-username">
                <label for="username">Username</label>
                <input type="text" value="{{ old('username') }}" name="username" id="username" placeholder="Username">   
                @error('username')
                    <p class="invalid-feedback">{{ $message }}</p>
                @enderror
            </div>
            <br>
            <div class="icon-password">
                <label for="username">Password</label>
                <input type="password" name="password" id="password" placeholder="Password">   
                @error('password')
                    <p class="invalid-feedback">{{ $message }}</p>
                @enderror         
            </div>    
           
            <a href="#">Forget Password?</a>   
            <br> 
                <button type="submit">Login</button>        
        </div>
     </form>
</body>
</html>