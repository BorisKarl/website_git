<?php


declare(strict_types=1);

class FipRepository {

    public function __construct(private PDO $pdo) {}

    public function fetchAll() {
        $stmt = $this->pdo->prepare('SELECT * FROM fip_temp ORDER BY id ASC');
        $stmt->execute();
       
        $results = $stmt->fetchAll(PDO::FETCH_CLASS, FipModel::class);
        return $results;
    }

    public function insertTitle(string $artist, string $title, string $album, string $jahr) {
        $stmt = $this->pdo->prepare('INSERT INTO fip_temp (name, title, album, jahr) VALUES (:name, :title, :album, :jahr)');
        $stmt->bindValue(':name', $artist);
        $stmt->bindValue(':title', $title);
        $stmt->bindValue(':album', $album);
        $stmt->bindValue(':jahr', $jahr);
        $stmt->execute();
    }
    
    public function fetchHistory() {
        $stmt = $this->pdo->prepare('SELECT * FROM fip_temp ORDER BY id DESC');
        $stmt->execute();
       
        $results = $stmt->fetchAll(PDO::FETCH_CLASS, FipModel::class);
        return $results;

    }

    public function copyToArchive() {
        $stmt = $this->pdo->prepare('INSERT INTO fip_archive SELECT * FROM fip_temp');
        $stmt->execute();
    }

    public function deleteFromTable() {
        $stmt = $this->pdo->prepare('DELETE FROM fip_temp');
        $stmt->execute();

    }

    public function findByArtist(string $artist): ?FipModel {
        $stmt = $this->pdo->prepare('SELECT * FROM fip_temp WHERE artist LIKE :artist');
        $stmt->bindValue(':artist', "{$artist}%");
        $stmt->setFetchMode(PDO::FETCH_CLASS, FipModel::class);
        $stmt->execute();
        $entry = $stmt->fetch();
        if (empty($entry)) {
            return null;
        }
        else {
            return $entry;
        }
    }

    public function findByTitle(string $title): ?FipModel {
        $stmt = $this->pdo->prepare('SELECT * FROM fip_temp WHERE title LIKE :title');
        $stmt->bindValue(':title', "{$title}%");
        $stmt->setFetchMode(PDO::FETCH_CLASS, FipModel::class);
        $stmt->execute();
        $entry = $stmt->fetch();
        if (empty($entry)) {
            return null;
        }
        else {
            return $entry;
        }
    }

     public function findByYear(string $jahr): ?FipModel {
        $stmt = $this->pdo->prepare('SELECT * FROM fip_temp WHERE jahr LIKE :jahr');
        $stmt->bindValue(':jahr', $jahr);
        $stmt->setFetchMode(PDO::FETCH_CLASS, FipModel::class);
        $stmt->execute();
        $entry = $stmt->fetch();
        if (empty($entry)) {
            return null;
        }
        else {
            return $entry;
        }
    }
}
