<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
// Guzzleを読み込む
use GuzzleHttp\Client;
// バリデーション
use App\Http\Requests\CustomerRequest;


class CustomerController extends Controller
{
    // const HOST = 'https://zipcloud.ibsnet.co.jp/api/search';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = customer::all();
        return view('customers.index')->with(compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        // return view('customers.create');

        // 変数を用意
        $method = 'GET';
        $zipcode = $request->postcode;
        $url = 'https://zipcloud.ibsnet.co.jp/api/search?zipcode=' . $zipcode;


        //     // Client(接続する為のクラス)を生成
        $client = new Client();
        try {
            $response = $client->request($method, $url);
            $body = $response->getBody();
            $zip_cloud = json_decode($body, true);
            $result = $zip_cloud['results'][0];
            $address = $result['address1'] . $result['address2'] . $result['address3'];
            $postcode = $result['zipcode'];
           return view('customers.create')->with(compact('address', 'postcode'));
        } catch (\Throwable $th) {
            return back()->withErrors(['error' => '郵便番号が正しくありません']);
          
        }
    }

    //         // URLにアクセスした結果を変数$responseに代入
    //         $response = $client->request($method, self::HOST . $url);
    //         // $responseのBodyを取得
    //         $body = $response->getBody();
    //         $customers = json_decode($body, false);
    //     } catch (\Exception $e) {
    //         $customers = null;
    //     }
    //     dd($customers);
    //     return view('customers.index', compact('customers'));


    // /**
    //  * Store a newly created resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\Response
    //  */
    public function store(CustomerRequest $request)
    {
        $customer = new Customer();
        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->postcode = $request->postcode;
        $customer->address = $request->address;
        $customer->ter = $request->ter;

        $customer->save();

        return redirect('/customers');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        return view('customers.show')->with(compact('customer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        return view('customers.edit')->with(compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(CustomerRequest $request, Customer $customer)
    {

        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->postcode = $request->postcode;
        $customer->address = $request->address;
        $customer->ter = $request->ter;

        $customer->save();

        return redirect('/customers');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        $customer->delete();
        return redirect()->route('customers.index');
    }

    public function search()
    {
        return view('customers.search');
    }
}
