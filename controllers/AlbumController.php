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
            die("Error de conexión a la base de datos");
        }

        $this->album = new Album($this->db);
    }

    // LISTAR ÁLBUMES
    public function index()
    {
        $stmt = $this->album->read();
        $albumes = $stmt->fetchAll(PDO::FETCH_ASSOC);
        include 'views/listar.php';
    }

    // CREAR ÁLBUM
    public function create()
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {

            // Sanitización básica
            $this->album->titulo = trim($_POST['titulo']);
            $this->album->artista = trim($_POST['artista']);
            $this->album->genero = trim($_POST['genero']);
            $this->album->fecha_lanzamiento = $_POST['fecha_lanzamiento'];
            $this->album->num_canciones = (int) $_POST['num_canciones'];
            $this->album->es_explicit = isset($_POST['es_explicit']) ? 1 : 0;

            if ($this->album->create()) {
                header("Location: index.php?action=index&message=created");
                exit();
            } else {
                $error = "Error al crear el álbum";
            }
        }

        include 'views/crear.php';
    }

    // EDITAR ÁLBUM
    public function edit()
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {

            $this->album->idAlbum = (int) $_POST['idAlbum'];
            $this->album->titulo = trim($_POST['titulo']);
            $this->album->artista = trim($_POST['artista']);
            $this->album->genero = trim($_POST['genero']);
            $this->album->fecha_lanzamiento = $_POST['fecha_lanzamiento'];
            $this->album->num_canciones = (int) $_POST['num_canciones'];
            $this->album->es_explicit = isset($_POST['es_explicit']) ? 1 : 0;

            if ($this->album->update()) {
                header("Location: index.php?action=index&message=updated");
                exit();
            } else {
                $error = "Error al actualizar el álbum";
            }
        }

        if (isset($_GET['id'])) {
            $this->album->idAlbum = (int) $_GET['id'];
            $this->album->readOne();
            $album_data = $this->album;
            include 'views/editar.php';
        }
    }

    // ELIMINAR ÁLBUM
    public function delete()
    {
        if (isset($_GET['id'])) {
            $this->album->idAlbum = (int) $_GET['id'];

            if ($this->album->delete()) {
                header("Location: index.php?action=index&message=deleted");
            } else {
                header("Location: index.php?action=index&message=error");
            }
            exit();
        }
    }
}