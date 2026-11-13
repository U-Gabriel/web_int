<!DOCTYPE html>
<html lang="fr" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GDOME — Solutions connectées & Catalogue</title>
    <meta name="description" content="Découvrez nos solutions innovantes et notre catalogue d'objets connectés avec GDOME.">
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-50 text-slate-800 antialiased font-sans">

    <!-- Header / Navigation -->
    <header class="sticky top-0 z-50 bg-white/80 backdrop-blur-md border-b border-slate-100">
        <div class="max-w-7xl mx-auto px-6 h-20 flex justify-between items-center">
            <div class="flex items-center space-x-3">
                <span class="text-xl font-black tracking-tight text-slate-900">GDOME<span class="text-blue-600">.</span></span>
            </div>
            <nav class="hidden md:flex items-center space-x-8 text-sm font-medium text-slate-600">
                <a href="#catalogue" class="hover:text-blue-600 transition">Catalogue</a>
            </nav>
            <div>
                <a href="/gabuzarf/" class="inline-flex items-center justify-center px-4 py-2.5 text-sm font-medium text-white bg-slate-900 rounded-xl hover:bg-slate-800 transition shadow-sm">
                    Espace Admin
                </a>
            </div>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="relative overflow-hidden py-24 lg:py-32 bg-gradient-to-b from-white to-slate-50 border-b border-slate-100">
        <div class="max-w-7xl mx-auto px-6 text-center">
            <span class="inline-block px-3 py-1 mb-6 text-xs font-semibold tracking-wider text-blue-600 uppercase bg-blue-50 rounded-full">Nouveau catalogue disponible</span>
            <h1 class="text-4xl lg:text-6xl font-extrabold tracking-tight text-slate-900 max-w-3xl mx-auto mb-6">
                L'innovation connectée au service de vos projets.
            </h1>
            <p class="text-lg lg:text-xl text-slate-600 max-w-2xl mx-auto mb-10">
                Explorez notre sélection d'équipements et de solutions de pointe, gérées en temps réel.
            </p>
            <div class="flex justify-center gap-4">
                <a href="#catalogue" class="px-8 py-4 text-base font-semibold text-white bg-blue-600 rounded-xl shadow-lg shadow-blue-500/20 hover:bg-blue-700 transition">
                    Découvrir le catalogue
                </a>
            </div>
        </div>
    </section>

    <!-- Catalogue Section (Alimenté par l'API) -->
    <section id="catalogue" class="py-24 max-w-7xl mx-auto px-6">
        <div class="flex justify-between items-end mb-12">
            <div>
                <h2 class="text-2xl lg:text-3xl font-bold tracking-tight text-slate-900">Nos derniers produits</h2>
                <p class="text-slate-600 mt-1">Synchronisés en direct depuis notre API.</p>
            </div>
        </div>

        @if(isset($objets) && count($objets) > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($objets as $objet)
                    <div class="bg-white rounded-2xl p-6 border border-slate-100 shadow-sm hover:shadow-md transition flex flex-col justify-between">
                        <div>
                            <div class="flex justify-between items-start mb-4">
                                <h3 class="font-bold text-lg text-slate-900">{{ $objet['name'] ?? 'Article sans nom' }}</h3>
                                @if(isset($objet['price']))
                                    <span class="inline-flex items-center px-2.5 py-1 rounded-lg text-xs font-semibold bg-emerald-50 text-emerald-700">
                                        {{ $objet['price'] }} €
                                    </span>
                                @endif
                            </div>
                            <p class="text-slate-600 text-sm leading-relaxed mb-6">
                                {{ $objet['description'] ?? 'Aucune description disponible pour le moment.' }}
                            </p>
                        </div>
                        <div class="pt-4 border-t border-slate-50 flex justify-between items-center text-xs text-slate-400">
                            <span>Réf : #{{ $objet['id'] ?? 'N/A' }}</span>
                            <span class="font-medium text-blue-600">Disponible</span>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="text-center py-16 bg-white rounded-2xl border border-dashed border-slate-200">
                <p class="text-slate-500">Aucun produit trouvé pour le moment via l'API.</p>
            </div>
        @endif
    </section>

    <!-- Footer -->
    <footer class="bg-white border-t border-slate-100 py-12">
        <div class="max-w-7xl mx-auto px-6 flex flex-col md:flex-row justify-between items-center text-sm text-slate-500">
            <p>&copy; {{ date('Y') }} GDOME. Tous droits réservés.</p>
            <p class="mt-4 md:mt-0">Propulsé par Laravel</p>
        </div>
    </footer>

</body>
</html>