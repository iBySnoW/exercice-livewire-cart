<div x-data="{ open: false}" class="relative">
    <button x-on:click="open = ! open">Mon panier ({{ array_sum($cart) }})</button>
    <div x-show="open" x-on:click.outside="open = false" class="absolute bottom-0 right-0 p-4 translate-y-full bg-white shadow w-96">
        <ul>
            @forelse($products as $product)
                <li class="flex items-center justify-between py-1">
                    <div>{{ $product->name }}</div>
                    <div class="flex items-center gap-1 flex-nowrap">
                        {{-- TODO: RENDRE LES BOUTONS ET LA QUANTITÉ RÉACTIFS --}}
                        <button
                            type="button"
                            class="flex items-center justify-center w-8 h-8 rounded-full bg-slate-300"
                            wire:click="decrement({{ $product->id }})"
                        >-</button>
                        <div class="w-8 text-center">{{ $cart[$product->id] ?? 0 }}</div>
                        <button
                            type="button"
                            class="flex items-center justify-center w-8 h-8 rounded-full bg-slate-300"
                            wire:click="increment({{ $product->id }})"
                        >+</button>
                    </div>
                </li>
            @empty
                <li class="py-8 text-center">Votre panier est vide</li>
            @endforelse
            <li class="flex items-center justify-between py-1 border-t border-slate-200">
                <div>Total</div>
                <div class="text-nowrap">
                    {{-- TODO: TROUVER UN MOYEN D'AFFICHER LE TOTAL --}}
                    {{ Number::currency($total, 'EUR', 'fr') }}
                </div>
            </li>
        </ul>
    </div>
</div>
