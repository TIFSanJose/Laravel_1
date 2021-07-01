@props(['color' => 'yellow'])
<div {{ $attributes->merge(['class' => "bg-$color-100 border-l-4 border-$color-500 text-$color-700 p-4"]) }}  role="alert">
    <p class="font-bold">Be Warned</p>
    <p>Something not ideal might be happening.</p>
    <p><small>Slot comun</small> Valor de Slot: <strong>{{ $slot }}</strong></p>
    <p><small>Slot con nombre</small> Valor de alerta: <strong>{{ $alerta ?? 'valor default'}}</strong></p>
    <p>Variable attibutes: <strong>{{ $attributes }}</strong></p>
</div>
