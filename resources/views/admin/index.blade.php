<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Index page layout</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{asset('css/libs/blog-post.css')}}" rel="stylesheet">
    <link href="{{asset('css/libs/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/libs/font-awesome.css')}}" rel="stylesheet">
    <link href="{{asset('css/libs/metisMenu.css')}}" rel="stylesheet">
    <link href="{{asset('css/libs/sb-admin-2.css')}}" rel="stylesheet">

    <link href="{{asset('css/libs/styles.css')}}" rel="stylesheet">


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

    <div id="wrapper" style="padding: 20px 150px 20px 150px;">

        <section id="header">
            <h1>This is the REAL layout</h1>
            <h3>Fuck your fancy useless shit!</h3>
        </section>
        <hr style="line-height: 2px; padding: 0; margin: 0;">
        <section id="navbar" style="background-color: #cceeff; padding: 5px 50px 5px 50px;">
            <nav style="line-height:40px;">
                <span class="btn btn-default"><a href="{{route('admin.users.index')}}">Users</a></span>
                <span class="btn btn-default"><a href="{{route('admin.users.create')}}">Create user</a></span>
            </nav>
        </section>

        <section id="content" style="padding: 30px 70px 40px 70px; min-height: 300px; background-color: #ffffff">
            @yield('content')
        </section>
        <hr style="line-height: 2px; padding: 0; margin: 0;">
        <section id="footer" style="background-color: #cccccc">
            <h7>2018@Footer</h7>
        </section>
    </div>
</body>

<!-- jQuery -->
<script src="{{asset('js/libs/jquery.js')}}"></script>
<script src="{{asset('js/libs/bootstrap.min.js')}}"></script>
<script src="{{asset('js/libs/metisMenu.js')}}"></script>
<script src="{{asset('js/libs/sb-admin-2.js')}}"></script>
<script src="{{asset('js/libs/scripts.js')}}"></script>