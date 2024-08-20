
<h1>Edit Amount</h1>

<form action="{{ route('amounts.update', $amount) }}" method="post">
    @csrf
    @method('PUT')
    <label for="currency">Currency:</label>
    <select name="currency" required>
        @foreach($exchangeRates as $currency => $rate)
            <option value="{{ $currency }}" {{ $amount->currency == $currency ? 'selected' : '' }}>{{ $currency }}</option>
        @endforeach
    </select>
    <label for="amount">Amount:</label>
    <input type="number" name="amount" min="0.01" step="0.01" value="{{ $amount->amount }}" required>
    <button type="submit">Update</button>
</form>