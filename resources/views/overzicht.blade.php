<!doctype html>
<html lang="nl">
<head>
<meta charset="utf-8">
<title>Make It Stick - overzicht</title>
<style>
  body{font-family:Arial,sans-serif;margin:0;background:#f5f5f5;color:#222}
  header{background:#1c1c1c;color:#fff;padding:20px 32px}
  header span{background:#E06A0C;padding:4px 10px;border-radius:6px;margin-left:8px;font-size:14px}
  main{padding:24px 32px;max-width:1000px}
  h2{border-bottom:3px solid #E06A0C;padding-bottom:4px}
  table{width:100%;border-collapse:collapse;background:#fff;margin-bottom:24px}
  th,td{text-align:left;padding:8px;border-bottom:1px solid #ddd;font-size:14px}
  th{background:#eee}
  .cat{background:#E06A0C;color:#fff;border-radius:10px;padding:2px 8px;font-size:12px;margin-right:4px}
</style>
</head>
<body>
<header><b>Make It Stick</b><span>overzicht database</span></header>
<main>
  <h2>Vragen</h2>
  <table>
    <tr><th>Vraag</th><th>Goed</th><th>Categorieën</th></tr>
    @foreach ($vragen as $vraag)
      <tr>
        <td>{{ $vraag->tekst }}</td>
        <td>{{ $vraag->goed_antwoord }}</td>
        <td>@foreach ($vraag->categorieen as $c)<span class="cat">{{ $c->naam }}</span>@endforeach</td>
      </tr>
    @endforeach
  </table>

  <h2>Weekly challenges</h2>
  <table>
    <tr><th>Titel</th><th>Deadline</th></tr>
    @foreach ($challenges as $ch)
      <tr><td>{{ $ch->titel }}</td><td>{{ $ch->deadline->format('d-m-Y H:i') }}</td></tr>
    @endforeach
  </table>

  <h2>Gebruikers</h2>
  <table>
    <tr><th>Naam</th><th>Rol</th><th>Score</th></tr>
    @foreach ($gebruikers as $g)
      <tr><td>{{ $g->name }}</td><td>{{ $g->rol }}</td><td>{{ $g->score }}</td></tr>
    @endforeach
  </table>

  <h2>Badges</h2>
  <table>
    <tr><th>Badge</th><th>Voorwaarde</th></tr>
    @foreach ($badges as $b)
      <tr><td>{{ $b->naam }}</td><td>{{ $b->voorwaarde }}</td></tr>
    @endforeach
  </table>
</main>
</body>
</html>