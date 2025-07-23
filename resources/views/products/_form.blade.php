<!-- Fichier : resources/views/products/_form.blade.php -->

<!-- Nom du Produit -->
<div>
    <x-input-label for="nom" value="Nom du produit" />
    <x-text-input id="nom" name="nom" type="text" class="mt-1 block w-full" :value="old('nom', $produit->nom ?? '')" required autofocus />
    <x-input-error class="mt-2" :messages="$errors->get('nom')" />
</div>

<!-- Prix -->
<div>
    <x-input-label for="prix" value="Prix (€)" />
    <x-text-input id="prix" name="prix" type="number" step="0.01" min="0" class="mt-1 block w-full" :value="old('prix', $produit->prix ?? '')" required />
    <x-input-error class="mt-2" :messages="$errors->get('prix')" />
</div>

<!-- Description -->
<div>
    <x-input-label for="description" value="Description (optionnel)" />
    <textarea id="description" name="description" rows="4" class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">{{ old('description', $produit->description ?? '') }}</textarea>
    <x-input-error class="mt-2" :messages="$errors->get('description')" />
</div>

<!-- Image URL (Optionnel) -->
<div>
    <x-input-label for="image_url" value="URL de l'image (optionnel)" />
    <x-text-input id="image_url" name="image_url" type="url" class="mt-1 block w-full" :value="old('image_url', $produit->image_url ?? '')" placeholder="https://exemple.com/image.jpg" />
    <x-input-error class="mt-2" :messages="$errors->get('image_url')" />
</div>