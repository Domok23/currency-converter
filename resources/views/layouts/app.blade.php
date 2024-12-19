<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel CRUD with SweetAlert2</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://cdn.dhtmlx.com/gantt/edge/dhtmlxgantt.css">
    <script src="{{ mix('js/app.js') }}" defer></script>
    <script src="https://cdn.dhtmlx.com/gantt/edge/dhtmlxgantt.js"></script>
</head>
<body>
    <div class="container mt-5">
        @yield('content')
    </div>

    <div id="gantt_here" style="width:100%; height:500px;"></div>

    <script>
    gantt.init("gantt_here");
    gantt.load("/gantt-data");

    var dp = new gantt.dataProcessor("/gantt-data");
    dp.init(gantt);
    </script>

    @if(session('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Success',
            text: "{{ session('success') }}",
        });
    </script>
    @endif
</body>
</html>
