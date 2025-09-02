@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Assign Permission ke User (berdasarkan NPK)</h1>

    @if(session('success'))
        <div style="color: green; margin-bottom: 10px;">
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div style="color: red; margin-bottom: 10px;">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('permissions.assign') }}" method="POST">
        @csrf

        <div>
            <label for="npk">Pilih User (NPK):</label>
            <select name="npk" id="npk" required>
                <option value="" disabled selected>-- Pilih User --</option>
                @foreach($users as $user)
                    <option value="{{ $user->npk }}">
                        {{ $user->name }} (NPK: {{ $user->npk }})
                    </option>
                @endforeach
            </select>
        </div>

        <div style="margin-top: 10px;">
            <label for="permission">Pilih Permission:</label>
            <select name="permission" id="permission" required>
                <option value="" disabled selected>-- Pilih Permission --</option>
                @foreach($permissions as $permission)
                    <option value="{{ $permission->name }}">{{ $permission->name }}</option>
                @endforeach
            </select>
        </div>

        <div style="margin-top: 15px;">
            <button type="submit">Assign Permission</button>
        </div>
    </form>
</div>
@endsection
