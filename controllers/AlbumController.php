<?php
include_once 'config/Database.php';
include_once 'models/Album.php';

class AlbumController
{
    private $db;
    private $album;

    public function __construct()
    {
        $database = new Database();
        $this->db = $database->getConnection();

        if ($this->db === null) {
            die("No se pudo conectar a la base de datos");
        }

        $this->album = new Album($this->db);
    }

    public function index()
    {
        $stmt = $this->album->read();
        $albumes = $stmt->fetchAll(PDO::FETCH_ASSOC);
        include 'views/listar.php';
    }

    public function create()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $this->album->titulo = htmlspecialchars(strip_tags($_POST['titulo']));
            $this->album->artista = htmlspecialchars(strip_tags($_POST['artista']));
            $this->album->genero = htmlspecialchars(strip_tags($_POST['genero']));
            $this->album->fecha_lanzamiento = $_POST['fecha_lanzamiento'];
            $this->album->num_canciones = (int) $_POST['num_canciones'];
            $this->album->es_explicit = isset($_POST['es_explicit']) ? 1 : 0;

            if ($this->album->create()) {
                header("Location: index.php?action=index&message=created");
                exit();
            }
        }
        include 'views/crear.php';
    }

    public function edit()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $this->album->idAlbum = $_POST['idAlbum'];
            $this->album->titulo = htmlspecialchars(strip_tags($_POST['titulo']));
            $this->album->artista = htmlspecialchars(strip_tags($_POST['artista']));
            $this->album->genero = htmlspecialchars(strip_tags($_POST['genero']));
            $this->album->fecha_lanzamiento = $_POST['fecha_lanzamiento'];
            $this->album->num_canciones = (int) $_POST['num_canciones'];
            $this->album->es_explicit = isset($_POST['es_explicit']) ? 1 : 0;

            if ($this->album->update()) {
                header("Location: index.php?action=index&message=updated");
                exit();
            }
        }

        if (isset($_GET['id'])) {
            $this->album->idAlbum = $_GET['id'];
            $this->album->readOne();
            $album_data = (object) $this->album;
            include 'views/editar.php';
        }
    }

    public function delete()
    {
        if (isset($_GET['id'])) {
            $this->album->idAlbum = $_GET['id'];
            $this->album->delete();
            header("Location: index.php?action=index&message=deleted");
            exit();
        }
    }
}