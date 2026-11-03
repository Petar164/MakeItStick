<?php

namespace Database\Seeders;

use App\Models\Badge;
use App\Models\Categorie;
use App\Models\Challenge;
use App\Models\User;
use App\Models\Vraag;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // gebruikers (wachtwoord voor iedereen: password)
        $docent = User::factory()->create([
            'name' => 'Docent Test',
            'email' => 'docent@makeitstick.test',
            'rol' => 'docent',
        ]);
        $sanne = User::factory()->create([
            'name' => 'Sanne de Vries',
            'email' => 'sanne@makeitstick.test',
            'score' => 1560,
        ]);
        User::factory()->create([
            'name' => 'Student Test',
            'email' => 'student@makeitstick.test',
            'score' => 1240,
        ]);

        // categorieen
        $csharp = Categorie::create(['naam' => 'C#']);
        $oop = Categorie::create(['naam' => 'OOP']);
        $sql = Categorie::create(['naam' => 'SQL']);

        // voorbeeldvragen uit de opdracht
        $v1 = Vraag::create([
            'docent_id' => $docent->id,
            'tekst' => 'Wat is het belangrijkste verschil tussen een for-loop en een while-loop in C#?',
            'optie_a' => 'Een for-loop kan niet genest worden, een while-loop wel',
            'optie_b' => 'Een for-loop heeft een vooraf gedefinieerd aantal iteraties, een while-loop loopt door totdat een voorwaarde niet meer waar is',
            'optie_c' => 'Een while-loop kan geen variabelen wijzigen binnen de loop, een for-loop wel',
            'optie_d' => 'Een while-loop kan alleen gebruikt worden voor eenvoudige iteraties',
            'goed_antwoord' => 'b',
            'uitleg' => 'Een while-loop loopt door zolang de voorwaarde waar is.',
        ]);
        $v1->categorieen()->attach([$csharp->id]);

        $v2 = Vraag::create([
            'docent_id' => $docent->id,
            'tekst' => 'Welke term beschrijft het verbergen van de interne werking van een object?',
            'optie_a' => 'Polymorfisme',
            'optie_b' => 'Inheritance',
            'optie_c' => 'Encapsulation',
            'optie_d' => 'Abstraction',
            'goed_antwoord' => 'c',
            'uitleg' => 'Encapsulation schermt de interne data van een object af.',
        ]);
        $v2->categorieen()->attach([$oop->id, $csharp->id]);

        $v3 = Vraag::create([
            'docent_id' => $docent->id,
            'tekst' => 'Wat is het doel van een JOIN in SQL?',
            'optie_a' => 'Rijen verwijderen die aan een conditie voldoen',
            'optie_b' => 'Gegevens uit meerdere tabellen ophalen en combineren',
            'optie_c' => 'Gegevens alfabetisch sorteren',
            'optie_d' => 'Dubbele gegevens verwijderen',
            'goed_antwoord' => 'b',
            'uitleg' => 'Met een JOIN combineer je rijen uit meerdere tabellen.',
        ]);
        $v3->categorieen()->attach([$sql->id]);

        // weekly challenge uit de opdracht
        Challenge::create([
            'docent_id' => $docent->id,
            'titel' => 'Bouw een kleine ToDo-applicatie',
            'opdracht' => 'Taken toevoegen, als voltooid markeren en verwijderen. Taal: vrije keuze. Bonus: deadlines en sorteren.',
            'beoordelingscriteria' => 'Werkt het, leesbaarheid, datastructuren, bonus voor extra functies',
            'deadline' => now()->next('Sunday')->setTime(23, 59),
        ]);

        // badges
        $tienOpRij = Badge::create(['naam' => '10 op rij', 'voorwaarde' => '10 vragen achter elkaar goed']);
        Badge::create(['naam' => 'C# pro', 'voorwaarde' => 'Alle C#-vragen geleerd']);
        Badge::create(['naam' => 'Challenger', 'voorwaarde' => 'Eerste weekly challenge ingeleverd']);
        $sanne->badges()->attach($tienOpRij->id, ['behaald_op' => now()->toDateString()]);
    }
}
