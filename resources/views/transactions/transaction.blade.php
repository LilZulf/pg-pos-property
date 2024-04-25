@extends('layouts.app')

@section('content')
    <h1 class="text-xl font-bold">Virtual AccountTransaction List</h1>
    <div class="table-responsive mt-4">
        <table id="virtual-account" class=" display  table table-auto w-full border-black " style="width:100% border p-2">
            <thead>
                <tr>
                    <th class="border-black">No</th>
                    <th class="border-black">DATE & TIME</th>
                    <th class="border-black">ORDER ID</th>
                    <th class="border-black">TRANSACTION TYPE</th>
                    <th class="border-black">CHANNEL</th>
                    <th class="border-black">STATUS</th>
                    <th class="border-black">AMOUNT</th>
                    <th class="border-black">COSTUMER E-MAIL</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>01-01-2021</td>
                    <td>123456</td>
                    <td>
                        <span class="bg-success text-success p-2 rounded text-white">Virtual Account</span>
                    </td>

                    <td><img src="{{ asset('assets/images/bank/bni.png') }}" alt=""></td>
                    <td>Success</td>
                    <td>100.000</td>
                    <td>5z8oX@example.com</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>01-01-2021</td>
                    <td>999786</td>
                    <td>
                        <span class="bg-success text-success p-2 rounded text-white">Virtual Account</span>
                    </td>

                    <td><img src="{{ asset('assets/images/bank/bri.png') }}" alt=""></td>
                    <td>Success</td>
                    <td>100.000</td>
                    <td>5z8oX@example.com</td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>01-01-2021</td>
                    <td>85984</td>
                    <td>
                        <span class="bg-success text-success p-2 rounded text-white">Virtual Account</span>
                    </td>

                    <td><img src="{{ asset('assets/images/bank/mandiri.png') }}" alt=""></td>
                    <td>Success</td>
                    <td>100.000</td>
                    <td>5z8oX@example.com</td>
                </tr>



            </tbody>
        </table>
    </div>
@endsection
