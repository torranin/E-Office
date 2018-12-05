@extends('layouts.app')
@section('title','E-Office')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">เพิ่มไฟล์เอกสาร</div>

                <div class="card-body">
                    <div class="input-group">
                        <form method="POST" action="" enctype="multipart/form-data">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="inputGroupFile02">
                                <label class="custom-file-label" for="inputGroupFile02" aria-describedby="inputGroupFileAddon02">เลือกไฟล์</label>
                            </div>
                            <div class="input-group-append">
                                <span class="input-group-text" id="inputGroupFileAddon02">ส่ง</span>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
            <div>
                  <h5></h5>
            </div>
            <div class="card">
                <div class="card-header"> จัดการข้อมูลไฟล์เอกสาร </div>

                <div class="card-body">
                    <div class="modal-bod custom-file">
                        <input type="file" class="custom-file-input" id="inputGroupFile02">
                        <label class="custom-file-label" for="inputGroupFile02" aria-describedby="inputGroupFileAddon02">เลือกไฟล์</label>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<!-- Modal AddData-->
<div class="modal fade" id="addData" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">เพิ่มข้อมูลไฟล์เอกสาร</h5>
            </div>
            <form method="POST" action="">
                {{ csrf_field() }}
                <div class="modal-bod custom-file">
                    <input type="file" class="custom-file-input" id="inputGroupFile02">
                    <label class="custom-file-label" for="inputGroupFile02" aria-describedby="inputGroupFileAddon02">เลือกไฟล์</label>
                </div>
                <div class="modal-footer">
                    <span class="input-group-text" id="inputGroupFileAddon02">ส่ง</span>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
