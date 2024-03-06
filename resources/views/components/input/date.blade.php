<div x-data="{ value: @entangle($attributes->wire('model')) }" x-on:change="value = $event.target.value" x-init="new Pikaday({
    field: $refs.input,
    'format': 'dd.mm.yy',
    firstDay: 0,
    'minDate': new Date(),
    toString(date, format) {
        // you should do formatting based on the passed format,
        // but we will just return 'D/M/YYYY' for simplicity
        const day = ('0' + (date.getDate())).slice(-2);
        const month = ('0' + (date.getMonth() + 1)).slice(-2);
        const year = date.getFullYear();
        return `${year}/${month}/${day}`;
    },
    parse(dateString, format) {
        // dateString is the result of `toString` method
        const parts = dateString.split('/');
        const day = parseInt(parts[0], 10);
        const month = parseInt(parts[1], 10) - 1;
        const year = parseInt(parts[2], 10);
        return new Date(year, month, day);
    }
});">
    <input {{ $attributes->whereDoesntStartWith('wire:model') }} x-ref="input" x-bind:value="value"
        type="text" placeholder="Meeting Date" readonly
        class="pl-10 block w-full shadow-sm sm:text-lg bg-gray-50 border-gray-300 focus:ring-primary-500 focus:border-primary-500 rounded-md" />
</div>
