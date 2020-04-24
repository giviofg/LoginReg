@extends('itemplate')
@section('about')
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
            <div class="card">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">&nbsp;Berikut adalah data dari tabel <i><b>`md_users`</b></i> pada database <i><b>`dbpbw`</b></i></h3>
                </div>
            </div>
            <!-- /.card-header -->
            
            <div class="card-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Email</th>
                  <th>Password</th>
                  <th>Name</th>
                  <th>Updated at</th>
                  <th>Created at</th>
                </tr>
                </thead>
                <tbody>
                @if(isset($users))
                @foreach($users as $u)    
                <tr>
                    <td>{{ $u->email }}</td>
                    <td>{{ $u->password }}</td>
                    <td>{{ $u->name }}</td>
                    <td>{{ $u->updated_at }}</td>
                    <td>{{ $u->created_at }}</td>
                    <td><a href="/pegawai/edit/{{ $u->id }}">Edit </a> &ensp; | &ensp; <a href="/pegawai/hapus/{{ $p->id }}"> Hapus </a></td>
                </tr>
                @endforeach
                @endif
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
            <!-- .card-footer -->
            <div class="card-footer">
                <a class="btn btn-primary" href="/pegawai/tambah" role="button"> + Tambahkan Data Baru </a>
            </div>
            <!-- /.card-footer -->
          </div>
          <!-- /.card -->


          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
    @stop