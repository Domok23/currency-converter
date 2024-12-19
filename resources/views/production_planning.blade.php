@extends('layouts.app') <!-- Pastikan layout sesuai project Anda -->

@section('content')
<div class="container">
    <h1>Production Planning Gantt Chart</h1>
    <div id="gantt_here" style="width:100%; height:500px;"></div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.dhtmlx.com/gantt/edge/dhtmlxgantt.js"></script>
<script>
    // Inisialisasi Gantt
    gantt.init("gantt_here");

    // Muat data dari API
    gantt.load("/gantt-data"); // Route Laravel yang mengembalikan data Gantt

    // Jika ingin fitur sinkronisasi data
    var dp = new gantt.dataProcessor("/gantt-data");
    dp.init(gantt);
    dp.setTransactionMode("REST");
</script>
@endpush
