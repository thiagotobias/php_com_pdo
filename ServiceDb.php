<?php

class ServiceDb
{
    private $db;
    private $aluno;

    public function __construct(\PDO $db, Aluno $aluno)
    {
        $this->db = $db;
        $this->aluno = $aluno;
    }

    public function find($id)
    {
        $query = "SELECT * FROM alunos WHERE id=:id";

        $stmt = $this->db->prepare($query);
        $stmt->bindValue(":id",$id);
        $stmt->execute();

        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    public function listar(){
        $query = "SELECT * FROM alunos";

        $stmt = $this->db->query($query);
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);

    }

}