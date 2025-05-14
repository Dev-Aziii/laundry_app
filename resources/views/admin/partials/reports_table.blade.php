@forelse ($sales as $sale)
    <tr>
        <td>
            {{ optional($sale->order)?->delivery_date ? \Carbon\Carbon::parse($sale->order->delivery_date)->format('F j, Y') : 'N/A' }}
        </td>

        <td>
            @php
                $details = $sale->order?->orderDetails?->first();
            @endphp
            {{ $details?->name ?? 'N/A' }}
        </td>
        <td>{{ $sale->order?->orderDetails?->sum('quantity') ?? 0 }}</td>
        <td>₱{{ number_format($sale->amount_due, 2) }}</td>
    </tr>
@empty
    <tr>
        <td colspan="5" class="text-center py-5">
            <div class="text-muted">
                <i class="fas fa-exclamation-circle fa-3x mb-3"></i>
                <h4>Sorry! Revenue report not found</h4>
            </div>
        </td>
    </tr>
@endforelse
