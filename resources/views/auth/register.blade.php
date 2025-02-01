<x-layout>
    <div class="container">
        <div class="content">
            <div>
                <h3>Create Account</h3>
            </div>
            <form action="{{route('register')}}" method="post">
                @csrf
                <div class="form-content">                    
                    <div class="form-details">
                        <label for="username">Username</label> <br>
                        <input type="text" name="username" id="username" class="input" placeholder="John5" value="{{old('username')}}">
                        @error('username')
                            <p style="color: red">{{$message}}</p>                            
                        @enderror
                     </div>
                    <div class="form-details">
                        <label for="email">Email</label> <br>
                        <input type="text" name="email" id="email" class="input" placeholder="johndoe@gmail.com" value="{{old('email')}}"> <br>
                        @error('email')
                        <p style="color: red">{{$message}}</p>                            
                    @enderror
                    </div>
                    <div class="form-details">
                       <label for="password">Password</label> <br>
                       <input type="password" name="password" id="password" class="input" placeholder="password1234"> <br>
                       @error('password')
                        <p style="color: red">{{$message}}</p>                            
                       @enderror 
                    </div>
                    <div class="form-details">
                        <label for="password">Confirm Password</label> <br>
                        <input type="password" name="password_confirmation" id="password" class="input" placeholder="password1234"> <br>
                     </div>
                  
                    <div class="form-details">
                        <button type="submit" name="register">Register</button>
                    </div>
                    <div class="account">
                        <div>
                            <p>Already have account?</p>
                        </div>                       
                    </div>
        </div>
    </div>
</x-layout>