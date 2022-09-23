@extends('layouts.main')

@section('title', '顧客一覧')

@section('content')
    <h1>顧客一覧</h1>


    <table border="5">

        {{-- 必要事項 --}}
        <th>顧客id</th>
        <th>名前</th>
        <th>メールアドレス</th>
        <th>郵便番号</th>
        <th>住所</th>
        <th>電話番号</th>


        @foreach ($customers as $customer)
            <tr>
                {{-- id --}}
                <td><a href="{{ route('customers.show', $customer) }}">{{ $customer->id }}</a></td>

                {{-- 名前 --}}
                <td>{{ $customer->name }}</td>

                {{-- メールアドレス --}}
                <td>{{ $customer->email }}</td>

                {{-- 郵便番号 --}}
                <td>{{ $customer->postcode }}</td>

                {{-- 住所 --}}
                <td>{{ $customer->address }}</td>

                {{-- 電話番号 --}}
                <td>{{ $customer->ter }}</td>
            </tr>
        @endforeach
    </table>


    {{-- 新規作成ボタン --}}
    <button>
        <a href="{{ route('customers.search') }}">新規作成</a>
    </button>


@endsection
