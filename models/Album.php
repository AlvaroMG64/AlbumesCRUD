<?php
class Album
{
    private $conn;
    private $table_name = "albumes";

    public $idAlbum;
    public $titulo;
    public $artista;
    public $genero;
    public $fecha_lanzamiento;
    public $num_canciones;
    public $es_explicit;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    // READ ALL
    public function read()
    {
        $query = "SELECT * FROM " . $this->table_name . " ORDER BY fecha_lanzamiento DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    // CREATE
    public function create()
    {
        $query = "INSERT INTO " . $this->table_name . "
            SET titulo=:titulo,
                artista=:artista,
                genero=:genero,
                fecha_lanzamiento=:fecha_lanzamiento,
                num_canciones=:num_canciones,
                es_explicit=:es_explicit";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":titulo", $this->titulo);
        $stmt->bindParam(":artista", $this->artista);
        $stmt->bindParam(":genero", $this->genero);
        $stmt->bindParam(":fecha_lanzamiento", $this->fecha_lanzamiento);
        $stmt->bindParam(":num_canciones", $this->num_canciones, PDO::PARAM_INT);
        $stmt->bindParam(":es_explicit", $this->es_explicit, PDO::PARAM_INT);

        return $stmt->execute();
    }

    // READ ONE
    public function readOne()
    {
        $query = "SELECT * FROM " . $this->table_name . " WHERE idAlbum = ? LIMIT 1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->idAlbum, PDO::PARAM_INT);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            $this->titulo = $row['titulo'];
            $this->artista = $row['artista'];
            $this->genero = $row['genero'];
            $this->fecha_lanzamiento = $row['fecha_lanzamiento'];
            $this->num_canciones = $row['num_canciones'];
            $this->es_explicit = $row['es_explicit'];
        }
    }

    // UPDATE
    public function update()
    {
        $query = "UPDATE " . $this->table_name . "
            SET titulo=:titulo,
                artista=:artista,
                genero=:genero,
                fecha_lanzamiento=:fecha_lanzamiento,
                num_canciones=:num_canciones,
                es_explicit=:es_explicit
            WHERE idAlbum=:idAlbum";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":titulo", $this->titulo);
        $stmt->bindParam(":artista", $this->artista);
        $stmt->bindParam(":genero", $this->genero);
        $stmt->bindParam(":fecha_lanzamiento", $this->fecha_lanzamiento);
        $stmt->bindParam(":num_canciones", $this->num_canciones, PDO::PARAM_INT);
        $stmt->bindParam(":es_explicit", $this->es_explicit, PDO::PARAM_INT);
        $stmt->bindParam(":idAlbum", $this->idAlbum, PDO::PARAM_INT);

        return $stmt->execute();
    }

    // DELETE
    public function delete()
    {
        $query = "DELETE FROM " . $this->table_name . " WHERE idAlbum = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->idAlbum, PDO::PARAM_INT);

        return $stmt->execute();
    }
}