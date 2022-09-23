<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>dashboard</title>
</head>
<body>
    <div>
        <h3>Home Page</h3>
        
        @if(Session::has('userrole') && Session::get('userrole') == 'admin')
        <p>For Admin User</p>
        @endif
        @if(Session::has('userrole') && Session::get('userrole') == 'student')
        <p>For Student User</p>
        @endif
       <p>Role: {{ Session::get('userrole')}}</p>
       @if(Session::has('authmsg'))
       <p>
              {{ Session::get('authmsg')}}
       </p>
       @endif
       
        <a href="{{url('logout')}}">Logout</a>
    </div>
</body>
</html>