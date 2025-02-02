<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ env('APP_NAME')}}</title>
    @vite(['resourcs/css/app.css', 'resourses/js/app.js'])
    <style>
        body{
            font-family: Arial, sans-serif;
            color: green;
        }
        .form{
            background-color: whitesmoke;
            padding: 20px;
            margin: 20px;
            border-radius: 10px;
            width: fit-content;
        }
        .form input{
            width: 500px;
            height: 30px;
            border-radius: 10px;
            margin-top:15px;
            margin-bottom :15px;
            border: 2px solid green;
        }

        .form textarea{
            width: 500px;
            height: 300px;
            border-radius: 10px;
            margin-top:15px;
            margin-bottom :15px;
            border: 2px solid green;
        }
        .form button{
            width: 505px;
            height: 32px;
            border-radius: 5px;
            border: 2px solid green;
            background-color: green;
            color: white;

        }
        .form button:hover{
            background-color: rgb(104, 254, 104);
            cursor: pointer;
        }
        .link, .home{
             color: white; 
             text-decoration:none;
             font-size:20px;
        }
        .home{
            margin-left: 60%;
            margin-right: 10px;
        }  
        
        .container{
            width: fit-content;
            height: 100%;
            margin-left: 38%;
            margin-top: 20px;
            border-radius: 8px;
        }
        .container .head {
            color: green;
            text-align: center;
        }

        .container .content {
            border: 2px solid green;
            width: 320px;
            height: fit-content;
            padding: 20px;
            border-radius: 10px;
        }

        .container .content  h3{
            text-align: center;
            font-size: 25px;
            color: green;
        
        }
        .container .content .input{
            width: 300px;
            height: 30px;
            border: 2px solid green;
            border-radius: 8px;
            margin-top: 4px;
            margin-bottom: 4px;
            text-align: center;
        }
        .container .content .form-content label{
            
            font-size: 18px;
        }
        .container .content .forget{
            display: flex;
        
        }
        .container .content .forget p input{
            border: 2px solid green;
        }
        .container .content .forget a{
            text-decoration: none;
            color: green;
            margin-left: 30px;
        }
        .container .content button{
            width: 305px;
            height: 33px;
            border-radius: 8px;
            background-color: green;
            color: white;
            margin-top: 10px;
        }
        .container .content button:hover{
            background-color: rgb(87, 235, 87);
            cursor: pointer;
        }
        .container .content .account{
            padding: 5px;
        }
        .container .content .account a{
            text-decoration: none;
            color: green;
            margin-left: 30px;
        }
        .container .content .validation{
            width: fit-content;
            height: fit-content;
            padding: 3px;
            border-radius: 6px;
        }  
    </style>
</head>
<body>
    <header style="background-color: grey; padding:20px;  color:white; margin:0px;">
        <nav class="navbar" style="display: flex">
            <a href="{{route('posts.index')}}" class="link" style="margin-right: 50%">Home</a>
            @guest
                <div style="display: flex; color:white">
                    <a href="{{route('login')}}" class="home">Login</a>
                    <a href="{{ route('register') }}" class="link">Register</a>

                </div>
               
            @endguest
            @auth
               <div style="display: flex; color:white">
                    <p style="margin-left: 50%">{{ auth() -> user() -> username }}</p>
                    <p><a href="{{route('dashboard')}}" style="text-decoration: none; color:white; margin-left:20px">Dashboard</a></p>
                    <form action="{{route('logout')}}" method="post">
                        @csrf
                        <button style="border: 0px solid; color:white; margin-left: 20px; background-color: grey;"><p>Logout</p></button>
                    </form>                   
                </div>          
            @endauth
        </nav>
        
    </header>
    <main>
        {{ $slot }}
    </main>
    
</body>
</html>