<template>
  <div class="min-h-screen text-blue-900 bg-gradient-to-br from-blue-100 via-white to-blue-100">

    <!-- Navigation -->
    <nav class="px-6 py-4 bg-white shadow-md">
      <div class="flex items-center justify-between max-w-6xl mx-auto">
        <div class="flex items-center space-x-2">
          <div class="flex items-center justify-center w-10 h-10 font-bold text-white bg-blue-500 rounded-lg">
            CD
          </div>
          <span class="text-2xl font-bold">CardDeck Pro</span>
        </div>
        <div class="flex items-center space-x-4">
          <button class="text-blue-700 hover:underline">Connexion</button>
          <button class="px-4 py-2 text-white bg-blue-500 rounded hover:bg-blue-600">S'inscrire</button>
        </div>
      </div>
    </nav>

    <!-- Hero -->
    <section class="py-20 text-center">
      <div class="max-w-3xl mx-auto">
        <h1 class="mb-6 text-5xl font-bold">
          Gérez vos <span class="text-blue-500">collections</span><br />
          de cartes facilement
        </h1>
        <p class="mb-8 text-lg">
          Organisez, suivez et partagez vos decks en toute simplicité.
        </p>
        <div class="flex flex-col items-center justify-center gap-4 sm:flex-row">
          <button class="px-6 py-3 text-white bg-blue-500 rounded hover:bg-blue-600">Commencer Gratuitement</button>
          <button class="px-6 py-3 text-blue-500 border border-blue-500 rounded hover:bg-blue-100">Voir la Démo</button>
        </div>
      </div>
    </section>

    <!-- Features -->
    <section class="py-20 bg-blue-50">
      <div class="max-w-6xl mx-auto text-center">
        <h2 class="mb-4 text-3xl font-bold">Fonctionnalités</h2>
        <p class="mb-10 text-blue-700">Tout ce qu’il vous faut pour vos collections</p>
        <div class="grid gap-8 px-6 md:grid-cols-3">
          <div class="p-6 bg-white rounded shadow">
            <h3 class="mb-2 text-xl font-bold">Création de Decks</h3>
            <p>Construisez vos decks avec une interface intuitive et rapide.</p>
          </div>
          <div class="p-6 bg-white rounded shadow">
            <h3 class="mb-2 text-xl font-bold">Listes Personnalisées</h3>
            <p>Créez vos propres listes de cartes et suivez votre progression.</p>
          </div>
          <div class="p-6 bg-white rounded shadow">
            <h3 class="mb-2 text-xl font-bold">Base de Données</h3>
            <p>Explorez une bibliothèque complète de cartes et séries.</p>
          </div>
        </div>
      </div>
    </section>

    <!-- Stats -->
    <section class="py-20">
      <div class="grid max-w-6xl grid-cols-2 gap-6 px-6 mx-auto text-center md:grid-cols-4">
        <div>
          <div class="text-3xl font-bold text-blue-600">10K+</div>
          <div>Cartes Référencées</div>
        </div>
        <div>
          <div class="text-3xl font-bold text-blue-600">5K+</div>
          <div>Collectionneurs</div>
        </div>
        <div>
          <div class="text-3xl font-bold text-blue-600">150+</div>
          <div>Séries</div>
        </div>
        <div>
          <div class="text-3xl font-bold text-blue-600">25K+</div>
          <div>Decks Créés</div>
        </div>
      </div>
    </section>

    <!-- Call to Action -->
    <section class="py-20 text-center bg-blue-100">
      <h2 class="mb-4 text-3xl font-bold">Prêt à Commencer ?</h2>
      <p class="mb-8">Rejoignez la communauté dès maintenant !</p>
      <button class="px-8 py-3 text-lg text-white bg-blue-500 rounded hover:bg-blue-600">
        Créer un Compte Gratuit
      </button>
    </section>

    <!-- Footer -->
    <footer class="py-6 bg-white border-t">
      <div class="max-w-6xl mx-auto text-sm text-center text-blue-600">
        &copy; 2025 CardDeck Pro. Tous droits réservés.
      </div>
    </footer>
  </div>
</template>
