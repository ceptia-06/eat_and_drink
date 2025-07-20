<!-- Nom du Produit -->
<div>
    <x-input-label for="nom" value="Nom du produit" />
    <x-text-input id="nom" class="block mt-1 w-full" type="text" name="nom" :value="old('nom', $produit->nom ?? '')" required />
</div>

<!-- Prix -->
<div class="mt-4">
    <x-input-label for="prix" value="Prix (€)" />
    <x-text-input id="prix" class="block mt-1 w-full" type="number" step="0.01" name="prix" :value="old('prix', $produit->prix ?? '')" required />
</div>

<!-- Description -->
<div class="mt-4">
    <x-input-label for="description" value="Description" />
    <textarea id="description" name="description" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm">{{ old('description', $produit->description ?? '') }}</textarea>
</div>

<!-- Image URL (Optionnel) -->
<div class="mt-4">
    <x-input-label for="image_url" value="URL de l'image (Optionnel)" />
    <x-text-input id="image_url" class="block mt-1 w-full" type="text" name="image_url" :value="old('image_url', $produit->image_url ?? '')" />
</div>