<?php

/**
 * Classe Database — Conexão com o banco de dados
 *
 * Padrão: Singleton
 * Garante que apenas UMA conexão PDO seja criada durante
 * toda a execução da aplicação.
 */
class Database {

    // ── Configurações de conexão (privadas — Encapsulamento) ──────────────────
    private string $host     = 'localhost';
    private string $dbname   = 'sistema_db';
    private string $user     = 'root';
    private string $password = '';
    private string $charset  = 'utf8mb4';

    // ── Propriedades do Singleton ─────────────────────────────────────────────
    private static ?Database $instance   = null;
    private ?PDO             $connection = null;

    // Construtor privado: impede uso de 'new Database()' fora da classe
    private function __construct() {}

    /**
     * Retorna a única instância da classe.
     * Se ainda não existir, cria uma nova.
     */
    public static function getInstance(): Database {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    /**
     * Retorna a conexão PDO.
     * Cria a conexão na primeira chamada e reutiliza nas seguintes.
     */
    public function getConnection(): PDO {
        if ($this->connection === null) {
            $dsn = "mysql:host={$this->host};dbname={$this->dbname};charset={$this->charset}";

            $opcoes = [
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES   => false,
            ];

            try {
                $this->connection = new PDO($dsn, $this->user, $this->password, $opcoes);
            } catch (PDOException $e) {
                die('Erro na conexão com o banco: ' . $e->getMessage());
            }
        }

        return $this->connection;
    }
}
