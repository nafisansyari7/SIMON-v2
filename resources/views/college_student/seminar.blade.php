@extends('layout.master')

@section('title', 'Mahasiswa | Seminar')
@section('content')
<section class="content">
    <div class="container-fluid">
<!--        @if($seminar !== 0)
        <h5 class="py-2">Pendaftaran Seminar</h5>
        <div class="card card-warning">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="fas fa-calendar-plus mr-1"></i>
                    Verifikasi Pendaftaran
                </h3>
            </div>
            <div class="card-body">
                <table id="reg_sem" class="table table-striped projects dataTable w-100">
                    <thead>
                        <tr>
                            <th>Judul</th>
                            <th>Kelompok</th>
                            <th>Pembimbing</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
        @endif -->
        <h5 class="py-2">Seminar</h5>
        <div class="card card-primary">
            <div class="card-header">
                <h5 class="card-title">
                    <i class="fas fa-calendar-alt mr-1"></i>
                    Jadwal Seminar
                </h5>
            </div>
            <div class="card-body">
                <table id="seminar" class="table table-striped projects dataTable w-100">
                    <thead>
                        <tr>
                            <th>Tanggal</th>
                            <th>Judul</th>
                            <th>Kelompok</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
@endsection
@section('ajax')
<script>
$("#seminar").DataTable({
        "processing": true,
        "ajax": {
            url: "{{ url('../mahasiswa/seminar/show') }}"
        },
        "columns": [{
                sortable: false,
                "render": function(data, type, full, meta) {
                    return '<b>' + full.group_project_schedule.tanggal + '</b><br><small>' + full.group_project_schedule.place + '<br>' +
                        moment(full.group_project_schedule.time, 'HH:mm:ss').format('HH:mm') + '-' + moment(full.group_project_schedule.time_end, 'HH:mm:ss').format('HH:mm') + ' WITA</small>'
                }
            },
            {
                data: "title"
            },
            {
                sortable: false,
                "render": function(data, type, full, meta) {
                    let img = ''
                    for (let i = 0; i < full.internship_students.length; i++) {
                        img += '<a href=../public/image/' + full.internship_students[i].user.image_profile + ' target="_blank"><img src="../public/image/' + full.internship_students[i].user.image_profile + '" data-toggle="tooltip" data-placement="bottom" class="table-avatar m-1" title="' + full.internship_students[i].name + '"></a>'
                    }
                    return img
                }
            },
            {
                sortable: false,
                "render": function(data, type, full, meta) {
                    let buttonId = full.id;
                    return '<button id="' + buttonId + '" class="btn btn-primary detail">Detail</button>' +
                    '<button id="' + buttonId + '" class="btn btn-success hadiri ml-1 mr-1">Hadiri</button>'
                }
            }
            
        ]
    });
</script>
@endsection
