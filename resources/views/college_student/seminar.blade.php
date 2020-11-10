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
                            <th>Kuota Pengamat</th>
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
<!-- Detail Modal -->
<div class="modal fade" id="detail" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="fas fa-info-circle mr-1"></i>
                    Detail
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <ul class="nav nav-tabs mb-2" id="tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link" id="team-tab" data-toggle="pill" href="#team" role="tab" aria-controls="team" aria-selected="true">Mahasiswa</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="instansi-tab" data-toggle="pill" href="#instansi" role="tab" aria-controls="instansi" aria-selected="false">Instansi/Perusahaan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="seminar-tab" data-toggle="pill" href="#detailsm" role="tab" aria-controls="seminar" aria-selected="false">Penguji</a>
                    </li>
                </ul>           
                <form id="form_detail">
                <div class="tab-content" id="tabContent">
                    <div class="tab-pane fade show active" id="team" role="tabpanel" aria-labelledby="team-tab">
                        <table class="table table-responsive" id="mahasiswa">
                            <thead>
                                <tr>
                                    <th>NIM</th>
                                    <th>Nama</th>
                                    <th>Job Description</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane fade" id="instansi" role="tabpanel" aria-labelledby="instansi-tab">
                        <div class="row">
                            <div class="form-group col-12">
                                <label for="instansi">Nama Instansi/Perusahaan</label>
                                <input type="text" class="form-control" id="agency" value="" readonly>
                            </div>
                            <div class="form-group col-12">
                                <label for="instansi">Pembimbing Lapangan</label>
                                <input type="text" class="form-control" id="pemLapangan" value="" readonly>
                            </div>
                            <div class="form-group col-12">
                                <label for="bidang">Bidang/Sektor Usaha</label>
                                <input type="text" class="form-control" id="bidang" value="" readonly>
                            </div>
                            <div class="form-group col-12">
                                <label for="alamat">Alamat</label>
                                <input type="text" class="form-control" id="alamat" value="" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="detailsm" role="tabpanel" aria-labelledby="seminar-tab">
                        <div class="form-group">
                            <label>Ketua Penguji</label>
                            <input type="text" class="form-control" id="ketuapem" value="" disabled>
                        </div>
                        <div class="form-group">
                            <label>Sekretaris</label>
                            <input type="text" class="form-control" id="pem1" value="" disabled>
                        </div>
                        <div class="form-group">
                            <label>Penguji I</label>
                            <input type="text" class="form-control" id="pem2" value="" disabled>
                        </div>
                        <div class="form-group">
                            <label>Penguji II</label>
                            <input type="text" class="form-control" id="pem3" value="" disabled>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>=
    </div>
</div>
<!-- Hadiri modal -->
<div class="modal fade" id="hadiri" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="fas fa-check mr-1"></i>
                    Konfirmasi
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Yakin ingin menghadiri Seminar?<br><br>
                    <form id="pengamat" method="POST">
                     @csrf
                     <!-- <input type="text" name="student" id="student_id" value="">
                     <input type="text" id="_method" value="PUT" name="_method"> -->
                    
                    <div class="form-group col-12">
                        <div class="row">
                            <div class="col-9">
                                <input name="internship_student_id" type="text" value="{{ Auth::user()->InternshipStudent->id }}" class="form-control" id="">
                                <input name="group_projects_schedule_id" type="text" value="" class="form-control" id="">
                            </div>
                        </div>
                    </div>
                    

                <b class="text-danger font-italic">*Pastikan anda bisa menghadiri dan tidak bertabrakan dengan jadwal lain.</b>
                </p>
            </div>
            </form>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary float-right">Yakin</button>
            </div>
        </div>
    </div>
</div>

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
                    return '<b>' + full.group_project_schedule.quota + '</b>'
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

    $('#seminar tbody').on('click', '.detail', function() {
        let id = $(this).attr('id')
        $('#detail').modal('show');

        $.ajax({
            url: "../mahasiswa/detailDaftarSem/" + id,
            success: function(result) {
                $('#mahasiswa tbody').html('')
                $('#files tbody').html('')
                $('#agency').val(result.data.agency.agency_name)
                $('#pemLapangan').val(result.data.field_supervisor)
                $('#bidang').val(result.data.agency.sector)
                $('#alamat').val(result.data.agency.address)
                $('#pem3').val(result.supervisor.lecturer.name) 
                result.fck.forEach(function(mmk) {
                    let role = mmk.role;
                    if (role === "Ketua Penguji") {
                        $('#ketuapem').val(mmk.lecturer.name);
                    } else if (role === "Sekretaris") {
                        $('#pem1').val(mmk.lecturer.name);
                    } else if (role === "Penguji 1") {
                        $('#pem2').val(mmk.lecturer.name);
                    } else if (role === "Penguji 2") {
                        $('#pem3').val(mmk.lecturer.name);
                    }
                });


                result.data.internship_students.forEach(function(i) {
                    let call_job = ''
                    i.jobdescs.forEach(function(job) {
                        call_job += job.jobname + '<br>'
                    })
                    
                    modal = '<tr><td>' + i.nim + '</td>' +
                        '<td>' + i.name + '</td>' +

                        '<td>' + call_job + '</td></tr>'

                    $('#mahasiswa tbody').append(modal)
                });
            }
        })
    });
    $('#seminar tbody').on('click', '.hadiri', function() {
        let id = $(this).attr('id')

        $.ajax({
            url: "../mahasiswa/hadiriSeminar/" + id,
            dataType:"json",
            success: function(result) {
                $('#hadiri').modal('show');
                $('#student_id').val(result.data.id)
                // $('#is_done').val(result.data.is_verified)
                // $('#gp_id').val(result.data.id)
            }
        })
    });
    $('#pengamat').submit(function(e){
        e.preventDefault();

        var request = new FormData(this);

        const id = $('#')
    })
</script>
@endsection
