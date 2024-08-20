
<h1>Exchange Rates</h1>

<table>
    <thead>
        <tr>
            <th>Currency</th>
            <th>Rate</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($exchangeRates as $currency => $rate)
            <tr>
                <td>{{ $currency }}</td>
                <td>{{ $rate }}</td>
                <td>
                    <form action="{{ route('exchange-rates.update') }}" method="post">
                        @csrf
                        <input type="hidden" name="currency" value="{{ $currency }}">
                        <input type="number" name="rate" value="{{ $rate }}">
                        <button type="submit">Update</button>
                    </form>
                    <form action="{{ route('exchange-rates.delete') }}" method="post">
                        @csrf
                        @method('DELETE')
                        <input type="hidden" name="currency" value="{{ $currency }}">
                        <button type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<h2>Add New Exchange Rate</h2>

<form action="{{ route('exchange-rates.add') }}" method="post">
    @csrf
    <label for="currency">Currency:</label>
    <input type="text" name="currency" required>
    <label for="rate">Rate:</label>
    <input type="number" name="rate" min="0.01" step="0.01" required>
    <button type="submit">Add</button>
</form>