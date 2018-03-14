<!-- Stylesheets -->
<link rel="stylesheet" href="{{ asset('assets/admin/fonts/fonts.css?' . time()) }}">
<link rel="stylesheet" href="{{ asset('assets/admin/fonts/fontawesome.min.css?' . time()) }}">

<!-- App Style -->
<link rel="stylesheet" href="{{ asset('assets/admin/css/app.css?' . time()) }}">
<link rel="stylesheet" href="{{ asset('assets/admin/css/custom.css?' . time()) }}">

<!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js') }}"></script>
	<script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js') }}"></script>
<![endif]-->

@stack('styles')

<!-- Icons -->
<script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>