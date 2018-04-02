<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Admin area</title>
	<link rel="stylesheet" type="text/css" href="{{URL::asset('src/css/admin.css')}}">
</head>
<body>	
	@include('includes.admin-header')
		@yield('content')
    
      <script type="text/javascript">
      	 var baseUrl="{{URL::asset('')}}";
      </script>
    @yield('scripts')
</body>
</html>