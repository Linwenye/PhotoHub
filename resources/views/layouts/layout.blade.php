<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'PhotoHub') }}</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">

    <!-- Custom Styles -->
    {{--    <link href="{{ asset('css/app.css') }}" rel="stylesheet">--}}
    @yield('css')
    <style>
        .navbar {
            -webkit-box-shadow: 0 8px 6px -6px #999;
            -moz-box-shadow: 0 8px 6px -6px #999;
            box-shadow: 0 6px 8px -6px #999;
        }

    </style>
</head>
<body>
<div id="app">
    @include('layouts.nav')

    @yield('content')

</div>

<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
<script src="https://use.fontawesome.com/8fca58341f.js"></script>
<script src="{{ asset('js/app.js') }}"></script>
<script type="text/javascript">
    (function () {

        var laravel = {
            initialize: function () {
                this.methodLinks = $('a[data-method]');
                this.token = $('a[data-token]');
                this.registerEvents();
            },

            registerEvents: function () {
                this.methodLinks.on('click', this.handleMethod);
            },

            handleMethod: function (e) {
                var link = $(this);
                var httpMethod = link.data('method').toUpperCase();
                var form;

                // If the data-method attribute is not PUT or DELETE,
                // then we don't know what to do. Just ignore.
                if ($.inArray(httpMethod, ['PUT', 'DELETE']) === -1) {
                    return;
                }

                // Allow user to optionally provide data-confirm="Are you sure?"
                if (link.data('confirm')) {
                    if (!laravel.verifyConfirm(link)) {
                        return false;
                    }
                }

                form = laravel.createForm(link);
                form.submit();

                e.preventDefault();
            },

            verifyConfirm: function (link) {
                return confirm(link.data('confirm'));
            },

            createForm: function (link) {
                var form =
                    $('<form>', {
                        'method': 'POST',
                        'action': link.attr('href')
                    });

                var token =
                    $('<input>', {
                        'type': 'hidden',
                        'name': '_token',
                        'value': link.data('token')
                    });

                var hiddenInput =
                    $('<input>', {
                        'name': '_method',
                        'type': 'hidden',
                        'value': link.data('method')
                    });

                return form.append(token, hiddenInput)
                    .appendTo('body');
            }
        };

        laravel.initialize();

    })();
</script>
@yield('script')
</body>
</html>
