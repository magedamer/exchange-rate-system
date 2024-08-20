<h1 class="text-3xl font-bold mb-4">Amounts</h1>

<div class="overflow-x-auto">
    <table class="w-full text-lg">
        <thead>
            <tr class="bg-gray-200">
                <th class="px-4 py-2">Currency</th>
                <th class="px-4 py-2">Amount</th>
                <th class="px-4 py-2">Exchange Rate</th>
                <th class="px-4 py-2">Converted Amount</th>
                <th class="px-4 py-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($amounts as $amount)
                <tr class="border-b">
                    <td class="px-4 py-2">{{ $amount->currency }}</td>
                    <td class="px-4 py-2">{{ $amount->amount }}</td>
                    <td class="px-4 py-2">{{ $exchangeRates[$amount->currency] }}</td>
                    <td class="px-4 py-2">{{ $amount->amount * $exchangeRates[$amount->currency] }}</td>
                    <td class="px-4 py-2">
                        <a href="{{ route('amounts.edit', $amount) }}" class="text-blue-600 hover:text-blue-900">Edit</a>
                        <form action="{{ route('amounts.destroy', $amount) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-900">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<a href="{{ route('amounts.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Add New Amount</a>