<div role="alert">
    <div class="bg-{{ $color }}-500 text-white font-bold rounded-t px-4 py-2">
        Danger
    </div>
    <div  {{ $attributes->merge(['class' => "border border-t-0 border-$color-400 rounded-b bg-$color-100 px-4 py-3 text-$color-700"]) }} >
        <p>Something not ideal might be happening.</p>
        <p>{{$title ?? 'valor $title no definido' }}</p>
        <p>{{ $slot }}</p>
        <p>{{ $attributes }}</p>
    </div>
</div>