@extends('layouts.app')
@section('title','E-Office')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">จัดการข้อมูลกลุ่มงาน/แผนก <right><button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target="#addData">เพิ่ม</button></right></div>

                <div class="card-body">
                    <table class="table table-hover">
                        <center><h5>ตารางแสดงรายการของกลุ่มงาน/แผนก</h5></center>
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">ชื่อกลุ่มงาน/แผนก</th>
                            <th scope="col"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($group as $row)
                            <tr>
                                <th scope="row">{{$row['order']}}</th>
                                <td>{{$row['name']}}</td>
                                <td><center>
                                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#detail-{{$row->id}}" href="">แก้ไข</button>
                                    <button type="submit" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete-{{$row->id}}" href="">ลบ</button>
                                </center></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
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
                <h5 class="modal-title" id="exampleModalLabel">เพิ่มข้อมูลกลุ่มงาน/แผนก</h5>
            </div>
            <form method="POST" action="{{route('group.save')}}">
                {{ csrf_field() }}
                <div class="modal-body">
                    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="ลำดับ" name="order">
                </div>
                <div class="modal-body">
                    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="กลุ่มงาน/แผนก" name="name">
                </div>
                <div class="modal-body">
                    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="รายละเอียด" name="detail">
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" >บันทึก</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal EditData-->

    @foreach($group as $data)
        <div class="modal fade" id="detail-{{$data->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">แก้ไขข้อมูลกลุ่มงาน/แผนก {{$data['name']}}</h5>
                    </div>
                    <form method="POST" action="{{route('group.edit', ['id' => $data->id])}}">
                        {{ csrf_field() }}
                        <div class="modal-body">
                            <input type="text" class="form-control" id="formGroupExampleInput" placeholder="ลำดับ" name="order" value="{{$data['order']}}">
                        </div>
                        <div class="modal-body">
                            <input type="text" class="form-control" id="formGroupExampleInput" placeholder="กลุ่มงาน/แผนก" name="name" value="{{$data['name']}}">
                        </div>
                        <div class="modal-body">
                            <input type="text" class="form-control" id="formGroupExampleInput" placeholder="รายละเอียด" name="detail" value="{{$data['detail']}}">
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary" >บันทึก</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach

<!-- Modal DeleteData-->
    @foreach($group as $data)
        <div class="modal fade" id="delete-{{$data->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">ลบข้อมูลกลุ่มงาน/แผนก</h5>
                    </div>
                    <form method="POST" action="{{route('group.delete', ['id' => $data->id])}}">
                        {{ csrf_field() }}
                        <br>
                        <center><h4>คุณต้องการลบข้อมูล {{$data['name']}} ใช่หรือไม่</h4></center>
                        <br>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary" >ลบ</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach

@endsection
