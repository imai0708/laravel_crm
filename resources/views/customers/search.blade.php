@extends('layouts.main')

@section('title', '郵便番号検索画面')

@section('content')

    <h1>郵便番号検索画面</h1>

    @if ($errors->any())
        <div class="error">
             @if ($errors->any())
        <div class="error">
                @foreach ($errors->all() as $error)
                    {{ $error }}
                @endforeach
        </div>
    @endif
        </div>
    @endif

    <form action="{{ route('customers.create') }}" method="GET">
        @csrf
        <div>
            <label for="postcode">郵便番号検索</label>
            <input type="search" id="postcodde" name="postcode" placeholder="検索したい郵便番号">
        </div>

        <input type="submit" class="submit" value="検索">
    </form>

    <div>
        <button tyepe="button" onclick="location.href='{{ route('customers.index') }}'">一覧へ戻る</button>
    </div>

@endsection
