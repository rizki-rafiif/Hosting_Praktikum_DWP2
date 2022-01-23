@extends('template.base')
@section('content')
    <div class='row'>
        <div class='col-lg-6'>
            <h1>Tambah Data Mahasiswa</h1>
            <form action="{{ route('student.store') }}" method='post'>
                @csrf
                {{-- form nim --}}
                <div class="form-group">
                    <label for="nim">NIM</label>
                    <input type="text" name="nim" class="form-control" placeholder="NIM" value="{{ old('nim') }}">
                    @error('nim')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                {{-- form nama --}}
                <div class="form-group">
                    <label for="name">Nama</label>
                    <input type="text" name="name" class="form-control" placeholder="NAMA" value="{{ old('name') }}">
                    @error('name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                {{-- form gender --}}
                <div class="form-group">
                    <label for="gender">Jenis Kelamin</label>
                    <select name="gender" class="form-control">
                        <option value=""></option>
                        @foreach ($gender as $gd)
                        <option value="{{ $gd }}" {{ (old('gender') == $gd) ? 'selected' : ''}}>{{ $gd }}</option>        
                        @endforeach
                    </select>
                    
                    @error('gender')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                {{-- form department --}}
                <div class="form-group">
                    <label for="department">Jurusan</label>
                    <select name="department" class="form-control">
                        <option value=""></option>
                        @foreach ($department as $dp)
                        <option value="{{ $dp }}" {{ (old('department') == $dp) ? 'selected' : ''}}>{{ $dp }}</option>        
                        @endforeach
                    </select>
                    @error('department')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                {{-- form alamat --}}
                <div class="form-group">
                    <label for="address">Alamat</label>
                    <textarea name="address" class="form-control" placeholder="ALAMAT">{{ old('address') }}</textarea>
                </div>
                <button type="submit" class="btn btn-primary">Tambah</button>
            </form>
        </div>
    </div>
@endsection