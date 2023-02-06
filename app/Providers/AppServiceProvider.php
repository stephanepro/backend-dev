<?php

namespace App\Providers;

use Filament\Facades\Filament;
use Filament\Navigation\NavigationBuilder;
use Filament\Navigation\NavigationGroup;
use Filament\Navigation\NavigationItem;
use Filament\Navigation\UserMenuItem;
use Filament\Pages\Dashboard;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(): void
    {
        /**
         * Configuration générale de filament pour l'application
         */
        Filament::serving(function () {
            // Enregistrement du thème de l'application CABALOU
            Filament::registerViteTheme('resources/css/filament.css');

            // Ajout des menus au niveau du dropdown de l'avatar de l'utilisateur
            Filament::registerUserMenuItems([
                UserMenuItem::make()
                    ->label(__('filament::pages/profile.title'))
                    ->url(route('filament.pages.dashboard'))
                    ->icon('heroicon-s-user-circle'),

                UserMenuItem::make()
                    ->label(__('filament::pages/settings.title'))
                    ->url(route('filament.pages.dashboard'))
                    ->icon('heroicon-s-cog'),
            ]);
        });


        /**
         * Organisation des menus en groupes.
         * Chaque menu appartient à un groupe excepté le menu 'Tableau de bord'
         */
        Filament::navigation(function (NavigationBuilder $builder): NavigationBuilder {
            return $builder
                ->items([
                    NavigationItem::make(__('filament::pages/dashboard.title'))
                        ->icon('heroicon-o-home')
                        ->isActiveWhen(fn (): bool => request()->routeIs('filament.pages.dashboard'))
                        ->url(route('filament.pages.dashboard')),
                ])
                ->groups([
                    NavigationGroup::make('Website')
                        ->items([

                        ]),
                ]);
        });

    }
}
