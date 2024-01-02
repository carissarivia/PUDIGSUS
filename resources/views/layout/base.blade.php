<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project Framework</title>

    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">

    @include('partial.head-data')

    @stack('head')
</head>

<body>
    @yield('content')

    @include('partial.script-data')

    @stack('scripts')

    <script>
        $(document).ready(function() {
            $('.data-table').DataTable();

            var editors = document.querySelectorAll('.editor');

            editors.forEach(function(editor) {
                ClassicEditor
                    .create(editor)
                    .catch(error => {
                        console.error(error);
                    });
            })
        });
    </script>

    @session('message')
        <script>
            toastr.info('{{ session('message') }}')
        </script>
    @endsession

    @session('success')
        <script>
            toastr.success('{{ session('success') }}')
        </script>
    @endsession

    @session('error')
        <script>
            toastr.error('{{ session('error') }}')
        </script>
    @endsession

</body>

</html>
