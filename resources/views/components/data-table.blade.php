
<div>
    <table id="#" class="display table table-bordered w-full text-center table-striped">
        <thead>
            <tr>
                <th class="text-uppercase">No</th>
                <th class="text-uppercase">Date & Time</th>
                <th class="text-uppercase">Order ID</th>
                <th class="text-uppercase">Transaction Type</th>
                <th class="text-uppercase">Channel</th>
                <th class="text-uppercase">Status</th>
                <th class="text-uppercase">Amount</th>
                <th class="text-uppercase">Costumer Email</th>
                <th class="text-uppercase">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($costumers as $row)
            <tr>
                <td>{{ $row['no'] }}</td>
                <td>{{ $row['date_time'] }}</td>
                <td>{{ $row['order_id'] }}</td>
                <td>{{ $row['transaction_type'] }}</td>
                <td><img src="{{ asset($row['channel'] )}}" alt=""></td>
                <td>{{ $row['status'] }}</td>
                <td>{{ $row['amount'] }}</td>
                <td>{{ $row['customer_email'] }}</td>
                <td>.......</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
