<x-layout>
    <div class="container">
       
        <div class="content">
            <div>
                <h3>Login</h3>
            </div>
            <form action="{{route('login')}}" method="post" id="form">
                @csrf

                <div class="form-content">
                    <div class="form-details">
                        <label for="email">Email</label> <br>
                        <i class="fa-solid fa-user" id="icon"></i>
                        <input type="text" name="email" id="username" class="input" value="{{old('email')}}" placeholder="example@gmail.com"> <br>
                        @error('email')
                            <p style="color: red">{{$message}}</p>                            
                       @enderror
                    </div>
                    <div class="form-details">
                       <label for="password">Password</label> <br>
                       <div style="display: flex;">
                            <i class="fa-sharp fa-solid fa-lock" id="icon"></i>
                            <input type="password" name="password" id="password" class="input" placeholder="password1234"> <br>
                       </div>
                      
                       @error('password')
                       <p style="color: red">{{$message}}</p>                            
                      @enderror
                        </div>
                    <div class="forget">
                       
                        <p> <input type="checkbox" name="remember"> Remember me <span><a href="includes/forget.php">Forget Password?</a></span></p>
                    </div>
                    <div class="form-details">
                        <button type="submit" name="login">Login</button>
                    </div>
                    <div class="account">
                        <div>
                            <p>Don't have account? <span> <a href="{{ route('register')}}">Create account</a></span></p>
                        </div>                       
                    </div>
                    <div>
                        @error('invalid')
                       <p style="color: red">{{$message}}</p>                            
                      @enderror
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-layout>