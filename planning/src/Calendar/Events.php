<?php


namespace Calendar;

use PDO;


/**
 * Class rendez_vous permettra de manipuler, de récupérer des rendez-vous
 * @package Calendar
 */
class Events {
    private $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    /**
     * Recupère les rendez-vous commençant entre 2 dates
     * @param \DateTime $start
     * @param \DateTime $end
     * @return array
     */
    public function getEventsBetween (\DateTime $start, \DateTime $end) : array {
        $sql = "SELECT * FROM events WHERE start BETWEEN '{$start->format('Y-m-d 00:00:00')}' AND '{$end->format('Y-m-d 23:59:59')}'";
        $statement = $this->pdo->query($sql);
        $results =  $statement->fetchAll();

        return $results;
    }

    /**
     * Recupère les rendez-vous commençant entre 2 dates indexé par jour
     * @param \DateTime $start
     * @param \DateTime $end
     * @return array
     */
    public function getEventsBetweenByDay (\DateTime $start, \DateTime $end) : array {

        $events = $this->getEventsBetween($start, $end); // recupère les rendez-vous commeençant entre ces 2 dates
        $days = [];
        foreach ($events as $event) {
            $date = explode(' ', $event['start'])[0]; // permet de recupérer juste la première partie ( Y-m-d)
            if (!isset($days[$date])) {
                $days[$date] = [$event];
            }
            else {
                $days[$date][] = $event;
            }

        }
        return $days;
    }

    /**
     * Récupère un evènement
     * @param int $id
     * @return Event
     * @throws \Exception
     */
    public function find (int $id): Event {

        require 'Event.php';
        $statement = $this->pdo->query("SELECT * FROM events WHERE id = $id LIMIT 1");
        $statement->setFetchMode(PDO::FETCH_CLASS,Event::class);
        $result =  new Event($statement->fetch());
        if ($result === false) {
            throw new \Exception('Aucun résultat n\'a été trouvé');
        }
        return $result;
    }



}
