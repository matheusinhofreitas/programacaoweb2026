<?php

require_once __DIR__ . '/../config/Database.php';

/**
 * Classe Usuario — Model
 *
 * Responsável por todas as operações de banco de dados
 * relacionadas à entidade Usuário.
 *
 * Conceitos OOP aplicados:
 *   - Encapsulamento: atributo $conn é privado
 *   - Responsabilidade única: só acessa a tabela 'usuarios'
 */
class Usuario {

    private PDO $conn;

    public function __construct() {
        $this->conn = Database::getInstance()->getConnection();
    }

    /**
     * Busca um usuário pelo e-mail.
     * Retorna o array com os dados ou null se não encontrar.
     */
    public function buscarPorEmail(string $email): ?array {
        $stmt = $this->conn->prepare(
            'SELECT * FROM usuarios WHERE email = :email LIMIT 1'
        );
        $stmt->execute([':email' => $email]);

        $resultado = $stmt->fetch();
        return $resultado ?: null;
    }
}
