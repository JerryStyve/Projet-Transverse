<?php
require '../src/bootstrap.php';
require '../src/Calendar/Month.php';
require '../src/Calendar/Events.php';

$pdo = get_pdo();
$events = new \Calendar\Events($pdo);
$month = new Calendar\Month($_GET['month'] ?? null, $_GET['year'] ?? null);
$start = $month->getStartingDay();
$start = $start->format('N') ==='1' ? $start : $month->getStartingDay()->modify('last monday'); // si un jour est égal à 1 on renvoit la date de démarrage,
// dans le cas contraire, on recupère la date du dernier lundi
$weeks = $month->getWeeks(); // nombre de semaines

$end = (clone $start)->modify('+'.(6 + 7 * ($weeks - 1)) . 'days');
$events = $events->getEventsBetweenByDay($start, $end);

require'../views/header.php';





?>


<div class="d-flex flex-row align-items-center justify-content-between mx-sm-3">
    <h1><?= $month ->toString(); ?></h1>
    <div>
        <a href="/index.php?month=<?= $month->previousMonth()->month; ?>&year=<?= $month->previousMonth()->year; ?>" class="btn btn-primary">&lt;</a>
        <a href="/index.php?month=<?= $month->nextMonth()->month; ?>&year=<?= $month->nextMonth()->year; ?>" class="btn btn-primary">&gt;</a>
    </div>
</div>





<table class="calendrier__table calendrier__table--<?= $weeks; ?>weeks">
    <?php for ($i = 0; $i < $weeks; $i++): ?>
    <tr>
        <?php
        foreach ($month->days as $k => $day):
            $date = (clone $start)->modify("+" . ($k + $i * 7). "days");
            $eventsForDay = $events[$date->format('Y-m-d')] ?? [];

            ?>

        <td class="<?= ($month->withinMonth($date)) ? 'mois en cours' : 'calendrier__othermonth'; ?>">
            <?php if ($i == 0) : ?>
                <div class="calendrier__weekday"><?= $day; ?></div>
            <?php endif; ?>
            <div class="calendrier__day"><?= $date->format('d'); ?></div>
            <?php foreach ($eventsForDay as $event): ?>
            <div class="calendrier__event">
                <?= (new DateTime($event['start']))->format('H:i') ?> - <a href="/event.php?id=<?= $event['id']; ?>"><?= h($event['name']); ?></a>
            </div>

            <?php endforeach; ?>
        </td>
        <?php endforeach; ?>
    </tr>
    <?php endfor; ?>
</table>


<?php require'../views/footer.php'; ?>