@extends('layouts.main')

@section('title', '顧客詳細')

@section('content')
    <h1>顧客詳細画面</h1>


    <table border="5">
        <tr>
            <p>
            {{-- 必要事項 --}}
                <th>顧客ID</th>
                <th>名前</th>
                <th>メールアドレス</th>
                <th>郵便番号</th>
                <th>住所</th>
                <th>電話番号</th>
            </p>
        </tr>

        <tr>
            <p>
            {{-- お客様情報 --}}
                <td>{{ $customer->id }}</td>
                <td>{{ $customer->name }}</td>
                <td>{{ $customer->email}}</td>
                <td>{{ $customer->postcode }}</td>
                <td>{{ $customer->address }}</td>
                <td>{{ $customer->ter }}</td>
            </p>
        </tr>
    </table>

    
        {{-- <a href="/customers">戻る</a>   --}}
    {{-- {{ <button> -- }}
        <a href="{{ route('customers')}}">戻る</a>
    </button> --}}
    <p>
        <button>
            <a href="/customers/{{ $customer->id }}/edit">編集画面</a>
        </button>
    </p>

    <button type="button" onClick="history.back()">戻る</button>
    @endsection


