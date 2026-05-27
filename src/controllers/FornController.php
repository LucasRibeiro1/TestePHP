<?php

require_once __DIR__ . '/../classes/Forn.php';

class FornController {
    private $forn;

    public function __construct($pdo) {
        $this->forn = new Forn($pdo);
    }

    public function inicio() {
        return $this->forn->read();
    }

    public function create($nome, $cnpjcpf, $email, $cidade, $endereco, $bairro, $uf, $tel, $tipo, $dtini, $acesso, $obs) {
        $this->forn->create($nome, $cnpjcpf, $email, $cidade, $endereco, $bairro, $uf, $tel, $tipo, $dtini, $acesso, $obs);
    }

    public function update($id, $nome, $cnpjcpf, $email, $cidade, $endereco, $bairro, $uf, $tel, $tipo, $dtini, $acesso, $obs) {
        $this->forn->update($id, $nome, $cnpjcpf, $email, $cidade, $endereco, $bairro, $uf, $tel, $tipo, $dtini, $acesso, $obs);
    }

    public function delete($id) {
        $this->forn->delete($id);
    }
}
