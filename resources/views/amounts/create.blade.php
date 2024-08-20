
<h1>Add New Amount</h1>

<form action="{{ route('amounts.store') }}" method="post">
    @csrf
    <label for="currency">Currency:</label>
    <select name="currency" required>
        @foreach($exchangeRates as $currency => $rate)
            <option value="{{ $currency }}">{{ $currency }}</option>
        @endforeach
    </select>
    <label for="amount">Amount:</label>
    <input type="number" name="amount" min="0.01" step="0.01" required>
    <button type="submit">Add</button>
</form>