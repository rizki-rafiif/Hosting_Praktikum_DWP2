<!-- Membuat views untuk halaman student -->

@extends('template.base')
@section('content')
    <div class='row'>
        <div class='col-lg-12'>
            <!-- notif sukses -->
            @if(session()->has('pesan'))
                <div class='alert alert-success'>{{ session()->get('pesan')}}</div>
            @endif
            <!-- button untuk create data -->
            <a href="{{ route('student.create') }}" class='btn btn-primary mb-2'>Tambah</a>
            <!-- membuat table -->
            <div class='table-responsive'>
                <table class='table table-striped data-table'>
                    <!-- heading table -->
                    <tr>
                        <th>#</th>
                        <th>NIM</th>
                        <th>name</th>
                        <th>Gender</th>
                        <th>Jurusan</th>
                        <th>Alamat</th>
                        <th>Aksi</th>
                    </tr>
                    <!-- menampilkan data table berdasarkan data database -->
                    @forelse ($student as $mahasiswa)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $mahasiswa->nim }}</td>
                        <td>{{ $mahasiswa->name }}</td>
                        <td>{{ $mahasiswa->gender }}</td>
                        <td>{{ $mahasiswa->department }}</td>
                        <td>{{ $mahasiswa->address }}</td>
                        <td>
                            <form action=" {{ route('student.destroy',['id' => $mahasiswa->id]) }} " method="post">
                                @method('DELETE')
                                @csrf
                                <a href="{{ route('student.edit',['id' => $mahasiswa->id]) }}" class='btn btn-info btn-sm'>Edit</a>
                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    <!-- ini jika data kosong -->
                    @empty
                    <tr>
                        <td class='text-center' colspan=7>
                            Data tidak ditemukan!
                        </td>
                    </tr>
                    
                    @endforelse
                </table>
            </div>
        </div>
    </div>
@endsection
{{-- @section('script')
    <script>
        $('.data-table').DataTable({
            processing : true,
            serverSide : true,
            ajax : "{{ route('student.data') }}",
            column : [
                {
                    data : 'DT_RowIndex',
                    name : 'DT_RowIndex',
                },
                {
                    data : 'nim',
                    name : 'nim',
                },
                {
                    data : 'name',
                    name : 'name',
                },
                {
                    data : 'gender',
                    name : 'gender',
                },
                {
                    data : 'department',
                    name : 'department',
                },
                {
                    data : 'address',
                    name : 'address',
                },
                {
                    data : 'action',
                    name : 'action',
                },
            ]
        });
    </script>
@endsection --}}