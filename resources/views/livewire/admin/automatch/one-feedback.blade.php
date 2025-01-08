<tr>
    <td class="whitespace-nowrap">{{ $feedback->name }}</td>
    <td>{{ $feedback->phone }}</td>
    <td>{{ $feedback->page }}</td>
    <td>{{ $feedback->type }}</td>
    <td>
        @foreach(explode(',', $feedback->cars) as $car)
            {{ $car }}<br>
        @endforeach
    </td>
    <td>
        <select wire:model.live="status" class="select {{ $feedback->statusClass }}" style="cursor: pointer; border: 0px;">
            @foreach ($statuses as $status2)
                <option value="{{ $status2 }}" @if ($this->status === $status2) selected @endif>
                    {{ __('feedback-status.' . $status2) }}
                </option>
            @endforeach
        </select>
    </td>
</tr>
