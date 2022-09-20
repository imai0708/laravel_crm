@extends('layouts.main')

@section('title', '編集画面')
@section('content')
    <h1>編集画面</h1>

    {{-- <form action="{{ route('customers.update', $customer) }}" method="post">
        @csrf
        @method('patch')
        <div>
            <label for="name">名前</label>
            <input type="text" name="name" id="name" value="{{ old('name', $custmer->name) }}">
        </div> --}}
    {{-- <div>
            <label for="description">詳細:</label>
            <textarea name="description" id="description" cols="30" rows="10">{{ old('description', $shop->description) }}</textarea>
        </div>
        <div>
            <label for="address">住所:</label>
            <input type="text" name="address" id="address" value="{{ old('address', $shop->address) }}">
        </div>
        <div>
            <input type="submit" value="修正">
        </div> --}}


    <p>
    <form action="/custmers/{{ $customer->id }}" method="post">
        @csrf
        @method('PATCH')

        {{-- 名前 --}}
        <p>
            <label for="name">名前</label>
            <input type="string" name="name" value="{{ old('name', $customer->name) }}">
        </p>

        {{-- メールアドレス --}}
        <p>
            <label for="enname">メールアドレス</label>
            <input type="string" name="email" value="{{ old('email', $customer->email) }}">
        </p>

        {{-- 郵便番号 --}}
        <p>
            <label for="radius">郵便番号</label>
            <input type="string" name="postcode" value="{{ old('postcode', $customer->postcode) }}">
        </p>

        {{-- 住所 --}}
        <p>
            <label for="radius">住所</label>
            <textarea type="string" name="address" value="{{ old('address', $customer->address) }}"></textarea>
        </p>

        {{-- 電話番号 --}}
        <p>
            <label for="radius">電話番号</label>
            <input type="string" name="ter" value="{{ old('ter', $customer->ter) }}">
        </p>

        <p>
            <input type="submit" value="更新">
        </p>
        <button>
            <a href="/customers/">戻る</a>
        </button>
    </form>
@endsection
